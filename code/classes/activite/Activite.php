<?php
require_once("classes/animation/Animation.php");

/**
* Class to manage activity object
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

  /**
  * default constructor
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
  }


  /**
   * Get the value of Class to manage activity object
   *
   * @return int
   */
  public function getNoact()
  {
      return intval($this->noact);
  }

  /**
   * Set the value of Class to manage activity object
   *
   * @param int $noact
   *
   */
  public function setNoact(int $noact)
  {
      $this->noact = intval($noact);
  }

  /**
   * Get the value of Class to manage activity object
   *
   * @return string
   */
  public function getCodeanim()
  {
      return $this->codeanim;
  }

  /**
   * Set the value of codeanim
   *
   * @param string $codeanim
   *
   */
  public function setCodeanim(string $codeanim)
  {
      $this->codeanim = $codeanim;
  }

  /**
   * Get the value of Codeetatact
   *
   * @return string
   */
  public function getCodeetatact()
  {
      return $this->codeetatact;
  }

  /**
   * Set the value of Codeetatact
   *
   * @param string $codeetatact
   *
   */
  public function setCodeetatact(string $codeetatact)
  {
      $this->codeetatact = $codeetatact;
  }

    /**
     * Get the value of Dateact
     *
     * @return DateTime
     */
    public function getDateact()
    {
        $this->dateact->format('d/m/Y');
        return $this->dateact;
    }

    /**
     * Set the value of Dateact
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
     * Get the value of Hrrdvact
     *
     * @return DateTime
     */
    public function getHrrdvact()
    {
        return $this->hrrdvact->format("H:i:s");
    }

    /**
     * Set the value of Hrrdvact
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
     * Get the value of Prixact
     *
     * @return float
     */
    public function getPrixact()
    {
        return (float)$this->prixact;
    }

    /**
     * Set the value of Prixact
     *
     * @param mixed $getPrixact
     *
     */
    public function setPrixact($prixact)
    {
        $this->prixact = (float)$prixact;
    }

    /**
     * Get the value of Hrdebutact
     *
     * @return DateTime
     */
    public function getHrdebutact()
    {
        return $this->hrdebutact->format("H:i:s");
    }

    /**
     * Set the value of Hrdebutact
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
     * Get the value of Hrfinact
     *
     * @return DateTime
     */
    public function getHrfinact()
    {
        return $this->hrfinact->format("H:i:s");
    }

    /**
     * Set the value of Hrfinact
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
     * Get the value of Dateannuleact
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
     * Set the value of Dateannuleact
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
     * Get the value of Prenomresp
     *
     * @return string
     */
    public function getPrenomresp()
    {
        return $this->prenomresp;
    }

    /**
     * Set the value of Prenomresp
     *
     * @param mixed $prenomresp
     *
     */
    public function setPrenomresp($prenomresp)
    {
        $this->prenomresp = $prenomresp;
    }

    /**
     * Get the value of Prenomresp
     *
     * @return string
     */
    public function getNomresp()
    {
        return $this->nomresp;
    }

    /**
     * Set the value of Nomresp
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
