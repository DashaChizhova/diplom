<?php 
session_start();
include('include/db_connect.php');

if(isset($_POST['value_field'])){
    $student_value  = $_POST['value_field']; 
   
}
else {
    unset($_POST['student_value']);
}


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
    <title>Список студентов</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/setka.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
<?php include('include/nav.php'); ?>

<section class="proect">
    <div class="container">
        <div class="row bread">
            <form  method="post" action="found_student.php">
                <!-- <select  id="userType" onchange="showUsers()">
                    <option value="registered">Зарегистрированные</option>
                    <option value="unregistered">Незарегистрированные</option>
                    <option value="all">Все</option>
                </select> -->
                <input class="form__input" type="number" name="value_field" placeholder="Номер студенческого" id="" value="" >
                <!-- <li class="nav__item"><a href="#" class="nav__btn" type="submit" id="count_btn" onclick="showStudent()">Найти</a></li> -->
                <input class="form__btn" type="submit"  onclick="showStudent()" value="Найти">   
            </form>
        </div>
        <table id="registeredUsers" >
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
                <th>Средний балл</th>
            </tr>
            <?php 
                $sql = "SELECT *,
                    ROW_NUMBER() OVER (ORDER BY t1.id) AS row_number,
                    t2.name AS studentsname,
                    t2.patronymic AS patronymic,
                    t2.surname AS surname,
                    t3.student_score AS score,
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
                    JOIN score t3 ON t1.student_id = t3.student_id ";
                
                $res = $mysqli -> query($sql);

                if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
            ?>
                <tr>
                    <td style="background-color: #cfcfcf" ><?= $resArticle['row_number'] ?>    </td>
                    <td><?= $resArticle['surname'] ?> <?= $resArticle['studentsname'] ?> <?= $resArticle['patronymic'] ?></td>
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
                    <td><?= $resArticle['score'] ?></td>
                  <td class="td_button"><a href='edit_student.php?id=<?= $resArticle['student_id'] ?>'><img class="foto_reg" src="img/icons8-перьевая-ручка-64.png" alt=""> </a></td>
                  <td class="td_button"><a href='#'><img class="foto_reg" src="img/del.png" alt=""> </a></td>
                 
                </tr>
            <?php  } } ?>	

        </table>
        <!-- <table id="student_table" >
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
                <th>Средний балл</th>
            </tr>
            <?php 
              
                $sql = "SELECT *,
                    ROW_NUMBER() OVER (ORDER BY t1.id) AS row_number,
                    t2.name AS studentsname,
                    t2.patronymic AS patronymic,
                    t2.surname AS surname,
                    t3.student_score AS score,
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
                    JOIN score t3 ON t1.student_id = t3.student_id
                    WHERE t1.student_id = '$student_value' ";
                
                $res = $mysqli -> query($sql);

                if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
            ?>
                <tr>
                    <td style="background-color: #cfcfcf" ><?= $resArticle['row_number'] ?>    </td>
                    <td><?= $resArticle['surname'] ?> <?= $resArticle['studentsname'] ?> <?= $resArticle['patronymic'] ?></td>
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
                    <td><?= $resArticle['score'] ?></td>
                  <td class="td_button"><a href='edit_student.php?id=<?= $resArticle['student_id'] ?>'><img class="foto_reg" src="img/icons8-перьевая-ручка-64.png" alt=""> </a></td>
                  <td class="td_button"><a href='edit_student.php?id=<?= $resArticle['student_id'] ?>'><img class="foto_reg" src="img/del.png" alt=""> </a></td>
                 
                </tr>
            <?php  } } ?>	
           
            <script>
                function showStudent(){
                    const student_table = document.getElementById('student_table');
                    student_table.classList.remove("hidden");
                    document.getElementById("registeredUsers").classList.add("hidden");
                    
                }
            </script>

        </table> -->

        <!-- <table id="unregisteredUsers" class="hidden">
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
                t1.student_id AS student_id,
                    t2.name AS studentsname,
                
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
            
                    LEFT JOIN user t2 ON t1.student_id = t2.student_id 
                    WHERE  t2.name IS NULL";
                    $res = $mysqli -> query($sql);
        
                    if($res -> num_rows > 0) {
                        while($resArticle = $res -> fetch_assoc()) {
            ?>
            <tr>
                <td><?= $resArticle['row_number'] ?></td>
                <td> <?= $resArticle['studentsname'] ?>  </td>
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
        </table>
        <table id="all" class="hidden" >
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
                t1.student_id AS student_id,
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
            
                    LEFT JOIN user t2 ON t1.student_id = t2.student_id 
                    ";
                    $res = $mysqli -> query($sql);
        
                    if($res -> num_rows > 0) {
                        while($resArticle = $res -> fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $resArticle['row_number'] ?></td>
                    <td> <?= $resArticle['surname'] ?> <?= $resArticle['studentsname'] ?> <?= $resArticle['patronymic'] ?> </td>
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

        </table> -->
    </div>
</section>

<?php include('include/footer.php'); ?>

<script src="js/selection.js"></script>
</body>
</html>