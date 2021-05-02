<?php

require_once("Animation.php");
require_once("ORMAnimation.php");

/**
 * Class to control Animation datas
 */
class C_Animation extends Animation {

  /**
   * default constructor
   */
  public function __construct() {

  }

  /**
   * return all animations for Encadrant
   * @return void
   */
  public function voirAnimation() {
    $animations = ORMAnimation::getAll();
    if(Session::get('typeprofil') == 'EN' || Session::get('typeprofil') == 'AM') {
      $codesTypeAnimation = ORMAnimation::getCodesTypeAnimations();
    }
    if($animations == NULL)
      $animations = [];
    require_once("vues/animation/v_Animations.php");
  }

  /**
   * route to add an animation after posting data in a form
   * @param Parameters $post a $_POST Parameters
   */
  public function ajouterAnimation($post) {
    if(Session::get('typeprofil') == 'EN') {
      $allIsset = true;
      foreach ($post->getArray() as $key => $value) {
        if(empty($value)) {
          $allIsset = false;
        }
      }
      if($allIsset && ORMAnimation::exist($post->get('codeanim')) == false) {
        if($post->get('dureeanim') > 0 && $post->get('limiteage') >= 0 && $post->get('nbreplaceanim') > 0) {
          if(ORMAnimation::add($post)) {
            $title = "Succès";
            $subTitle = "L'animation a bien été ajoutée";
            $description = "L'animation s'est enregistrée avec succès";

            require_once("vues/templateMessage.php");
          } else {
            $title = "Echec";
            $subTitle = "Echec lors de l'ajout de cette animation";
            $description = "Veuillez vérifier toutes les informations lorsque vous remplissez le formulaire";

            require_once("vues/templateMessage.php");
          }
        } else {
          $title = "Echec";
          $subTitle = "Echec lors de l'ajout de cette animation";
          $description = "Un de ces 3 critères n'est pas pris en compte :\n la durée de l'animation est inférieur ou égale à 0 \n la limite d'âge est inférieur ou égale à 0 \n le nombre de places de l'animation est inférieur ou égal à 0";
        
          require_once("vues/templateMessage.php");
        }
      } else {
        $title = "Echec";
        $subTitle = "Echec lors de l'ajout de cette animation";
        $description = "L'animation existe déjà ou le formulaire a été rempli partiellement";

        require_once("vues/templateMessage.php");
      }
    } else {
      $title = "Erreur";
      $subTitle = "Vous n'avez pas à accéder à cette page avec ce type de compte";
      $description = "Seuls les encadrants sont à mêmes de pouvoir réaliser cette action !";

      require_once("vues/templateMessage.php");
    }
  }

  public function vueModifierAnimation($get) {
    if(Session::get('typeprofil') == 'EN') {
      $codesTypeAnimation = ORMAnimation::getCodesTypeAnimations();

      $animation = ORMAnimation::get($get->get('codeAnimation'));
      if($animation->getCodeanim() != "null") {
        require_once("vues/animation/formulaires/modifierAnimation.php");
      } else {
        $title = "Animation non trouvée";
        $subTitle = "Nous n'avons pas trouvé cette animation";
        $description = "Veuillez choisir une autre animation";
      
        require_once("vues/erreur/erreursGlobales.php");
      }
    } else {
      $title = "Erreur d'accès";
      $subTitle = "Vous n'avez pas à accéder à cette page avec ce type de compte";
      $description = "Seuls les encadrants sont à mêmes de pouvoir réaliser cette action !";
      
      require_once("vues/templateMessage.php");
    }
  }

  public function modifieranimation($post) {
    if(Session::get('typeprofil') == 'EN') {
      $allIsset = true;
      foreach ($post->getArray() as $key => $value) {
        if(empty($value)) {
          $allIsset = false;
        }
      }
      if($allIsset && ORMAnimation::exist($post->get('codeanim'))) {
        if($post->get('dureeanim') > 0 && $post->get('limiteage') >= 0 && $post->get('nbreplaceanim') > 0) {
          if(ORMAnimation::updateAnim($post)) {
            $title = "Succès";
            $subTitle = "L'animation a bien été mise à jour";
            $description = "Tout s'est déroulé comme prévu";

            require_once("vues/templateMessage.php");
          } else {
            $title = "Erreur";
            $subTitle = "L'animation n'a pas pu être mise à jour";
            $description = "Une erreur inattendue est survenue";

            require_once("vues/templateMessage.php");
          }
        } else {
          $title = "La modification de l'animation ".$post->get('codeanim')." a échouée";
          $subTitle = "Echec lors de la modification de cette animation";
          $description = "Un de ces 3 critères n'est pas pris en compte :\n la durée de l'animation est inférieur ou égale à 0 \n la limite d'âge est inférieur ou égale à 0 \n le nombre de places de l'animation est inférieur ou égal à 0";
        
          require_once("vues/templateMessage.php");
        }
      } else {
        $title = "Erreur";
        $subTitle = "Echec lors de l'ajout de cette animation";
        $description = "Toutes les données du formulaire ne sont pas remplies";

        require_once("vues/templateMessage.php");
      }
    } else {
      $title = "Erreur d'accès";
      $subTitle = "Vous n'avez pas à accéder à cette page avec ce type de compte";
      $description = "Seuls les encadrants sont à mêmes de pouvoir réaliser cette action !";
      
      require_once("vues/templateMessage.php");
    }
  }

}

?>
