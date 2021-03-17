<?php

  require_once("Activite.php");
  require_once("class/animation/Animation.php");

  class ActiviteController extends Activite {

    private $activite;
    private $animation;

    /**
     * default constructor
     */
    public function __construct() {
      $this->activite = new Activite();
      $this->animation = new Animation();
    }

    /**
     * return view with all activity by a animation code
     * @param  string $codeAnimation an animation code
     * @return void
     */
    public function getAllByCodeAnim($codeAnimation) {
      $animation = $this->animation->get($codeAnimation);
      $codesEtatAct = $this->activite->getAllCodeEtatAct();
      if(Session::get('typeprofil') == 'EN') {
        require_once('view/activite/form/formAddActivite.php');
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
          //add method in activite
          $animation = $this->animation->get($codeanim);
          $this->activite->add($animation, $post);
        } else {
          require_once("view/activite/errors/errorInsertActivite.php");
        }
      } else {
        require_once("view/activite/errors/errorInsertActivite.php");
      }
    }

  }

?>
