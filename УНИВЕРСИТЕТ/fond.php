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
</head>
<body>
    
<?php include('include/nav.php'); ?>

<section class="proect">
    <div class="container">
        <form action="">
            <div><input class="form__input" type="number" name="count_field" placeholder="Введите сумму" id="" value="" style="width: 20%">
            <li class="nav__item"><a href="#" class="nav__btn" id="count_btn" onclick="count_fond()">Рассчитать</a></li></div>
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
    </div>
</section>

<?php include('include/footer.php'); ?>
<script>
    const count_field = document.querySelector('input[name="count_field"]');
    const count_btn = document.querySelector('#count_btn');

    const count_academ = document.querySelector('#academ');
    const count_social = document.querySelector('#social');
    const count_needhelp = document.querySelector('#needhelp');
    const count_upacadem = document.querySelector('#upacadem');
    const count_upsocial = document.querySelector('#upsocial');
    const count_military = document.querySelector('#military');
    const count_namestep = document.querySelector('#namestep');
    const count_president = document.querySelector('#president');

    const january = document.querySelector('#january');
    const february_june = document.querySelector('#february_june');
    const july = document.querySelector('#july');
    const august = document.querySelector('#august');
    const september = document.querySelector('#september');
    const october = document.querySelector('#october');
    const november = document.querySelector('#november');
    const december = document.querySelector('#december');

    let all_procents = document.querySelectorAll('#procent');
 
    all_procents.forEach((procent) => procent.style.visibility = "hidden");

   
    function count_fond(){
        if (count_field.value.length == 0){
            alert('Сумма не заполнена');
        } else{
        const total_sum = count_field.value;

        count_academ.textContent = Math.ceil(total_sum * 0.4);
        count_social.textContent = Math.ceil(total_sum * 0.2);
        count_needhelp.textContent = Math.ceil(total_sum * 0.1);
        count_upacadem.textContent = Math.ceil(total_sum * 0.1);
        count_upsocial.textContent = Math.ceil(total_sum * 0.08);
        count_military.textContent = Math.ceil(total_sum * 0.04);
        count_namestep.textContent = Math.ceil(total_sum * 0.04);
        count_president.textContent = Math.ceil(total_sum * 0.04);

        january.textContent =  Math.ceil(total_sum * 0.065);
        february_june.textContent =  Math.ceil(total_sum * 0.061);
        july.textContent =  Math.ceil(total_sum * 0.053);
        august.textContent =  Math.ceil(total_sum * 0.058);
        september.textContent =  Math.ceil(total_sum * 0.066);
        october.textContent =  Math.ceil(total_sum * 0.07);
        november.textContent =  Math.ceil(total_sum * 0.073);
        december.textContent =  Math.ceil(total_sum * 0.087);
        
        all_procents.forEach((procent) => procent.style.visibility = "visible");
        }

        
    }

</script>
</body>
</html>