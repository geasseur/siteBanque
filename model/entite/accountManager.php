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
      $displayAccounts = $this->_bdd->query('SELECT id, type_account, owner, credit from compte');
      return $displayAccounts->fetchAll();
    }

    public function selectOwners(){
      $displayAccounts = $this->_bdd->query('SELECT credit, owner from compte');
      return $displayAccounts->fetchAll();
    }

    public function selectOwner($account){
      $displayAccount = $this->_bdd->query('SELECT credit, owner from compte where owner = \''.$account->getOwner().'\' ');
      return $displayAccount->fetch();
    }

    //function for display one account on the detail page
    public function displayAccount(Account $account){
      $displayAccount = $this->_bdd->query('SELECT id, type_account, owner, credit from compte WHERE id = '.$account->getId().' ');
      return $displayAccount->fetch();
    }

    // function for added a new account
    public function addAccount(Account $account){
      $addAccount = $this->_bdd->prepare('INSERT INTO compte(type_account, owner, credit) values  (:type_account, :owner, :credit) ');
      $addAccount->bindValue(':type_account', $account->getTypeAccount(), PDO::PARAM_STR);
      $addAccount->bindValue(':owner', $account->getOwner(), PDO::PARAM_STR);
      $addAccount->bindValue(':credit',$account->getCredit(), PDO::PARAM_INT);
      $addAccount->execute();
    }

    // function for increase the credit on a account
    public function creditAccount(Account $account){
      $creditAccount = $this->_bdd->prepare('UPDATE compte set credit = :credit WHERE id = '.$account->getId().' ');
      $creditAccount->bindValue(':credit', $account->getCredit(), PDO::PARAM_INT);
      $creditAccount->execute();
    }

    // update the credit's account who transfert money
    public function donorTransfert(Account $accountRetrait){
      $transfert = $this->_bdd->prepare('UPDATE compte set credit = :credit WHERE owner = :ownerRetrait ');
      $transfert->bindValue('ownerRetrait', $accountRetrait->getOwner(), PDO::PARAM_STR);
      $transfert->bindValue(':credit', $accountRetrait->getCredit(), PDO::PARAM_INT);
      $transfert->execute();
    }

    // update the credit's account who receive the transfert
    public function beneficiaireTransfert(Account $accountRetrait){
      $transfert = $this->_bdd->prepare('UPDATE compte set credit = :credit WHERE owner = :ownerBeneficiaire ');
      $transfert->bindValue('ownerBeneficiaire', $accountRetrait->getOwner(), PDO::PARAM_STR);
      $transfert->bindValue(':credit', $accountRetrait->getCredit(), PDO::PARAM_INT);
      $transfert->execute();
    }

    // function for delete account
    public function deleteAccount(Account $account){
      $deteleAccount = $this->_bdd->query('DELETE FROM compte WHERE id = '.$account->getId().' ');
    }
} ?>
