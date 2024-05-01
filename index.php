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
    <title>Главная</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/setka.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
<?php include('include/nav.php'); ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->

<header class="header">
        <div class="container">
            <div class="row align__items__center">
                <div class="header__utp">
                    <hr class="header__hr">
                    <br>
                    <h1 class="header__title">Онлайн Стипендия</h1>
                    <h2 class="header__subtitle">Узнайте всю информацию о своей стипендии </h2>
                    <br>
                    <?php if (!isset($_SESSION['user']) )  {  ?>  
                    <li class="nav__item"><a href="mail.php" class="nav__btn">Отправить заявку</a></li>
                    <?php } ?>
                </div>
                <div class="header__utp header__imgs">
                <img class="header__img header__img1" src="uploads_images/student.png" alt="nft">
                <img class="header__img header__img2" src="uploads_images/ava.png" alt="nft">
                </div>
            </div>
        </div>
</header>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->

<section class="project project1">
    <div class="main__title main__title1"></div>
        <div class="container slider">
            <div class="row slide">
                <div class="header__utp header__imgs">
                    <img class="project__img " src="" alt=""></div>
                    <div class="header__utp" >
                            <h2 class="project__title"></h2>
                            <br>
                            <h3 class="project__price" ></h3>
                    </div>
                </div>
            </div>
        </a>
        </div>
    </div>
    <div class="arrow">
        <div><button class="head__btn head__btn__left">←</button>
        <button class="head__btn head__btn__right">→</button></div>
        <?php  if  (isset($_SESSION['user']) && $_SESSION['user']['rights']=='admin')  { ?> 
            <div class="add_news_button"><li class="nav__item"><a href="add_news.php" class="nav__btn">Добавить новость</a></li></div> 
        <?php } ?>
    </div>
</section>
        
<?php include('include/slider.php'); ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->

<section class="project project1 " style="background-color: white">
    <div class="main__title main__title1">
        <h1>Контактная информация</h1>
    </div>
    <div class="container ">
        <div style="display: flex; align-items: center; justify-content: center">
            <div style="position:relative;overflow: hidden"><a href="https://yandex.ru/maps/org/ivanovskiy_gosudarstvenny_universitet_korpus_1/240938650644/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Ивановский государственный университет, корпус № 1</a><a href="https://yandex.ru/maps/5/ivanovo/category/university/184106140/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">ВУЗ в Иванове</a><iframe src="https://yandex.ru/map-widget/v1/?ll=40.957982%2C57.018631&mode=poi&poi%5Bpoint%5D=40.958177%2C57.019122&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D240938650644&z=18" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
        </div>
    </div>
</section>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->

<?php include('include/footer.php'); ?>

</body>
</html>