<?php
session_start();
function chargerClasse($classname)
{
  include 'model/entite/'.$classname.'.php';
}

spl_autoload_register('chargerClasse');
require 'model/connexion.php';

//accountManager is launch
$accountManager = new AccountManager($bdd);
$userManager = new UserManager($bdd);
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

//controller for added a new user

if (isset($_POST['userCreation'])) {
  if ($_POST['password'] == $_POST['passwordTest']) {
    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
      var_dump('mail passé');
      $user = new User([
        'pseudo'=>$_POST['userName'],
        'password'=>password_hash($_POST['password'], PASSWORD_BCRYPT),
        'mail'=>$_POST['mail']
      ]);
      $userManager->createUSer($user);
      $_SESSION['pseudo'] = $_POST['userName'];
      header('Location:index.php');
    }
  }
}

require 'vue/vueIndex.php';
?>
