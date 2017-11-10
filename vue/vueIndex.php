<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
      <header>
        <header class="row d-flex align-items-center justify-content-center">
    <nav class="navbar navbar-toggleable-md navbar-light col-12">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand row d-flex align-items-center" href="">
        <img src="img/header/logoLoup.tif" class="col-4 col-lg-6" id="logoSite" alt="logo noir et blanc en forme de loup">
        <h1 class="col-4 col-lg-4">Bank of OCUS PORKUS</h1>
      </a>

    </nav>
  </header>
        <form class="" action="" method="post">
          <label for="">Type de compte</label>
          <select class="" name="typeCompte">
            <option value="livretA">Livret A</option>
            <option value="livret+">livret +</option>
            <option value="compteEtudiant">compteEtudiant</option>
          </select><br>
          <label for="">propriétaire</label>
          <input type="text" name="owner" value=""><br>
          <input type="submit" name="addAccount" value="créer compte">
        </form>
      </header>
      <main>
        <?php
        foreach ($displayAccounts as $key => $value) { ?>
          <section>
            <h3><?php echo $value['owner']; ?></h3>
            <h5><?php echo $value['credit']; ?> €</h5>
            <p><?php echo $value['type_account']; ?></p>
            <!-- Form for account detail -->
            <form class="" action="control/controlDetail.php" method="post">
              <input type="text" name="idAccount" value="<?php echo $value['id']?>">
              <input type="submit" name="detail" value="Detail">
            </form>

            <!-- form for delete account -->
            <form class="" action="" method="post">
              <input type="text" name="idAccount" value="<?php echo $value['id']?>">
              <input type="submit" name="delete" value="Effacer Compte">
            </form>
          </section>
        <?php
        } ?>
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
