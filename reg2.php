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
    <title>Document</title>

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
                    <h2 class="form__title">Создать студента</h2>
                    <!-- <p class="form__subtitle">Зарегистрируйтесь, чтобы узнавать информацию о своей стипендии</p> -->

                    <form enctype="multipart/form-data" method="post" action="include/reg2.php">
                    <!-- <div><input class="form__input" type="text" name="login" placeholder="Login" id=""></div> -->
                    <div><input class="form__input" type="text" name="student_id" placeholder="Номер студенческого" id=""></div>
                        <div><input class="form__input" type="number" name="course_number" placeholder="Курс обучения" id="" max=5 min=1></div>
                        <div>
                            <select class="form__input" type="" name="education_degree" placeholder="Степень обучения" id="">
                                <option value="">Степень обучения</option>
                                <option value="Бакалавриат/Спец">Бакалавриат/Спец</option>
                                <option value="Магистратура">Магистратура</option>
                                <option value="Аспирантура">Аспирантура</option>
                            </select>
                        </div>
                       <div>
                       
                      
                       <div class="title-lite"> <input type="checkbox" id="checkbox" class="checkbox" name="academ" value="Академическая"   />Академическая</div>
                        <div class="title-lite"> <input type="checkbox" id="checkbox" class="checkbox" name="social" value="Социальная"   />Социальная</div>
                       
                        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="upacadem" value="Повышенная академическая" />Повышенная академическая</div>
                       
                        <div class="title-lite"> <input type="checkbox" id="checkbox" class="checkbox" name="upsocial" value="Повышенная социальная" />Повышенная социальная</div>
                      
                        <div class="title-lite"> <input type="checkbox" id="checkbox" class="checkbox" name="military" value="Стипендия военной кафедры" />Стипендия военной кафедры</div>
                      
                        <div class="title-lite">  <input type="checkbox" id="checkbox" class="checkbox" name="namestep" value="Именная стипендия" />Именная стипендия</div>
                       
                        <div class="title-lite"> <input type="checkbox" id="checkbox" class="checkbox" name="president" value="Стипендия президента" />Стипендия президента</div>
                        <div class="title-lite"> <input type="checkbox" id="checkbox" class="checkbox" name="needhelp" value="Нуждается в материальной поддержке" />Нуждается в материальной поддержке</div>
                        <input class="form__btn" type="submit" value="Создать">     
                    </div> 
                        <!-- <div><input class="form__input" type="text" name="name" placeholder="Имя" id=""></div>
                        <div><input class="form__input" type="text" name="patronymic" placeholder="Отчество" id=""></div>
                        <div><input class="form__input" type="text" name="student_id" placeholder="Номер студенческого" id=""></div>
                        <div><input class="form__input" type="tel" name="phone" placeholder="Номер телефона" id=""></div>
                        <div><input class="form__input" type="email" name="email" placeholder="Почта" id=""></div>
                        <div><input class="form__input" type="password" name="password" placeholder="Пароль" id=""></div>
                        <div><input class="form__input" type="password" name="repeat_password" placeholder="Повторите пароль" id=""></div>
                        <div><input class="form__input" type="file" name="avatar" placeholder="Your photo" id=""></div>
                        <div><input type="text" name="rights" value="user" style="display: none;" id=""></div>
                        <input class="form__btn" type="submit" value="Отправить"> -->
                    </form>
                    <?php 
                        if(isset( $_SESSION['message'])){
                        echo '<p class="form__polit">' . $_SESSION['message'] . '</p>';
                        }
                        unset( $_SESSION['message']);
		            ?>
                    <!-- <p class="form__polit">By clicking on the button you agree to the privacy policy</p> -->

                </div>
                <!-- <div class="col-5 form__image-reg"></div> -->
            </div>
        </div>
    </section>

    <?php include('include/footer.php'); ?>


</body>
</html>