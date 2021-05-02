<?php

require_once("classes/donnees/Database.php");

require_once("Animation.php");

require_once("requetesSQL.php");

/**
 * La classe ORM de la classe objet Animation
 */
class ORMAnimation extends Database {
    
  /**
  * Renvoi la liste des animations pour un encadrant et administrateur, la liste des animations valides pour un vacancier
  * @return array un tableau d'animations
  */
  public static function getAll() {
    global $getAll;
    global $getAllValides;

    if(Session::get('typeprofil') == 'EN' || Session::get('typeprofil') == 'AM') {
      $animations = self::select($getAll, [], 'Animation');
    } else {
      $dtFinSej = Session::get('datefinsejour');
      $dtDebSej = Session::get('datedebsejour');

      $dateNaiss = new DateTime(Session::get('datenaiscompte'));
      $dateNow = new DateTime(date("Y-m-d"));

      $ageUser = $dateNow->diff($dateNaiss);
      $animations = self::select($getAllValides, [$ageUser->y, $dtFinSej], 'Animation');
    }
    return $animations;
  }

  /**
  * Renvoi une animatino
  * @param  string un code d'animation
  * @return Animation un objet Animatino
  */
  public static function get($codeAnimation) {
    global $getAnimation;

    return self::select($getAnimation, [$codeAnimation], 'Animation', 1);
  }

  /**
  * Renvoi un tableau contenant les codes des types des animations
  * @return array la liste des codes des types des animations
  */
  public static function getCodesTypeAnimations() {
    global $getCodesTypeAnim;

    $pre_datas = self::select($getCodesTypeAnim, [], 'Animation');
    $datas = [];
    foreach ($pre_datas as $data) {
      $datas[] = $data->getCodetypeanim();
    }
    return $datas;
  }

  /**
  * Ajoute une animation
  * @param Superglobal le tableau $_POST encapsulé dans l'objet Superglobal
  * @return bool true si l'insertion s'est bien déroulée, false sinon
  */
  public static function add($post) {
    global $addAnimation;

    if(self::insert(
    $addAnimation, 
    [
      $post->get('codeanim'),
      $post->get('codetypeanim'),
      $post->get('nomanim'),
      $post->get('datevaliditeanim'),
      $post->get('dureeanim'),
      $post->get('limiteage'),
      $post->get('tarifanim'),
      $post->get('nbreplaceanim'),
      $post->get('descriptanim'),
      $post->get('commentanim'),
      $post->get('difficulteanim')
    ]) == 1)
      return true;

    return false;
  }


  /**
   * Met à jour une animation 
   * @param Superglobal le tableau $_POST encapsulé dans l'objet Superglobal
   * @return bool true si la requête s'est bien passée, false sinon 
   */
  public static function updateAnim($post) {
    global $updateAnimation;

    if(self::update($updateAnimation, 
    [
      $post->get('codetypeanim'),
      $post->get('nomanim'),
      $post->get('datevaliditeanim'),
      $post->get('dureeanim'),
      $post->get('limiteage'),
      $post->get('tarifanim'),
      $post->get('nbreplaceanim'),
      $post->get('descriptanim'),
      $post->get('commentanim'),
      $post->get('difficulteanim'),
      $post->get('codeanim')
    ]
    ) == 1) {
      return true;
    }

    return false;
    
  }

  /**
  * Vérifie si une animation existe 
  * @param  string un code d'animation
  * @return bool true si une animation valide est renvoyée, false sinon
  */
  public static function exist($codeAnim) {
    global $getCommonAnimations;

    $data = self::select($getCommonAnimations, [$codeAnim], 'Animation');

    if(isset($data))
      return true;

    return false;
  }
}

?>