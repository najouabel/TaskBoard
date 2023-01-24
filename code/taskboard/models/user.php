<?php

class user{
    public static function login($data){
       
        $email_user = $data['email_user'];
        try{
            $query = 'SELECT * FROM user WHERE email_user=:email_user';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":email_user"=>$email_user));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
            if($stmt->execute()){
                return 'ok';
            } 
        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
    }
    static public function createUser($data){
 
		$stmt = DB::connect()->prepare('INSERT INTO user (email_user,password_user,name_user )
			VALUES (:email_user,:password_user,:name_user)');
		$stmt->bindParam(':email_user',$data['email_user']);
		$stmt->bindParam(':password_user',password_hash($data['password_user'],PASSWORD_DEFAULT));
		$stmt->bindParam(':name_user',$data['name_user']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}
}