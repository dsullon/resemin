<!DOCTYPE html>
<html ng-app="ReseminApp">
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="<?= base_url() ?>assets/js/angular.min.js""></script>
    <script src="<?= base_url() ?>assets/js/app.js""></script>
    <script src="<?= base_url() ?>assets/js/controller/userController.js"></script>
  </head>

  <body>
    <? echo $this->dynamic_nav->build_nav() ?>
    
    <!--login modal-->
      <div id="modalLogin" class="modal" ng-controller="loginController">
          <div class="modal-content" >
              <h2 class="center-align">Inicio de sesi&oacute;n</h2>
              <div class="center-align">
                  <div class="divider"></div>
                  <form class="col s12" name="frmLogin">
                      <div class="row center-align">
                          <div class="input-field col m10 offset-m1 blue-text">
                              <i class="material-icons prefix">perm_identity</i>
                              <input id="icon_prefix" type="text" class="validate" required ng-model="user.nick">
                              <label for="icon_prefix">Username</label>
                          </div>
                          <div class="input-field col m10 offset-m1 blue-text ">
                              <i class="material-icons prefix">lock_open</i>
                              <input id="icon_password" type="password" class="validate" required ng-model="user.password">
                              <label for="icon_password">Password</label>
                          </div>
                      </div>
                  </form>
                  <div class="divider"></div>
                  <p>
                      <a href="#" class="btn btn-flat white modal-close">Cancel</a> &nbsp;
                      <button class="waves-effect waves-blue blue btn btn-flat modal-action modal-close" 
                      ng-disabled="frmLogin.$invalid" ng-click="login()">Login</button>
                  </p>
              </div>
          </div>
      </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.modal-trigger').leanModal();
      })      
    </script>
  </body>
</html>