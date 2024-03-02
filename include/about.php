<?php

	
            $sql = "SELECT * FROM `user` WHERE `id`='$user'";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {

            ?>    
                    
                    <div class="article__block">
                        
                        <img class="article__logo" src="uploads_images/<?=  $resArticle['image'] ?>" alt="">
                        <!-- <h2 class="article__name"><?=  $resArticle['name'] ?></h2> -->
                        <p class="article__mintext"><?=  $resArticle['text'] ?>
                        <p class="article__mintext"><?=  $resArticle['surname'] ?> <?=  $resArticle['name'] ?> <?=  $resArticle['patronymic'] ?>
                        <p class="article__mintext">
                        <p class="article__mintext">
                        <p class="article__mintext"> Номер телефона: <?=  $resArticle['phone'] ?>
                        <p class="article__mintext">Электронная почта: <?=  $resArticle['email'] ?>
                        <p class="article__mintext">Номер студенческого билета: <?=  $resArticle['student_id'] ?>
                        <li class="lk__item"><a class="lk__link" href="lk-about.php?id=<?= $user ?>">Редактировать</a></li>
                        </p>
                    </div>
    <?php }} ?>