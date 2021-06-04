<?php
require_once("classes/animation/Animation.php");

/**
* Classe object permettant de gérer les Activite
*/
class Activite {

  private int $noact;
  private string $codeanim;
  private string $codeetatact;
  private DateTime $dateact;
  private DateTime $hrrdvact;
  private float $prixact;
  private DateTime $hrdebutact;
  private DateTime $hrfinact;
  private $dateannuleact;
  private string $nomresp;
  private string $prenomresp;
  private int $nbInscrits;

  /**
  * Constructeur par défaut
  */
  public function __construct() {
    $this->noact = 0;
    $this->codeanim = "null";
    $this->codeetatact = "null";
    $this->dateact = new DateTime();
    $this->hrrdvact = new DateTime();
    $this->prixact = 0;
    $this->hrdebutact = new DateTime();
    $this->hrfinact = new DateTime();
    $this->dateannuleact = null;
    $this->nomresp = "null";
    $this->prenomresp = "null";
    $this->nbInscrits = 0;
  }

  public function getNbinscrit()
  {
      return intval($this->nbInscrits);
  }

  public function setNbinscrits(int $nbInscrits)
  {
      $this->nbInscrits = $nbInscrits;
  }


  /**
   * Accessuer noAct
   *
   * @return int
   */
  public function getNoact()
  {
      return intval($this->noact);
  }

  /**
   * Mutateur noAct
   *
   * @param int $noact
   *
   */
  public function setNoact(int $noact)
  {
      $this->noact = intval($noact);
  }

  /**
   * Accessuer codeAnim
   *
   * @return string
   */
  public function getCodeanim()
  {
      return $this->codeanim;
  }

  /**
   * Mutateur codeAnim
   *
   * @param string $codeanim
   *
   */
  public function setCodeanim(string $codeanim)
  {
      $this->codeanim = $codeanim;
  }

  /**
   * Accesseur codeEtatAct
   *
   * @return string
   */
  public function getCodeetatact()
  {
      return $this->codeetatact;
  }

  /**
   * Mutateur codeEtatAct
   *
   * @param string $codeetatact
   *
   */
  public function setCodeetatact(string $codeetatact)
  {
      $this->codeetatact = $codeetatact;
  }

    /**
     * Accesseur dateAct
     *
     * @return DateTime
     */
    public function getDateact()
    {
        $this->dateact->format('d/m/Y');
        return $this->dateact;
    }

    /**
     * Mutateur dateAct
     *
     * @param mixed $dateact
     *
     */
    public function setDateact($dateact)
    {
        $this->dateact = new DateTime($dateact);
        $this->dateact->format('d/m/Y');
    }

    /**
     * Accesseur hrRdvAct
     *
     * @return DateTime
     */
    public function getHrrdvact()
    {
        return $this->hrrdvact->format("H:i:s");
    }

    /**
     * Mutateur hrRdvAct
     *
     * @param mixed $hrrdvact
     *
     */
    public function setHrrdvact($hrrdvact)
    {
        $this->hrrdvact = new DateTime($hrrdvact);
        $this->hrrdvact->format("H:i:s");
    }

    /**
     * Accesseur prixAct
     *
     * @return float
     */
    public function getPrixact()
    {
        return (float)$this->prixact;
    }

    /**
     * Mutateur prixAct
     *
     * @param mixed $getPrixact
     *
     */
    public function setPrixact($prixact)
    {
        $this->prixact = (float)$prixact;
    }

    /**
     * Accesseur hrDebutAct
     *
     * @return DateTime
     */
    public function getHrdebutact()
    {
        return $this->hrdebutact->format("H:i:s");
    }

    /**
     * Mutateur hrDebutAct
     *
     * @param mixed $hrdebutact
     *
     * @return DateTime
     */
    public function setHrdebutact($hrdebutact)
    {
        $this->hrdebutact = new DateTime($hrdebutact);
        $this->hrdebutact->format("H:i:s");
    }

    /**
     * Accessuer hrFinAct
     *
     * @return DateTime
     */
    public function getHrfinact()
    {
        return $this->hrfinact->format("H:i:s");
    }

    /**
     * Mutateur hrFinAct
     *
     * @param mixed $hrfinact
     *
     * @return self
     */
    public function setHrfinact($hrfinact)
    {
        $this->hrfinact = new DateTime($hrfinact);
        $this->hrfinact->format("H:i:s");
    }

    /**
     * Accesseur dateAnnuleAct
     *
     * @return DateTime
     */
    public function getDateannuleact()
    {
        if($this->dateannuleact != NULL) 
            return $this->dateannuleact->format('d/m/Y');
        return $this->dateannuleact;
    }

    /**
     * Mutateur dateAnnuleAct
     *
     * @param mixed $dateannuleact
     *
     */
    public function setDateannuleact($dateannuleact)
    {
        if($dateannuleact != NULL) {
            $this->dateannuleact = new DateTime($dateannuleact);
            $this->dateannuleact->format('d/m/Y');
        } else {
            $this->dateannule = $dateannule;
        }
    }

    /**
     * Accesseur prenomResp
     *
     * @return string
     */
    public function getPrenomresp()
    {
        return $this->prenomresp;
    }

    /**
     * Mutateur prenomResp
     *
     * @param mixed $prenomresp
     *
     */
    public function setPrenomresp($prenomresp)
    {
        $this->prenomresp = $prenomresp;
    }

    /**
     * Accesseur nomResp
     *
     * @return string
     */
    public function getNomresp()
    {
        return $this->nomresp;
    }

    /**
     * Mutateur nomResp
     *
     * @param string $nomresp
     *
     */
    public function setNomresp($nomresp)
    {
        $this->nomresp = $nomresp;
    }

}

?>
