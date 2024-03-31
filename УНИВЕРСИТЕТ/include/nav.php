<nav class="nav">
    <div class="container-full">
        <div class="row justify__content__between align__items__center">
            <div class="col-auto">
                <ul>
                    <li class="nav__item"><a href="index.php" class="nav__link__logo">СТИПЕНДИУМ</a></li>
                    <li class="nav__item"><a href="index.php" class="nav__link">Главная</a></li>
                    <?php   if  (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['rights'] =='user')  { ?>
                        <li class="nav__item"><a href="calculator.php" class="nav__link" target="_blank">Калькулятор</a></li>
                    <?php } ?>
                    <?php 
                        if (isset($_SESSION['user']) && $_SESSION['user']['rights']=='user')  {
                    ?>  
                        <!-- <li class="nav__item"><a href="#"class="nav__link">Начисления</a></li> -->
                    <?php  }  else if  (isset($_SESSION['user']) && $_SESSION['user']['rights']=='admin')  { ?>
                        <li class="nav__item"><a href="studentslist.php"class="nav__link">Список студентов</a></li>
                        <li class="nav__item"><a href="fond.php"class="nav__link">Годовой фонд</a></li>
                        <li class="nav__item"><a href="reg2.php"class="nav__link">Создать студента</a></li>
                        <li class="nav__item"><a href="add_news.php"class="nav__link">Добавить новость</a></li>
                        <?php } ?>
                </ul>
            </div>
            <div class="col-auto">
                <ul>
                    <?php 
                            if(isset($_SESSION['user'])){
                                $sql = "SELECT * FROM `user` WHERE `id`='$user'";
                                $res = $mysqli -> query($sql);
                    
                                if($res -> num_rows > 0) {
                                    while($resArticle = $res -> fetch_assoc()) {
                    ?>  
                        <li class="nav__item"><a href="lk.php" class="nav__sign"><img style="width: 28px; height: 27px; vertical-align: middle; margin-right: 7px; border-radius: 50%; object-fit: cover;" src="<?=  $resArticle['image'] ?>" alt=""><?=  $resArticle['name'] ?> <?=  $resArticle['surname'] ?></a></li>
                        <li class="nav__item"><a href="include/logout.php" class="nav__btn">Выход</a></li>
                    <?php  } } } else { ?>
                        <li class="nav__item"><a href="aut.php" class="nav__sign">Авторизоваться</a></li>
                        <li class="nav__item"><a href="reg.php" class="nav__btn">Регистрация</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
