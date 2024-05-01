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
    <title>Стипендиальный фонд</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/setka.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- <script src="СТТ/app.js"></script> -->
</head>
<body>
    
<?php include('include/nav.php'); ?>

<section class="proect">
    <div class="container">
        <form enctype="multipart/form-data" method="post" action="include/fond.php">
            <div><input class="form__input" type="number" name="count_field" placeholder="Введите сумму" id="" value="" style="width: 20%">
            <li class="nav__item"><a href="#" class="nav__btn" id="count_btn" onclick="count_fond()">Рассчитать</a></li>
           <!-- <li class="nav__item"> <input class="form__btn" type="submit" value="Добавить в базу">   </li>  </div> -->
            <br>
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
            <tr>
                <th class="article__mintext">Вид стипендии</th>
                <th >тыс.руб.</th>
                <th >%</th>
            </tr>
            <tr>
                <td>Академическая </td>
                <td id="academ"></td>
                <td id="procent"> 40</td>
            </tr>
            <tr>
                <td>Социальная </td>
                <td id="social"></td>
                <td id="procent"> 20</td>
            </tr>
            <tr>
                <td>Повышенная академическая</td>
                <td id="upacadem"></td>
                <td id="procent"> 10</td>
            </tr>
            <tr>
                <td>Повышенная социальная </td>
                <td id="upsocial"></td>
                <td id="procent"> 8</td>
            </tr>
            <tr>
                <td>Военная </td>
                <td id="military"></td>
                <td id="procent">  4</td>
            </tr>
            <tr>
                <td>Именная </td>
                <td id="namestep"></td>
                <td id="procent">  4</td>
            </tr>
            <tr>
                <td>Президентская </td>
                <td id="president"></td>
                <td id="procent"> 4</td>
            </tr>
            <tr>
                <td>Материальная поддержка </td>
                <td id="needhelp"></td>
                <td id="procent"> 10</td>
            </tr>
       
           
           
            <?php 
                $sql = "SELECT COUNT(student_id) AS count_students
                -- SELECT COUNT(social) AS count_social,
                -- SELECT COUNT(upacadem) AS count_upacadem,
                -- SELECT COUNT(upsocial) AS count_upsocial,
                -- SELECT COUNT(military) AS count_military,
                -- SELECT COUNT(namestep) AS count_namestep,
                -- SELECT COUNT(president) AS count_president,
                -- SELECT COUNT(needhelp) AS count_needhelp
                FROM `students`; ";

                $res = $mysqli -> query($sql);

                if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
            ?>
            <!-- <tr>
                <td>Кол-во студентов</td>
                <td><?= $resArticle['count_students'] ?></td>
            </tr> -->
            <?php } } ?>	
        </table>   
        
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
          
            <tr>
                <th>Январь</th>
                <th>Февраль - Июнь</th>
                <th>Июль</th>
                <th>Август</th>
                <th>Сентябрь</th>
                <th>Октябрь</th>
                <th>Ноябрь</th>
                <th>Декабрь</th>
            </tr>
            <tr>
            <td id="january"></td>
            <td id="february_june"></td>
            <td id="july"></td>
            <td id="august"></td>
            <td id="september"></td>
            <td id="october"></td>
            <td id="november"></td>
            <td id="december"></td>
            </tr>
        
           
           
           
        </table>     
        <!-- <button id="sendDataBtn">Отправить данные</button> -->
    </div>
</section>

<?php include('include/footer.php'); ?>
<script src="js/count_fond.js"></script>

</body>
</html>