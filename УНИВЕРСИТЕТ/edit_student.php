<?php 
session_start();
include('include/db_connect.php');
$student_id = $_GET["id"];
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
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $patronymic = $_POST["patronymic"];
    
    $student_id = $_POST["student_id"];
    $course_number = $_POST["course_number"];
    $education_degree = $_POST["education_degree"];

    
    $academ = isset($_POST['academ']) ? 1 : 0;
    $social = isset($_POST['social']) ? 1: 0;
    $upacadem = isset($_POST['upacadem']) ? 1: 0;
    $upsocial = isset($_POST['upsocial']) ? 1: 0;
    $military = isset($_POST['military']) ? 1 : 0;
    $namestep = isset($_POST['namestep']) ? 1: 0;
    $president = isset($_POST['president']) ? 1 : 0;
    $needhelp = isset($_POST['needhelp']) ? 1 : 0;
    
    
  
        
        
        $querynew = "surname='$surname', name='$name', patronymic='$patronymic'";
        $querynew2 = "student_id='$student_id', course_number='$course_number', education_degree='$education_degree',
        academ = '$academ',
        social = '$social',
        upacadem = '$upacadem',
        upsocial = '$upsocial',
        military = '$military',
        namestep = '$namestep',
        president = '$president',
        needhelp = '$needhelp'
        ";

        $update ="UPDATE user SET $querynew WHERE student_id='$student_id' ";
        $update_2 ="UPDATE students SET $querynew2 WHERE student_id='$student_id' ";

        $result = mysqli_query($mysqli, $update) or die("Ошибка " . mysqli_error($mysqli));
        $result2 = mysqli_query($mysqli, $update_2) or die("Ошибка " . mysqli_error($mysqli));
    
  
   

    }
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
 

        <form enctype="multipart/form-data" method="post">
        <?php
            $student_id = $_GET["id"];

            $sql = "SELECT *
            FROM user 
            WHERE student_id = $student_id 
            ";
            
            
            
            
            $res = $mysqli -> query($sql);

            if ($res -> num_rows === 1) {
                $resPost = $res -> fetch_assoc()
              
        ?>	
    
  
        <div><input class="form__input" type="text" name="surname" placeholder="Фамилия" id="" value="<?=  $resPost['surname'] ?>" ></div>
        <div><input class="form__input" type="text" name="name" placeholder="Имя" id="" value="<?=  $resPost['name'] ?>"></div>
        <div><input class="form__input" type="text" name="patronymic" placeholder="Отчество" id="" value="<?=  $resPost['patronymic'] ?>"></div>
        <?php  }  ?>
        <?php
            $student_id = $_GET["id"];

            $sql = "SELECT *
            FROM students 
            WHERE student_id = $student_id 
            ";
            
            
            
            
            $res = $mysqli -> query($sql);

            if ($res -> num_rows === 1) {
                $resPost = $res -> fetch_assoc()
              
        ?>	
        <div><input class="form__input" type="text" name="student_id" placeholder="" id="" value="<?=  $resPost['student_id'] ?>"></div>
        <div><input class="form__input" type="number" name="course_number" placeholder="Курс обучения" id="" max=5 min=1 value="<?=  $resPost['course_number'] ?>"></div>
        <div>
            <select class="form__input" type="" name="education_degree" placeholder="Степень обучения" id="">
                <option value="<?=  $resPost['education_degree'] ?>"><?=  $resPost['education_degree'] ?></option>
                <option value="Бакалавриат/Спец">Бакалавриат/Спец</option>
                <option value="Магистратура">Магистратура</option>
                <option value="Аспирантура">Аспирантура</option>
            </select>
        </div>
        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="academ" value="<?=  $resPost['academ'] ?>" />Академическая</div>
        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="social" value="<?=  $resPost['social'] ?>" />Социальная</div>
        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="upacadem" value="<?=  $resPost['upacadem'] ?>" />Повышенная академическая</div>
        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="upsocial" value="<?=  $resPost['upsocial'] ?>" />Повышенная социальная</div>
        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="military" value="<?=  $resPost['military'] ?>" />Стипендия военной кафедры</div>
        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="namestep" value="<?=  $resPost['namestep'] ?>" />Именная стипендия</div>
        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="president" value="<?=  $resPost['president'] ?>" />Стипендия президента</div>
        <div class="title-lite"><input type="checkbox" id="checkbox" class="checkbox" name="needhelp" value="<?=  $resPost['needhelp'] ?>" />Нуждается в материальной поддержке</div>
                    
        <?php  }  ?>
        <input class="form__btn" name="submit_add" type="submit" value="Сохранить">
        </form>
    </div>
</section>

<?php include('include/footer.php'); ?>

<script src="js/selection.js"></script>
<script>
    const all_checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    all_checkboxes.forEach(checkbox=> {checkbox.value == "1"? checkbox.checked=true:checkbox.checked=false});
    
</script>
</body>
</html>