<?php 
    include_once 'form_validate.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
      $(function () {

        $('form').on('submit', function (e) {
        console.log("submit pressed");
        e.preventDefault();

        $.ajax({
            type: 'post',
            url: 'index.php',
            data: $('form').serialize(),
            success: function () {
                var formInfo = 
                    document.querySelector('#act_info');
                formInfo.style.display = 'none';
                var formTitle = 
                    document.querySelector('#act_title');
                formTitle.style.display = 'none';
                var theFormItself = 
                    document.getElementById('form');
                theFormItself.style.display = 'none';
                var formAgr = 
                    document.querySelector('#agr');
                formAgr.style.display = 'none';
                var theSuccessMessage = 
                    document.getElementById('success');  
                theSuccessMessage.style.display = 'block';
                // alert('form was submitted');

            },
            error: function () {
                alert("Неудачная отправка формы! Проверьте данные.")
            }
        });

        });

      });
    </script>
    <title>Главная</title>
</head>
<body>
    
    <header class="header">
        <img src="public/images/granosleft.svg" class="left_image"/>
        <img src="public/images/granosright.svg" class="right_image" />
        <div class="container">
            <div class="header__logo">
                <img src="public/images/header__logo.svg" />
                <span class="header__logo-text">English</span>
            </div>
            <div class="header__row">
                <div class="header__title">
                    <h3 class="header__title-heading">Вкладывайте незначительные деньги каждый день в копилку своих знаний.</h3>
                    <p class="header__title-text">Следующий курс для вас будет стоить всего <span class="header__title-text_bold">178 рублей в день</span></p>
                    <div class="header__date">
                        <div class="header__date-card">
                            <div class="header__date-card_num">
                                01
                            </div>
                            <div class="header__date-card_text">
                                <p>Ноября</p>
                                <span>Ближайший старт</span>
                            </div>
                        </div>

                        <div class="header__date-card">
                            <div class="header__date-card_num">
                                21
                            </div>
                            <div class="header__date-card_text">
                                <p>Октября</p>
                                <span>Конец акции</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="header__image">
                    <!-- <picture> -->
                        <!-- <source media="(max-width: 768px)" srcset="public/images/header__image-mobile.png">
                        <source media="(max-width: 1240px)" srcset="public/images/header__image-tablet.png">
                        <img src="public/images/header__image.png" />
                    </picture> -->
                    <img src="public/images/header__image.png" />
                </div>
            </div>
            <div class="header__buttons">
                <div class="header__button header__button--red"><a href="#">Узнать подробнее</a></div>
                <div class="header__button" id="consult"><a href="#">Бесплатная консультация</a></div>
            </div>
        </div>
        
    </header>

    <main class="content">
        <?php
            $link = mysqli_connect('localhost', 'sungur', 'sungur05', 'engToch');
            
            function takeData($order_num, $link, $row) {
                $order_query = "SELECT * FROM promo_prices WHERE promo_prices.order = $order_num";
                $order_result = mysqli_query($link, $order_query) or die("Ошибка " . mysqli_error($link));
                $res = mysqli_fetch_assoc($order_result);

                switch ($row) {
                    case 'price':
                        echo $res["price"];
                        break;
                    case 'oldprice':
                        echo $res["oldprice"];
                        break;
                    case 'prepay':
                        echo $res["prepay"];
                        break;
                    case 'title':
                        echo $res["title"];
                        break;
                    default:
                        break;
                }
            }

        ?>
        <div class="container">
            <div class="content__title">
                <h2>Выберите свой вариант обучения</h2>
            </div>

            <div class="content__cards">
                <div class="content__card">
                    <div class="content__card-title">
                        <?php takeData(1, $link, 'title') ?>
                    </div>
                    <div class="content__card-price">
                        <p><?php takeData(1, $link, 'price') ?> Р<span class="content__card-sale">-56%</span></p>
                        <p class="content__card-price--crossed"><?php takeData(1, $link, 'oldprice') ?> ₽</p>
                    </div>
                    <div class="content__card-info">
                        <ul class="content__card-list">
                            <li>2 месяца обучения</li>
                            <li>Грамматическая выжимка</li>
                            <li>Разговорный тренажёр</li>
                            <li>Слова с ассоциациями</li>
                            <li>Регулярные мини-задания</li>
                            <li>Персональный куратор</li>
                            <li>Сертификат об обучении</li>
                            <li>Best Teachers</li>
                            <li>Звонки от Second Teacher</li>
                        </ul>
                    </div>
                    <div class="content__card-prepay">
                        <p class="content__card-prepay-text">Предоплата</p>
                        <p class="content__card-prepay-price"><?php takeData(1, $link, 'prepay') ?> ₽</p>
                    </div>
                    <div class="content__card-buttons">
                        <div class="content__card-button">Внести предоплату из РФ</div>
                        <div class="content__card-button">Внести предоплату из-за границы</div>
                    </div>
                </div>

                <div class="content__card">
                    <div class="content__card-title">
                        <?php takeData(2, $link, 'title') ?>
                    </div>
                    <div class="content__card-price">
                        <p><?php takeData(2, $link, 'price') ?> Р <span class="content__card-sale">-60%</span></p>
                        <p class="content__card-price--crossed"><?php takeData(2, $link, 'oldprice') ?> ₽</p>
                    </div>
                    <div class="content__card-info">
                        <ul class="content__card-list">
                            <li>4 месяца обучения</li>
                            <li>Грамматическая выжимка</li>
                            <li>Разговорный тренажёр</li>
                            <li>Слова с ассоциациями</li>
                            <li>Регулярные мини-задания</li>
                            <li>Персональный куратор</li>
                            <li>Сертификат об обучении</li>
                            <li>Best Teachers</li>
                            <li>Звонки от Second Teacher</li>
                        </ul>
                    </div>
                    <div class="content__card-prepay">
                        <p class="content__card-prepay-text">Предоплата</p>
                        <p class="content__card-prepay-price"><?php takeData(2, $link, 'prepay') ?> ₽</p>
                    </div>
                    <div class="content__card-buttons">
                        <div class="content__card-button">Внести предоплату из РФ</div>
                        <div class="content__card-button">Внести предоплату из-за границы</div>
                    </div>
                </div>

                <div class="content__card">
                    <div class="content__card-title">
                        <?php takeData(3, $link, 'title') ?>
                    </div>
                    <div class="content__card-price">
                        <p><?php takeData(3, $link, 'price') ?> Р <span class="content__card-sale">-61%</span></p>
                        <p class="content__card-price--crossed"><?php takeData(3, $link, 'oldprice') ?> ₽</p>
                    </div>
                    <div class="content__card-info">
                        <ul class="content__card-list">
                            <li>6 месяцев обучения</li>
                            <li>Грамматическая выжимка</li>
                            <li>Разговорный тренажёр</li>
                            <li>Слова с ассоциациями</li>
                            <li>Регулярные мини-задания</li>
                            <li>Персональный куратор</li>
                            <li>Сертификат об обучении</li>
                            <li>Best Teachers</li>
                            <li>Звонки от Second Teacher</li>
                        </ul>
                    </div>
                    <div class="content__card-prepay">
                        <p class="content__card-prepay-text">Предоплата</p>
                        <p class="content__card-prepay-price"><?php takeData(3, $link, 'prepay') ?> ₽</p>
                    </div>
                    <div class="content__card-buttons">
                        <div class="content__card-button">Внести предоплату из РФ</div>
                        <div class="content__card-button">Внести предоплату из-за границы</div>
                    </div>
                </div>

                <div class="content__card">
                    <div class="content__card-title">
                        <?php takeData(4, $link, 'title') ?>
                    </div>
                    <div class="content__card-price">
                        <p><?php takeData(4, $link, 'price') ?> Р <span class="content__card-sale">-65%</span></p>
                        <p class="content__card-price--crossed"><?php takeData(4, $link, 'oldprice') ?> ₽</p>
                    </div>
                    <div class="content__card-info">
                        <ul class="content__card-list">
                            <li>10 месяцев обучения</li>
                            <li>Грамматическая выжимка</li>
                            <li>Разговорный тренажёр</li>
                            <li>Слова с ассоциациями</li>
                            <li>Регулярные мини-задания</li>
                            <li>Персональный куратор</li>
                            <li>Сертификат об обучении</li>
                            <li>Best Teachers</li>
                            <li>Звонки от Second Teacher</li>
                        </ul>
                    </div>
                    <div class="content__card-prepay">
                        <p class="content__card-prepay-text">Предоплата</p>
                        <p class="content__card-prepay-price"><?php takeData(4, $link, 'prepay') ?> ₽</p>
                    </div>
                    <div class="content__card-buttons">
                        <div class="content__card-button">Внести предоплату из РФ</div>
                        <div class="content__card-button">Внести предоплату из-за границы</div>
                    </div>
                </div>
            </div>

            <div class="content__gift">
                <img src="public/images/gift-vector.svg" />
            </div>

        </div>
        <div class="content__action">
            <div class="content__action-title">
                <h3 class="content__action-heading" id="act_title">Еще думаете?</h3>
                <p class="content__action-info" id="act_info">Записывайтесь на бесплатный урок и попробуйте сами, это поможет принять решение</p>
            </div>
            <form method="POST"  action="" class="content__form form" id="form" >
                <input name="name" id="name" type="text" placeholder="Введите ваше имя" maxlength="45" required/>

                <input 
                    name="phone" 
                    id="phone" type="tel" 
                    placeholder="Введите ваш телефон" 
                    pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{3,10}$"
                    max-length="15" 
                    required 
                />

                <input name="email" id="email" type="email" placeholder="Введите ваш email" maxlength="45" required/>


                <!-- <button class="content__form-button" name="button" type="submit" id="formSubmit">Записаться</button> -->
                <input class="content__form-button" name="button" type="submit" id="formSubmit" value="Записаться">
            </form>
            <p id="success">Заявка успешно отправлена!!!</p>
            
            <?php 
                // if (isset($_POST['button']) && $_POST['button'] == "Записаться") 
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' &&
                !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email'])){
                    $link1 = mysqli_connect('localhost', 'sungur', 'sungur05', 'engToch');
                    $currTime = new DateTime();
                    $dateRes = $currTime->format('Y-m-d H:i:s');
                    // $currTime->setTimezone(new DateTimeZone('Europe/Moscow')); 
                    $query1 ="INSERT INTO applications (`timestamp`, `name`, `phone`, `email`) VALUES('".$dateRes."', '".$_POST['name']."', ".$_POST['phone'].",'".$_POST['email']."')";
                    $result = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));
                    
                }
            ?>
            <div class="content__action-agreement" id="agr">
                Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь с политикой конфиденциальности
            </div>
        </div>
        
    </main>

    <footer class="footer">
        <div class="footer__logo">
            <img src="public/images/footer__logo.svg" alt="Логотип"/>
            <div class="footer__title">English</div>
        </div>
        <div class="footer__info">
            <div class="footer__rights">
                <p>2015 - 2021 © English. ВСЕ ПРАВА ЗАЩИЩЕНЫ.</p>
                <p>ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</p>
                <p>СОГЛАШЕНИЕ ОБ ОБРАБОТКЕ ПЕРСОНАЛЬНЫХ ДАННЫХ</p>
            </div>
            <div class="footer__contact">
                <p>ООО "Инглиш", юридический адрес: 000000, Санкт-Петербург, ул. Улица, д. 0/00 лит. 0, пом. 0
                    ОГРН: 000000000000 | ИНН: 000000000 | КПП: 000000000s</p>
            </div>
            <div class="footer__socials">
                <img src="public/images/vk.svg" />
                <img src="public/images/tg.svg" />
            </div>
        </div>
    </footer>

    <script src="js/index.js"></script>

</body>
</html>