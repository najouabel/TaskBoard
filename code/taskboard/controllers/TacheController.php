<?php
class TacheController{
    public function getAllTaches(){
        
        $taches = tache::getAll();
        return $taches;
    }
  

   
    public function getAllTachesearch(){
        if(isset($_POST['search'])){
            $data=array(
                'search' =>$_POST['search']
            );
        }
        $tache =tache::getsearch($data);
        return $tache;
    }

    public function addtache(){
        
        
            // $data = array(
            //     'date_tache' => htmlspecialchars($_POST['date_tache']) ,
            //     'descrip_tache' => $_POST['descrip_tache'],
            //     'status' => $_POST['status'],
            // );
            $data = array();
            // loop through the name, description, statut and prix arrays
            foreach ($_POST['date_tache'] as $key => $date_tache) {
                $data[$key]['date_tache'] = $date_tache;
                $data[$key]['descrip_tache'] = $_POST['descrip_tache'][$key];
                $data[$key]['status'] = $_POST['status'][$key];

            }
            $result = tache::add($data);

            // if(empty($_POST['date_tache']) || empty($_POST['descrip_tache']) ){
            //     echo 'valider tout les champ';
            // }else{
            //     $result = tache::add($data);
            //     if($result==='ok'){
            //         session::set('success','tache ajouter');
            //         redirect::to('home');
            //     }else{
            //         echo $result;
            //     }
            // }
        
    }
  
   
    public function updatetache(){
            $data = array(
                'id_tache' =>$_POST['id_tache'],
                'date_tache' => $_POST['date_tache'],
                'descrip_tache' => $_POST['descrip_tache'],
                'status' => $_POST['status'],
            );
        $result = tache::update($data);
        if($result === 'ok'){
            session::set('success','tache modifier');
            redirect::to('home');
        }else{
            echo $result;
        }
    
    }

    public function deletetache(){
        if(isset($_POST['id_tache'])){
            $data['id_tache']=$_POST['id_tache'];
            $result=tache::delete($data);
            if($result==='ok'){
                session::set('success','tache delete');
                redirect::to('home');
            }else{
                echo $result;
            }
        }
    }
    }
    ?>