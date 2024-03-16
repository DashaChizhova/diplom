<?php 
session_start();
include('include/db_connect.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Расчет стипендии</title>
    <link rel="stylesheet" href="css/calculator.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet" />
  </head>
  <body>

  <form enctype="multipart/form-data" method="post" action="">
    <main class="calc-wrapper">
      <div class="container">
        <form id="form">
          <div class="heading">
            <h1 class="heading-title"> Калькулятор расчета <br />стипендии ВУЗа</h1>
            <p class="heading-desc"></p>
          </div>
          <div class="calc-section">
            <label class="checkbox-wrapper title-bold section-title">
              Курс обучения
            </label>
            <div class="rooms-wrapper">
              <div class="bakalavriat ">
                <label class="rooms-label">
                  <input class="rooms-radio-real" type="radio" name="course" value="1" />
                  <span class="rooms-radio-fake">1</span>
                </label>
              </div>
              <div class="bakalavriat ">
                <label class="rooms-label">
                  <input class="rooms-radio-real" type="radio" name="course" value="2" />
                  <span class="rooms-radio-fake">2</span>
                </label>
              </div>
              <div class="bakalavriat magistry ">
                  <label class="rooms-label" >
                    <input class="rooms-radio-real" type="radio" name="course" value="3"  />
                    <span class="rooms-radio-fake">3</span>
                  </label>
              </div>
              <div class="bakalavriat magistry aspirantyra">
                <label class="rooms-label">
                  <input class="rooms-radio-real" type="radio" name="course" value="4" />
                  <span class="rooms-radio-fake">4</span>
                </label>
              </div>
              <div class="bakalavriat magistry aspirantyra">
                <label class="rooms-label">
                  <input class="rooms-radio-real" type="radio" name="course" value="5" />
                  <span class="rooms-radio-fake">5</span>
                </label>
              </div>
            </div>
          </div>
          <div class="calc-section">
            <label class="checkbox-wrapper title-bold section-title .section-title--vertical-center">
              <span class="title__inline">Минимальная стипендия ВУЗа</span>
              <input type="number"min="0"max="5000"value="0"id="square-input"class="title__inline input-short"/>
              <span class="title__inline"></span>
            </label>
            <input type="range"id="square-range"class="range-input"min="0" max="5000" value= "0" step="1"/>
          </div>
          <div class="calc-section">
            <h4 class="checkbox-wrapper title-bold section-title">
              Форма обучения
            </h4>
            <label class="radio-wrapper" data-name="mobile">
              <input type="radio" class="radio" name="type" value="1600"  id="checkboxbakalavriat"   />
              <div class="title-lite">Бакалавриат/Спец.</div>
            </label>
            <label class="radio-wrapper" data-name="mobile">
              <input type="radio" class="radio" name="type" value="3000" id="checkboxmagistry" />
              <div class="title-lite">Магистратура</div>
            </label>
            <label class="radio-wrapper" data-name="mobile">
              <input type="radio" class="radio" name="type" value="3100" id="checkboxaspirantyra" />
              <div class="title-lite">Аспирантура</div>
            </label>
          </div>
          <div class="calc-section">
            <label class="checkbox-wrapper title-bold section-title">
              Оценки за предыдущую сессию
            </label>
            <label class="radio-wrapper">
              <input
                type="radio"
                class="radio"
                name="building"
                value="0"
              />
              <div class="title-lite">Еще нет оценок</div>
            </label>
            <label class="radio-wrapper">
              <input type="radio" class="radio" name="building" value="1100" />
              <div class="title-lite">Только "хор"</div>
            </label>
            <label class="radio-wrapper">
              <input type="radio" class="radio" name="building" value="1500" />
              <div class="title-lite">"Хор" и "отл"</div>
            </label>
            <label class="radio-wrapper">
              <input type="radio" class="radio" name="building" value="1900" />
              <div class="title-lite">Только "отл"</div>
            </label>
          </div>
          <div class="calc-section">
            <label class="checkbox-wrapper title-bold section-title">
              Доп стипендии стипендии
            </label>
            <label class="radio-wrapper">
              <input type="checkbox" id="checkbox" class="checkbox" name="social" value="3500"   />
              <span class="custom-checkbox"></span>
              <div class="title-lite">Социальная</div>
            </label>
            <label class="radio-wrapper">
              <input type="checkbox" id="checkbox" class="checkbox" name="upacadem" value="1.1" />
              <span class="custom-checkbox"></span>
              <div class="title-lite">Повышенная академическая</div>
            </label>
            <label class="radio-wrapper">
              <input type="checkbox" id="checkbox" class="checkbox" name="upsocial" value="1.1" />
              <span class="custom-checkbox"></span>
              <div class="title-lite">Повышенная социальная</div>
            </label>
            <label class="radio-wrapper">
              <input type="checkbox" id="checkbox" class="checkbox" name="military" value="1.1" />
              <span class="custom-checkbox"></span>
              <div class="title-lite">Стипендия военной кафедры</div>
            </label>
            <label class="radio-wrapper">
              <input type="checkbox" id="checkbox" class="checkbox" name="namestep" value="1.1" />
              <span class="custom-checkbox"></span>
              <div class="title-lite">Именная стипендия</div>
            </label>
            <label class="radio-wrapper">
              <input type="checkbox" id="checkbox" class="checkbox" name="president" value="1.1" />
              <span class="custom-checkbox"></span>
              <div class="title-lite">Стипендия президента</div>
            </label>
          </div>
          </form>
          <div class="calc-price">
            <div class="calc-price-title">Ваша стипендия:</div>
            <div class="calc-price-value">
              <span id="total-price">0</span>
              рублей
            </div>
          </div>
        </form>
      </div>
    </main>
    <footer class="footer footer-inner">
      <div class="container">
        <p class="footer-text">
          <a href="#" target="_blank"></a>
        </p>
      </div>
    </footer>
    <script src="js/calculator__main.js"></script>
    <script src="js/calculator__notmain.js"></script>
  </body>
</html>
