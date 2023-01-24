<?php

require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';

$home = new HomeController();

$admin = ['add','update','delete','logout','login','registre','home'];

if (isset($_GET['page']) && in_array($_GET['page'],$admin)) {

  if (isset($_SESSION['logged']) && isset($_SESSION['logged']) === true) {
    if ($_GET['page'] === "login") {
      $home->index("home");
    } else {
      $page = $_GET['page'];
      $home->index($page);
    }
  }else{
    if($_GET['page'] ==="registre"){
      $home->index('registre');
    }else{
      $home->index('login');
  
    }
  }

}else{

    $home->index('login');

  
  
}

require_once './views/includes/footer.php';


