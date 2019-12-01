<!--PHP include block -->
<?php include 'php/register_validation.php'?>
<?php include 'php/fox_ui_lib.php'?>

<!doctype html>
<html lang="ru" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foxcloud Registration</title>
	<meta name="description" content="Делись музыкой!">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
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
                        <a href="about.html">О сервисе</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Full Width Page</a>
                            </li>
                            <li>
                                <a href="sidebar.html">Sidebar Page</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Table</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="login.php"><strong>Войти</strong></a>
                    </li>
                     <li>
                         <a href="login.php"><u>Регистрация</u></a>
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
                <h1 class="page-header">Регистрация
                    <small><a href="login.php">Вход</a></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Главная</a>
                    </li>
                    <li class="active">Регистрация</li>
                </ol>
            </div>
        </div>
      
        <!-- Register Form -->
        <div class="row">
            <div class="col-md-8">
                <form name="sentMessage" id="contactForm" novalidate method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Имя:</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $name?>" placeholder="Имя" required>
                           <?php if($name_empty) { display_alert("Пожалуйста введите Ваше имя."," • "); }?>
                           <?php if($name_m_err) { display_alert("Можно использовать только русские и английские буквы."," • "); }?>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Фамилия:</label>
                            <input type="text" class="form-control" name="surname" value="<?php echo $surname?>" placeholder="Фамилия" required>
                           <?php if($surname_empty) { display_alert("Пожалуйста введите Вашу фамилию."," • "); }?>
                           <?php if($surname_m_err) { display_alert("Можно использовать только русские и английские буквы."," • "); }?>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Логин:</label>
                            <input type="text" class="form-control" name="login" value="<?php echo $username?>" placeholder="Логин" required>
                           <?php if($login_empty) { display_alert("Пожалуйста введите логин."," • "); }?>
                           <?php if($login_m_err) { display_alert("Можно использовать только английские буквы и цифры."," • "); }?>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Пароль:</label>
                            <input type="password" class="form-control" name="password" placeholder="Минимум 6 сиволов: минимум 1 заглавная и строчная латинские буквы, 1 цифра" required>
                           <?php if($password_empty) { display_alert("Пожалуйста введите пароль."," • "); }?>
                           <?php if($password_m_err) { display_alert("Пароль не соответствует требованиям безопасности."," • "); }?>                    
                        </div>
                    </div>
                     <div class="control-group form-group">
                        <div class="controls">
                            <label>Повторите пароль:</label>
                            <input type="password" class="form-control" name="password_repeat" placeholder="Повторите пароль" required>
                           <?php if($password_repeat_empty) { display_alert("Пожалуйста повторите пароль."," • "); }?>
                           <?php if($password_repeat_m_err) { display_alert("Пароли должны совпадать."," • "); }?>                        
                        </div>
                    </div>
                    <div id="success">
                    </div>
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
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
    <script src="js/bootstrap.min.js"></script>
    
</body>

</html>