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

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,600,300,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css">
  <link href="css/main.css" rel="stylesheet">
  <script src="bower_components/progressbar.js/dist/progressbar.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="bower_components/mixitup/build/jquery.mixitup.min.js"></script>

</head>

<body>
  <div class="container-fluid">
    <div class="col-xs-12 col-sm-3 navcol">
      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand text-center" href="teacherindex.php"><i class="fa fa-book"></i></a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav text-center">
            <li><a href="teacherindex.php"><i class="ion-ios-home-outline nav-icon"></i>Esileht</a></li>
            <li class="active"><a href="#"><i class="ion-ios-list-outline nav-icon"></i>Ained</a></li>
            <br>
            <li class="logout-li"><a class="red-button" href="index.php">Logi välja</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="col-xs-12 col-sm-9 main-container">
      <div class="col-xs-12 header">
        <h1>Ained</h1>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="col-xs-12">
          <ul>
            <li>
              <div class="col-xs-12 li-subject">
                <div class="col-xs-12">
                  <i class="ion-ios-arrow-right li-arrow"></i>
                  <h4>Matemaatiline Analüüs II</h4>
                </div>
              </div>
              <div class="col-xs-12 li-subject-container">
                <ul class="li-subject-container-grades">
                  <div class="col-xs-12 col-sm-6 subject-button subject-add-work">
                    <i class="ion-ios-plus-empty"></i> Lisa töö
                  </div>
                  <div class="col-xs-12 col-sm-6 subject-button subject-grouping">
                    <i class="ion-ios-people-outline"></i> Grupeeri
                  </div>
                  <li id="ma2-kt2">
                    <div class="row">
                      <div class="col-xs-8 col-lg-9">Kontrolltöö II</div>
                      <div class="col-xs-2 col-sm-1"></div>
                      <div class="col-xs-2 col-sm-1 delete-submission"><i class="ion-ios-close-empty submission-delete"></i></div>
                    </div>
                  </li>
                  <li class="grading-li" id="ma2-kt1">
                    <div class="row">
                      <div class="col-xs-8 col-lg-9">Kontrolltöö I</div>
                      <div class="col-xs-2 col-sm-1"><i class="ion-ios-eye-outline icon-stats"></i></div>
                      <div class="col-xs-2 col-sm-1 delete-submission"><i class="ion-ios-close-empty submission-delete"></i></div>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <div class="col-xs-12 li-subject">
                <div class="col-xs-12">
                  <i class="ion-ios-arrow-right li-arrow"></i>
                  <h4>Lineaaralgebra</h4>
                </div>
              </div>
              <div class="col-xs-12 li-subject-container">
                <ul class="li-subject-container-grades">
                  <div class="col-xs-6 subject-button subject-add-work">
                    <i class="ion-ios-plus-empty"></i> Lisa töö
                  </div>
                  <div class="col-xs-6 subject-button subject-grouping">
                    <i class="ion-ios-people-outline"></i> Grupeeri
                  </div>
                  <li id="lin-e">
                    <div class="row">
                      <div class="col-xs-8 col-lg-9">Eksam</div>
                      <div class="col-xs-2 col-sm-1"></div>
                      <div class="col-xs-2 col-sm-1 delete-submission"><i class="ion-ios-close-empty submission-delete"></i></div>
                    </div>
                  </li>
                  <li id="lin-kt2">
                    <div class="row">
                      <div class="col-xs-8 col-lg-9">Kontrolltöö II</div>
                      <div class="col-xs-2 col-sm-1"></div>
                      <div class="col-xs-2 col-sm-1 delete-submission"><i class="ion-ios-close-empty submission-delete"></i></div>
                    </div>
                  </li>
                  <li id="lin-kt1">
                    <div class="row">
                      <div class="col-xs-8 col-lg-9">Kontrolltöö I</div>
                      <div class="col-xs-2 col-sm-1"></div>
                      <div class="col-xs-2 col-sm-1 delete-submission"><i class="ion-ios-close-empty submission-delete"></i></div>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-xs-12 col-md-6 block statistics">
        <div class="col-xs-10">
          <h2>Matemaatiline Analüüs II</h2>
        </div>
        <div class="col-xs-2">
          <i class="ion-close icon-close"></i>
        </div>
        <div class="row">
          <div class="col-xs-12 subject-work-header">
            <h4>Kontrolltöö I</h4>
          </div>
        </div>

        <div class="col-xs-12 tools-container">
          <div class="col-xs-12 col-sm-6 filter-students text-left">
            <input type="text" tabindex="1" class="form-control" id="name-filter" placeholder="Otsi tudengit" value="">
          </div>
          <div class="col-xs-12 col-sm-6 btn-change">
            <i class="ion-ios-color-wand-outline icon-wand"></i>
            <i class="ion-checkmark icon-tick"></i>
            <span class="btn-change-text"></span>
          </div>
        </div>

        <div class="col-xs-12 name-list">
          <div class="row text-center name-list-header">
            <div class="col-xs-4">
              <h4>Nimi</h4>
            </div>
            <div class="col-xs-4 col-xs-offset-3 text-center">
              <h4>Hinne</h4>
            </div>
          </div>
          <div class="row">
            <ul class="name-container">
              <li class="mix">
                <div class="row">
                  <div class="col-xs-4 name-list-name name1">Rico Kõiv</div>
                  <div class="col-xs-4 col-xs-offset-3 text-center name-list-grades name1 list-grades-input" data-gradeid="name1">4</div>
                </div>
              </li>
              <li class="mix">
                <div class="row">
                  <div class="col-xs-4 name-list-name name2">Karl Mäe</div>
                  <div class="col-xs-4 col-xs-offset-3 text-center name-list-grades name2 list-grades-input" data-gradeid="name2">3</div>
                </div>
              </li>
              <li class="mix">
                <div class="row">
                  <div class="col-xs-4 name-list-name name3">Margus Suurkera</div>
                  <div class="col-xs-4 col-xs-offset-3 text-center name-list-grades name3 list-grades-input" data-gradeid="name3">5</div>
                </div>
              </li>
              <li class="mix">
                <div class="row">
                  <div class="col-xs-4 name-list-name name4">Kaisa Toom</div>
                  <div class="col-xs-4 col-xs-offset-3 text-center name-list-grades name4 list-grades-input" data-gradeid="name4">5</div>
                </div>
              </li>
              <li class="mix">
                <div class="row">
                  <div class="col-xs-4 name-list-name name5">Kristjan Salumaa</div>
                  <div class="col-xs-4 col-xs-offset-3 text-center name-list-grades name5 list-grades-input" data-gradeid="name5"></div>
                </div>
              </li>
              <li class="mix">
                <div class="row">
                  <div class="col-xs-4 name-list-name name6">Geity Miilberg</div>
                  <div class="col-xs-4 col-xs-offset-3 text-center name-list-grades name6 list-grades-input" data-gradeid="name6">5</div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- <input type="file" name="somename" size="chars"> -->

    </div>
  </div>
  </div>
  <script src="js/grading.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>


