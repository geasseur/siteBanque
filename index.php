<?php function chargerClasse($classname)
{
  include 'model/entite/'.$classname.'.php';
}

spl_autoload_register('chargerClasse');
require 'model/connexion.php';

//accountManager is launch
$accountManager = new AccountManager($bdd);

// formChecker is launch
$formChecker = new formChecker();

//display of accounts call
$displayAccounts = $accountManager->displayAccounts();


//controler part for added account

if (isset($_POST['addAccount'])){
  $erreur = $formChecker->isFormEmpty($_POST);
  if (!empty($erreur)) {
    header('Location:index.php');
  }
  else {
    $account = new Account([
      'typeAccount'=>$_POST['typeCompte'],
      'owner'=>$_POST['owner'],
      'credit'=>0.93
    ]);
    $accountManager->addAccount($account);
    header('Location:index.php');
  }
}


//controller for delete account
if (isset($_POST['delete'])) {
  $account = new Account([
    'id'=>intval($_POST['idAccount'])
  ]);
  $accountManager->deleteAccount($account);
  header('Location:index.php');
}

require 'vue/vueIndex.php';
?>
