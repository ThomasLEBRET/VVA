<?php

require_once("utilisateur/C_Utilisateur.php");
require_once("animation/C_Animation.php");
require_once("activite/C_Activite.php");

require_once("donnees/C_Erreur.php");
require_once("donnees/Superglobal.php");

/**
 * Classe routeur servant à rediriger l'utilisateur en fonction des actions qu'il entreprend sur le site
 */
class Routeur {

  private $c_utilisateur;
  private $c_animation;
  private $c_activite;

  private $c_erreur;
  private $superglobal;

  /**
   * Constructeur par défaut
   */
  public function __construct() {
    $this->c_utilisateur = new C_Utilisateur();
    $this->c_animation = new C_Animation();
    $this->c_activite = new C_Activite();

    $this->c_erreur = new C_Erreur();
    $this->superglobal = new Superglobal();
  }

  /**
   * Fonction démarrant le routeur
   */
  public function demarrer()
  {
    $page = $this->superglobal->getGet()->get('page');
    $codeAnim = $this->superglobal->getGet()->get('codeAnimation');

    $post = $this->superglobal->getPost();
    $get = $this->superglobal->getGet();
    try {
      if($page) {
        switch($page) {
          case 'accueil':
            $this->c_utilisateur->accueil($post);
            break;
          case 'animation':
            $this->c_animation->voirAnimation();
            break;
          case 'ajouterAnimation':
            $this->c_animation->ajouterAnimation($post);
            break;
          case 'ajouterActivite':
            $this->c_activite->ajouterActivite($post);
            break;
          case 'ajouterInscription':
            $this->c_activite->ajouterInscription($get);
            break;
          case 'annulerInscription':
            $this->c_activite->annulerInscription($get);
            break;
          case 'activite':
            $this->c_activite->voirActivite($codeAnim);
            break;
          case 'annulerActivite':
            $this->c_activite->annulerActivite($get);
            break;
          case 'vueModifierActivite':
            $this->c_activite->vueModifierActivite($get);
            break;
          case 'modifierActivite':
            $this->c_activite->modifierActivite($post);
            break;
          case 'vueModifierAnimation':
            $this->c_animation->vueModifierAnimation($get);
            break;
          case 'modifierAnimation':
            $this->c_animation->modifierAnimation($post);
            break;
          case 'deconnexion':
            Session::stop();
            header('Location: index.php?page=accueil');
            break;
          default:
            $this->c_erreur->nonTrouvee();
          break;
        }
      } else {
        header('Location: index.php?page=accueil');
      }
    }
    catch (Exception $e) {
      $this->c_erreur->serveur($e);
    }
  }
}
?>
