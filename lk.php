<?php 
session_start();
include('include/db_connect.php');
if(isset($_SESSION['user']['id'])){
    $user = $_SESSION['user']['id']; 
}
else {
    echo 'User is empty';
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

<article class="article">
   
    <div class="container " >
        <!-- <div class="row bread">
            <ul>
                <li class="bread__item"><a class="bread__link" href="index.php">Home</a></li>
                <li class="bread__item"><img class="bread__img" src="img/ic_outline-keyboard-arrow-right.svg" alt=""></li>
                <li class="bread__item"><p class="bread__name">Personal account</p></li>
            </ul>
        </div> -->
        <div class=" lk__main_img">
            <div class="lk__img"></div> 
        </div>
        <div class="row ">
          
            
            <div class="col-4 lk__info">
            <?php

	
$sql = "SELECT * FROM `user` WHERE `id`='$user'";
$res = $mysqli -> query($sql);

if($res -> num_rows > 0) {
    while($resArticle = $res -> fetch_assoc()) {

?>    
                <img class="article__logo" src="<?=  $resArticle['image'] ?>" alt="">
                <div class="article_info">
                    <div>
                        <h2 class="article__name"> <br> <?=  $resArticle['name'] ?> <?=  $resArticle['surname'] ?></h2>
                       
                        <!-- <p class="article__mintext">@Harryknf</p> -->
                       
                    </div >
                    <!-- <div> <li class="lk__item"><a class="lk__link" href="lk-about.php?id=<?= $user ?>">Редактировать</a></li></div> -->
                  
                    
                        <div class="follow__block"><a class="nav__btn follow__btn" href="lk-about.php?id=<?= $user ?>" >Редактировать </a></div>
                        <?php }} ?>
                </div>
                <ul>
                    <li class="footer__item"><a href="#" class="footer__link"><img  src="img/lksoc/inst.png" alt=""></a></li>
                    <li class="footer__item"><a href="#" class="footer__link"><img  src="img/lksoc/twi.png" alt=""></a></li>
                    <li class="footer__item"><a href="#" class="footer__link"><img  src="img/lksoc/facebook.png" alt=""></a></li>
                </ul>
                <hr>
               
                <p class="article__mintext">  <?php include('include/about.php'); ?></p>
                
              
                <hr>
                <!-- <ul class="k__ul lk__ul">
                    <li class="nav__item"> <h2 class="k__number">86 ETH</h2><h3 class="k__caption">Total Sales</h3></li>
                    <li class="nav__item"><h2 class="k__number">12K</h2><h3 class="k__caption">Followers</h3></li>
                    <li class="nav__item"> <h2 class="k__number">587</h2><h3 class="k__caption">Followings</h3></li>
                </ul> -->
              
                    <!-- <hr> -->
            </div>
            <div class="col-8 article__left">
                
                   <ul class="lk__list">
                    <li class="lk__item"><a class="lk__link lk__link__active " href="lk.php">Информация</a></li>
                    <li class="lk__item"><a class="lk__link" href="lk-add.php">Начисления</a></li>
                   </ul>


               
                   <?php 
			
            $sql = "SELECT *,
             CASE 
                    WHEN t1.academ = 1 THEN 'Академическая'
                    ELSE ''
                END AS academ,
                CASE 
                    WHEN t1.social = 1 THEN 'Социальная'
                    ELSE ''
                END AS social,
                CASE 
                    WHEN t1.upacadem = 1 THEN 'Повышенная академическая'
                    ELSE ''
                END AS upacadem,
                CASE 
                    WHEN t1.upsocial = 1 THEN 'Повышенная социальная'
                    ELSE ''
                END AS upsocial,
                CASE 
                    WHEN t1.military = 1 THEN 'Военная'
                    ELSE ''
                END AS military,
                CASE 
                    WHEN t1.namestep = 1 THEN 'Именная'
                    ELSE ''
                END AS namestep,
                CASE 
                    WHEN t1.president = 1 THEN 'Президентская'
                    ELSE ''
                END AS president,
                CASE 
                    WHEN t1.needhelp = 1 THEN 'Материальная поддержка'
                    ELSE ''
                END AS needhelp

            FROM students t1 
           
            JOIN user t2 ON (t1.student_id = t2.student_id )
            WHERE t2.id='$user' 
            ORDER BY t1.id;";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>
             <div class="article__block">
                        
                      
                       <p class="article__mintext" style="font-weight: bold">Курс обучения: </p>  <p class="article__mintext"><?=  $resArticle['course_number'] ?> </p> 
                       <p class="article__mintext" style="font-weight: bold">Степень обучения: </p>  <p class="article__mintext"><?=  $resArticle['education_degree'] ?> </p> 
                       <p class="article__mintext" style="font-weight: bold">Стипендии: </p>  <p class="article__mintext"><?= $resArticle['academ'] ?> <?= $resArticle['social'] ?> <?= $resArticle['upacadem'] ?>
                        <?= $resArticle['upsocial'] ?> <?= $resArticle['military'] ?> <?= $resArticle['namestep'] ?> <?= $resArticle['president'] ?>
                        <?= $resArticle['needhelp'] ?> </p> 
                        
                        <!-- <p class="article__mintext">Стипендии: <?= $resArticle['academ'] ?> <?= $resArticle['social'] ?> <?= $resArticle['upacadem'] ?>
                        <?= $resArticle['upsocial'] ?> <?= $resArticle['military'] ?> <?= $resArticle['namestep'] ?> <?= $resArticle['president'] ?>
                        <?= $resArticle['needhelp'] ?> -->
                    </div>
    <?php }} ?>

<!--            
                <div class="row">
                    <div class="col-3 project__item">
                        <a href="#" class="project__border"><img class="project__img" src="/img/mountains.png" alt=""></a>
                        <h2 class="project__title">Sun-Glass</h2>
                        <br>
                        <h3 class="project__category" >Current bid</h3>
                        <div class="project__price" >
                            <img class="project__logo" src="/img/currency.png" alt=""> 
                            <h2 class="">1.75</h2>
                        </div> 
                        <a href="#" class="nav__btn project__btn">Place Bid</a> 
                        <div class="row justify__content__between align__items__center">
                            <!-- <div class="col-auto">
                                <a class="lk__ed" href="lk-edit.php?id=<?= $resArticle['id'] ?>">Edit</a>
                                <a class="lk__del" href="admin/delete/project.php?id=<?= $resArticle['id'] ?>">Delete</a>
                            </div> -->
                            <!-- <div class="col-auto">
                                <ul>
                                    <li class="proect__like">79</li>
                                    <li class="proect__glass">4k</li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
              
             
      
              

                    
                </div>
                
            </div>
            
        </div>
    </div>
</article>   


    <?php include('include/footer.php'); ?>

   
</body>
</html>