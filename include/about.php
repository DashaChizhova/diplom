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

    <?php 
			
            $sql = "SELECT *
            FROM students t1 
           
            JOIN user t2 ON (t1.student_id = t2.student_id )
            WHERE t2.id='$user'
            ORDER BY t1.id;";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>
             <div class="article__block">
                        
                      
                        <p class="article__mintext">Курс обучения: <?=  $resArticle['course_number'] ?>
                        <p class="article__mintext">Степень обучения: <?=  $resArticle['education_degree'] ?>
                        <p class="article__mintext">Стипендии: <?= $resArticle['academ'] ?> <?= $resArticle['social'] ?> <?= $resArticle['upacadem'] ?>
                        <?= $resArticle['upsocial'] ?> <?= $resArticle['military'] ?> <?= $resArticle['namestep'] ?> <?= $resArticle['president'] ?>
                        <?= $resArticle['needhelp'] ?>
                    </div>
    <?php }} ?>
