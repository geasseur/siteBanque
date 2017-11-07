<?php function chargerClasse($classname)
{
  include 'model/entité/'.$classname.'.php';
}

spl_autoload_register('chargerClasse');
require 'model/connexion.php'; ?>
