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


//controler part for added account

if (isset($_POST['addAccount'])){
  $erreur = $formChecker->isFormEmpty($_POST);
  if (!empty($erreur)) {
    header('Location:index.php');
  }
  else {
    $account = new Account([
      'typeAccount'=>$_POST['typeCompte'],
      'idUser'=>$_POST['idUser'],
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
      $user = new User([
        'pseudo'=>$_POST['userName'],
        'password'=>password_hash($_POST['password'], PASSWORD_BCRYPT),
        'mail'=>$_POST['mail']
      ]);
      $userManager->createUser($user);
      header('Location:index.php');
    }
  }
}

// for connected a user
if (isset($_POST['userConnexion'])) {
  $user = new User([
    'pseudo'=>$_POST['connectUserName'],
    'password'=>$_POST['connectPassword']
  ]);
  $userManager->connexionUser($user);
}

//display of accounts for the user connected
if (isset($_SESSION['pseudo'])) {
  $user = new User([
    'pseudo'=>$_SESSION['pseudo']
  ]);
  $displayAccounts = $accountManager->displayAccounts($user);
}

if (isset($_POST['deconnexion'])) {
  session_unset();
  session_destroy();
  header('Location:index.php');
}

require 'vue/vueIndex.php';
?>
