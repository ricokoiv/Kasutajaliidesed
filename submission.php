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
    <link rel="stylesheet" href="bower_components/dropzone/dropzone.css">
    <link href="css/main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bower_components/dropzone/dropzone.js"></script>

</head>
<?php if ($loggedIn): ?>
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
                    <a class="navbar-brand text-center" href="studentindex.php"><i class="fa fa-book"></i></a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav text-center">
                        <li><a href="studentindex.php"><i class="ion-ios-home-outline nav-icon"></i>Esileht</a></li>
                        <li><a href="grades.php"><i class="ion-ios-list-outline nav-icon"></i>Hinded</a></li>
                        <li class="active"><a href="#"><i class="ion-ios-compose-outline nav-icon"></i>Esitamine</a></li>
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
                </div>
            </nav>
        </div>
        <div class="col-xs-12 col-sm-9 main-container">
            <div class="col-xs-12 header">
                <h1>Esitamine</h1>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="col-xs-12">
                    <h2>Ained</h2>
                </div>
                <div class="col-xs-12">
                    <ul>
                        <li>
                            <div class="col-xs-12 li-subject">
                                <div class="col-xs-10">
                                    <i class="ion-ios-arrow-right li-arrow"></i>
                                    <h4>Matemaatiline Analüüs II</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 li-subject-container">
                                <div class="upload-form">
                                    <div class="col-xs-9 submission-title work-name">
                                        <input type="text" class="title" placeholder="Sisesta töö nimi" />
                                    </div>
                                    <div class="col-xs-3 subject-button subject-add-work file-add-button btn-disabled">
                                      <i class="ion-ios-plus-empty"></i> Esita
                                    </div>
                                    <div class="col-xs-12 dropzone-container">
                                      <form action="#" id="file-dropzone" class="dropzone"></form>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                  <ul class="li-subject-container-grades">
                                    <li>
                                      <div class="row">
                                        <div class="col-xs-8 col-sm-10">Praktikum 1</div>
                                        <div class="col-xs-2 col-sm-1"><i class="ion-ios-download-outline submission-download"></i></div>
                                        <div class="col-xs-2 col-sm-1 delete-submission"><i class="ion-ios-close-empty submission-delete"></i></div>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="row">
                                        <div class="col-xs-8 col-sm-10">Kontrolltöö</div>
                                        <div class="col-xs-2 col-sm-1"><i class="ion-ios-download-outline submission-download"></i></div>
                                        <div class="col-xs-2 col-sm-1 delete-submission"><i class="ion-ios-close-empty submission-delete"></i></div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col-xs-12 li-subject">
                                <div class="col-xs-10">
                                    <i class="ion-ios-arrow-right li-arrow"></i>
                                    <h4>Lineaaralgebra</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 li-subject-container">
                                <div class="upload-form">
                                    <div class="col-xs-9 submission-title work-name">
                                        <input type="text" class="title" placeholder="Sisesta töö nimi" />
                                    </div>
                                    <div class="col-xs-3 subject-button subject-add-work file-add-button btn-disabled">
                                      <i class="ion-ios-plus-empty"></i> Esita
                                    </div>
                                    <div class="col-xs-12 dropzone-container">
                                      <form action="#" id="file-dropzone" class="dropzone"></form>
                                    </div>
                                    <div class="col-xs-12">
                                      <ul class="li-subject-container-grades">
                                        <li>
                                          <div class="row">
                                            <div class="col-xs-8 col-sm-10">Praktikum 8</div>
                                            <div class="col-xs-2 col-sm-1"><i class="ion-ios-download-outline submission-download"></i></div>
                                            <div class="col-xs-2 col-sm-1 delete-submission"><i class="ion-ios-close-empty submission-delete"></i></div>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="row">
                                            <div class="col-xs-8 col-sm-10">Kontrolltöö 2</div>
                                            <div class="col-xs-2 col-sm-1"><i class="ion-ios-download-outline submission-download"></i></div>
                                            <div class="col-xs-2 col-sm-1 delete-submission"><i class="ion-ios-close-empty submission-delete"></i></div>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                                    <!-- <form method="post" action="#" enctype="multipart/form-data">
                                        <div id="submission-input-file">
                                        <input type="file" name="upl" multiple />
                                        </div>
                                        <input type="submit" name="btn-upload" class="form-control btn btn-upload" value="Lae üles">
                                    </form> -->
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col-xs-12 li-subject">
                                <div class="col-xs-10">
                                    <i class="ion-ios-arrow-right li-arrow"></i>
                                    <h4>Õigusõpetus</h4>
                                </div>
                                <div class="col-xs-2 text-right">
                                    <!-- <i class="ion-ios-checkmark-empty li-passed"></i> -->
                                </div>
                            </div>
                            <div class="col-xs-12 li-subject-container">
                                <div class="upload-form">
                                    <div class="col-xs-9 submission-title work-name">
                                        <input type="text" class="title" placeholder="Sisesta töö nimi" />
                                    </div>
                                    <div class="col-xs-3 subject-button subject-add-work file-add-button btn-disabled">
                                      <i class="ion-ios-plus-empty"></i> Esita
                                    </div>
                                    <div class="col-xs-12 dropzone-container">
                                      <form action="#" id="file-dropzone" class="dropzone"></form>
                                    </div>
                                    <div class="col-xs-12">
                                      <ul class="li-subject-container-grades">
                                        <li>
                                          <div class="row">
                                            <div class="col-xs-8 col-sm-10">Eksam</div>
                                            <div class="col-xs-2 col-sm-1"><i class="ion-ios-download-outline submission-download"></i></div>
                                            <div class="col-xs-2 col-sm-1 delete-submission"><i class="ion-ios-close-empty submission-delete"></i></div>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <input type="file" name="somename" size="chars"> -->

        </div>
    </div>
    </div>
    <script src="js/submission.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
<?php else: header('Location: index.php') ?>
<?php endif; ?>
</html>
