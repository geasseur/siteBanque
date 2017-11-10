<?php
function chargerClasse($classname)
{
  include '../model/entite/'.$classname.'.php';
}

spl_autoload_register('chargerClasse');
require '../model/connexion.php';

$accountManager = new AccountManager($bdd);
// part controller for display account when user load the page

// formChecker is launch
$formChecker = new formChecker();

//display the account selected
if (isset($_POST['idAccount'])) {
  $erreur = $formChecker->isFormEmpty($_POST);

  if (!empty($erreur)) {
    header('Location:../index.php');
  }
  else {
    $account = new Account([
      'id'=>intval($_POST['idAccount'])
    ]);
    $displayAccount = $accountManager->displayAccount($account);
    $displayOwners = $accountManager->selectOwners();
  }
}

// controller part for put money on his account
if (isset($_POST['crediter'])) {
  $erreur = $formChecker->isFormEmpty($_POST);

  if (!empty($erreur)) {
    header('Location:../index.php');
  }
  else {
    $ajout = $_POST['ajoutCredit'] + $_POST['credit'];
    $account = new Account([
      'id'=>intval($_POST['idCompte']),
      'credit'=>$ajout
    ]);
    $accountManager->creditAccount($account);
    $displayAccount = $accountManager->displayAccount($account);
    $displayOwners = $accountManager->selectOwners();
  }
}

// controller part for retire money on his account
if (isset($_POST['retrait'])) {
  $erreur = $formChecker->isFormEmpty($_POST);

  if (!empty($erreur)) {
    header('Location:../index.php');
  }
  else {
    $retrait = $_POST['credit'] - $_POST['retraitCredit'];
    $account = new Account([
      'id'=>intval($_POST['idCompte']),
      'credit'=>$retrait
    ]);
    $accountManager->creditAccount($account);
    $displayAccount = $accountManager->displayAccount($account);
    $displayOwners = $accountManager->selectOwners();
  }
}

// controller part for put money on another account from his account
if (isset($_POST['transfert'])) {
  $erreur = $formChecker->isFormEmpty($_POST);

  if (!empty($erreur)) {
    header('Location:../index.php');
  }
  else {
    $rechercheAccount = new Account([
      'id'=>(int)$_POST['beneficiaire']
    ]);
    $findBeneficiaire = $accountManager->selectOwner($rechercheAccount);
    $beneficiaire = $findBeneficiaire['credit'] + $_POST['creditTransfert'];
    $donor = $_POST['stockCredit'] - $_POST['creditTransfert'];
    $donorAccount = new Account([
      'id'=>intval($_POST['idOwner']),
      'credit'=>$donor
    ]);
    $beneficiaireAccount = new Account([
      'id'=>intval($_POST['beneficiaire']),
      'credit'=>$beneficiaire
    ]);
    $accountManager->donorTransfert($donorAccount);
    $accountManager->beneficiaireTransfert($beneficiaireAccount);
    $displayAccount = $accountManager->displayAccount($donorAccount);
    $displayOwners = $accountManager->selectOwners();
  }
}



require '../vue/vueDetail.php';
 ?>
