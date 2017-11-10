<?php

class formChecker {

  //Fonction qui vérifie si certainnes entrées d'un $_POST sont vides et renvoie un message d'erreur
  public function isFormEmpty($form) {
    //Variable qui va stocker le message d'erreur
    $erreur;
    //Boucle sur le $_POST passé en argument
    foreach ($form as $key => $value) {
      //Si une entrée du tableau est vide, on enregistre un message d'erreur et on le retourne
      if(empty($form[$key])) {
        $erreur  = "L'entrée " . $key . " est vide";
        return $erreur;
      }
    }
  }

}

 ?>
