<?php
class UserManager{
  private $_bdd;

  public function __construct($bdd){
    $this->setBdd($bdd);
  }
    /**
     * Get the value of Bdd
     *
     * @return mixed
     */
    public function getBdd()
    {
        return $this->_bdd;
    }

    /**
     * Set the value of Bdd
     *
     * @param mixed _bdd
     *
     * @return self
     */
    public function setBdd($_bdd)
    {
        $this->_bdd = $_bdd;

        return $this;
    }

    //function for create a user
    public function createUser(User $user){
      var_dump($user);
      $addUser = $this->_bdd->prepare('INSERT INTO utilisateur(pseudo, password, mail) values  (:pseudo, :password, :mail) ');
      $addUser->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
      $addUser->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
      $addUser->bindValue(':mail',$user->getMail(), PDO::PARAM_STR);
      $addUser->execute();
    }

    //function for connecter a user
    public function connexionUSer(User $user){
      $connexion = $this->_bdd->prepare('SELECT pseudo, password, mail from utilisateur WHERE pseudo == :pseudo');
      $connexion->bindValue(':pseudo', getPseudo(), PDO::PARAM_STR);
      $connexion->execute();
      while ($connexion = $connexion->fetch()) {
        $testPassword = password_verify(getPassword(), $connexion['password']);
        if ($testPassword == true) {
          $_SESSION['pseudo'] = $connexion['password'];
        }
        else {
          echo 'rate le mot de passe est incorrect';
        }
      }
    }

} ?>
