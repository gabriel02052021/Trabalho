<?php
class Products extends model {

	public function getInfo($id){
		$array = array();

		$sql = "SELECT * FROM products WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
			$images = current($this->getImagesByProductId($id));
			$array['image'] = $images['url'];

		}


		return $array;
	}

	public function getAvailableOptions($filters = array()) {
		$groups = array();
		$ids = array();

		$where = $this->buildWhere($filters);

		$sql = "SELECT
		id, options
		FROM products
		WHERE ".implode(' AND ', $where);
		$sql = $this->db->prepare($sql);

		$this->bindWhere($filters, $sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
			foreach($sql->fetchAll() as $product) {
				$ops = explode(",", $product['options']);
				$ids[] = $product['id'];
				foreach($ops as $op) {
					if(!in_array($op, $groups)) {
						$groups[] = $op;
					}
				}
			}
		}

		$options = $this->getAvailableValuesFromOptions($groups, $ids);

		return $options;

	}

	public function getAvailableValuesFromOptions($groups, $ids) {
		$array = array();
		$options = new Options();
		foreach($groups as $op) {
			$array[$op] = array(
				'name' => $options->getName($op),
				'options' => array()
			);
		}

		$sql = "SELECT
		p_value,
		id_option,
		COUNT(id_option) as c
		FROM product_options
		WHERE
		id_option IN ('".implode("','", $groups)."') AND
		id_product IN ('".implode("','", $ids)."')
		GROUP BY p_value ORDER BY id_option";

		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0) {
			foreach($sql->fetchAll() as $ops) {

				$array[$ops['id_option']]['options'][] = array(
					'id' => $ops['id_option'],
					'value'=>$ops['p_value'],
					'count'=>$ops['c']
				);

			}
		}

		return $array;
	}

	public function getSaleCount($filters = array()) {
		$where = $this->buildWhere($filters);

		$where[] = 'Promocao = "1"';

		$sql = "SELECT
		COUNT(*) as c
		FROM products
		WHERE ".implode(' AND ', $where);
		$sql = $this->db->prepare($sql);

		$this->bindWhere($filters, $sql);

		$sql->execute();

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();

			return $sql['c'];
		} else {
			return '0';
		}
	}

	public function getMaxPrice($filters = array()) {
		
		$sql = "SELECT
		price
		FROM products
		ORDER BY price DESC
		LIMIT 1";
		$sql = $this->db->prepare($sql);

		$sql->execute();

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();

			return $sql['price'];
		} else {
			return '0';
		}

	}

	public function getListOfStars($filters = array()) {
		$array = array();

		$where = $this->buildWhere($filters);

		$sql = "SELECT
		rating,
		COUNT(id) as c
		FROM products
		WHERE ".implode(' AND ', $where)."
		GROUP BY rating";
		$sql = $this->db->prepare($sql);

		$this->bindWhere($filters, $sql);

		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getListOfBrands($filters = array()) {
		$array = array();

		$where = $this->buildWhere($filters);

		$sql = "SELECT
		id_brands,
		COUNT(id) as c
		FROM products
		WHERE ".implode(' AND ', $where)."
		GROUP BY id_brands";
		$sql = $this->db->prepare($sql);

		$this->bindWhere($filters, $sql);

		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getList($offset = 0, $limit = 3, $filters = array(), $random = false) {
		$array = array();

		$orderBySQL = '';
		if($random == true){
			$orderBySQL = "ORDER BY RAND()";
		}

		if(!empty($filters['toprated'])){
			$orderBySQL = "ORDER BY rating DESC";
		}

		$where = $this->buildWhere($filters);

		$sql = "SELECT
			*,
			( select name from brands where brands.id = products.id_brands ) as brand_name,
			( select categories.name from categories where categories.id = products.id_category ) as category_name
		FROM
		products
		WHERE ".implode(' AND ', $where)."
		".$orderBySQL."
		LIMIT $offset, $limit";
		$sql = $this->db->prepare($sql);

		$this->bindWhere($filters, $sql);

		$sql->execute();
		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();

			foreach($array as $key => $item) {

				$array[$key]['images'] = $this->getImagesByProductId($item['id']);

			}


		}

		return $array;
	}

	public function getTotal($filters = array()) {

		$where = $this->buildWhere($filters);

		$sql = "SELECT
		COUNT(*) as c
		FROM products
		WHERE ".implode(' AND ', $where);
		$sql = $this->db->prepare($sql);

		$this->bindWhere($filters, $sql);

		$sql->execute();
		$sql = $sql->fetch();

		return $sql['c'];
	}

	public function getImagesByProductId($id) {
		$array = array();

		$sql = "SELECT url FROM product_images WHERE id_product = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	private function buildWhere($filters) {
		$where = array(
			'1=1'
		);

		if(!empty($filters['category'])) {
			$where[] = "id_category = :id_category";
		}

		if(!empty($filters['brand'])) {
			$where[] = "id_brands IN ('".implode("','", $filters['brand'])."')";
		}

		if(!empty($filters['star'])) {
			$where[] = "rating IN ('".implode("','", $filters['star'])."')";
		}

		if(!empty($filters['sale'])) {
			$where[] = "Promocao = '1'";
		}

		if(!empty($filters['featured'])) {
			$where[] = "featured = '1'";
		}

		if(!empty($filters['options'])) {
			$where[] = "id IN (select id_product from product_options where product_options.p_value IN ('".implode("','", $filters['options'])."'))";
		}

		if(!empty($filters['slider0'])) {
			$where[] = "price >= :slider0";
		}

		if(!empty($filters['slider1'])) {
			$where[] = "price <= :slider1";
		}

		if(!empty($filters['searchTerm'])) {
			$where[] = "Name LIKE :searchTerm";
		}


		return $where;
	}

	private function bindWhere($filters, &$sql) {
		if(!empty($filters['category'])) {
			$sql->bindValue(":id_category", $filters['category']);
		}

		if(!empty($filters['slider0'])) {
			$sql->bindValue(":slider0", $filters['slider0']);
		}

		if(!empty($filters['slider1'])) {
			$sql->bindValue(":slider1", $filters['slider1']);
		}

		if(!empty($filters['searchTerm'])) {
			$sql->bindValue(":searchTerm", '%'.$filters['searchTerm'].'%');
		}
	}

	public function getProductInfo($id){
		$array = array();

		if(!empty($id)){

			$sql = "SELECT 
			*, 
			(select name from brands where brands.id = products.id_brands ) as brand_name
			FROM products WHERE id= :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetch();

			}
		}

		return $array;
	}

	public function getOptionsByProductId($id){
		$options = array();


		//ETAPA 1: PEGAR O NOME DAS OPÇÕES
		$sql = "SELECT options FROM products WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$options = $sql->fetch();
			$options = $options['options'];

			if(!empty($options)){
				$sql = "SELECT * FROM options WHERE id IN (".$options.")";
				$sql = $this->db->query($sql);
				$options = $sql->fetchAll();
			}

			//ETAPA 2: PEGAR OS VALORES DAS OPÇÕES
			$sql = "SELECT * FROM product_options WHERE id_product = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();

			$options_value = array();
			if($sql->rowCount() > 0) {
				foreach($sql->fetchAll() as $op){
					$options_value[$op['id_option']] = $op['p_value'];
				}
			}

			//ETAPA 3: UNIFICAR OS DADOS EM UM UNICO ARRAY
			foreach ($options as $ok => $op) {
				if(isset($options_value[$op['id']])){
					$options[$ok]['value'] = $options_value[$op['id']];
				}else{
					$options[$ok]['value'] = '';
				}
			}
		}



		return $options;
	}

	public function getRates($id, $qt){
		$array = array();

		$rates = new Rates();
		$array = $rates->getRates($id, $qt);

		return $array;
	}



















}