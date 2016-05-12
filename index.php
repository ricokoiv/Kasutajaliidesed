<?php
include('db/db.php');
session_start();

$error = '';

if (isset($_POST['login-submit'])) {
    
    if (empty($_POST['username']) || empty($_POST['password'])) {	    
        $error = 'Both fields have to be filled!';   
    } else {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $query = mysqli_query($connection, "select * from t135190_klusers1
            where username='$user' and password='$pass'");
        $rowCount = mysqli_num_rows($query);

            if($rowCount == 1) {
                $row = mysqli_fetch_assoc($query);
                $_SESSION['user'] = $row['id'];
                if ($row['is_oppejoud'] == false){
                    header('Location: studentindex.php');
                    exit;
                } else {
                    header('Location: teacherindex.php');
                    exit;
                }
            } else {
                $error = 'Username or password is invalid!';
                ?>           
                <script type="text/javascript">
                console.log("Username or password is invalid!");
                document.getElementById("alert").innerText = "Username or password is invalid!";
                </script>
                <?php
            }
     } 
    
} else if (isset($_POST['register-submit'])) {
    
    $username = $_POST['register-username'];
    $password = $_POST['confirm-password'];
    $fullname = $_POST['fullname'];
    $is_oppejoud;
    if (isset($_POST['teacher-cb'])) {
        $is_oppejoud = true;
    } else if (isset($_POST['student-cb'])) {
        $is_oppejoud = false;
    }

    $sql = "INSERT INTO t135190_klusers1 (username, password, fullname, is_oppejoud) " .
    "VALUES ('$username', '$password', '$fullname', '$is_oppejoud')";

    if ($is_oppejoud == false && mysqli_query($connection, $sql)) {
        header("Location: studentindex.php");
        exit;
    } else if ($is_oppejoud == true && mysqli_query($connection, $sql)) {
        header("Location: teacherindex.php");
        exit;
    } else {
        echo 'CONNECTION TO DB FAILED';
    } 

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

    </head>

    <body class="login-body">
        <div class="container-fluid">
            <div class="col-xs-10 col-sm-6 col-md-5 col-lg-4 text-center login-header">
                <div class="col-xs-12 login-panel-header">
                    <h1><i class="fa fa-book"></i></h1>
                </div>
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div id="alert-success"></div>
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Logi sisse</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Registreeru</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <div class="alert-error" id="alert"></div>
                            </div>
                            <div class="col-xs-12">
                                <form id="login-form" action="" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Kasutajanimi" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Parool" required>
                                    </div>
                                    <div class="register-form">
                                        <div class="form-group">
                                            <input type="password" name="confirm-password" id="confirm-password" tabindex="3" class="form-control" placeholder="Korda parooli">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="fullname" id="fullname" tabindex="4" class="form-control" placeholder="Täisnimi" value="">
                                        </div>
                                        <div class="form-group" id="register-checkbox">
                                            <div class="col-xs-6">
                                                <input class="cb radio-custom" id="student-cb" type="radio" name="student-cb" checked><label for="student-cb" name="radio-group" class="radio-custom-label">Tudeng</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input class="cb radio-custom" id="teacher-cb" type="radio" name="teacher-cb"><label for="teacher-cb" name="radio-group" class="radio-custom-label">Õppejõud</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-8 col-xs-offset-2">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Logi sisse">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-login hide" value="Registreeru">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/login.js"></script>
    </body>

    </html>