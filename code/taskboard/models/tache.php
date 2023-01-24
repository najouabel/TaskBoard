<?php
class tache{

    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM tache where id_user =:id_user ORDER BY date_tache  ASC');
        $stmt->bindParam(":id_user",$_SESSION['id_user']);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;
    }

    static public function getsearch($data){
        $search=$data['search'];

        $stmt = DB::connect()->prepare("SELECT * FROM tache where id_user =:id_user AND descrip_tache like '%$search%'");
        $stmt->bindParam(":id_user",$_SESSION['id_user']);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;
    }

    static public function gettache($data){
        $id_tache=$data['id_tache'];
        try{
            $query ='SELECT * FROM tache WHERE id_tache=:id_tache';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id_tache"=>$id_tache));
            $tache=$stmt->fetch(PDO::FETCH_ASSOC);
            return $tache;
        }catch(PDOException $ex){
            echo 'error'.$ex->getMessage();
        }
    }

    static public function add($data){
        foreach ($data as $tasck) {
        $stmt= DB::connect()->prepare('INSERT INTO tache (date_tache,descrip_tache,status,id_user) VALUE (:date_tache,:descrip_tache,:status,:id_user)');
        $stmt->bindParam(":date_tache",$tasck['date_tache']);
        $stmt->bindParam(":descrip_tache",$tasck['descrip_tache']);
        $stmt->bindParam(":status",$tasck['status']);
        $stmt->bindParam(":id_user",$_SESSION['id_user']);
        $stmt->execute();
        }
        // if(){
        //     return 'ok';
        // }else{
        //     return 'error';
        // }

       return 'ok';
    }
    static public function update($data){
        $stmt = DB::connect()->prepare('UPDATE tache SET date_tache=:date_tache,descrip_tache=:descrip_tache,status=:status WHERE id_tache=:id_tache');
        $stmt->bindParam(":id_tache",$data['id_tache']);
        $stmt->bindParam(":date_tache",$data['date_tache']);
        $stmt->bindParam(":descrip_tache",$data['descrip_tache']);
        $stmt->bindParam(":status",$data['status']); 
        $stmt->execute();
    }

    public static function delete($data){
        $id_tache=$data['id_tache'];
        try{
            $query = 'DELETE FROM tache WHERE id_tache=:id_tache ';
            $stmt =DB::connect()->prepare($query);
            $stmt->execute(array(":id_tache"=>$id_tache));
            if($stmt->execute()){
                return 'ok';
            }
        }catch(PDOException $ex){
            echo 'error'.$ex->getMessage();
        }
    }
}