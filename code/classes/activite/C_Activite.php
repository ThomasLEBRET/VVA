<?php

  require_once("Activite.php");
  require_once("ORMActivite.php");

  require_once("classes/animation/Animation.php");
  require_once("classes/animation/ORMAnimation.php");
  
  require_once("classes/inscription/Inscription.php");
  require_once("classes/inscription/ORMInscription.php");

  /**
   * Le contrôleur de la classe objet Activite
   */
  class C_Activite extends Activite {


    /**
     * Constructeur par défaut
     */
    public function __construct() {

    }

    /**
     * Page des activités pour une animation donnée
     * @param  string le code d'animation
     * @return void
     */
    public function voirActivite($codeAnimation) {
      $animation = ORMAnimation::get($codeAnimation);
      $codesEtatAct = ORMActivite::getAllCodeEtatAct();

      if(Session::get('typeprofil') == 'EN') {
        if(ORMAnimation::get($codeAnimation)->getCodeanim() == $codeAnimation) {
          if(Session::get('typeprofil') == 'EN') {
            require_once('vues/activite/formulaires/ajouterActivite.php');
          }
        }
      }
      if(!isset($codeAnimation)) {
        $title = "Erreur";
        $subTitle = "Code d'animation introuvable";
        $description = "Veuillez chercher une animation valide svp";

        require_once("vues/templateMessage.php");
      } else {
        $activites = ORMActivite::getAll($codeAnimation);
        if(empty($activites)) {
          $title = "Erreur";
          $subTitle = "Code d'animation introuvable";
          $description = "Veuillez chercher une animation valide svp";

          require_once("vues/templateMessage.php");
        } else {
          require_once("vues/activite/v_Activites.php");
        }
      }
    }

    /**
     * Contrôle l'ajoute d'une activité
     * @param Superglobal le tableau $_POST encapsulé dans l'objet Superglobal
     * @return void
     */
    public function ajouterActivite($post) {
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
          $title = "Erreur";
          $subTitle = "L'insertion de l'activité a échouée";
          $description = "Veuillez entrer une heure de début supérieur ou égale à celle de l'heure de rendez-vous";

          require_once("vues/templateMessage.php");
        }
      } else {
          $title = "Erreur";
          $subTitle = "L'insertion de l'activité a échouée";
          $description = "Une session de cette activité existe déjà aujourd'hui pour l'animation en cours";

          require_once("vues/templateMessage.php");
      }
    }

    /**
     * Contrôle l'ajout d'une inscription à une activité
     * @param Superglobal le tableau $_GET encapsulé dans l'objet Superglobal
     * @return void
     */
    public function ajouterInscription($get) {
      $noact = $get->get('noact');
      $activite = ORMActivite::get($noact);
      $user = Session::get('user');

      if(ORMActivite::isAlreadyRegistered($noact)) {
        $inscription = ORMInscription::get($user, $noact);
        if($inscription->getNoinscrip() != 0) {
          if($inscription->getDateannule() == null) {
            $title = "Erreur";
            $subTitle = "Vous êtes déjà inscrit à cette activité";
            $description = "Votre inscription a déjà été prise en compte pour cette activité";

            require_once("vues/templateMessage.php");

          } else  {
            if(ORMInscription::againRegister($inscription->getNoinscrip())) {
              $title = "Succès";
              $subTitle = "Votre réinscription a été prise en compte";
              $description = "Votre inscription a déjà été prise en compte pour cette activité";
  
              require_once("vues/templateMessage.php");
            } else {
              $title = "Erreur";
              $subTitle = "Votre réinscription a échouée";
              $description = "Une erreur inattendue est survenue";

              require_once("vues/templateMessage.php");
            }
          }
        } else {
            $title = "Erreur";
            $subTitle = "Votre réinscription a échouée";
            $description = "Le numéro de votre inscription n'a pas été trouvé";

            require_once("vues/templateMessage.php");
        }
      } else {
        $inscription = ORMInscription::get($user, $noact);
        if($inscription->getNoinscrip() == 0) {
          if(ORMActivite::inscription($noact)) {
            $title = "Succès";
            $subTitle = "Vous êtes inscrit à cette activité";
            $description = "Votre inscription a été prise en compte pour cette activité";

            require_once("vues/templateMessage.php");
          } else {
            $title = "Erreur";
            $subTitle = "Votre inscription a échouée";
            $description = "Une erreur inattendue est survenue";

            require_once("vues/templateMessage.php");
          } 
        } else {
          if(ORMInscription::againRegister($inscription->getNoinscrip())) {
            $title = "Succès";
            $subTitle = "Votre réinscription a été prise en compte";
            $description = "Votre inscription a déjà été prise en compte pour cette activité";

            require_once("vues/templateMessage.php");
          } else {
            $title = "Erreur";
            $subTitle = "Votre réinscription a échouée";
            $description = "Une erreur inattendue est survenue";
            
            require_once("vues/templateMessage.php");
          }
        }
      }
    }

    /**
     * Annule une inscription d'un utilisateur à une activité
     * @param Superglobal le tableau $_GET encapsulé dans l'objet Superglobal
     * @return void
     */
    public function annulerInscription($get) {
      $user = Session::get('user');
      $noact = $get->get('noact');

      $inscription = ORMInscription::get($user, $noact);
      if($inscription->getNoinscrip() != 0 && $inscription->getDateannule() == NULL) {
        if(ORMInscription::unscribeActRegisteredUser($inscription->getNoinscrip())) {
          $title = "Succès";
          $subTitle = "L'annulation de votre inscription a été prise en compte";
          $description = "Nous avons bien annulé votre inscription pour cette activité";

          require_once("vues/templateMessage.php");
        }
      } else {
        $title = "Erreur";
        $subtitle = "Vous êtes déjà désinscrit de cette activité";
        $description = "Votre désinscription a déjà été prise en compte";
        
        require_once('vues/templateMessage.php');
      }
    }

    /**
     * Annule une activité
     * @param Superglobal le tableau $_POST encapsulé dans l'objet Superglobal
     * @return void
     */
    public function annulerActivite($get) {
      $typeProfil = Session::get('typeprofil');
      $noAct = $get->get('noAct');

      if(isset($typeProfil)) {
        if($typeProfil == "EN") {
          if(ORMActivite::cancel($noAct)) {
            $title = "Succès";
            $subTitle = "L'activité a bien été annulée";
            $description = "L'annulation de l'activité a été annulée";

            require_once("vues/templateMessage.php");
          } else {
            $title = "Erreur";
            $subTitle = "Une erreur s'est produite lors de l'annulation de l'activité ".$noAct;
            $description = "Une erreur inattendue est survenue";

            require_once("vues/templateMessage.php");
          }
        } else {
          $title = "Erreur d'accès";
          $subTitle = "Vous n'avez pas à accéder à cette page avec ce type de compte";
          $description = "Seuls les encadrants sont à mêmes de pouvoir réaliser cette action !";
          
          require_once("vues/templateMessage.php");
        }
      } else {
        $title = "Erreur d'accès";
        $subTitle = "Vous n'avez pas à accéder à cette page avec ce type de compte";
        $description = "Il faut être connecté pour accéder à cette page";
        
        require_once("vues/templateMessage.php");
      }
    }

    /**
     * Contrôle qui peut voir l'affichage permettant de modifier une activité
     * @param Superglobal le tableau $_GET encapsulé dans l'objet Superglobal
     * @return void
     */
    public function vueModifierActivite($get) {
      $activite = ORMActivite::get($get->get('noAct'));
      $animation = ORMAnimation::get($activite->getCodeanim());
      $codesEtatAct = ORMActivite::getAllCodeEtatAct();
      
      if(Session::get('typeprofil') == 'EN' && $activite->getNoact() != 0) {
        require_once("vues/activite/formulaires/modifierActivite.php");
      } else {
        $title = "Erreur d'accès";
        $subTitle = "Vous n'avez pas à accéder à cette page avec ce type de compte";
        $description = "Seuls les encadrants sont à mêmes de pouvoir réaliser cette action sur une activité valide !";
        
        require_once("vues/templateMessage.php");
      }
    }

    /**
     * Contrôle qui peut modifier une activité
     * @param Superglobal le tableau $_POST encapsulé dans l'objet Superglobal
     * @return void
     */
    public function modifierActivite($post) {
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
            if(ORMActivite::updateAct($animation, $post)) {
              $title = "Succès";
              $subTitle = "L'activité a bien été mise à jour";
              $description = "Votre activité a été modifiée correctement";
              
              require_once("vues/templateMessage.php");
            } else {
              $title = "Echec";
              $subTitle = "L'activité n'a pas pu être mise à jour";
              $description = "Votre activité n'a pas été modifiée correctement pour une raison inconnue";
              
              require_once("vues/templateMessage.php");
            }
          } else {
            $title = "Echec";
            $subTitle = "L'activité n'a pas pu être mise à jour";
            $description = "Veuillez remplir tous les champs du formulaire";
            
            require_once("vues/templateMessage.php");
          }
        } else {
          $title = "Echec";
          $subTitle = "L'activité n'a pas pu être mise à jour";
          $description = "L'heure de rendez-vous doit être inférieur à l'heure de début de l'activité";
          
          require_once("vues/templateMessage.php");
        }
      } else {
        $title = "Echec";
        $subTitle = "Connexion requise";
        $description = "Le type de compte n'a pas été reconnu, veuillez vous connecter";
        
        require_once("vues/templateMessage.php");
      }
    }

  }

?>
