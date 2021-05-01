<?php

  require_once("Activite.php");
  require_once("ORMActivite.php");

  require_once("class/animation/Animation.php");
  require_once("class/animation/ORMAnimation.php");
  require_once("class/inscription/Inscription.php");
  require_once("class/inscription/ORMInscription.php");

  class ActiviteController extends Activite {


    /**
     * default constructor
     */
    public function __construct() {

    }

    /**
     * return view with all activity by a animation code
     * @param  string $codeAnimation an animation code
     * @return void
     */
    public function getAllByCodeAnim($codeAnimation) {
      $animation = ORMAnimation::get($codeAnimation);
      $codesEtatAct = ORMActivite::getAllCodeEtatAct();

      if(Session::get('typeprofil') == 'EN' || Session::get('typeprofil') == 'AM') {
        if(ORMAnimation::get($codeAnimation)->getCodeanim() == $codeAnimation) {
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
        $activites = ORMActivite::getAll($codeAnimation);
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
      if(ORMActivite::noExistActiviteInSameDayForAnimation($codeanim, $dateact)) {
        $hrrdvact = new DateTime($post->get('hrrdvact'));
        $hrdebutact = new DateTime($post->get('hrdebutact'));
        if($hrrdvact <= $hrdebutact) {
          $animation = ORMAnimation::get($codeanim);
          if(ORMActivite::add($animation, $post)) {
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
      $activite = ORMActivite::get($noact);
      $user = Session::get('user');

      if(ORMActivite::isAlreadyRegistered($noact)) {
        $inscription = ORMInscription::get($user, $noact);
        if($inscription->getNoinscrip() != "null") {
          if($inscription->getDateannule() == "null") {
            require_once('view/activite/errors/errorAlreayRegistered.php');
          } else  {
            ORMInscription::againRegister($inscription->getNoinscrip());
          }
        }
      } else {
        $inscription = ORMInscription::get($user, $noact);
        if($inscription->getNoinscrip() == 0) {
          ORMActivite::inscription($noact);
          header('Location: index.php?page=animation');
        } else {
          ORMInscription::againRegister($inscription->getNoinscrip());
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

      $inscription = ORMInscription::get($user, $noact);
      if($inscription->getNoinscrip() != 0 && $inscription->getDateannule() == NULL) {
        if(ORMInscription::unscribeActRegisteredUser($inscription->getNoinscrip())) {
          header('Location: index.php?page=animation');
        }
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
        if($typeProfil == "EN" || $typeProfil == "AM") {
          if(ORMActivite::cancel($noAct)) {
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

    
    public function viewUpdateActivity($get) {
      $activite = ORMActivite::get($get->get('noAct'));
      $animation = ORMAnimation::get($activite->getCodeanim());
      $codesEtatAct = ORMActivite::getAllCodeEtatAct();
      
      if(Session::get('typeprofil') == 'EN' && $activite->getNoact() != 0) {
        require_once("view/activite/form/formUpdateActivity.php");
      } else {
        require_once("view/activite/errors/errorNotAutorizedUser.php");
      }
    }

    public function updateActivite($post) {
      if(Session::get('typeprofil') == 'EN') {
        $activite = ORMActivite::get($post->get('noact'));
        $hrrdvact = new DateTime($activite->getHrrdvact());
        $hrdebutact = new DateTime($activite->getHrdebutact());
        if($hrrdvact <= $hrdebutact) {
          $allIsset = true;
          foreach ($post->getArray() as $key => $value) {
            if(empty($value)) {
              $allIsset = false;
            }
          }
          if($allIsset) {
            $animation = ORMAnimation::get($activite->getCodeanim());
            $isUpdateAct = ORMActivite::updateAct($animation, $post);
            if($isUpdateAct) {
              $msgUpdateAnim = "L'activité a bien été mise à jour"; 
            } else {
              $msgUpdateAnim = "L'activité n'a pas pu être mise à jour";
            }
            header('Location: index.php?page=activite&codeAnimation='.$animation->getCodeAnim());
          } else {
            require_once('view/activite/errors/errorUpdateActivite.php');
          }
        } else {
          require_once('view/activite/errors/errorUpdateActivite.php');
        }
      } else {
        require_once("view/activite/errors/errorNotAutorizedUser.php");
      }
    }

  }

?>
