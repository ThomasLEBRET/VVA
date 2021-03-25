<?php

  require_once("class/datas/Database.php");
  include("sqlRequests.php");

  class Inscription extends Database {
    private $noinscrip;
    private $user;
    private $noact;
    private $dateinscrip;
    private $dateannule;

    /**
     * default constructor
     */
    public function __construct() {
      $this->noinscrip = "null";
      $this->user = "null";
      $this->noact = "null";
      $this->dateinscrip = "null";
      $this->dateannule = "null";
    }

    /**
     * get an Inscription object with his PK
     * @return Inscription an Inscription object
     */
    public function get($user, $noact) {
      global $getInscription;

      return $this->select($getInscription, [$user, $noact], 'Inscription', 1);
    }

    /**
     * Get the value of Noinscrip
     *
     * @return mixed
     */
    public function getNoinscrip()
    {
        return $this->noinscrip;
    }

    /**
     * Set the value of Noinscrip
     *
     * @param mixed $noinscrip
     *
     * @return self
     */
    public function setNoinscrip($noinscrip)
    {
        $this->noinscrip = $noinscrip;

        return $this;
    }

    /**
     * Get the value of User
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of User
     *
     * @param mixed $user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of Noact
     *
     * @return mixed
     */
    public function getNoact()
    {
        return $this->noact;
    }

    /**
     * Set the value of Noact
     *
     * @param mixed $noact
     *
     * @return self
     */
    public function setNoact($noact)
    {
        $this->noact = $noact;

        return $this;
    }

    /**
     * Get the value of Dateinscrip
     *
     * @return mixed
     */
    public function getDateinscrip()
    {
        return $this->dateinscrip;
    }

    /**
     * Set the value of Dateinscrip
     *
     * @param mixed $dateinscrip
     *
     * @return self
     */
    public function setDateinscrip($dateinscrip)
    {
        $this->dateinscrip = $dateinscrip;

        return $this;
    }

    /**
     * Get the value of Dateannule
     *
     * @return mixed
     */
    public function getDateannule()
    {
        return $this->dateannule;
    }

    /**
     * Set the value of Dateannule
     *
     * @param mixed $dateannule
     *
     * @return self
     */
    public function setDateannule($dateannule)
    {
        $this->dateannule = $dateannule;

        return $this;
    }
}

?>
