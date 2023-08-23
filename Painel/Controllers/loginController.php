<?php
class loginController extends Controller {


	public function index() {
		$array = array(
			'error' => ''
		);

		if(!empty($_SESSION['erroMsg'])){
			$array['error'] = $_SESSION['erroMsg'];
			$_SESSION['erroMsg'] = '';
		}

		$this->loadView('login', $array);
	}

	public function index_action(){

		if(!empty($_POST['email']) && !empty( $_POST['password'])){
			$email = $_POST['email'];
			$password = $_POST['password'];

			$u = new Users();

			if($u->validateLogin($email, $password)){
				header("Location: ".BASE_URL);
				exit;
			}else{
				$_SESSION['erroMsg'] = 'Usuário e/ou senha incorretos!';
			}
		}else{
			$_SESSION['erroMsg'] = 'Preencha os campos abaixo!';

		}

		

		header("Location: ".BASE_URL.'login');
			exit;


	}

	public function logout(){
		unset($_SESSION['token']);
		header("Location: ".BASE_URL);
		exit;
	}
}

?>

















