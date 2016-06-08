<!DOCTYPE html>
<html ng-app="ReseminApp">
  <head>
    <!-- Material Design fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Material Design -->
    <link href="<?= base_url() ?>assets/css/bootstrap-material-design.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/ripples.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/resemin.css" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <script src="<?= base_url() ?>assets/js/angular.min.js"></script>
    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <script src="<?= base_url() ?>assets/js/controller/userController.js"></script>
  </head>

  <body>

    <? echo $this->dynamic_nav->build_nav() ?>
    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/material.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/ripples.min.js"></script>
    <script>
        $.material.init();
    </script>
  </body>
</html>