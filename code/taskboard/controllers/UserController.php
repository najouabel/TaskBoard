<?php
class UserController{
    public function auth(){
        if(isset($_POST['submit'])){
            $data['email_user']=$_POST['email_user'];
            
            $password=$_POST['password_user'];
            print($password);
            $result= user::login($data);
            print($result->password_user);
            if($result->email_user === $_POST['email_user'] ){
                if(password_verify($password, $result->password_user)){
                    $_SESSION['logged'] = true;
                $_SESSION['email_user'] = $result->email_user;
                $_SESSION['name_user'] = $result->name_user;
                $_SESSION['id_user'] = $result->id_user;
                redirect::to('home');
                }else {
                    session::set('error','email or password not valid');
                    redirect::to('login');
                }
                
            }else{
                session::set('error','email or password not valid');
                redirect::to('login');
            }
        }
    }
    static public function logout(){
        session_destroy();
    }
    public function register(){
		if(isset($_POST['submit'])){
			
		
			$data = array(
				'name_user' => $_POST['name_user'],
				'email_user' => $_POST['email_user'],
				'password_user' => $_POST['password_user'],
			);
			$result = User::createUser($data);
			if($result === 'ok'){
				Session::set('success','Compte crée');
				Redirect::to('login');
			}else{
				echo $result;
			}
		}
	}
}