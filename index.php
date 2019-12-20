<?php session_start();

include 'php/fox_ui_lib.php';

if (isset($_GET["session_clear"])) { 
    session_destroy();
    unset($_GET["session_clear"]);
    header("Refresh:0; url=?");
}

// Setup database
$connection = mysqli_connect("localhost", "root", "","foxcloud");
//fix charset
mysqli_set_charset ($connection , 'utf8');
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foxcloud Beta</title>
    <link href="img/foxcloud.ico" rel="icon" type="image/png" />
    <meta name="description" content="Делись музыкой!">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/extra.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                        <a href="index.php#about">О сервисе</a>
                    </li>
                    <?php show_user_footer(); ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('img/mfox.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Даже котятам нравится)</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('img/mfox2.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Регистрируйся и используй бесплатно (ещё бы)</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('img/mfox3.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Без JavaScript, ну почти</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- News -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Обновления
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> FOXCLOUD Beta v1.0.0</h4>
                    </div>
                    <div class="panel-body">
                        <p>27.10.2019 Работа начата. Проект запущен в качестве курсовой работы по РПП. </p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> План</h4>
                    </div>
                    <div class="panel-body">
                        <p>С божьей помощью это дело закончить.</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if (isset($_SESSION['user_login'])){
        echo <<<EOF
        <div class="row">
            <div class="col-lg-12">
               <h2 class="page-header">Недавно загруженное</h2>
            </div>
        EOF;
        show_file_row("all");
        echo "</div>";
        }?>
        
        <!-- / -->
        <!-- Features Section --> 
        <a name="about"/>
        <div class="row">
            <div class="col-lg-12">
               <h2 class="page-header">О Foxcloud</h2>
            </div>
            <div class="col-md-6">
                <p>Интерактивная клиент-серверная система Foxcloud это:</p>
                <ul>
                    <li><strong>Курсовая работа :)</strong></li>
                    <li>PHP v7.0</li>
                    <li>HTML5</li>
                    <li>jQuery v1.11.1</li>
                    <li>Система авторизации и регистрации на PHP</li>
                    <li>PHP сессии и комбинированный динамический профиль пользователя</li>
                    <li>2 группы пользователей</li>
                    <li>Защита от SQL инъекций, серверная валидация полей, md5 хэширование паролей</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img draggable="false" style="width:400px; height: auto;" src="img/about.png"/>
            </div>
        </div>
        <!-- / -->
        
        <hr>
        
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; YUS web technologies, 2019</p>
                </div>
            </div>
        </footer>
        
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/minimize.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
