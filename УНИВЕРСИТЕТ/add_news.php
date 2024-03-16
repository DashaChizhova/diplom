<?php 
session_start();
include('include/db_connect.php'); 
if(isset($_SESSION['user']['id'])){
    $user = $_SESSION['user']['id']; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление новости</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/setka.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
<?php include('include/nav.php'); ?>

<section class="form">
    <div class="container">
        <div class="row justify__content__center form__shadow">
            <div class="col-5 form__block">
                <h2 class="form__title">Добавить новость</h2>
                <form enctype="multipart/form-data" method="post" action="include/add_news.php">
                    <div><input class="form__input" type="text" name="title" placeholder="Заголовок" id=""></div>
                    <div>
                        <textarea class="form__input" name="text" id="" cols="30" rows="10" ></textarea>
                    </div>
                    <div><label class="input-file">
                            <input class="form__input"  type="file" name="avatar" >		
                            <span><img class="foto_reg" src="img/foto.png" alt=""></span>
                        </label>
                    </div>
                    <input class="form__btn" name="submit_add" type="submit" value="Создать">
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('include/footer.php'); ?>

</body>
</html>