<?php
if(isset($_POST['id_tache'])){
    $exittache= new TacheController();
    $exittache->deletetache();
}

?>