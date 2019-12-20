<?php session_start();

include 'php/fox_ui_lib.php';

if(!isset($_SESSION["user_login"])){
     header("location: login.php");
} elseif ($_SESSION["user_group_id"]!="2") {
    header("location: profile.php");
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
    <title>Foxcloud Profile</title>
    <meta name="description" content="My profile">
    <link href="img/foxcloud.ico" rel="icon" type="image/png" />
    <link href="css/main.css" rel="stylesheet">
    <link href="css/extra.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                        <a href="index.php#about">О сервисе</a>
                    </li>
                    <li>
                        <a href="services.html">Services</a>
                    </li>
                    <?php show_user_footer(); ?>
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
                    <small>Консоль</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Главная</a>
                    </li>
                    <li class="active">Консоль администратора</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
                <script type="text/javascript">
                    $("#load_btn_show").on("click",function(e) { 
                        if (this.id == "load_btn_show"){
                            e.preventDefault();
                            $('#load_btn_show').text("Загрузить трек!");
                            $('#form_holder').show("slow","swing");
                            this.id = "load_btn";
                            e.stopPropagation();
                        }
                    });
                    
                    // toogle tables
                    function toogleTable(){
                        if ($("#user_table").is(":visible")){
                            $("#user_table").hide();
                            $("#file_table").show();
                            $("#table_footer").html('<div class="col-lg-12"><h3 class=""><font color="#F57C00">Файлы </font>/  <small><a id="table_switch" href="#" onclick="toogleTable();">Пользователи</a></small></h3></div>');
                            
                        } else {
                            $("#file_table").hide();
                            $("#user_table").show();
                            $("#table_footer").html('<div class="col-lg-12"><h3 class=""><font color="#F57C00">Пользователи </font>/  <small><a id="table_switch" href="#" onclick="toogleTable();">Файлы</a></small></h3></div>');
                        }
                     };
                     
                     // make AJAX POST requests to server
                     function consoleRequest(request,object) {
                        //ajax request 
                        $.ajax({
                            type: 'post',
                            url: 'php/console_manager.php',
                            dataType: 'html',
                            data:request,
                            success: function (html) {
                                object.html(html);
                            }
                        });
                    };
                    
                    $(document).ready(function(e) {
                        consoleRequest("request=get_all_users",$("#user_table_content"));
                        consoleRequest("request=get_all_files",$("#file_table_content"));
                    });
                     
                </script>
        <div class="row" id="table_footer">
            <div class="col-lg-12">
                <h3 class="">
                    <font color="#F57C00">Пользователи </font>/  <small><a id="table_switch" href="#" onclick="toogleTable();">Файлы</a></small>
                </h3>
            </div>
        </div>
        
                <hr>
        <!-- User Row -->
        <table class="table table-striped" id="user_table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Логин</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Группа</th>
                </tr>
            </thead>
            <tbody id="user_table_content">
            </tbody>
            </table>
        
         <!-- File Row -->
        <table class="table table-striped" id="file_table" style="display: none">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">FILE_NAME</th>
                <th scope="col">FILE_ARTIST</th>
                <th scope="col">FILE_ALBUM</th>
                <th scope="col">FILE_DESCRIPTION</th>
                </tr>
            </thead>
            <tbody id="file_table_content">
            </tbody>
            </table>
    <!-- /.row -->
            <!-- Pager -->
            <div class="row">
                <ul class="pager">
                    <li class="previous"><a href="#">&larr;</a>
                    </li>
                    <li class="next"><a href="#">&rarr;</a>
                    </li>
                </ul>
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
</body>

</html>