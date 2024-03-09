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
        <div class="container">
            <div class="row bread">
                <!-- <ul>
                    <li class="bread__item"><a class="bread__link" href="index.php">Home</a></li>
                    <li class="bread__item"><img class="bread__img" src="img/ic_outline-keyboard-arrow-right.svg" alt=""></li>
                    <li class="bread__item"><p class="bread__name">Personal account</p></li>
                </ul> -->
            </div>
            <div class="row">
                
                <div class="col-4">
                <?php include('include/about.php'); ?>
                </div>
                <div class="col-8 article__left">
                    
                       <ul class="lk__list">
                       <li class="lk__item"><a class="lk__link lk__link__active" href="lk-add.php">Информация</a></li>
                       <!-- <li class="lk__item"><a class="lk__link" href="#">Начисления</a></li> -->
                        <li class="lk__item"><a class="lk__link " href="lk.php">Начисления</a></li>
                        <li class="lk__item"><a class="lk__link" href="lk-add.php">Add a project</a></li>
                        <!-- <li class="lk__item"><a class="lk__link" href="lk-about.php?id=<?= $user ?>">About</a></li> -->
                       
                       </ul>


                       <div class="row">

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
                        
                      
                        <p class="article__mintext">Курс обучения: <?=  $resArticle['course_number'] ?>
                        <p class="article__mintext">Степень обучения: <?=  $resArticle['education_degree'] ?>
                        <p class="article__mintext">Стипендии: <?= $resArticle['academ'] ?> <?= $resArticle['social'] ?> <?= $resArticle['upacadem'] ?>
                        <?= $resArticle['upsocial'] ?> <?= $resArticle['military'] ?> <?= $resArticle['namestep'] ?> <?= $resArticle['president'] ?>
                        <?= $resArticle['needhelp'] ?>
                    </div>
    <?php }} ?>


                       <!-- <?php 
			$user = $_SESSION['user']['id'];
            $sql = "SELECT * FROM `project` WHERE `user_id`='$user'";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>
                        <div class="col-6 proect__item">
                            <a href="#" class="proect__border"><img class="proect__img" src="uploads_images/<?=  $resArticle['image'] ?>" alt=""></a>
                            <div class="row justify__content__between align__items__center">
                                <div class="col-auto">
                                    <a class="lk__ed" href="lk-edit.php?id=<?= $resArticle['id'] ?>">Edit</a>
                                    <a class="lk__del" href="admin/delete/project.php?id=<?= $resArticle['id'] ?>">Delete</a>
                                </div>
                                <div class="col-auto">
                                    <ul>
                                        <li class="proect__like">79</li>
                                        <li class="proect__glass">4k</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } } ?> -->

                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </article>

    <?php include('include/footer.php'); ?>


</body>
</html>