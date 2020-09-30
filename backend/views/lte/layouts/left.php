<?php
/*echo Yii::$app->request->referrer;
exit; */

if( ! Yii::$app->user->isGuest || @Yii::$app->user->identity->role ==9) { ?>

    <aside class="main-sidebar">

    <section class="sidebar">

        <?php

        if( Yii::$app->user->identity->role == 9 ) { // админ
            $items = [
                    ['label' => 'Главная', 'icon' => 'fa fa-dashboard', 'url' => ['/']],
                    ['label' => 'Администраторы', 'icon' => 'fa fa-user', 'url' => ['/managers']] ,
                    //['label' => 'Пользователи', 'icon' => 'fa fa-user', 'url' => ['/user']] ,
                    ['label' => 'Категории', 'icon' => 'fa fa-sitemap', 'url' => ['/categories']],
                    ['label' => 'Категории авто', 'icon' => 'fa fa-sitemap', 'url' => ['/categories-cars']],
                    ['label' => 'Категории запчасти', 'icon' => 'fa fa-sitemap', 'url' => ['/categories-parts']],
                    ['label' => 'Транспорт', 'icon' => 'fa fa-car', 'url' => ['/transport']],
                    ['label' => 'Локализация', 'icon' => 'fa fa-cube', 'url' => ['/products']],
                    ['label' => 'О локализации', 'icon' => 'fa fa-cube', 'url' => ['/pages/localization-about']],
                    ['label' => 'Сервисы',
                        'icon' => 'fa fa-user',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Гарантия', 'icon' => 'fa fa-address-book-o', 'url' => ['/pages/services-warranty']],
                            ['label' => 'Сервисные центры', 'icon' => 'fa fa-address-book-o', 'url' => ['/pages/services-centres']],
                            ['label' => 'Запасные части', 'icon' => 'fa fa-address-book-o', 'url' => ['/pages/services-parts']],
                            ['label' => 'Вопросы', 'icon' => 'fa fa-address-book-o', 'url' => ['/pages/services-faq']],
                        ]
                    ],
                    /*['label' => 'Компания',
                        'icon' => 'fa fa-user',
                        'url' => '#',
                        'items' => [
                            // ['label' => 'Руководители', 'icon' => 'fa fa-address-book-o', 'url' => ['/companies']],
                            ['label' => 'Руководители', 'icon' => 'fa fa-address-book-o', 'url' => ['/company-users/directors']],
                            ['label' => 'Сотрудники', 'icon' => 'fa fa-address-book-o', 'url' => ['/company-users/workers']],
                        ]
                    ],*/
                    ['label' => 'Руководители', 'icon' => 'fa fa-address-book-o', 'url' => ['/company-users/directors']],
                    ['label' => 'Дилеры', 'icon' => 'fa fa-address-book-o', 'url' => ['/dillers']],
                    //['label' => 'Проекты', 'icon' => 'fa fa-newspaper-o', 'url' => ['/projects']],
                    ['label' => 'Миссии', 'icon' => 'fa fa-newspaper-o', 'url' => ['/missions']],
                    ['label' => 'История', 'icon' => 'fa fa-newspaper-o', 'url' => ['/history']],
                    ['label' => 'Документы', 'icon' => 'fa fa-newspaper-o', 'url' => ['/documents']],
                    ['label' => 'Символика', 'icon' => 'fa fa-newspaper-o', 'url' => ['/pages/symbols']],
                    ['label' => 'Новости', 'icon' => 'fa fa-newspaper-o', 'url' => ['/news']],
                    ['label' => 'Акции', 'icon' => 'fa fa-newspaper-o', 'url' => ['/actions']],
                    ['label' => 'Слайдер авто', 'icon' => 'fa fa-newspaper-o', 'url' => ['/cars-slider']],
                    ['label' => 'Файлы',
                        'icon' => 'fa fa-clone',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Прайс', 'icon' => 'fa fa-file-o', 'url' => ['/pages/files?type=1']],
                            ['label' => 'Каталог', 'icon' => 'fa fa-file-o', 'url' => ['/pages/files?type=2']],
                            ['label' => 'Сертификат для дилерской сети', 'icon' => 'fa fa-file-o', 'url' => ['/pages/files?type=3']],
                        ]
                    ],
                    ['label' => 'Области', 'icon' => 'fa fa-newspaper-o', 'url' => ['/regions']],
                    //['label' => 'Галерея', 'icon' => 'fa fa-newspaper-o', 'url' => ['/gallery']],
                    //['label' => 'Цвет', 'icon' => 'fa fa-adjust', 'url' => ['/colors']],
                    ['label' => 'Страницы',
                        'icon' => 'fa fa-clone',
                        'url' => '#',
                        'items' => [
                           // ['label' => 'Главная', 'icon' => 'fa fa-file-o', 'url' => ['/pages/main']],
                           // ['label' => 'О нас', 'icon' => 'fa fa-file-o', 'url' => ['/pages/about']],
                            ['label' => 'FAQ', 'icon' => 'fa fa-file-o', 'url' => ['/faqs']],
                            ['label' => 'Контакты', 'icon' => 'fa fa-file-o', 'url' => ['/pages/contacts']],
                        ]
                    ],
                ['label' => 'Пикапы',
                    'icon' => 'fa fa-clone',
                    'url' => '#',
                    'items' => [
                        // ['label' => 'Главная', 'icon' => 'fa fa-file-o', 'url' => ['/pages/main']],
                        // ['label' => 'О нас', 'icon' => 'fa fa-file-o', 'url' => ['/pages/about']],
                        ['label' => 'Страница галерея', 'icon' => 'fa fa-file-o', 'url' => ['/irbis-gallery']],
                        ['label' => 'Страница пикапов', 'icon' => 'fa fa-file-o', 'url' => ['/pikups-page']],
                        ['label' => 'Таб-панели', 'icon' => 'fa fa-file-o', 'url' => ['/tab-panel']],
                    ]
                ],
//                ['label' => 'Вакансии',
//                    'icon' => 'fa fa-user',
//                    'url' => '#',
//                    'items' => [
//                        ['label' => 'Категорий вакансии', 'icon' => 'fa fa-address-book-o', 'url' => ['/vacancy-categories']],
//                        ['label' => 'Вакансии', 'icon' => 'fa fa-address-book-o', 'url' => ['/vacancy']],
//                        ['label' => 'Vacancy Request', 'icon' => 'fa fa-address-book-o', 'url' => ['/vacancy-request']],
//                        ['label' => 'Oтправленные друзьям', 'icon' => 'fa fa-address-book-o', 'url' => ['/vacancy-send']],
//                    ]
//                ],
//                    ['label' => 'Справочники',
//                        'icon' => 'fa fa-list',
//                        'url' => '#',
//                        'items' => [
//                            //['label' => 'Области', 'icon' => 'fa fa-list', 'url' => ['/regions']],
//                            ['label' => 'Страны', 'icon' => 'fa fa-list', 'url' => ['/countries']],
//                            ['label' => 'Города', 'icon' => 'fa fa-list', 'url' => ['/cities']],
//                        ]
//                    ],

                   // ['label' => 'Заказы', 'icon' => 'fa fa-envelope-o', 'url' => ['/orders']],
                    ['label' => 'Вакансии', 'icon' => 'fa fa-envelope-o', 'url' => ['/vacancy']],
                    ['label' => 'Резюме', 'icon' => 'fa fa-envelope-o', 'url' => ['/resume']],
                    ['label' => 'Вопросы', 'icon' => 'fa fa-envelope-o', 'url' => ['/questions']],
                    ['label' => 'Запись на прием', 'icon' => 'fa fa-envelope-o', 'url' => ['/receptions']],
                   // ['label' => 'Скачивание прайса', 'icon' => 'fa fa-download', 'url' => ['/download-price']],
                    //['label' => 'Партнерство', 'icon' => 'fa fa-envelope-o', 'url' => ['/partners']],
                    //['label' => 'Обратный звонок', 'icon' => 'fa fa-phone', 'url' => ['/calls']],
                    //['label' => 'Отзывы', 'icon' => 'fa fa-envelope-o', 'url' => ['/reviews']],
                    //['label' => 'Сообщения', 'icon' => 'fa fa-envelope-o', 'url' => ['/messages']],
                    //['label' => 'Комментарии', 'icon' => 'fa fa-envelope-o', 'url' => ['/comments']],
                    ['label' => 'Параметры', 'icon' => 'fa fa-cogs', 'url' => ['/pages/options']],
                    ['label' => 'Выйти', 'icon' => 'fa fa-exit', 'url' => ['/site/logout']]
                ];

        }else{ // менеджер
            $items = [
                ['label' => 'Главная', 'icon' => 'fa fa-dashboard', 'url' => ['/']],
                // ['label' => 'Пользователи', 'icon' => 'fa fa-user', 'url' => ['/user']] ,
                // ['label' => 'Категории', 'icon' => 'fa fa-newspaper-o', 'url' => ['/categories']],
                ['label' => 'Новости', 'icon' => 'fa fa-newspaper-o', 'url' => ['/news']],
                ['label' => 'Страницы',
                    'icon' => 'fa fa-clone',
                    'url' => '#',
                    'items' => [
                       // ['label' => 'Главная', 'icon' => 'fa fa-file-o', 'url' => ['/pages/main']],
                        //['label' => 'О нас', 'icon' => 'fa fa-file-o', 'url' => ['/pages/about']],
                        ['label' => 'FAQ', 'icon' => 'fa fa-file-o', 'url' => ['/pages/faq']],
                        ['label' => 'Контакты', 'icon' => 'fa fa-file-o', 'url' => ['/pages/contacts']],
                    ]
                ],
                /*['label' => 'Справочники',
                    'icon' => 'fa fa-list',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Страны', 'icon' => 'fa fa-list', 'url' => ['/countries']],
                        ['label' => 'Города', 'icon' => 'fa fa-list', 'url' => ['/cities']],
                    ]
                ],*/
                //['label' => 'Сообщения', 'icon' => 'fa fa-envelope-o', 'url' => ['/contacts-msg']],
                //['label' => 'Сообщения', 'icon' => 'fa fa-envelope-o', 'url' => ['/messages']],
                //['label' => 'Заказы', 'icon' => 'fa fa-envelope-o', 'url' => ['/orders']],
                //['label' => 'Партнерство', 'icon' => 'fa fa-envelope-o', 'url' => ['/partners']],
                //['label' => 'Обратный звонок', 'icon' => 'fa fa-phone', 'url' => ['/calls']],
               // ['label' => 'Сообщения', 'icon' => 'fa fa-envelope-o', 'url' => ['/messages']],
               // ['label' => 'Отзывы', 'icon' => 'fa fa-envelope-o', 'url' => ['/reviews']],
                //['label' => 'Комментарии', 'icon' => 'fa fa-envelope-o', 'url' => ['/comments']],
                //['label' => 'Параметры', 'icon' => 'fa fa-cogs', 'url' => ['/settings']],
                ['label' => 'Выйти', 'icon' => 'fa fa-exit', 'url' => ['/site/logout']]
            ];
        }
    ?>

    <!-- /.search form -->
    <?= dmstr\widgets\Menu::widget(
        [
            'options' => ['class' => 'sidebar-menu'],
            'items' => $items
            ,
        ]
    ); ?>

    </section>

</aside>
<?php } // isGuest ?>