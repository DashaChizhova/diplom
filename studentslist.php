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
            <div class="column">

            <?php 
			
				$sql = "SELECT *,
                 ROW_NUMBER() OVER (ORDER BY id) AS row_number,
                    CASE 
                        WHEN academ = 1 THEN 'Да'
                        ELSE '-'
                    END AS academ
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
                        
                      
                    </div>
                </div>
                <?php } } ?>	
       
            </div>
        </div>
    </section> -->

    <section class="proect">
        <div class="container">


        <table >
            
 

    <tr>
        <th>№</th>

        
        <th>ФИО</th>

        <th>Студенческий</th>
        <th>Курс</th>
        <th>Степень обучения</th>
        <th>Академическая</th>
        <th>Социальная</th>
        <th>Повышенная академическая</th>
        <th>Повышенная социальная</th>
        <th>Военная</th>
        <th>Именная</th>
        <th>Президентская</th>
        <th>Материальная поддержка</th>
    </tr>
  
    <?php 
			
            $sql = "SELECT *,
             ROW_NUMBER() OVER (ORDER BY t1.id) AS row_number,
                t2.name AS studentsname,
                t2.patronymic AS patronymic,
                t2.surname AS surname,
                CASE 
                    WHEN t1.academ = 1 THEN 'Да'
                    ELSE '-'
                END AS academ,
                CASE 
                    WHEN t1.social = 1 THEN 'Да'
                    ELSE '-'
                END AS social,
                CASE 
                    WHEN t1.upacadem = 1 THEN 'Да'
                    ELSE '-'
                END AS upacadem,
                CASE 
                    WHEN t1.upsocial = 1 THEN 'Да'
                    ELSE '-'
                END AS upsocial,
                CASE 
                    WHEN t1.military = 1 THEN 'Да'
                    ELSE '-'
                END AS military,
                CASE 
                    WHEN t1.namestep = 1 THEN 'Да'
                    ELSE '-'
                END AS namestep,
                CASE 
                    WHEN t1.president = 1 THEN 'Да'
                    ELSE '-'
                END AS president,
                CASE 
                    WHEN t1.needhelp = 1 THEN 'Да'
                    ELSE '-'
                END AS needhelp
              
                FROM students t1 
           
                JOIN user t2 ON t1.student_id = t2.student_id 
               
          ";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>
          <tr>
          <td><?= $resArticle['row_number'] ?></td>

          <td><?= $resArticle['surname'] ?> <?= $resArticle['studentsname'] ?> <?= $resArticle['patronymic'] ?> </td>
      
       
        <td><?= $resArticle['student_id'] ?></td>
        <td><?= $resArticle['course_number'] ?></td>
        <td><?= $resArticle['education_degree'] ?></td>
        <td><?= $resArticle['academ'] ?></td>
        <td><?= $resArticle['social'] ?></td>
        <td><?= $resArticle['upacadem'] ?></td>
        <td><?= $resArticle['upsocial'] ?></td>
        <td><?= $resArticle['military'] ?></td>
        <td><?= $resArticle['namestep'] ?></td>
        <td><?= $resArticle['president'] ?></td>
        <td><?= $resArticle['needhelp'] ?></td>
        </tr>
        <?php } } ?>	
 

    <!-- Добавьте другие записи по аналогии -->
</table>




        </div>
    </section>

    <?php include('include/footer.php'); ?>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>

</body>
</html>