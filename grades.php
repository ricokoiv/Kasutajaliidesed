<?php
session_start();
$loggedIn = isset($_SESSION['user']);
if ($loggedIn) {
  $userId = $_SESSION['user'];
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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,600,300,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css">
    <link href="css/main.css" rel="stylesheet">
    <script src="bower_components/progressbar.js/dist/progressbar.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  </head>
  <body>
  <?php if ($loggedIn): ?>
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
                <li><a href="studentindex.php"><i class="ion-ios-home-outline nav-icon"></i>Esileht</a></li>
                <li class="active"><a href="#"><i class="ion-ios-list-outline nav-icon"></i>Hinded</a></li>
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
            <h1>Hinded</h1>
        </div>

        <div class="col-xs-12 grade-progress">
          <div class="col-xs-12 col-sm-4">
            <h2>Ainepunktid</h2>
          </div>
          <div class="col-xs-6 col-sm-4 progress-eap text-center">
            <h4>Praegu</h2>
            <h2 id="eap_total">137</h2></span>
            <h4>EAP</h4></span>
          </div>
          <div class="col-xs-6 col-sm-4 progress-eap text-center">
            <h4>Puudu</h2>
            <h2 id="eap_left">43</h2></span>
            <h4>EAP</h4></span>
          </div>
          <div class="col-xs-12" id="grade-progress"></div>

        </div>
        <div class="col-xs-12 col-md-6 left-container">
          <div class="col-xs-12">
            <h2>Ained</h2>
          </div>
          
          <div class="col-xs-12">
            <ul>
              <?php
                  $count_desc = 0;						 
                  $con = mysqli_connect("localhost","st2014","progress","st2014");
                  if (!$con) {
                    die('Could not connect: ' . mysqli_connect_error());
                  }    
                  
                  $sql="select distinct course, course_id from t135190_klgrades2, t135190_klusers1, t135190_klcourses1 
                  where t135190_klgrades2.user_id = t135190_klusers1.id and user_id='".$userId."'
                  and t135190_klgrades2.course_id = t135190_klcourses1.id;";
                  $select = mysqli_query($con,$sql);
                  while($row = mysqli_fetch_array($select)) :
                    
                    $course=$row['course'];
                    $course_id=$row['course_id'];                    
                  ?>
                                                  
                <li>
                    <div class="col-xs-12 li-subject">
                      <div class="col-xs-10">
                        <i class="ion-ios-arrow-right li-arrow"></i>
                        <h4><?php echo $course; ?></h4>
                      </div>
                      <div class="col-xs-2 text-right">
                        <i class="ion-ios-checkmark-empty li-passed"></i>
                      </div>
                    </div>
                    <div class="col-xs-12 li-subject-container">
                      <ul class="li-subject-container-grades">
                        <?php						                                                         
                            $sql="select * from t135190_klgrades2 where course_id='".$course_id."' and user_id='".$userId."';";
                            $select1 = mysqli_query($con,$sql);
                            
                            while($row1 = mysqli_fetch_array($select1)) :
                              
                              $grade=$row1['grade'];
                              $description=utf8_encode($row1['description']);
                              
                            ?>
                              <li class="<?php echo $course_id; ?> statistics-true" id="<?php echo $count_desc++; ?>-desc">
                                <div class="row">
                                  <div class="col-xs-8 col-sm-8 col-lg-10 c-desc"><?php echo $description; ?></div>
                                  <div class="col-xs-2 col-sm-2 col-md-1 text-center"><b><?php echo $grade; ?></b></div>
                                  <div class="col-xs-2 col-sm-2 col-md-1 text-center"><i class="ion-stats-bars icon-stats"></i></div>
                                </div>
                              </li>
                        <?php endwhile; ?> 
                      </ul>
                    </div>
                </li>
                <?php endwhile; ?>              
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-md-6 block statistics">
          <div class="col-xs-10">
            <h2>Statistika</h2>
          </div>
          <div class="col-xs-2">
            <i class="ion-close icon-close"></i>
          </div>
          <div class="col-xs-12">
            <h4 id="statistics-name"></h4>
          </div>
          <div class="col-xs-12">
            <div class="ct-chart ct-perfect-fifth"></div>
          </div>
        </div>
        <!-- <input type="file" name="somename" size="chars"> -->

        </div>
      </div>
    </div>
    <script src="bower_components/countup.js/countUp.min.js"></script>
    <script src="bower_components/chartist/dist/chartist.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
<?php else: header('Location: index.php') ?>
<?php endif; ?>
</html>
