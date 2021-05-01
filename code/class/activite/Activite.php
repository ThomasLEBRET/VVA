<?php
require_once("class/animation/Animation.php");

/**
* Class to manage activity object
*/
class Activite extends Database {

  private $noact;
  private	$codeanim;
  private	$codeetatact;
  private $dateact;
  private $hrrdvact;
  private	$prixact;
  private $hrdebutact;
  private	$hrfinact;
  private $dateannuleact;
  private	$nomresp;
  private	$prenomresp;

  /**
  * default constructor
  */
  public function __construct() {
    $this->noact = "null";
    $this->codeanim = "null";
    $this->codeetatact = "null";
    $this->dateact = "null";
    $this->hrrdvact = "null";
    $this->prixact = "null";
    $this->hrdebutact = "null";
    $this->hrfinact = "null";
    $this->dateannuleact = "null";
    $this->nomresp = "null";
    $this->prenomresp = "null";
  }


  /**
   * Get the value of Class to manage activity object
   *
   * @return mixed
   */
  public function getNoact()
  {
      return intval($this->noact);
  }

  /**
   * Set the value of Class to manage activity object
   *
   * @param mixed $noact
   *
   * @return self
   */
  public function setNoact($noact)
  {
      $this->noact = intval($noact);

      return $this;
  }

  /**
   * Get the value of Class to manage activity object
   *
   * @return mixed
   */
  public function getCodeanim()
  {
      return $this->codeanim;
  }

  /**
   * Set the value of codeanim
   *
   * @param mixed $codeanim
   *
   * @return self
   */
  public function setCodeanim($codeanim)
  {
      $this->codeanim = $codeanim;

      return $this;
  }

  /**
   * Get the value of Codeetatact
   *
   * @return mixed
   */
  public function getCodeetatact()
  {
      return $this->codeetatact;
  }

  /**
   * Set the value of Codeetatact
   *
   * @param mixed $codeetatact
   *
   * @return self
   */
  public function setCodeetatact($codeetatact)
  {
      $this->codeetatact = $codeetatact;

      return $this;
  }

    /**
     * Get the value of Dateact
     *
     * @return mixed
     */
    public function getDateact()
    {
        return date('d/m/Y', strtotime($this->dateact));
    }

    /**
     * Set the value of Dateact
     *
     * @param mixed $dateact
     *
     * @return self
     */
    public function setDateact($dateact)
    {
        $this->dateact = date('d/m/Y', strtotime($dateact));
    }

    /**
     * Get the value of Hrrdvact
     *
     * @return mixed
     */
    public function getHrrdvact()
    {
        return date("H:i:s", strtotime($this->hrrdvact));
    }

    /**
     * Set the value of Hrrdvact
     *
     * @param mixed $hrrdvact
     *
     * @return self
     */
    public function setHrrdvact($hrrdvact)
    {
        $this->hrrdvact = date("H:i:s", strtotime($hrrdvact));
    }

    /**
     * Get the value of Prixact
     *
     * @return mixed
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
     * @return self
     */
    public function setPrixact($prixact)
    {
        $this->prixact = (float)$prixact;
    }

    /**
     * Get the value of Hrdebutact
     *
     * @return mixed
     */
    public function getHrdebutact()
    {
        return date("H:i:s", strtotime($this->hrdebutact));
    }

    /**
     * Set the value of Hrdebutact
     *
     * @param mixed $hrdebutact
     *
     * @return self
     */
    public function setHrdebutact($hrdebutact)
    {
        $this->hrdebutact = date("H:i:s", strtotime($hrdebutact));
    }

    /**
     * Get the value of Hrfinact
     *
     * @return mixed
     */
    public function getHrfinact()
    {
        return date("H:i:s", strtotime($this->hrfinact));
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
        $this->hrfinact = date("H:i:s", strtotime($hrfinact));
    }

    /**
     * Get the value of Dateannuleact
     *
     * @return mixed
     */
    public function getDateannuleact()
    {
        return date('d/m/Y', strtotime($this->dateannuleact));
    }

    /**
     * Set the value of Dateannuleact
     *
     * @param mixed $dateannuleact
     *
     * @return self
     */
    public function setDateannuleact($dateannuleact)
    {
        $this->dateannuleact = date('d/m/Y', strtotime($dateannuleact));
    }

    /**
     * Get the value of Prenomresp
     *
     * @return mixed
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
     * @return self
     */
    public function setPrenomresp($prenomresp)
    {
        $this->prenomresp = $prenomresp;

        return $this;
    }

    /**
     * Get the value of Prenomresp
     *
     * @return mixed
     */
    public function getNomresp()
    {
        return $this->nomresp;
    }

    /**
     * Set the value of Nomresp
     *
     * @param mixed $nomresp
     *
     * @return self
     */
    public function setNomresp($nomresp)
    {
        $this->nomresp = $nomresp;

        return $this;
    }

}

?>
