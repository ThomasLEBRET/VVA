<?php

  require_once("classes/donnees/Database.php");
  
  include("requetesSQL.php");

  /**
   * Une classe objet Inscription représentant les inscriptions des utilisateurs à des activités
   */
  class Inscription {
    private int $noinscrip;
    private string $user;
    private int $noact;
    private DateTime $dateinscrip;
    private $dateannule;

    /**
     * Constructeur par défaut
     */
    public function __construct() {
      $this->noinscrip = 0;
      $this->user = "null";
      $this->noact = 0;
      $this->dateinscrip = new DateTime();
      $this->dateannule = null;
    }

    /**
     * Accesseur du noInscrip
     *
     * @return int
     */
    public function getNoinscrip()
    {
        return intval($this->noinscrip);
    }

    /**
     * Mutateur du noInscrip
     *
     * @param int $noinscrip
     *
     */
    public function setNoinscrip(int $noinscrip)
    {
        $this->noinscrip = intval($noinscrip);
    }

    /**
     * Accesseur de user 
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Mutateur de user
     *
     * @param string $user
     *
     */
    public function setUser(string $user)
    {
        $this->user = $user;
    }

    /**
     * Accesseur du numéro d'activité
     *
     * @return int
     */
    public function getNoact()
    {
        return intval($this->noact);
    }

    /**
     * Mutateur du numéro d'activité
     *
     * @param int $noact
     *
     */
    public function setNoact(int $noact)
    {
        $this->noact = intval($noact);
    }

    /**
     * Accesseur de la date d'inscription
     *
     * @return DateTime
     */
    public function getDateinscrip()
    {
        return $this->dateinscrip->format('d/m/Y');
    }

    /**
     * Mutateur de la date d'inscription
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
     * Accesseur de la date d'annulation
     *
     * @return DateTime
     */
    public function getDateannule()
    {
        $this->dateannule->format('d/m/Y');
        return $this->dateannule;
    }

    /**
     * Mutateur de la date d'annulation
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
