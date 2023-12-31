<?php
class productController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        header("Location: ".BASE_URL);
    }

    public function open($id){
        $store = new Store();
        $products = new Products();
        $categories = new Categories();

        $dados = $store->getTemplateData();

        $info = $products->getProductInfo($id);

        if(count($info) > 0){

        $dados['product_info'] = $info;
        $dados['products_images'] = $products->getImagesByProductId($id);
        $dados['products_options'] = $products->getOptionsByProductId($id);
        $dados['products_rate'] = $products->getRates($id, 5);


        $this->loadTemplate('product', $dados);
    } else{
        header("Location: ".BASE_URL);

       }
    } 

}