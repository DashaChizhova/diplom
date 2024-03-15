<?php 
    session_start();
    include('include/db_connect.php'); 
    if(isset($_SESSION['user']['id'])){
        $user = $_SESSION['user']['id']; 
    }
  
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

<header class="header">
        <div class="container">
            <div class="row align__items__center">
                <div class="header__utp">
                    <hr class="header__hr">
                    <br>
                    <h1 class="header__title">Онлайн Стипендия</h1>
                    <!-- <h1 class="header__title">Стипендия</h1> -->
                    <h2 class="header__subtitle">Узнайте всю информацию о своей стипендии </h2>
                    <br>
                    <?php 
                            if (!isset($_SESSION['user']) )  {
                        ?>  
                    <li class="nav__item"><a href="aut.php" class="nav__btn">ВОЙТИ</a></li>
                    <?php } ?>
                    <!-- <li class="nav__item"><a href="reg.php" class="nav__btn nav__btn2 ">Create NFT</a></li> -->

                    <!-- <ul class="k__ul">
                        <li class="nav__item"> <h2 class="k__number">430K+</h2><h3 class="k__caption">Art Works</h3></li>
                        <li class="nav__item"><h2 class="k__number">159K+</h2><h3 class="k__caption">Creators</h3></li>
                        <li class="nav__item"> <h2 class="k__number">87K+</h2><h3 class="k__caption">Collections</h3></li>
                    </ul> -->
                </div>

                <div class="header__utp header__imgs">
                  <img class="header__img header__img1" src="uploads_images/student.png" alt="nft">
                  <img class="header__img header__img2" src="uploads_images/ava.png" alt="nft">
                 
                 
                    <!-- <div class="arrow">
                        <a href="reg.php" class="head__btn head__btn__left">←</a>
                        <a href="reg.php" class="head__btn head__btn__right">→</a>
                   </div> -->
                
                </div>
            </div>
        </div>
    </header>

    <!-- <header class="header">
        <div class="container">
            <div class="header__category">
              
            </div>
            <div class="header__utp">
                <h1 class="header__title">Explore the world’s leading <br> design portfolios</h1>
                <h2 class="header__subtitle">Millions of designers and agencies around the world showcase their portfolio work on Dribbble - the<br> home to the world’s best design and creative professionals.</h2>
            </div>
            <div class="header__search">
                <form action="header__form">
                    <input type="search" class="header__form-input" name="" placeholder="Search..." id="">
                </form>
                <ul class="header__tag">
                    <li class="header__tag-item"><p class="header__tag-text">Trending searches</p></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">landing page</a></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">ios</a></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">food</a></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">landingpage</a></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">uxdesign</a></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">app design</a></li>
                </ul>
            </div>
        </div>
    </header> -->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- <section class="project project1">
        <div class="main__title main__title1">
          
        </div>
        <div class="container">
          <div class="row justify__content__between align__items__center ">
          
            <?php 
			
            $sql = "SELECT *
            FROM project 
            ";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>  <a href="#" class="project__border">
               <div class="project__item">
                  <img class="project__img" src="img/<?= $resArticle['image'] ?>" alt="">
                  <div style="width: 50%">
                  <h2 class="project__title"><?= $resArticle['title'] ?></h2>
                        <br>
                        <h3 class="project__price" ><?= $resArticle['text'] ?></h3>
                  </div> -->
                        
                        <!-- <div class="project__price" >
                            <img class="project__logo" src="img/<?= $resArticle['image'] ?>" alt=""> 
                            <h2 class="">1.75</h2>
                        </div>  -->
                        <!-- <a href="#" class="nav__btn project__btn">Place Bid</a>  -->
<!--                    
                    </div>
                    </a>
                    <?php } } ?>
          
         	
        </div>
        </div>
      
       <div class="arrow">
            <a href="reg.php" class="head__btn head__btn__left">←</a>
            <a href="reg.php" class="head__btn head__btn__right">→</a>
         
          
       </div>
       <?php  if  (isset($_SESSION['user']) && $_SESSION['user']['rights']=='admin')  { ?>


<li class="nav__item"><a href="add_news.php" class="nav__btn">Добавить новость</a></li>
<?php } ?>
           
    </section> -->




<!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->




    <section class="project project1">
        <div class="main__title main__title1">
           <!-- <h1>Новости и объявления</h1> -->
        </div>
        <div class="container slider">
          <div class="row slide">
                  
        <div class="header__utp header__imgs">
                  <img class="project__img " src="" alt=""></div>
                  <div class="header__utp" >
                        <h2 class="project__title"></h2>
                        <br>
                        <h3 class="project__price" ></h3>
                  </div>
                        
                </div>
            </div>
        </a>
                  
          
         	
        </div>
        </div>
      
       <div class="arrow">
            <button class="head__btn head__btn__left">←</button>
            <button class="head__btn head__btn__right">→</button>
         
          
       </div>
       <?php  if  (isset($_SESSION['user']) && $_SESSION['user']['rights']=='admin')  { ?>


<li class="nav__item"><a href="add_news.php" class="nav__btn">Добавить новость</a></li>
<?php } ?>
           
    </section>
           
           
           
           
           
           
           
           
           
           
           
           <?php 
			
            $sql = "SELECT *
            FROM project 
            ";
            $res = $mysqli -> query($sql);


            $slidesData = array();
            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
                    $slidesData[] = $resArticle;
                }
            }
?>
            <script>
                const slidesData = <?php echo json_encode($slidesData); ?>; //json_encode - это функция в PHP, которая преобразует данные в формат JSON. 

                const slider = document.querySelector('.slider');
                const prevBtn = document.querySelector('.head__btn__left');
                const nextBtn = document.querySelector('.head__btn__right');
                let currentSlide = 1;

                function showSlide(index){
                    const slide = slider.querySelector('.slide');
                    const image = slider.querySelector('.project__img');
                    const title = slide.querySelector('.project__title');
                    const text = slide.querySelector('.project__price');

                    image.src =  slidesData[index].image;
                    title.textContent = slidesData[index].title;
                    text.textContent = slidesData[index].text;
                }

                showSlide(currentSlide);

                prevBtn.addEventListener('click', () => {
                    currentSlide = (currentSlide - 1 + slidesData.length) % slidesData.length;
                    showSlide(currentSlide);
                });
                nextBtn.addEventListener('click', () => {
                    currentSlide = (currentSlide + 1) % slidesData.length;
                    showSlide(currentSlide);
                });

            </script>



    



































    <!-- <section class="project project1" style="background-color: white">
        <div class="main__title main__title1">
           <h1>Условия получения стипендий</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-3 project__item">
                    <a href="#" class="project__border"><img class="project__img" src="img/mountains.png" alt=""></a>
                        <h2 class="project__title"></h2>
                        <br>
                        <h3 class="project__category" >Current bid</h3>
                        <div class="project__price" >
                            <img class="project__logo" src="img/currency.png" alt=""> 
                            <h2 class="">1.75</h2>
                        </div> 
                        <a href="#" class="nav__btn project__btn">Place Bid</a> 
                </div>
            </div>
        </div> -->
       <!-- <div class="arrow">
            <a href="reg.php" class="head__btn head__btn__left">←</a>
            <a href="reg.php" class="head__btn head__btn__right">→</a>
       </div> -->
           
    <!-- </section> -->
    <section class="project project1 " style="background-color: white">
        <div class="main__title main__title1">
           <h1>Контактная информация</h1>
        </div>
        <div class="container ">
        <div class="row justify__content__between align__items__center">
        <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/org/ivanovskiy_gosudarstvenny_universitet_korpus_1/240938650644/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Ивановский государственный университет, корпус № 1</a><a href="https://yandex.ru/maps/5/ivanovo/category/university/184106140/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">ВУЗ в Иванове</a><iframe src="https://yandex.ru/map-widget/v1/?ll=40.957982%2C57.018631&mode=poi&poi%5Bpoint%5D=40.958177%2C57.019122&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D240938650644&z=18" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
        </div>
       
        </div>
       </section>

    <!-- <section class="proect">
        <div class="container">
            <div class="row">

             
       
            </div>
        </div>
    </section> -->

    <!-- <?php 
        if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['rights']=='user')  {
    ?>  
    <div class="calculator__btn__block">
            <a class="nav__btn calculator__btn"  href="calculator.php" target="_blank">Калькулятор</a>
          </div>
<?php } ?> -->
    <?php include('include/footer.php'); ?>



    

</body>
<style>
    .main__title{
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000000;
    font-size: 30px;
    font-weight: 750;
    line-height: 40px;
    margin-bottom: 60px;
}
.main__title1{
    color: #C5C5C5;
}
.project {
    padding-top: 100px;
    background-color: #F9F9F9;
    padding-bottom: 100px;
}
.project1{
    background-color: #efefef;
}
.project__item {
    margin-bottom: 36px;
    /* background-color: #ffffff; */
    border-radius: 23px;
    color: #000000;
    text-align: center;
   
    padding: 30px  20px;
    /* box-shadow: 0px 5px 10px rgb(196, 199, 200); */
   
display: flex;
justify-content: space-around;
align-items: center;
   
   
}

.project__item .col-auto {
    padding: 0px;
}
.project__img {
  
    margin-bottom: 8px;
    border-radius: 10px;
    float: left;
    width: 600px; /* Фиксированная ширина блока слайдера */
  height: 400px; /* Фиксированная высота блока слайдера */
 
}
.project__inlain {
    display: var(--inline-block);
    /* margin-right: 8px; */
    vertical-align: middle;
}
.project__inlain:last-child {
    margin-right: 0px;
}
.project__logo {
  width: 9px;
  height: 15.5px;
  vertical-align: middle;
  margin-right: 5px;
}
.project__title {
    color: #000000;
    font-weight: 700;
    text-align: left;
text-align: center;
    font-size: 20px;
    margin-top: 20%;
  
}
.project__category {
    color: #CCC;
    font-size: 16px;
    line-height: 10px; /* 100% */
    border-radius: 3px;
    padding: 3px;
    /* display: var(--inline-block); */
    text-align: left;
    margin-left: 12px;
}
.project__price{

    display: flex; 
    flex-direction: row; 
    align-items: center; 
  
    margin-top: 5px;
    font-weight: 700;
    color: #000000;
    text-align: center;
   
}
.project__btn{
    text-transform: uppercase;
   
}
.project__like, .project__glass {
    display: var(--inline-block);
    position: relative;
    padding-left: 17px;
}
.project__like {
  margin-right: 8px;  
}
.project__like::before, .project__glass::before {
    position: absolute;
    content: '';
    width: 14px;
    height: 14px;
    left: 0;
    top: 3px;
}
.project__like::before {
    background: url('../img/like.svg') no-repeat;
}
.project__glass::before {
    background: url('../img/glass.svg') no-repeat;
}
</style>

</html>