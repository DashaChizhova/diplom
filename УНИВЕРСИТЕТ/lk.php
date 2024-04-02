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
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/setka.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
<?php include('include/nav.php'); ?>

<article class="article">
    <div class="container " >
        <div class=" lk__main_img">
            <div class="lk__img"></div> 
        </div>
        <div class="row ">
            <div class="col-4 lk__info">
                <?php include('include/lk_info.php'); ?>
            </div>
            <div class="col-8 article__left">
                <ul class="lk__list">
                    <li class="lk__item"><a class="lk__link lk__link__active " href="lk.php">Информация</a></li>
                    <?php 
                        if (isset($_SESSION['user']) && $_SESSION['user']['rights']=='user')  {
                    ?>  
                        <li class="lk__item"><a class="lk__link" href="lk-add.php">Начисления</a></li>
                    <?php  } ?>
                   
                </ul>
                <table  >
            <tr>
                <th>Курс обучения</th>
                <th>Степень обучения</th>
                <th>Средний балл</th>
                <th>Стипендии</th>
                
            </tr>
                
                <?php 
                    $sql = "SELECT *,
                    t3.student_score AS score,
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
                    JOIN score t3 ON (t1.student_id = t3.student_id )
                    WHERE t2.id='$user' 
                    ORDER BY t1.id;";
                    $res = $mysqli -> query($sql);

                    if($res -> num_rows > 0) {
                        while($resArticle = $res -> fetch_assoc()) {
                ?>
                    <!-- <div class="article__block">
                        <p class="article__mintext" style="font-weight: bold">Курс обучения: </p>  <p class="article__mintext"><?=  $resArticle['course_number'] ?> </p> 
                        <p class="article__mintext" style="font-weight: bold">Степень обучения: </p>  <p class="article__mintext"><?=  $resArticle['education_degree'] ?> </p> 
                        <p class="article__mintext" style="font-weight: bold">Средний балл: </p>  <p class="article__mintext"><?=  $resArticle['score'] ?> </p> 
                        <p class="article__mintext" style="font-weight: bold">Стипендии: </p>  
                        <p class="article__mintext">
                            <?= $resArticle['academ'] ?> <?= $resArticle['social'] ?> <?= $resArticle['upacadem'] ?>
                            <?= $resArticle['upsocial'] ?> <?= $resArticle['military'] ?> <?= $resArticle['namestep'] ?> 
                            <?= $resArticle['president'] ?> <?= $resArticle['needhelp'] ?> 
                        </p> 
                    </div> -->
                    <tr>
                   
                    <td><?=  $resArticle['course_number'] ?></td>
                    <td><?=  $resArticle['education_degree'] ?></td>
                    <td><?=  $resArticle['score'] ?> </td>
                    <td>  <?= $resArticle['academ'] ?> <?= $resArticle['social'] ?> <?= $resArticle['upacadem'] ?>
                            <?= $resArticle['upsocial'] ?> <?= $resArticle['military'] ?> <?= $resArticle['namestep'] ?> 
                            <?= $resArticle['president'] ?> <?= $resArticle['needhelp'] ?> </td>
                   
                </tr>
            <?php } } ?>	

        </table>
            </div>
        </div>
    </div>
</article>   

    <?php include('include/footer.php'); ?>
   
</body>
</html>