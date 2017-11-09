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
        <link rel="stylesheet" href="../../bootstrap4/css/bootstrap.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
      <header>

      </header>
      <main>
        <article class="">
          <!-- display account -->
          <h3><?php echo $displayAccount['owner']; ?></h3>
          <h5><?php echo $displayAccount['credit']; ?> €</h5>
          <p><?php echo $displayAccount['type_account']; ?></p>
        </article>
          <section class="d-flex justify-content-around">
            <!-- form for credit account -->
            <article class='col-sm-10 col-lg-3 d-inline-block'>
              <h4>Créditer son Compte</h4>
              <form class="" action="" method="post">
                <label for="">créditer compte</label><br>
                <input style='display:none;' type="text" name="credit" value="<?php echo $displayAccount['credit']; ?>">
                <input type="text" name="ajoutCredit" value=""><br>
                <input style='display:none;' type="text" name="idCompte" value="<?php echo $displayAccount['id']; ?>">
                <input type="submit" name="crediter" value="crediter">
              </form>
            </article>

            <!-- form for retire money -->
            <article class='col-sm-10 col-lg-3 d-inline-block'>
              <h3>Effectuer un retrait</h3>
              <form class="" action="" method="post">
                <label for="">Effectuer Retrait</label><br>
                <input style='display:none;' type="text" name="credit" value="<?php echo $displayAccount['credit']; ?>">
                <input type="text" name="retraitCredit" value=""><br>
                <input style='display:none;' type="text" name="idCompte" value="<?php echo $displayAccount['id']; ?>">
                <input type="submit" name="retrait" value="retirer argent">
              </form>
            </article>

            <!-- form for transfert credit to another account -->
            <article class='col-sm-10 col-lg-3 d-inline-block'>
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
                    if($value['owner'] != $displayAccount['owner']){?>
                    <option value="<?php echo $value['owner'];?>"><?php echo $value['owner'];?></option>
                  <?php }
                  } ?>
                </select><br>
                <input type="submit" name="transfert" value="effectuer transfert">
              </form>
            </article>

          </section>

          <!-- form for return to index page -->
          <form class="" action="../index.php" method="post">
            <input type="submit" name="retour" value="retour">
          </form>
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
