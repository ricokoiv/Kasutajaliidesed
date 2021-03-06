<?php
session_start();
$loggedIn = isset($_SESSION['user']);
if ($loggedIn) {
	include('db/session.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Kasutajaliidesed</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,600,300,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  </head>
  <?php if ($loggedIn): ?>
  <body>
    <div class="container-fluid">
      <div class="col-xs-12 col-sm-3 navcol">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand text-center" href="studentindex.php"><i class="fa fa-book"></i></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav text-center">
                <li class="active"><a href="#"><i class="ion-ios-home-outline nav-icon"></i>Esileht</a></li>
                <li><a href="grades.php"><i class="ion-ios-list-outline nav-icon"></i>Hinded</a></li>
                <li><a href="submission.php"><i class="ion-ios-compose-outline nav-icon"></i>Esitamine</a></li>
                <br>
                <li class="logout-li"><a class="red-button" href="index.php">Logi välja</a></li>
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li> -->
              </ul>
              <!-- <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form> -->
            </div><!-- /.navbar-collapse -->
          </nav>
      </div>
      <div class="col-xs-12 col-sm-9 main-container">
        <div class="col-xs-12 header">
            <h1>Tere, Tudeng</h1>
        </div>

        <div class="col-xs-12 col-md-6 block">
          <div class="col-xs-12">
            <h2>Viimased hinded</h2>
          </div>
          <ul>
              <li>
                  <div class="col-xs-8"><h3>Aine nimetus</h3></div>
                  <div class="col-xs-4 text-center"><h3>Hinne</h3></div>
              </li>
              <li>
                  <div class="col-xs-8">Matemaatiline Analüüs II</div>
                  <div class="col-xs-4 text-center">0</div>
              </li>
              <li>
                  <div class="col-xs-8">Lineaaralgebra</div>
                  <div class="col-xs-4 text-center">1</div>
              </li>
              <li>
                  <div class="col-xs-8">Õigusõpetus</div>
                  <div class="col-xs-4 text-center">5</div>
              </li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-6 block">

        </div>
        <!-- <input type="file" name="somename" size="chars"> -->

        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
<?php else: header('Location: index.php') ?>
<?php endif; ?>
</html>
