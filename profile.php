<?php session_start();

if(!isset($_SESSION["user_login"])){
     header("location: login.php");
}
if (isset($_GET["session_clear"])) { 
    session_destroy();
    unset($_GET["session_clear"]);
    header("location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://html5-templates.com/" />
    <title>Bootstrap Template</title>
    <meta name="description" content="A minimalist Bootstrap theme by StartBootstrap. Contains everything you need to get started building your website. All you have to do is change the text and images.">
    <link href="img/foxcloud.ico" rel="icon" type="image/png" />
    <link href="css/main.css" rel="stylesheet">
    <link href="css/extra.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    body {
            font: 13px Arial, Helvetica, Sans-serif;
    }
    .uploadifive-button {
            float: left;
            margin-right: 10px;
    }
    #queue {
            border: 1px solid #E5E5E5;
            height: 177px;
            overflow: auto;
            margin-bottom: 10px;
            padding: 0 3px 3px;
            width: 300px;
    }
    </style>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/minimize.js"></script>
    
     <!-- Uploadify config -->
   <script type="text/javascript" src="js/pekeUpload.js"></script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong>FOX</strong>CLOUD</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">О сервисе</a>
                    </li>
                    <li>
                        <a href="services.html">Services</a>
                    </li>
                    <?php if (isset($_SESSION["user_login"])) { 
                    echo <<<EOF
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>{$_SESSION['user_name']} {$_SESSION['user_surname']}</strong><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="profile.php">Профиль</a>
                            </li>
                            <li>
                                <a href="?session_clear">Выйти</a>
                            </li>
                        </ul>
                    </li> 
                    EOF; 
                    } else {
                    echo <<<EOF
                    <li>
                        <a href="login.php"><strong>Войти</strong></a>
                    </li>
                     <li>
                        <a href="registration.php"><u>Регистрация</u></a>
                    </li>
                    EOF;} ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $_SESSION['user_name']." ".$_SESSION['user_surname'];?>
                    <small>Музыка</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Главная</a>
                    </li>
                    <li class="active">Мой профиль</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class ="row div-center div-center-self">
            <div class="controls text-center">  
                <p style="font-size:15px">Загрузите свою музыку!<br>Файл должен быть не более 15 Мб в формате .mp3</p>
                <hr>
                <form>
                    <input id="file" class="btn btn-default" name="file" type="file" multiple="false"/>
                </form>
                <script type="text/javascript">
                    $( document ).ready(function() {
                     $('#file').pekeUpload({
                        'btnText': "Загрузить файл",
                        'dragMode': false,
                        'allowedExtensions': "mp3",
                        'maxSize': 0,
                        'showPreview': false,
                        'sizeError': "Файл слишком большой (> 15Мб)",
                        'errorOnResponse': "Ошибка загрузки файла",
                        'delfiletext': "Отменить",
                        'limit': 1,
                        'invalidExtError': "Недопустимый тип файла",
                     });
                     });
                </script>
            </div>
        </div>
        <hr>
        <!-- Blog Post Row -->
        <div class="row div-center">
            <div class="col-xs-1 text-center">
                <p><i class="fa fa-file-audio-o fa-4x"></i>
                </p>
            </div>
            <div class="col-xs-6">
                <h3>
                    <a href="blog-post.html">Title</a>
                </h3>
                <p>by <a href="#">Author link</a></p>
                <p>Description</p>
                <a class="btn btn-primary" href="blog-post.html">Read More <i class="fa fa-comment"></i></a>             
            </div>
            <div class="col-xs-3 "><audio id="sound" controls controlsList="nodownload"><source src="storage/audio/boulevard_metal.mp3" type="audio/mp3" ></audio></div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Pager -->
        <div class="row">
            <ul class="pager">
                <li class="previous"><a href="#">&larr; Older</a>
                </li>
                <li class="next"><a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website, year</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
</body>

</html>
