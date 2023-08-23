<?php

	class Permissions extends Model{
 
		public function getPermissionGroupName($id_permission){
			$sql = "SELECT name FROM permission_group WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id_permission);
			$sql->execute();

			if($sql->rowCount() > 0){
				$data = $sql->fetch();

				return $data['name'];
			}else{
				return '';
			}

		}

		public function getPermissions($id_permission){ 
			$array = array();

			$sql = "SELECT id_permission_item FROM permission_links WHERE id_permission_group = :id_permission";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_permission', $id_permission);
			$sql->execute();

			if($sql->rowCount() > 0){
				$data = $sql->fetchAll();
				$ids = array();
				foreach($data as $data_item){
					$ids[] = $data_item['id_permission_item']; 
				}

				$sql = "SELECT slug FROM permission_itens WHERE id IN (".implode(',', $ids).")";
				$sql = $this->db->query($sql);

				if($sql->rowCount() > 0){
					$data = $sql->fetchAll();
					foreach($data as $data_item){
					$array[] = $data_item['slug']; 
				}
				}

			}

			return $array;
		}


		public function getAllGroups(){
			$array = array();
			$sql = "SELECT permission_group.*, 
			(SELECT 
				count(users.id) 
				FROM users 
				where users.id_permission = permission_group.id
			) 
				as total_users 
			FROM permission_group";
			$sql = $this->db->query($sql);

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			return $array;
		}
	}

		public function getAllItems(){
			$array = array();
			$sql = "SELECT * FROM permission_itens";
			
			$sql = $this->db->query($sql);

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			return $array;
		}
	}

		public function editName($new_name, $id){
			$sql = "UPDATE permission_group SET name= :name WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':name', $new_name);
			$sql->bindValue(':id', $id);
			$sql->execute();


		}

		public function clearLinks($id){
			$sql = "DELETE FROM permission_links WHERE id_permission_group = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

		}

		public function deleteGroup($id_group){
			$sql = "SELECT id FROM users WHERE id_permission = :id_group";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_group', $id_group);
			$sql->execute();

			if($sql->rowCount == 0){
				$sql = "DELETE FROM permission_links WHERE id_permission_group =:id_group";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id_group', $id_group);
				$sql->execute();

				$sql = "DELETE FROM permission_group WHERE id =:id_group";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id_group', $id_group);
				$sql->execute();
			}
		}



		public function addGroup($name){
			$sql = "INSERT INTO permission_group(name) VALUES (:name)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':name', $name);
			$sql->execute();

			return $this->db->lastInsertId();

		}

		public function linkItemToGroup($id_item, $id_group){
			$sql = "INSERT INTO permission_links (id_permission_group, id_permission_item) VALUES ( :id_group, :id_item";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_item', $id_item);
			$sql->bindValue(':id_group', $id_group);
			$sql->execute();
		}
	}

?>