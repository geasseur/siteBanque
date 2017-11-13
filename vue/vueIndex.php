<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Index banque</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="bootstrap4/css/bootstrap.css">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
      <header>
        <header class="row d-flex align-items-center justify-content-center">
        <nav class="navbar navbar-toggleable-md navbar-light col-12">
          <a class="navbar-brand row d-flex align-items-center" href="">
            <img class='col-3' src="http://www.bluemaize.net/im/toys/pig-from-toy-story-3.jpg" class="col-4 col-lg-6" id="logoSite" alt="logo noir et blanc en forme de loup">
            <h1 class="col-4 col-lg-4">Bank of OCUS PORKUS</h1>
          </a>
          <?php if (!isset($_SESSION['pseudo'])): ?>


          <!-- form for create a new user -->
          <form class="card m-2 p-3" action="" method="post">
            <label for="">nom utilisateur : </label><br>
            <input type="text" name="userName" value=""><br>
            <label for="">password : </label><br>
            <input type="password" name="password" value=""><br>
            <label for="">entrez à nouveau le mot de passe : </label><br>
            <input type="password" name="passwordTest" value=""><br>
            <label for="">mail : </label><br>
            <input type="text" name="mail" value=""><br>
            <input type="submit" name="userCreation" value="Créer utilisateur">
          </form>

          <!-- form for connect user -->
          <form class="card m-2 p-3" action="" method="post">
            <label for="">nom utilisateur : </label><br>
            <input type="text" name="connectUserName" value=""><br>
            <label for="">password : </label><br>
            <input type="text" name="Connectpassword" value=""><br>
            <input type="submit" name="userConnexion" value="se connecter">
          </form>
          <?php endif; ?>

          <?php if (isset($_SESSION['user'])): ?>
            <!-- form for create new account -->
            <form class="ml-3" action="" method="post">
              <label for="">Type de compte : </label>
              <select class="" name="typeCompte">
                <option value="livretA">Livret A</option>
                <option value="livret+">livret +</option>
                <option value="compteEtudiant">compteEtudiant</option>
              </select><br>
              <label for="">propriétaire :</label>
              <input class="col-5" type="text" name="owner" value=""><br>
              <input class='mt-2 btn btn-success' type="submit" name="addAccount" value="créer compte">
            </form>
          <?php endif; ?>

        </nav>
      </header>
      <main class='bg-faded'>
        <!-- section where all account are display -->
        <section class='container-fluid ml-5 d-flex flex-wrap justify-content-around'>
        <?php
        foreach ($displayAccounts as $key => $value) { ?>
          <section style='height : 400px' class='card m-3 col-sm-11 col-lg-5 col-xl-3 d-flex flex-column justify-content-around'>
              <h3 class='m-4'><?php echo $value['owner']; ?></h3>
              <h5 class='m-4'><?php echo $value['credit']; ?> €</h5>
              <p class='m-4'><?php echo $value['type_account']; ?></p>
              <!-- Form for account detail -->
              <form class="" action="control/controlDetail.php" method="post">
                <input class='d-none' type="text" name="idAccount" value="<?php echo $value['id']?>">
                <input class='btn m-2' type="submit" name="detail" value="Detail">
              </form>

              <!-- form for delete account -->
              <form class="" action="" method="post">
                <input style='display:none' type="text" name="idAccount" value="<?php echo $value['id']?>">
                <input class='btn btn-danger m-2' type="submit" name="delete" value="Effacer Compte">
              </form>
            </article>
          </section>
        <?php
        } ?>
        </section>
      </main>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
