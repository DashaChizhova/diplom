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

<!-- <section class="proect">
        <div class="container">
            <div class="row">

            <?php 
			
				$sql = "SELECT t1.id, t1.image, t1.likes, t1.glass, t2.image AS userimage, 
                t2.name AS username, t3.name AS category 
                FROM project t1 
                JOIN user t2 ON (t1.user_id = t2.id)
                 JOIN category t3 ON (t1.category_id = t3.id) 
                 ORDER BY t1.id;";
				$res = $mysqli -> query($sql);

				if($res -> num_rows > 0) {
					while($resArticle = $res -> fetch_assoc()) {
				
			?>
                <div class="col-4 proect__item">
                    <a href="article.php?id=<?= $resArticle['id'] ?>" class="proect__border"><img class="proect__img" src="uploads_images/<?= $resArticle['image'] ?>" alt=""></a>
                    <div class="row justify__content__between align__items__center">
                        <a href="#" class="col-auto">
                            <ul>
                                <li class="proect__inlain"><img class="proect__logo" src="uploads_images/<?= $resArticle['userimage'] ?>" alt=""></li>
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['username'] ?></h2></li>
                            </ul>
                        </a>
                        <div class="col-auto">
                            <a class="proect__category" href="#"><?= $resArticle['category'] ?></a>
                        </div>
                        <div class="col-auto">
                            <ul>
                                <li class="proect__like"><?= $resArticle['likes'] ?></li>
                                <li class="proect__glass"><?= $resArticle['glass'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } } ?>	
       
            </div>
        </div>
    </section> -->

    <section class="proect">
        <div class="container">

        <form action="">
        <div><input class="form__input" type="number" name="summa" placeholder="Введите сумму" id="" ></div>
        </form>
        
        <table >
            
 

    <tr>
       
        
       
        <!-- <th>Социальная</th>
        <th>Повышенная академическая</th>
        <th>Повышенная социальная</th>
        <th>Военная</th>
        <th>Именная</th>
        <th>Президентская</th>
        <th>Материальная поддержка</th> -->
    </tr>
  
    <?php 
			
            $sql = "SELECT COUNT(academ) AS count_academ
            
            -- SELECT COUNT(social) AS count_social,
            -- SELECT COUNT(upacadem) AS count_upacadem,
            -- SELECT COUNT(upsocial) AS count_upsocial,
            -- SELECT COUNT(military) AS count_military,
            -- SELECT COUNT(namestep) AS count_namestep,
            -- SELECT COUNT(president) AS count_president,
            -- SELECT COUNT(needhelp) AS count_needhelp
            FROM `students`
            WHERE academ;
               
          ";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>
          <tr>
          <td>Академическая </td>
          <td><p> </p> </td>
        <td><?= $resArticle['count_academ'] ?></td>
        <!-- <td><?= $resArticle['count_social'] ?></td>
        <td><?= $resArticle['count_upacadem'] ?></td>
        <td><?= $resArticle['count_upsocial'] ?></td>
        <td><?= $resArticle['count_military'] ?></td>
        <td><?= $resArticle['count_namestep'] ?></td>
        <td><?= $resArticle['count_president'] ?></td>
        <td><?= $resArticle['count_needhelp'] ?></td> -->
        
        </tr>
        <?php } } ?>	
        <?php 
			
            $sql = "SELECT COUNT(student_id) AS count_students
            
            -- SELECT COUNT(social) AS count_social,
            -- SELECT COUNT(upacadem) AS count_upacadem,
            -- SELECT COUNT(upsocial) AS count_upsocial,
            -- SELECT COUNT(military) AS count_military,
            -- SELECT COUNT(namestep) AS count_namestep,
            -- SELECT COUNT(president) AS count_president,
            -- SELECT COUNT(needhelp) AS count_needhelp
            FROM `students`;
               
          ";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>
          <tr>
          <td>Кол-во студентов</td>
          <td><p> </p> </td>
        <td><?= $resArticle['count_students'] ?></td>
        <!-- <td><?= $resArticle['count_social'] ?></td>
        <td><?= $resArticle['count_upacadem'] ?></td>
        <td><?= $resArticle['count_upsocial'] ?></td>
        <td><?= $resArticle['count_military'] ?></td>
        <td><?= $resArticle['count_namestep'] ?></td>
        <td><?= $resArticle['count_president'] ?></td>
        <td><?= $resArticle['count_needhelp'] ?></td> -->
        
        </tr>
        <?php } } ?>	
 


</table>                

        
        </div>
    </section>

    <?php include('include/footer.php'); ?>


</body>
</html>