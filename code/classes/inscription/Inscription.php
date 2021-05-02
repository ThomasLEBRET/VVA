<?php

  require_once("classes/donnees/Database.php");
  
  include("requetesSQL.php");

  class Inscription {
    private int $noinscrip;
    private string $user;
    private int $noact;
    private DateTime $dateinscrip;
    private $dateannule;

    /**
     * default constructor
     */
    public function __construct() {
      $this->noinscrip = 0;
      $this->user = "null";
      $this->noact = 0;
      $this->dateinscrip = new DateTime();
      $this->dateannule = null;
    }

    /**
     * Get the value of Noinscrip
     *
     * @return int
     */
    public function getNoinscrip()
    {
        return intval($this->noinscrip);
    }

    /**
     * Set the value of Noinscrip
     *
     * @param int $noinscrip
     *
     */
    public function setNoinscrip(int $noinscrip)
    {
        $this->noinscrip = intval($noinscrip);
    }

    /**
     * Get the value of User
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of User
     *
     * @param string $user
     *
     * @return self
     */
    public function setUser(string $user)
    {
        $this->user = $user;
    }

    /**
     * Get the value of Noact
     *
     * @return int
     */
    public function getNoact()
    {
        return intval($this->noact);
    }

    /**
     * Set the value of Noact
     *
     * @param mixed $noact
     *
     */
    public function setNoact(int $noact)
    {
        $this->noact = intval($noact);
    }

    /**
     * Get the value of Dateinscrip
     *
     * @return DateTime
     */
    public function getDateinscrip()
    {
        return $this->dateinscrip->format('d/m/Y');
    }

    /**
     * Set the value of Dateinscrip
     *
     * @param mixed $dateinscrip
     *
     */
    public function setDateinscrip($dateinscrip)
    {
        $this->dateinscrip = new DateTime($dateinscrip);
        $this->dateinscrip->format('d/m/Y');
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
     */
    public function setDateannule($dateannule)
    {
        if($dateannule != NULL) {
            $this->dateannule = new DateTime($dateannule);
            $this->dateannule->format('d/m/Y');
        }
    }
}

?>
