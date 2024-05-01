<?php 
session_start();
include('include/db_connect.php'); 
$id = $_GET["id"];

if(isset($_SESSION['user']['id'])){
    $user = $_SESSION['user']['id']; 
}
else {
    echo 'User is empty';
}

$action = isset($_GET["action"]);
if (isset($action))
{
switch (isset($action)) {

        case 'delete':
        
        if (file_exists(isset($_GET["image"])))
        {
        unlink($_GET["image"]);  
        $query="UPDATE user SET image = NULL WHERE id = $id";
        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
        }
        break;

    } 
}

if (isset($_POST["submit_add"]))
{

    $error = array();
    if (count($error))
    {           
        $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
        
    }else
    {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_password"];

    if(isset($password)) {
        
        
        $querynew = "pass='$password', name='$name', phone='$phone', 
        email='$email'";

        $update ="UPDATE user SET $querynew WHERE id='$id' ";

        $result = mysqli_query($mysqli, $update) or die("Ошибка " . mysqli_error($mysqli));
    
    } else {
            $_SESSION['message'] = 'Passwords dont match!';
    }

    if (empty($_POST["upload_image"]))
    {        
    include("admin/action/about_image.php");
    unset($_POST["upload_image"]);           
    } 

    }
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/setka.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
<?php include('include/nav.php'); ?>

<article class="article">
    <div class="container">
        <div class=" lk__main_img">
        <div class="lk__img"></div> 
    </div>
    <div class="row">
        <div class="col-4 lk__info" >
            <?php include('include/lk_info.php'); ?>
        </div>
        <div class="col-8 article__left">
            <div class="row">
                <div class="col-8">
                    <h2 class="form__title">Редактирование информации о себе</h2>
                    <p class="form__subtitle"></p>
                    <form enctype="multipart/form-data" method="post">
                        <?php
                            $id = $_GET["id"];
                            $sql = "SELECT * FROM `user` WHERE `id` = '$id'";
                            $res = $mysqli -> query($sql);

                            if ($res -> num_rows === 1) {
                                $resPost = $res -> fetch_assoc()
                        ?>	
                        <?php 
                            if  (	(strlen($resPost["image"]) > 0) && (file_exists("uploads_images/".$resPost["image"]))	)
                            {
                                $img_pathh = 'uploads_images/'.$resPost["image"];
                            echo '
                            <label class="stylelabel" >Картинка</label>
                            <div id="baseimg-upload col-4">
                            <img style="width: 200px;" src="'.$img_pathh.'" /> <br>
                            <a class="btn" href="lk-about.php?id='.$resPost["id"].'&image='.$resPost["image"].'&action=delete" >Удалить</a>
                            </div>    ';
                            }else {  
                            echo '

                            <div id="baseimg-upload">  
                            <label class="input-file">
                                <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
                                <input class="form-control"  type="file" name="upload_image" >		
                                <span><img class="foto" src="img/foto.png" alt=""></span>
                            </label>
                            </div>
                            '; } 
                        ?>
                        <div><input class="form__input" type="text" name="name" value="<?=  $resPost['name'] ?>" placeholder="Name" id=""></div>
                        <div><input class="form__input" type="tel" name="phone" value="<?=  $resPost['phone'] ?>" placeholder="Phone" id=""></div>
                        <div><input class="form__input" type="email" name="email" value="<?=  $resPost['email'] ?>" placeholder="Email" id=""></div>
                        <div><input class="form__input" type="password" name="password" value="<?=  $resPost['pass'] ?>" placeholder="Password" id=""></div>
                        <div><input class="form__input" type="password" name="repeat_password"  placeholder="Повторите пароль" id=""></div>
                        <?php  } ?>
                        <input class="form__btn" name="submit_add" type="submit" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</article>

<?php include('include/footer.php'); ?>

</body>
</html>