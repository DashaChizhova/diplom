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

<section class="proect">
        <div class="container">
            <div class="column">

            <?php 
			
				$sql = "SELECT *,
                 ROW_NUMBER() OVER (ORDER BY id) AS row_number
                FROM `students`
               ";
				$res = $mysqli -> query($sql);

				if($res -> num_rows > 0) {
					while($resArticle = $res -> fetch_assoc()) {
				
			?>
                <div class=" proect__item">
                  
                    <div class="row justify__content__between align__items__center">
                        <a href="#" class="col-auto">
                     
                            <ul>
                            <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['row_number'] ?></h2></li>
                           
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['student_id'] ?></h2></li>
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['course_number'] ?> курс</h2></li>
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['education_degree'] ?></h2></li>

                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['academ'] ?></h2></li>
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['social'] ?></h2></li>
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['upacadem'] ?></h2></li>

                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['upsocial'] ?></h2></li>
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['military'] ?></h2></li>
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['namestep'] ?></h2></li>
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['president'] ?></h2></li>
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['needhelp'] ?></h2></li>
                            </ul>
                        </a>
                        
                        <!-- <div class="col-auto">
                            <ul>
                                <li class="proect__like"><?= $resArticle['likes'] ?></li>
                                <li class="proect__glass"><?= $resArticle['glass'] ?></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <?php } } ?>	
       
            </div>
        </div>
    </section>


    <?php include('include/footer.php'); ?>


</body>
</html>