<?php
class Account{
  protected $id;
  protected $typeAccount;
  protected $idUser;
  protected $owner;
  protected $credit;

  public function __construct(array $donnees){
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees){
    foreach ($donnees as $key => $value){
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)){
        $this->$method($value);
      }
    }
  }

    /**
     * Get the value of Id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     */
    public function setId($id)
    {
      if (is_int($id) and $id >0) {
        $this->id = $id;
        return $this;
      }
      else {
        echo 'id doit être un int et supérieur à zero';
        return;
      }
    }

    /**
     * Get the value of Type Account
     */
    public function getTypeAccount()
    {
        return $this->typeAccount;
    }

    /**
     * Set the value of Type Account
     */
    public function setTypeAccount($typeAccount)
    {
      if ($typeAccount == 'livretA' or $typeAccount == 'livret+' or $typeAccount == 'compteEtudiant') {
        $this->typeAccount = $typeAccount;

        return $this;
      }
      else {
        return;
      }

    }

    /**
     * Get the value of Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set the value of Owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get the value of Credit
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set the value of Credit
     */
    public function setCredit($credit)
    {
        $credit = (float) $credit;
        $this->credit = $credit;

        return $this;
    }


    /**
     * Get the value of Id User 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of Id User
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

} ?>
