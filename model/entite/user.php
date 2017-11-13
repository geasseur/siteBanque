<?php
class User{
  private $id;
  private $pseudo;
  private $password;
  private $mail;

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
     * Get the value of Pseudo
     *
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of Pseudo
     *
     * @param mixed pseudo
     *
     * @return self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of Password
     *
     * @param mixed password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of Mail
     *
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of Mail
     *
     * @param mixed mail
     *
     * @return self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

} ?>
