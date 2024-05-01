<?php 
session_start();
include('include/db_connect.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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
                <h2 class="form__title">Добро пожаловать!</h2>
                <p class="form__subtitle">Зарегистрируйтесь, чтобы узнавать информацию о своей стипендии</p>
                <form enctype="multipart/form-data" method="post" action="include/reg.php">
                    <div><input class="form__input" type="text" name="surname" placeholder="Фамилия" id=""></div>
                    <div><input class="form__input" type="text" name="name" placeholder="Имя" id=""></div>
                    <div><input class="form__input" type="text" name="patronymic" placeholder="Отчество" id=""></div>
                    <div><input class="form__input" type="text" name="student_id" placeholder="Номер студенческого" id=""></div>
                    <div><input class="form__input" type="tel" name="phone" placeholder="Номер телефона" id=""></div>
                    <div><input class="form__input" type="email" name="email" placeholder="Почта" id=""></div>
                    <div><input class="form__input" type="password" name="password" placeholder="Пароль" id=""></div>
                    <div><input class="form__input" type="password" name="repeat_password" placeholder="Повторите пароль" id=""></div>
                    <div>
                        <label class="input-file">
                            <input class="form__input"  type="file" name="avatar" >		
                            <span><img class="foto_reg" src="img/foto.png" alt=""></span>
                        </label>
                    </div>
                    <div><input type="text" name="rights" value="user" style="display: none;" id=""></div>
                    <input class="form__btn" type="submit" value="Регистрация">
                </form>
                <?php 
                    if(isset( $_SESSION['message'])){
                    echo '<p class="form__polit">' . $_SESSION['message'] . '</p>';
                    }
                    unset( $_SESSION['message']);
                ?>
            </div>
        </div>
    </div>
</section>

<?php include('include/footer.php'); ?>

</body>
</html>