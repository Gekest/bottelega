<?php 
session_start();
ob_start();
require '../style/head.php';
require '../classes/PDO.php';
require '../classes/Admin.php';

$Admin->title(" Главная");

if (!isset($_COOKIE['secretkey']) or $_COOKIE['secretkey'] != $secretkey) {

if (isset($_GET['get_save']) and isset($_POST['submit'])) {

if(($_POST['captcha']) ==  $_SESSION['captcha'])
{	
if(($_POST['secretkey']) == $password) 
{
$time = time();
setcookie('secretkey', $secretkey, time()+86400, '/');
setcookie('time', md5($time), time()+86400, '/');
setcookie('password', base64_encode($time), time()+86400, '/');

    unset($_SESSION['login']);
    unset($_SESSION['courier']);
    $_SESSION['login'] = 'Admin';
header("Location: index.php"); 
}
else
{
echo '<div class="alert alert-icon alert-white alert-danger alert-dismissible fade show">Неверный пароль!</div>';
}
}
else
{
echo '<div class="alert alert-icon alert-white alert-danger alert-dismissible fade show">Неверный код с картинки!</div>';
}	
}
?>

<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Style-Type" content="text/css" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    
	<link href="/style/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="/style/js/jquery.min.js"></script>
	
	
        <link href="/style/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/style/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="/style/css/style.css" rel="stylesheet" type="text/css" />

        <script src="/style/js/modernizr.min.js"></script>


</head>
<body class="bg-accpunt-pages">
<script type="text/javascript">  
 $(function() { 
    $(".btn").click(function(){
        $(this).button('loading').delay(3000).queue(function() {
            $(this).button('reset');
            $(this).dequeue();
        });        
    });
});  
</script>

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="/" class="text-success">
                                                <span><img src="/style/images/logo.png" alt="" height="30"></span>
                                            </a>
                                        </h2>
                                        <h5 class="text-uppercase font-bold m-b-5 m-t-50">Личный кабинет</h5>
                                      
                                    </div>
                                    <div class="account-content">
                                     
<form class="form-horizontal" method="POST" action="?get_save">
                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label for="emailaddress">Пароль</label>
                                                   <input type="password" class="form-control" name="secretkey" placeholder="*****">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                   
                                                    <label for="password"><img src="captcha.php" alt="защитный код"></label>
                                                    <input type="text" class="form-control" name="captcha" placeholder="Код с картинки">
                                                </div>
                                            </div>

                                           

                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                     <button type="submit" name="submit" class="btn btn-md btn-block btn-primary waves-effect waves-light" data-loading-text="Идет проверка данных">ВОЙТИ</button>
										
                                                </div>
                                            </div>

                                        </form>

                                        

                                        <div class="row m-t-50">
                                            <div class="col-sm-12 text-center">
                                             
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->




   
   <? 
}
else
{

?>


<?

if(isset($_GET['exit'])) {	
setcookie('secretkey', $secretkey, time()-86400, '/');	
header("Location: index.php");
}	

}


?>

<?

$Admin->foot();
?>