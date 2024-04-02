<?php 
session_start();
include('include/db_connect.php');

if(isset($_SESSION['user']['id'])){
    $user = $_SESSION['user']['id']; 
}
else {
    echo 'User is empty';
}



if (isset($_POST["submit_add"]))
    {
      $error = array();
      if (count($error))
       {           
            $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";  
       }else
       {
$title = $_POST['title'];
$subtitle = $_POST['subtitle']; $text = $_POST['text'];
$date = $_POST['date']; $time = $_POST['time'];
$category_id = $_POST['category_id']; $user_id = $user;
    
	$query ="INSERT INTO project (  title, subtitle, text, date, time, user_id, category_id  ) 
    VALUES ( '".mysqli_real_escape_string($mysqli, $title)."', 
    '".mysqli_real_escape_string($mysqli, $subtitle)."',
    '".mysqli_real_escape_string($mysqli, $text)."',
    '".mysqli_real_escape_string($mysqli, $date)."',
    '".mysqli_real_escape_string($mysqli, $time)."',
    '".mysqli_real_escape_string($mysqli, $user_id)."',
    '".mysqli_real_escape_string($mysqli, $category_id)."'
    )";
 
$result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 

$id = mysqli_insert_id($mysqli);
if (empty(isset($_POST["upload_image"])))
{        
include("admin/action/project_image.php");
unset($_POST["upload_image"]);           
} 
	  
  } }

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
        <div class=" lk__main_img">
            <div class="lk__img"></div> 
        </div>
        <div class="row ">
            <div class="col-4 lk__info">
                <?php include('include/lk_info.php'); ?>
            </div>
            <div class="col-8 article__left">
                <ul class="lk__list">
                    <li class="lk__item"><a class="lk__link  " href="lk.php">Информация</a></li>
                    <li class="lk__item"><a class="lk__link lk__link__active" href="lk-add.php">Начисления</a></li>
                </ul>
                <table  >
            <tr>
                
                <th>Стипендия</th>
                
            </tr>
                
                <?php 
                    $sql = "SELECT
                  
                    SUM(total_sum) AS grand_total
                    FROM (
                        SELECT 
                       
                        (CASE 
                            WHEN academ = 1 THEN 1700
                            ELSE 0
                        END) 
                        +
                        (CASE 
                            WHEN social = 1 THEN 3500
                            ELSE 0
                        END) 
                        +
                        (CASE 
                            WHEN upacadem = 1 THEN 11500
                            ELSE 0
                        END) 
                        +
                        (CASE 
                            WHEN upsocial = 1 THEN 10500
                            ELSE 0
                        END)
                        +
                        (CASE 
                            WHEN military = 1 THEN 4400
                            ELSE 0
                        END)
                        +
                        (CASE 
                            WHEN namestep = 1 THEN 11875
                            ELSE 0
                        END) 
                        +
                        (CASE 
                            WHEN president = 1 THEN 3000
                            ELSE 0
                        END) 
                        +
                        (CASE 
                            WHEN needhelp = 1 THEN 4000
                            ELSE 0
                        END) AS total_sum
                        FROM students t1
                        JOIN user t2 ON (t1.student_id = t2.student_id )
                        WHERE t2.id='$user' 
                        ) AS subquery

                  
                   
                  
                    ";
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
                   
                    <td><?=  $resArticle['grand_total'] ?> руб</td>
                    <!-- <td><?=  $resArticle['education_degree'] ?></td>
                    <td><?=  $resArticle['score'] ?> </td>
                    <td>  <?= $resArticle['academ'] ?> <?= $resArticle['social'] ?> <?= $resArticle['upacadem'] ?>
                            <?= $resArticle['upsocial'] ?> <?= $resArticle['military'] ?> <?= $resArticle['namestep'] ?> 
                            <?= $resArticle['president'] ?> <?= $resArticle['needhelp'] ?> </td> -->
                   
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