<? $sql_sub_order = "SELECT Subdivision_ID FROM Sub_Class WHERE Class_ID = 165 AND Catalogue_ID = '$current_catalogue[Catalogue_ID]'";
$sub_order = $nc_core->db->get_var($sql_sub_order); ?>
<? $sql_cc_order = "SELECT Sub_Class_ID FROM Sub_Class WHERE Class_ID = 165 AND Catalogue_ID = '$current_catalogue[Catalogue_ID]'";
$cc_order = $nc_core->db->get_var($sql_cc_order); ?>
<footer class="footer">
    <div class="site-container footer__inner">
        <div class="footer__content footer-desktop">
            <div class="footer__top">
                <div class="footer__column">
                    <a class="footer__column-name" href="/lechenie-alkogolizma/">Лечение алкоголизма</a>
                    <div class="footer__list">
                        <a class="footer__link" href="/narkolog-na-dom/">Вызов нарколога на дом</a>
                        <a class="footer__link" href="/zapoy/vyvod/">Вывод из запоя на дому</a>
                        <a class="footer__link" href="/zapoy/">Капельница от запоя</a>
                        <a class="footer__link" href="/kodirovanie-ot-alkogolizma/">Кодирование от алкоголизма</a>
                        <a class="footer__link" href="/reabilitaciya/">Реабилитация алкоголиков</a>
                    </div>
                </div>
                <div class="footer__column">
                    <a class="footer__column-name" href="/lechenie-narkomanii/">Лечение наркомании</a>
                    <div class="footer__list">
                        <a class="footer__link" href="/narkologicheskaya-pomosch/">Наркологическая помощь</a>
                        <a class="footer__link" href="/snyatie-lomki/">Снятие ломки</a>
                    </div>
                </div>
                <div class="footer__column"><a class="footer__column-name" href="/">О нас</a>
                    <div class="footer__list">
                        <a class="footer__link" href="/otzyvy/">Отзывы</a><a class="footer__link" href="/tseny/">Цены</a><a class="footer__link" href="/policy/">Пользовательское соглашение</a><a class="footer__link" href="/politika-konfidentsialnosti/">Политика конфиденциальности</a><a class="footer__link" href="/regions/">Наши филиалы</a><a class="footer__link" href="/stati/">Статьи</a>
                    </div>
                </div>
                <div class="footer__column"><a class="footer__column-name" href="/kontakty/">Контакты</a>
                    <div class="footer__address"><?= $current_catalogue[Catalogue_Name] ?>, <?= $current_catalogue[address] ?></div><a class="footer__phone" href="tel:89581118517">8 (958) 111-85-17</a><a class="site-btn site-btn--br footer__call-btn" href="#" data-modal-class="callback"><span>Обратный звонок</span></a>
                    <?/*<div class="footer__socials">
			 <a target="_blank" class="footer__soc" href="https://www.instagram.com/noviy.vector.rus/"><img loading="lazy" src="/site/dist/img/icons8-instagram-40.png"></a>
			 <a target="_blank" class="footer__soc" href="https://vk.com/novy_vector"><img loading="lazy" src="/site/dist/img/icons8-vk-circled-40-h.png"></a>
			 <a target="_blank" class="footer__soc" href="https://www.facebook.com/Наркологическая-Клиника-Новый-Вектор-110155157493818/"><img loading="lazy" src="/site/dist/img/icons8-facebook-40.png"></a>
			<a target="_blank" class="footer__soc whatsapp_icon" href="https://wa.me/89994833969"><img loading="lazy" src="/site/dist/img/whatsapp.png"></a>
			</div>*/ ?>
                </div>
                <div class="footer__column">
                    <a class="footer__logo" href="/"><img loading="lazy" class="footer__logo-img" src="/site/dist/img/logo-trezvoe-obshchestvo.svg" alt="logo"></a>
                    <div class="paysystems">
                        <span class="pay-methods__title">Способы оплаты</span>
                        <div class="pay-methods">
                            <div class="pay-method">
                                <span class="pay-method__text">Наличные</span>
                                <img loading="lazy" class="pay-method__image" src="/site/dist/img/paysystems/money.svg">
                            </div>
                            <div class="pay-method">
                                <span class="pay-method__text">Банковская карта</span>
                                <img loading="lazy" class="pay-method__image" src="/site/dist/img/paysystems/card.svg">
                            </div>
                            <div class="pay-method-icon">
                                <img loading="lazy" src="/site/dist/img/paysystems/mir.png">
                            </div>
                            <div class="pay-method-icon">
                                <img loading="lazy" src="/site/dist/img/paysystems/visa.png">
                            </div>
                            <div class="pay-method-icon">
                                <img loading="lazy" src="/site/dist/img/paysystems/mastercard.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p style="text-align:center;">Имеются противопоказания, необходимо проконсультироваться со специалистом. 18+</p>
            <div class="footer__bottom">
                <? $sql_cirlce_link = "SELECT Catalogue_Name, Domain FROM Catalogue WHERE Checked=1 ORDER BY `Catalogue`.`circle_priority` ASC";
                $cirlce_link = $nc_core->db->get_results($sql_cirlce_link, ARRAY_A);
                $c_l_numb = count($cirlce_link);
                $prev_link = $cirlce_link[$c_l_numb - 1][Domain];
                $prev_name = $cirlce_link[$c_l_numb - 1][Catalogue_Name];
                $first_link = $cirlce_link[0][Domain];
                $first_name = $cirlce_link[0][Catalogue_Name];
                $c_l_iteration = 0;
                $c_l_flag = 0;
                foreach ($cirlce_link as $value) {
                    if ($c_l_iteration > 1) {
                        $prev_link = $cur_link;
                        $prev_name = $cur_name;
                    }
                    if ($c_l_iteration > 0) {
                        $cur_link = $next_link;
                        $cur_name = $next_name;
                    }
                    $next_link = $value[Domain];
                    $next_name = $value[Catalogue_Name];
                    $c_l_iteration++;
                    if ($c_l_iteration > 1) {
                        if ($cur_link == $current_catalogue[Domain]) {
                            $c_l_flag = 1;
                            break;
                        }
                    }
                }
                unset($value);
                ?>
                <div class="footer__bottom-txt">

                    <? if ($c_l_flag == 1) { ?>
                        <a class="footer__policy" href="https://<?= $prev_link ?>">←<?= $prev_name ?></a>
                        <p class="footer__oficial">© Частный наркологический центр <?= $current_catalogue[city2] ?> «Трезвое общество», 2026. Лечение алкоголизма и наркомании. Информируем Вас об осуществлении сотрудничества с организациями партнерами в сфере медицинских услуг.</p>
                        <a class="footer__policy" href="https://<?= $next_link ?>"><?= $next_name ?>→</a>
                    <? } else { ?>
                        <a class="footer__policy" href="https://<?= $cur_link ?>">←<?= $cur_name ?></a>
                        <p class="footer__oficial">© Частный наркологический центр <?= $current_catalogue[city2] ?> «Трезвое общество», 2026. Лечение алкоголизма и наркомании. Информируем Вас об осуществлении сотрудничества с организациями партнерами в сфере медицинских услуг.</p>
                        <a class="footer__policy" href="https://<?= $first_link ?>"><?= $first_name ?>→</a>
                    <? } ?>
                </div>
            </div>

        </div>
        <div class="footer__content footer-mobile webp-img b-lazy" data-webp="/site/dist/img/footer-bg.webp" data-img="/site/dist/img/footer-bg.jpg">
            <div class="footer__column">
                <a class="footer__logo" href="/"><img loading="lazy" class="footer__logo-img" src="/site/dist/img/logo-trezvoe-obshchestvo.svg" alt="logo"></a>
                <div class="paysystems">
                    <span class="pay-methods__title">Способы оплаты</span>
                    <div class="pay-methods">
                        <div class="pay-method">
                            <span class="pay-method__text">Наличные</span>
                            <img loading="lazy" class="pay-method__image" src="/site/dist/img/paysystems/money.svg" alt="img">
                        </div>
                        <div class="pay-method">
                            <span class="pay-method__text">Банковская карта</span>
                            <img loading="lazy" class="pay-method__image" src="/site/dist/img/paysystems/card.svg" alt="img">
                        </div>
                        <div class="pay-method-icon">
                            <img loading="lazy" src="/site/dist/img/paysystems/mir.png" alt="img">
                        </div>
                        <div class="pay-method-icon">
                            <img loading="lazy" src="/site/dist/img/paysystems/visa.png" alt="img">
                        </div>
                        <div class="pay-method-icon">
                            <img loading="lazy" src="/site/dist/img/paysystems/mastercard.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__column"><a class="footer__phone" href="tel:89581118517">8 (958) 111-85-17</a>
                <div class="footer__address"><?= $current_catalogue[Catalogue_Name] ?>, <br> <?= $current_catalogue[address] ?></div>
            </div>
            <div class="footer__column"><a class="footer__link" href="/lechenie-narkomanii/">Наркомания</a><a class="footer__link" href="/lechenie-alkogolizma/">Алкоголизм</a><a class="footer__link" href="/reabilitaciya/">Реабилитация</a><a class="footer__link" href="/kontakty/">Контакты</a></div>
            <div class="footer__column"><a class="site-btn footer__call-btn" href="#" data-modal-class="callback"><span>Обратный звонок</span></a></div>
            <?/*<div class="footer__socials">
			 <a target="_blank" class="footer__soc" href="https://www.instagram.com/noviy.vector.rus/"><img loading="lazy" src="/site/dist/img/icons8-instagram-40.png"></a>
			 <a target="_blank" class="footer__soc" href="https://vk.com/novy_vector"><img loading="lazy" src="/site/dist/img/icons8-vk-circled-40-h.png"></a>
			 <a target="_blank" class="footer__soc" href="https://www.facebook.com/Наркологическая-Клиника-Новый-Вектор-110155157493818/"><img loading="lazy" src="/site/dist/img/icons8-facebook-40.png"></a>
			<a target="_blank" class="footer__soc whatsapp_icon" href="https://wa.me/89994833969"><img loading="lazy" src="/site/dist/img/whatsapp.png"></a>
			</div>*/ ?>
            <div class="footer__bottom-txt">
                <? if ($c_l_flag == 1) { ?>
                    <a class="footer__policy desk_only" href="https://<?= $prev_link ?>">←<?= $prev_name ?></a>
                    <p class="footer__oficial">© Частный наркологический центр <?= $current_catalogue[city2] ?> «Трезвое общество», 2020. Лечение алкоголизма и наркомании. Информируем Вас об осуществлении сотрудничества с организациями партнерами в сфере медицинских услуг.</p>
                    <div class="phone_flex">
                        <a class="footer__policy phone_only" href="https://<?= $prev_link ?>">←<?= $prev_name ?></a>
                        <a class="footer__policy" href="https://<?= $next_link ?>"><?= $next_name ?>→</a>
                    </div>
                <? } else { ?>
                    <a class="footer__policy desk_only" href="https://<?= $cur_link ?>">←<?= $cur_name ?></a>
                    <p class="footer__oficial">© Частный наркологический центр <?= $current_catalogue[city2] ?> «Трезвое общество», 2026. Лечение алкоголизма и наркомании. Информируем Вас об осуществлении сотрудничества с организациями партнерами в сфере медицинских услуг.</p>
                    <div class="phone_flex">
                        <a class="footer__policy phone_only" href="https://<?= $cur_link ?>">←<?= $cur_name ?></a>
                        <a class="footer__policy" href="https://<?= $first_link ?>"><?= $first_name ?>→</a>

                    </div>
                <? } ?>
                <p style="text-align:center;">Имеются противопоказания, необходимо проконсультироваться со специалистом. 18+</p>
            </div>
        </div>
    </div>
</footer>
<div class="popup callback">
    <div class="popup__body">
        <div class="popup__inner">
            <div class="popup__close">
                <div class="popup__close-ico"></div>
            </div>
            <div class="popup__substrate"></div>
            <div class="popup__content">
                <div class="popup__callback-form">
                    <form class="site-form" enctype='multipart/form-data' method="post" action='/site/new.php'>
                        <input name='catalogue' type='hidden' value='<?= $catalogue ?>' />
                        <input name='cc' type='hidden' value='<?= $cc_order ?>' />
                        <input name='sub' type='hidden' value='<?= $sub_order ?>' />
                        <input name="f_urlMessage" type="hidden" value="<?= $nc_core->url->source_url() ?>">
                        <input name="f_title_url_message" type="hidden" value="<?= $nc_core->page->get_title() ?>">
                        <input name='posting' type='hidden' value='1' />
                        <div class="site-form__logo"><img loading="lazy" class="site-form__logo-img" src="/site/dist/img/logo-trezvoe-obshchestvo.svg" alt="logo"></div>
                        <div class="site-form__title">Оказываем эффективную помощь</div>
                        <div class="site-form__caption">На дому и в клинике</div>
                        <div class="site-form__row">
                            <div class="site-form__input">
                                <input type="text" name="f_name" placeholder="Ваше имя">
                            </div>
                        </div>
                        <div class="site-form__row">
                            <div class="site-form__input">
                                <input type="tel" required name="f_phone" inputmode="numeric" placeholder="+7(___)___-__-__" data-valid="phone">
                            </div>
                        </div>
                        <div class="site-form__btn"><button type="submit" class="site-btn submit-btn site-form__btn-i" type="submit" href="javascript:void(0);"><span>Заказать звонок</span></button></div>
                    </form>
                    <div class="site-form-submit">
                        <a href="javascript:void(0);" class="unsubmit">← Назад к оформлению заявки</a>
                        <div class="result_wrapper">
                            <div class="site-form-submit__title">Заявка отправляется</div>
                            <div class="site-form-submit__caption">Пожалуйста, подождите</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--модалка отзыва-->
<div class="review-popup__wrap">
    <div class="review-popup__mask"></div>
    <div class="review-popup">
        <div class="popup__close-ico"></div>
            <div class="review-item-content">
                <div class="review-item__top">
                    <div class="review-item__author">
                        <div class="review-item__img"></div>
                        <div class="review-item__name"></div>
                    </div>
                    <div class="review-item__txt">

                    </div>
                </div>
                <div class="review-item__bottom">
                    <div class="reviews-view-all review-popup__close site-btn site-btn--br">Закрыть</div>
                </div>
            </div>
    </div>
</div>
<!-- МОДАЛЬНОЕ ОКНО - ФИЛИАЛЫ -->

<div class="popup branches-wrapper">
    <div class="popup__body">
        <div class="popup__inner">
            <div class="popup__close">
                <div class="popup__close-ico"></div>
            </div>
            <div class="popup__substrate"></div>
            <div class="popup__content">
                <div class="popup__callback-form">
                    <div class="branches-list">
                        <p>Верхоянская улица, 39</p>
                        <p>Комсомольский проспект, 46</p>
                        <p>Новороссийская улица, 17А</p>
                        <p>Пекинская улица, 27А</p>
                        <p>Дачный переулок, 11</p>
                        <p>улица Марченко, 9А</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?
$cityList = array(
    array(name => 'Москва', englishName => 'moskva'),
    array(name => 'Санкт-Петербург', englishName => 'sankt-peterburg'),
    array(name => 'Новосибирск', englishName => 'novosibirsk'),
    array(name => 'Екатеринбург', englishName => 'ekaterinburg'),
    array(name => 'Казань', englishName => 'kazan'),
    array(name => 'Нижний Новгород', englishName => 'nizhniy-novgorod'),
    array(name => 'Челябинск', englishName => ''),
    array(name => 'Омск', englishName => 'omsk'),
    array(name => 'Самара', englishName => 'samara'),
    array(name => 'Ростов-на-Дону', englishName => 'rostov-na-donu'),
    array(name => 'Уфа', englishName => 'ufa'),
    array(name => 'Красноярск', englishName => 'krasnoyarsk'),
    array(name => 'Пермь', englishName => 'perm'),
    array(name => 'Воронеж', englishName => 'voronezh'),
    array(name => 'Волгоград', englishName => 'volgograd'),
    array(name => 'Краснодар', englishName => 'krasnodar'),
    array(name => 'Саратов', englishName => 'saratov'),
    array(name => 'Тюмень', englishName => 'tyumen'),
    array(name => 'Тольятти', englishName => 'tolyatti'),
    array(name => 'Ижевск', englishName => 'izhevsk')
);
?>




<? /*
<div class="popup regions-wrapper">
    <div class="popup__body">
        <div class="popup__inner">
            <div class="popup__close">
                <div class="popup__close-ico"></div>
            </div>
            <div class="popup__substrate"></div>
            <div class="popup__content">

                <div class="popup__callback-form">
                    <div class="inside_filter">
                        <div class="filter_form _hide"></div>
                        <input class="city__filter form_control" placeholder="Введите название города">
                    </div>
                    <div class="main-city-list">
                        <? foreach ($cityList as $city) { ?>
                            <a class="<?= $current_catalogue[Catalogue_Name] == $city[name] ? 'active' : '' ?>"
                                href="https://<?= $city[englishName] !== '' ? $city[englishName] . '.' : '' ?>trezvoe-obshchestvo.ru"><?= $city[name] ?></a>
                        <? } ?>
                    </div>
                    <div class="city-list">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
*/?>

</div>
<? if (stripos(@$_SERVER['HTTP_USER_AGENT'], 'Lighthouse') === false) { ?>
    <script src="/site/dist/js/libs.min.js"></script>
    <script type="text/javascript" src="/site/dist/js/slick.min.js"></script>
    <script src="/site/dist/js/main.js"></script>
    <script src="/site/dist/js/sourcebuster.min.js"></script>

    <?= $current_catalogue[BodyCode] ?>

    <script>
        $('form').append('<input name="f_trafficSource" type="hidden" value=""><input name="f_istochnik" type="hidden" value="">');
        sbjs.init();
        $("input[name=f_trafficSource]").val(sbjs.get.current.typ);
        $("input[name=f_istochnik]").val(sbjs.get.current.src);
    </script>



    <? $sql_sub_cont = "SELECT Subdivision_ID FROM Sub_Class WHERE Class_ID = 162 AND Catalogue_ID = '$current_catalogue[Catalogue_ID]'";
    $sub_cont = $nc_core->db->get_var($sql_sub_cont); ?>
    <? if ($sub_cont == $sub) { ?>
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <script defer type="text/javascript">
            ymaps.ready(init);

            function init() {
                var myMap = new ymaps.Map("map", {
                        center: [<?= $current_catalogue[Coordinates] ?>],
                        zoom: <?= ($current_catalogue[address] ? '16' : '13') ?>
                    }, {
                        searchControlProvider: 'yandex#search'
                    }),
                    myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                        hintContent: 'Трезвое общество',
                        balloonContent: 'Трезвое общество'
                    }, {
                        iconLayout: 'default#image'
                    });
                myMap.behaviors.disable('drag');
                myMap.geoObjects
                    .add(myPlacemark);
                myMap.behaviors
                    .disable(['scrollZoom']);
            }
        </script>
    <? } ?>
    
    <script src="/site/dist/js/micromarking_v2.js"></script>
    <script>
      let
          generalSettings = {
              titleSyte: "ТРЕЗВОЕ ОБЩЕСТВО",
              city2Syte: "<?= $current_catalogue['city2'] ?>",
              city: "<?= $current_catalogue['Catalogue_Name'] ?>",
              address: "<?= $current_catalogue['address'] ?>",
              region: "<?= $current_catalogue['address'] ?>",
              map: "<?= $current_catalogue['Coordinates'] ?>",
              phone: ".footer__phone",
              logo: ".header__logo img",
              socialMedia: ".footer__social .footer__social-link",
              areTheseSubfolders: {
                  layoutSubfolder: false,
                  addURL: "regions"
              },
              showErrors: false
          },

          MedicalOrganizationParameters = {
              name: "ТРЕЗВОЕ ОБЩЕСТВО",
              englName: "Trezvoe Obshchestvo"
          },

          BreadcrumbListParameters = {
              bread: ".breadcrumbs li",
              difficultBreadcrumbList: {
                  difBread: false,
                  separator: "●"
              }
          },

          MedicalScholarlyArticleParameters = {
              service: {
                  doctor: ".text-check__title",
                  job: ".text-check__info-item:last-child span",
                  data: {
                      dateFormat: "г.м.д",
                      datePublished: "",
                      dateModified: ""
                  },
                  urlDoctor: ".text-check__item a.standart-btn",
                  image: {
                      isBannerWithBackgraund: false,
                      classPicture: ".main-service__picture img"
                  }
              },
              article: {
                  doctor: ".micro-article_doctor",
                  job: ".micro-article_job",
                  data: {
                      dateFormat: "г.м.д",
                      datePublished: "",
                      dateModified: ""
                  },
                  urlDoctor: ".micro-article_urlDoctor",
                  image: {
                      isBannerWithBackgraund: false,
                      classPicture: ".micro-article_classPicture"
                  }
              }
          },

          FAQPageParameters = {
              question: ".faq__question",
              answer: ".faq__answer"
          },

          ProductParameters = {
              priceWrapper: ".price__table-line",
              namePoint: ".price__table-name",
              itemPrice: ".price__table-price"
          },

          PhysicianParameters = {
              doctor: ".doctor-page__name h1",
              descrDoctor: '.doctor-page__about',
              schedule: {
                  scheduleWrapper: ".doctor__schedule li",
                  nameDay: ".micro-physician_time__day",
                  itemTime: ".micro-physician_time__time"
              },
              image: {
                  isBannerWithBackgraund: false,
                  classPicture: ".doctor-page__image img"
              }
          },

          SliderPhysicianParameters = {
              doctor: ".doctor__name a",
              descrDoctor: '.doctor__spec',
              doctorLink: ".doctor__name a",
              image: {
                  isBannerWithBackgraund: false,
                  classPicture: ".doctor__top img"
              }
          },

          ReviewParameters = {
              interviewer: ".review__item .review-item__name",
              textInterviewerReview: ".review__item .review-item__txt",
          },

          WebSite = {
              query: "poisk"
          },

          ContactPage = {
              name: "Контакты медицинского центра 'ТРЕЗВОЕ ОБЩЕСТВО'",
          },

          VideoParameters = {
              descriptionVideo: "",
              contentUrl: "",
              posterUrl: ""
          },
          mainUrl = '';

      if (generalSettings.areTheseSubfolders.layoutSubfolder) {
          const addURL = generalSettings.areTheseSubfolders.addURL.trim();
          <? $pathname = $_GET['differ-check'] ? "'" . explode('?', $_SERVER['REQUEST_URI'])[0] . "'" : 'window.location.pathname'; ?>
          const curlUrl = addURL ? `/${addURL}/${<?= $pathname ?>.split('/')[2]}/` :
              `/${<?= $pathname ?>.split('/')[1]}/`;
          mainUrl = <?= $pathname ?> == curlUrl ? true : false
      } else {
          mainUrl = <?= $pathname ?> == "/" ? true : false
      }

      const options = {
          generalSettings: generalSettings,
          createWebSite: WebSite,
          createContactPage: ContactPage,
          createMedicalOrganization: MedicalOrganizationParameters,
          createBreadcrumbList: BreadcrumbListParameters,
          createMedicalScholarlyArticle: MedicalScholarlyArticleParameters,
          createFAQPage: FAQPageParameters,
          createReview: ReviewParameters,
          createProduct: ProductParameters,
          createPhysician: PhysicianParameters,
          createPhysicianSlider: true,
          createVideo: false
      };

      MySchema(options);
  </script>

    <script>
      setTimeout(function(w = window, d = document, u = 'https://cdn-ru.bitrix24.ru/b3713987/crm/site_button/loader_155_153fy4.js') {
        var s = d.createElement('script');
        s.async = true;
        s.src = u + '?' + (Date.now() / 60000 | 0);
        var h = d.getElementsByTagName('script')[0];
        h.parentNode.insertBefore(s, h);
      }, 6000);
    </script>
    <script>
        function GetYMCID() {
            var match = document.cookie.match('(?:^|;)\\s*_ym_uid=([^;]*)');
            return (match) ? decodeURIComponent(match[1]) : false;
        }
        setTimeout(console.log(GetYMCID()), 400);
        $('form').append('<input name="f_clientID" type="hidden" value=' + GetYMCID() + '>');
    </script>
    
    <script>
        let accessInfo = {
            city: '<?=$current_catalogue['Catalogue_Name']?>',
            date: '<?=date("Y-m-d H:i:s")?>',
            userAgent: navigator.userAgent,
            host: '<?=$_SERVER['HTTP_HOST']?>',
            url: '<?=$_SERVER['REQUEST_URI']?>'
        };

        fetch('/accessCounter/index.php', {
            method: 'POST',
            body: JSON.stringify(accessInfo),
        }).then(async (response) => {
            try {	
                let responseResult = await response.json();
            } catch (e) {
                console.log(e);
            }
        });
    </script>
<? } ?>
</body>

</html>