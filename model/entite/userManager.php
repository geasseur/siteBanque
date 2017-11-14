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
      $addUser = $this->_bdd->prepare('INSERT INTO utilisateur(pseudo, password, mail) values  (:pseudo, :password, :mail) ');
      $addUser->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
      $addUser->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
      $addUser->bindValue(':mail',$user->getMail(), PDO::PARAM_STR);
      $addUser->execute();
    }

    //function for connecter a user
    public function connexionUser(User $user){
      $connexion = $this->_bdd->prepare('SELECT utilisateur.id, pseudo, password, mail from utilisateur WHERE pseudo = :pseudo');
      $connexion->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
      $connexion->execute();
      while ($connexionFetch = $connexion->fetch()) {
        $testPassword = password_verify($user->getPassword(), $connexionFetch['password']);
        if ($testPassword == true) {
          $user = new User([
            'id'=>$connexionFetch['id'],
            'pseudo'=>$connexionFetch['pseudo']
          ]);
          $_SESSION['pseudo'] = $user->getPseudo() ;
          $_SESSION['id'] = $user->getId();
        }
        else {
          echo 'rate le mot de passe est incorrect ';
        }
      }
    }

} ?>
