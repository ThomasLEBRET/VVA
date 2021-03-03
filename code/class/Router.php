<?php

require_once("user/UserController.php");
require_once("animation/AnimationController.php");

require_once("datas/ErrorController.php");
require_once("datas/Request.php");

class Router {

  private $userController;
  private $animationController;

  private $errorController;
  private $request;

  public function __construct() {
    $this->userController = new UserController();
    $this->animationController = new AnimationController();

    $this->errorController = new ErrorController();
    $this->request = new Request();
  }

  /**
  * Réparti l'utilisation des controleurs de données en fonction du chemin emprunté par l'utilisateur
  * @return void  le controleur de données associé au chemin choisi par l'utilisateur
  */
  public function run()
  {
    $page = $this->request->getGet()->get('page');
    $post = $this->request->getPost();
    try {
      if($page) {
        switch($page) {
          case 'accueil':
            $this->userController->home($post);
            break;
          case 'animation':
            $this->animationController->allAnimations();
          break;
          case 'deconnexion':
              Session::stop();
              header('Location: index.php?page=accueil');
              break;
          default:
            $this->errorController->errorNotFound();
          break;
        }
      } else {
        header('Location: index.php?page=accueil');
      }
    }
    catch (Exception $e) {
      $this->errorController->errorServer();
    }
  }
}
?>
