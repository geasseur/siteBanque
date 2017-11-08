<?php function chargerClasse($classname)
{
  include 'model/entité/'.$classname.'.php';
}

spl_autoload_register('chargerClasse');
require 'model/connexion.php';

//controler where accountManager is launch
$accountManager = new AccountManager($bdd);

//display of accounts call

$displayAccounts = $accountManager->displayAccounts();


//controler part for added account

if (isset($_POST['typeCompte']) and isset($_POST['owner']) and isset($_POST['credit'])){
  $account = new Account([
    'typeAccount'=>$_POST['typeCompte'],
    'owner'=>$_POST['owner'],
    'credit'=>$_POST['credit']
  ]);
  $accountManager->addAccount($account);
  header('Location:index.php');
}

if (isset($_POST['delete'])) {
  $account = new Account([
    'id'=>$_POST['idAccount']
  ]);
  $accountManager->deleteAccount($account);
  header('Location:index.php');
}

//controller for delete account
require 'vue/vueIndex.php';
?>
