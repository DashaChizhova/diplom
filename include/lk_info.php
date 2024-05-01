<?php
                    $sql = "SELECT * FROM `user` WHERE `id`='$user'";
                    $res = $mysqli -> query($sql);

                    if($res -> num_rows > 0) {
                        while($resArticle = $res -> fetch_assoc()) {
                ?>    
                <img class="article__logo" src="<?=  $resArticle['image'] ?>" alt="">
                <div class="article_info">
                    <div><h2 class="article__name"> <br> <?=  $resArticle['name'] ?> <?=  $resArticle['surname'] ?></h2></div >
                    <div class="follow__block"><a class="red__btn" href="lk-about.php?id=<?= $user ?>" ><img class="foto_reg" src="img/icons8-перьевая-ручка-64.png" alt=""> </a></div>
                    <?php }} ?>
                </div>
                <ul>
                    <li class="footer__item"><a href="#" class="footer__link"><img  src="img/lksoc/inst.png" alt=""></a></li>
                    <li class="footer__item"><a href="#" class="footer__link"><img  src="img/lksoc/twi.png" alt=""></a></li>
                    <li class="footer__item"><a href="#" class="footer__link"><img  src="img/lksoc/facebook.png" alt=""></a></li>
                </ul>
                <hr>
                <p class="article__mintext">  <?php include('include/about.php'); ?></p>
                <hr>