<?php
class Account{
  protected $id;
  protected $typeAccount;
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
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Type Account
     *
     * @return mixed
     */
    public function getTypeAccount()
    {
        return $this->typeAccount;
    }

    /**
     * Set the value of Type Account
     *
     * @param mixed typeAccount
     *
     * @return self
     */
    public function setTypeAccount($typeAccount)
    {
        $this->typeAccount = $typeAccount;

        return $this;
    }

    /**
     * Get the value of Owner
     *
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set the value of Owner
     *
     * @param mixed owner
     *
     * @return self
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get the value of Credit
     *
     * @return mixed
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set the value of Credit
     *
     * @param mixed credit
     *
     * @return self
     */
    public function setCredit($credit)
    {
        $credit = (float) $credit;
        $this->credit = $credit;

        return $this;
    }

} ?>
