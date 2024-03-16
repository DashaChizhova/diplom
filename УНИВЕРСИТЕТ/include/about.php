<?php
    $sql = "SELECT * FROM `user` WHERE `id`='$user'";
    $res = $mysqli -> query($sql);

    if($res -> num_rows > 0) {
        while($resArticle = $res -> fetch_assoc()) {
?>    

<div class="article__block">
    <p class="article__mintext">
    <p class="article__mintext">
    <p class="article__mintext"> Номер телефона: <?=  $resArticle['phone'] ?>
    <p class="article__mintext">Электронная почта: <?=  $resArticle['email'] ?>
    <p class="article__mintext">Номер студенческого билета: <?=  $resArticle['student_id'] ?>
</div>

<?php }} ?>

 