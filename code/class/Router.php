<?php

require_once("user/UserController.php");
require_once("animation/AnimationController.php");
require_once("activite/ActiviteController.php");

require_once("datas/ErrorController.php");
require_once("datas/Request.php");

/**
 * Class to redirect path on a data controller
 */
class Router {

  private $userController;
  private $animationController;
  private $activiteController;

  private $errorController;
  private $request;

  /**
   * default constructor
   */
  public function __construct() {
    $this->userController = new UserController();
    $this->animationController = new AnimationController();
    $this->activiteController = new ActiviteController();

    $this->errorController = new ErrorController();
    $this->request = new Request();
  }

  /**
  * Distributes the use of data controllers according to the path taken by the user
  * @return void  the data controller associated with the path chosen by the user
  */
  public function run()
  {
    $page = $this->request->getGet()->get('page');
    $codeAnim = $this->request->getGet()->get('codeAnimation');

    $post = $this->request->getPost();
    $get = $this->request->getGet();
    try {
      if($page) {
        switch($page) {
          case 'accueil':
            $this->userController->home($post);
            break;
          case 'animation':
            $this->animationController->allAnimations();
            break;
          case 'addAnimation':
            $this->animationController->addAnimation($post);
            break;
          case 'addActivite':
            $this->activiteController->addActivite($post);
            break;
          case 'tryRegister':
            $this->activiteController->addInscription($get);
            break;
          case 'activite':
            $this->activiteController->getAllByCodeAnim($codeAnim);
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
      $this->errorController->errorServer($e);
    }
  }
}
?>
