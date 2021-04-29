<?php

  require_once("Activite.php");
  require_once("class/animation/Animation.php");
  require_once("class/inscription/Inscription.php");

  class ActiviteController extends Activite {

    private $activite;
    private $animation;
    private $inscription;

    /**
     * default constructor
     */
    public function __construct() {
      $this->activite = new Activite();
      $this->animation = new Animation();
      $this->inscription = new Inscription();
    }

    /**
     * return view with all activity by a animation code
     * @param  string $codeAnimation an animation code
     * @return void
     */
    public function getAllByCodeAnim($codeAnimation) {
      $animation = $this->animation->get($codeAnimation);
      $codesEtatAct = $this->activite->getAllCodeEtatAct();

      if(Session::get('typeprofil') == 'EN' || Session::get('typeprofil') == 'AM') {
        if($this->animation->get($codeAnimation)->getCodeanim() == $codeAnimation) {
          if(Session::get('typeprofil') == 'EN') {
            require_once('view/activite/form/formAddActivite.php');
          }
          require_once('view/activite/components/cancelButton.php');
        }
      } else {
        if(Session::get('typeprofil') == 'VA') {
          require_once('view/activite/components/registerButton.php');
           require_once('view/activite/components/unregisteredButton.php');
        }
      }
      if(!isset($codeAnimation)) {
        require_once("view/activite/errors/errorCodeAnimation.php");
      } else {
        $activites = $this->activite->getAll($codeAnimation);
        if(empty($activites)) {
          require_once("view/activite/errors/errorCodeAnimation.php");
        } else {
          require_once("view/activite/activitesByCodeAnimation.php");
        }
      }
    }

    /**
     * route to add an activity
     * @param Parameters $post a Parameters object contains a $_POST superglobal variable
     */
    public function addActivite($post) {
      $codeanim = $post->get('codeanim');
      $dateact = $post->get('dateact');
      if($this->activite->noExistActiviteInSameDayForAnimation($codeanim, $dateact)) {
        $hrrdvact = new DateTime($post->get('hrrdvact'));
        $hrdebutact = new DateTime($post->get('hrdebutact'));
        if($hrrdvact <= $hrdebutact) {
          $animation = $this->animation->get($codeanim);
          if($this->activite->add($animation, $post)) {
            header('Location: index.php?page=animation');
          }
        } else {
          require_once("view/activite/errors/errorInsertActivite.php");
        }
      } else {
        require_once("view/activite/errors/errorInsertActivite.php");
      }
    }

    /**
     * route to control datas to register on an activity
     * @param Parameters $get an $_GET array
     */
    public function addInscription($get) {
      $noact = $get->get('noact');
      $activite = $this->activite->get($noact);
      $user = Session::get('user');

      if($activite->isAlreadyRegistered($noact)) {
        $inscription = $this->inscription->get($user, $noact);
        if($inscription->getNoinscrip() != "null") {
          if($inscription->getDateannule() == "null") {
            require_once('view/activite/errors/errorAlreayRegistered.php');
          } else  {
            $this->inscription->againRegister($inscription->getNoinscrip());
          }
        }
      } else {
        $inscription = $this->inscription->get($user, $noact);
        if($inscription->getNoinscrip() == "null") {
          $activite->inscription($noact);
          header('Location: index.php?page=animation');
        } else {
          $this->inscription->againRegister($inscription->getNoinscrip());
          header('Location: index.php?page=animation');
        }
      }
    }

    /**
     * Annule une inscription d'un utilisateur à une activité
     * @param  Parameters $get la variable superglobal $_GET passé dans l'objet Parameters
     * @return mixed
     */
    public function unscribeActRegister($get) {
      $user = Session::get('user');
      $noact = $get->get('noact');

      $inscription = $this->inscription->get($user, $noact);
      if($inscription->getNoinscrip() != "null" && $inscription->getDateannule() == NULL) {
        $this->inscription->unscribeActRegisteredUser($inscription->getNoinscrip());
        header('Location: index.php?page=animation');
      } else {
        require_once('view/activite/errors/errorAlreayRegistered.php');
      }
    }

    /**
     * Annule une activité
     * @param Parameters $post la variable superglobal $_POST passé dans l'objet Parameters
     */
    public function tryCancelActivity($get) {
      $typeProfil = Session::get('typeprofil');
      $noAct = $get->get('noAct');

      if(isset($typeProfil)) {
        if($typeProfil == "EN") {
          if($this->activite->cancel($noAct)) {
            $msgCancelAct = "L'activité ".$noAct." a bien été annulée";
            header('Location: index.php?page=animation');
          } else {
            $msgCancelAct = "Une erreur s'est produite lors de l'annulation de l'activité ".$noAct;
            header('Location: index.php?page=animation');
          }
        } else {
          require_once("view/activite/errors/errorNotAutorizedUser.php");
        }
      } else {
        require_once("view/activite/errors/errorNotAutorizedUser.php");
      }
    }

  }

?>
