<?php

class UsersController extends Controller {

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

		// PAGINAÇÃO
		$this->arrayInfo['pag'] = array('currentpage'=>0, 'total'=>0, 'per_page'=>4);
		if(!empty($_GET['p'])) {
			$this->arrayInfo['pag']['currentpage'] = intval($_GET['p']) - 1;
		}

		$this->arrayInfo['permission_list'] = $permissions->getAllGroups();
		$this->arrayInfo['list'] = $users->getAll($this->arrayInfo['filter'], $this->arrayInfo['pag']);

		$this->arrayInfo['pag']['total'] = $users->getTotal($this->arrayInfo['filter']);

		$this->loadTemplate('users', $this->arrayInfo);
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


		$this->loadTemplate('users_add', $this->arrayInfo);
	}
	public function del($id){
		if(!empty($id)){
			$u = new Users();
			$u->del($id);
		}
		header("Location: ".BASE_URL."users");
		exit;
	}
	public function add_action(){
		$u = new Users();
		$p = new Permissions();

		$this->arrayInfo['permission_list'] = $p->getAllGroups();

		if(!empty($_POST['name'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$id_permission = $_POST['permission'];
			$admin = $_POST['admin'];

			$u->add($name, $email, $password, $id_permission, $admin);

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