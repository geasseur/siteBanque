<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Vue detail Compte</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="../../bootstrap4/css/bootstrap.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/main.css">
        <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
      <header>

      </header>
      <main>
        <article class="d-flex flex-column align-items-center card m-5">
          <!-- display account -->
          <h1>Compte</h1>
          <h3>Compte Courant de : <?php echo $displayAccount['owner']; ?></h3>
          <h5>Solde : <?php echo $displayAccount['credit']; ?> €</h5>
          <p>Compte de type : <?php echo $displayAccount['type_account']; ?></p>
        </article>
          <section class="d-flex flex-row flex-wrap justify-content-around align-items-center container-fluid">
            <!-- form for credit account -->
            <article style='height:300px' class='card col-md-10 col-lg-3 d-flex flex-column justify-content-around p-5 mt-3'>
              <h4>Créditer son Compte</h4>
              <form class="" action="" method="post">
                <label for="">créditer compte</label><br>
                <input style='display:none;' type="text" name="credit" value="<?php echo $displayAccount['credit']; ?>">
                <input type="text" name="ajoutCredit" value=""><br>
                <input style='display:none;' type="text" name="idCompte" value="<?php echo $displayAccount['id']; ?>">
                <input class='btn btn-primary m-3' type="submit" name="crediter" value="crediter">
              </form>
            </article>

            <!-- form for retire money -->
            <article style='height:300px' class='card col-md-10 col-lg-3 d-flex flex-column justify-content-around p-5 mt-3'>
              <h3>Effectuer un retrait</h3>
              <form class="" action="" method="post">
                <label for="">Effectuer Retrait</label><br>
                <input style='display:none;' type="text" name="credit" value="<?php echo $displayAccount['credit']; ?>">
                <input type="text" name="retraitCredit" value=""><br>
                <input style='display:none;' type="text" name="idCompte" value="<?php echo $displayAccount['id']; ?>">
                <input class='btn btn-primary m-3' type="submit" name="retrait" value="retirer argent">
              </form>
            </article>

            <!-- form for transfert credit to another account -->
            <article style='height:300px' class='card col-md-10 col-lg-3 d-flex flex-column justify-content-around p-5 mt-3'>
              <h3>Effectuer un virement bancaire</h3>
              <form class="" action="" method="post">
                <label for="">crédit à transférer : </label>
                <input type="text" name="creditTransfert" value=""><br>
                <input style="display:none" type="text" name="owner" value="<?php echo $displayAccount['owner']; ?>">
                <input style="display:none" type="text" name="idOwner" value="<?php echo $displayAccount['id']; ?>">
                <input style="display:none" type="text" name="stockCredit" value="<?php echo $displayAccount['credit']; ?>">
                <label for="">effectuer un transfer à :</label>
                <select class="" name="beneficiaire">
            <?php foreach ($displayOwners as $key => $value) {
                    if($value['id'] != $displayAccount['id']){?>
                    <option value="<?php echo $value['id'];?>"><?php echo $value['owner'];?></option>
                  <?php }
                  } ?>
                </select><br>
                <input class='btn btn-primary m-3' type="submit" name="transfert" value="effectuer transfert">
              </form>
            </article>

          </section>
      </main>
      <footer class='bg-faded d-flex flex-row flex-nowrap justify-content-around mt-5 p-3'>
        <!-- form for return to index page -->
        <form class="" action="../index.php" method="post">
          <input class='btn btn-primary' type="submit" name="retour" value="retour">
        </form>

        <!-- form for delete this account -->
        <form class="" action="../index.php" method="post">
          <input class='d-none' type="text" name="idAccount" value="<?php echo $displayAccount['id']; ?>">
          <input class='btn btn-danger' type="submit" name="delete" value="Effacer ce compte">
        </form>

        <!-- form for create a new account for this user -->
        <form class="" action="../index.php" method="post">
          <label for="">Type de compte : </label>
          <select class="" name="typeCompte">
            <option value="livretA">Livret A</option>
            <option value="livret+">livret +</option>
            <option value="compteEtudiant">compteEtudiant</option>
          </select><br>
          <input class="d-none col-5" type="text" name="owner" value="<?php echo $displayAccount['owner']; ?>">
          <input class='btn btn-success' type="submit" name="addAccount" value="créer compte">
        </form>
      </footer>


        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>

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
