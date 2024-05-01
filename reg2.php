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
    <title>Создание студента</title>
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
                <form enctype="multipart/form-data" method="post" action="include/reg2.php">
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
                        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="academ" value="1" />Академическая</div>
                        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="social" value="1" />Социальная</div>
                        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="upacadem" value="1" />Повышенная академическая</div>
                        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="upsocial" value="1" />Повышенная социальная</div>
                        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="military" value="1" />Стипендия военной кафедры</div>
                        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="namestep" value="1" />Именная стипендия</div>
                        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="president" value="1" />Стипендия президента</div>
                        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="needhelp" value="1" />Нуждается в материальной поддержке</div>
                        <input class="form__btn" type="submit" value="Создать">     
                    </div> 
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