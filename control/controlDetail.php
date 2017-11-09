<?php
function chargerClasse($classname)
{
  include '../model/entite/'.$classname.'.php';
}

spl_autoload_register('chargerClasse');
require '../model/connexion.php';

$accountManager = new AccountManager($bdd);
// part controller for display account when user load the page
if (isset($_POST['idAccount'])) {
  $account = new Account([
    'id'=>$_POST['idAccount']
  ]);
  $displayAccount = $accountManager->displayAccount($account);
  $displayOwners = $accountManager->selectOwners();
}

// controller part for put money on his account
if (isset($_POST['crediter'])) {
  $ajout = $_POST['ajoutCredit'] + $_POST['credit'];
  $account = new Account([
    'id'=>$_POST['idCompte'],
    'credit'=>$ajout
  ]);
  $accountManager->creditAccount($account);
  $displayAccount = $accountManager->displayAccount($account);
  $displayOwners = $accountManager->selectOwners();
}

// controller part for retire money on his account
if (isset($_POST['retrait'])) {
  $retrait = $_POST['credit'] - $_POST['retraitCredit'];
  $account = new Account([
    'id'=>$_POST['idCompte'],
    'credit'=>$retrait
  ]);
  $accountManager->creditAccount($account);
  $displayAccount = $accountManager->displayAccount($account);
  $displayOwners = $accountManager->selectOwners();
}

// controller part for put money on another account from his account
if (isset($_POST['transfert'])) {
  $rechercheAccount = new Account([
    'owner'=>$_POST['beneficiaire']
  ]);
  $findBeneficiaire = $accountManager->selectOwner($rechercheAccount);
  $beneficiaire = $findBeneficiaire['credit'] + $_POST['creditTransfert'];
  $donor = $_POST['stockCredit'] - $_POST['creditTransfert'];
  $donorAccount = new Account([
    'id'=>$_POST['idOwner'],
    'owner'=>$_POST['owner'],
    'credit'=>$donor
  ]);
  $beneficiaireAccount = new Account([
    'owner'=>$_POST['beneficiaire'],
    'credit'=>$beneficiaire
  ]);
  $accountManager->donorTransfert($donorAccount);
  $accountManager->beneficiaireTransfert($beneficiaireAccount);
  $displayAccount = $accountManager->displayAccount($donorAccount);
  $displayOwners = $accountManager->selectOwners();
}



require '../vue/vueDetail.php';
 ?>
