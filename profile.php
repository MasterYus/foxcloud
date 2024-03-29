<?php session_start();

include 'php/fox_ui_lib.php';

if(!isset($_SESSION["user_login"])){
     header("location: login.php");
} elseif ($_SESSION["user_group_id"]!="1") {
    header("location: console.php");
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
                <form name="sentMessage" id="file_form" novalidate method="post" action="">
                    <div id="form_holder" style="display: none">
                        <div class="control-group" id="file_holder">
                            <input id="file" class="btn btn-default" name="file" type="file" multiple="false"/>
                        </div>
                        <p class="has-error" id="file_error"></p>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Название:</label>
                                <input type="text" class="form-control" name="song_name" value="" placeholder="Название композиции" required>
                                 <p class="has-error" id="name_error"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Альбом:</label>
                                <input type="text" class="form-control" name="song_album" value="" placeholder="Название альбома" required>
                                 <p class="has-error" id="album_error"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Описание:</label>
                                <input type="text" class="form-control" name="song_description" value="" placeholder="Описание" required>
                                 <p class="has-error" id="description_error"></p>
                            </div>
                        </div>
                    </div> 
                    <p id="errors"></p>
                    <button type="button" id="load_btn_show" class="btn btn-primary">+ Добавить трек!</button>
                 </form>     
                <script type="text/javascript">
                    //some Jquery visual stuff
                    var file_uploaded = false;
                    $(document).ready(function() {
                        $('#file').pekeUpload({
                           'btnText': "Загрузить .mp3 файл",
                           'dragMode': false,
                           'allowedExtensions': "mp3",
                           'maxSize': 15728640,
                           'showPreview': false,
                           'sizeError': "Файл слишком большой (> 15Мб)",
                           'errorOnResponse': "Ошибка загрузки файла",
                           'delfiletext': "Отменить",
                           'limit': 1,
                           'invalidExtError': "Недопустимый тип файла",
                           'onSubmit': false,
                           'onFileSuccess': function(file,data){
                               alert(file.name + " загружен!");
                               file_uploaded = file.name;
                               $("#file_holder").html('<button type="button" class="btn btn-default" style=""><i class="fa fa-fw fa-check-circle"></i>'+ file.name +' загружен!</p>');
                           }
                        });
                     });
                    $("#load_btn_show").on("click",function(e) { 
                        if (this.id == "load_btn_show"){
                            e.preventDefault();
                            $('#load_btn_show').text("Загрузить трек!");
                            $('#form_holder').show("slow","swing");
                            this.id = "load_btn";
                            e.stopPropagation();
                        }
                    });
                    $(document).on("click","#load_btn",function(e) {
                        e.preventDefault();
                        //ajax form validation
                        $.ajax({
                            type: 'post',
                            url: 'php/load_validation.php',
                            dataType: 'html',
                            data:$("#file_form").serialize()+"&file_uploaded="+file_uploaded, //add extra file data to the form
                            success: function (html) {
                                var result = jQuery.parseJSON(html);
                                if(result.success){
                                    $("#file_form").html('<p style="font-size:20px" class="has-success"><i class="fa fa-fw fa-check-circle"></i>Трек загружен!</p>');
                                    setTimeout(function(){
                                        location.reload();
                                    }, 2000);
                                }else{
                                    $("#file_error").text(result.file_upload);
                                    $("#name_error").text(result.song_name);
                                    $("#album_error").text(result.song_album);
                                    $("#description_error").text(result.song_description);
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
        <hr>
        
        <!-- File Row -->
        <?php show_file_row("user");?>
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
