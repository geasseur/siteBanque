<?php
class AccountManager{
  private $_bdd;

  public function __construct($bdd){
    $this->setBdd($bdd);
  }

    /*Get the value of Bdd */
    public function getBdd()
    {
        return $this->_bdd;
    }

    /* Set the value of Bdd*/
    public function setBdd($_bdd)
    {
        $this->_bdd = $_bdd;

        return $this;
    }

    //function for display all accounts on the index page
    public function displayAccounts(){
      $displayAccounts = $this->_bdd->query('SELECT type_account, owner, credit from compte');
      return $displayAccounts->fetchAll();
    }

    //function for display one account on the detail page
    public function displayAccount(Account $account){
      $displayAccount = $this->_bdd->query('SELECT type_account, owner, credit from compte WHERE id = '.$account->getId().' ');
      return $displayAccount->fetch();
    }

    
    public function addAccount(Account $account){
      $addAccount = $this->_bdd->prepare('INSERT INTO compte(type_account, owner, credit) values  :type_account, :owner, :credit');
      $addAccount->bindValue(':type_account', $account->getTypeAccount(), PDO::PARAM_STR);
      $addAccount->bindValue(':owner', $account->getOwner(), PDO::PARAM_STR);
      $addAccount->bindValue(':credit',$account->getCredit(), PDO::PARAM_INT);
      $addAccount->execute();
    }

    public function creditAccount(Account $account){
      $creditAccount = $this->_bdd->prepare('UPDATE compte set credit = :credit WHERE id = '$account->getId()' ');
      $creditAccount->bindValue(':credit', $account->getCredit(), PDO::PARAM_INT);
      $creditAccount->execute();
    }

    public function transferAccount(Account $accountRetrait, Account $accountDepot){
      $transfer = $this->_bdd->prepare('UPDATE compte set credit = :credit WHERE owner = :ownerRetrait AND owner = :ownerDepot');
      $transfer->bindValue(':ownerRetrait', $accountRetrait->getCredit(), PDO::PARAM_INT);
      $transfer->bindValue(':ownerDepot', $accountDepot->getCredit(), PDO::PARAM_INT);
      $transfert->execute();
    }

    public function deleteAccount(Account $account){
      $deteleAccount = $this->_bdd->prepare('DELETE FROM compte WHERE id = '.$account->getId().' ');
    }
} ?>
