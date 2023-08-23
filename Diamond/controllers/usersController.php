<?php

class usersController extends Controller {

	private $user;
	private $arrayInfo;

	public function __construct() {
		$this->user = new Users();

		if(!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");
			exit;
		}

		if(!$this->user->hasPermission('users_view')) {
			header("Location: ".BASE_URL);
			exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'users'
		);

	}

	public function index() {
		$users = new Users();
		$permissions = new Permissions();

		// FILTRO
		$this->arrayInfo['filter'] = array('name'=>'', 'permission'=>'');

		if(!empty($_GET['name'])) {
			$this->arrayInfo['filter']['name'] = $_GET['name'];
		}
		if(!empty($_GET['permission'])) {
			$this->arrayInfo['filter']['permission'] = $_GET['permission'];
		}

		header('Location: '.BASE_URL);
		exit;
	}

	public function add() {
		$permissions = new Permissions();
		$this->arrayInfo['filter'] = array('name'=>'', 'permission'=>'');

		$this->arrayInfo['permission_list'] = $permissions->getAllGroups();
		$this->arrayInfo['errorItems'] = array();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
			$this->arrayInfo['errorItems'] = $_SESSION['formError'];
			unset($_SESSION['formError']);
		}

		$this->loadView('users_add', $this->arrayInfo);
	}

	public function add_action(){
		$u = new Users();

		if(!empty($_POST['name'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$u->add($name, $email, $password);

			header("Location: ".BASE_URL.'users');
			exit;

		}else{
			$_SESSION['formError'] = array('name');

			header("Location: ".BASE_URL.'users/add');
			exit;
		}
	}


}

?>