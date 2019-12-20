<!--PHP include block -->
<?php include 'php/login_validation.php'?>
<?php include 'php/fox_ui_lib.php'?>

<!doctype html>
<html lang="ru" >
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
                    <li>
                        <a href="login.php"><strong>Войти</strong></a>
                    </li>
                     <li>
                         <a href="registration.php"><u>Регистрация</u></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Вход
                    <small><a href="registration.php">Регистрация</a></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Главная</a>
                    </li>
                    <li class="active">Вход</li>
                </ol>
            </div>
        </div>
      

        <!-- Login Form -->
        <div class="row">
            <div class="col-md-8">
                <form name="sentMessage" id="contactForm" novalidate method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Логин:</label>
                            <input type="text" class="form-control" name="login" value="<?php echo $username?>" required>
                           <?php if($usr_error) { display_alert("Пожалуйста введите логин."," • "); }?>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Пароль:</label>
                            <input type="password" class="form-control" name="password" required>
                            <?php if ($pwd_error) { display_alert("Пожалуйста введите пароль.", " • "); }?>                        
                        </div>
                    </div>
                    <div id="success">
                        <?php if($login_error) { display_alert("Неправильный логин или пароль.",'<i class="fa fa-fw fa-ban"></i>'); }?>
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>

        </div>
        <!-- /.row -->

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

    <!-- Design JS -->
    <script src="js/jquery.js"></script>
    <script src="js/minimize.js"></script>
    
</body>

</html>