<?php
/*echo Yii::$app->request->referrer;
exit; */

if( ! Yii::$app->user->isGuest || @Yii::$app->user->identity->role ==9) { ?>

    <aside class="main-sidebar">

    <section class="sidebar">

        <?php

        if( Yii::$app->user->identity->role == 9 ) { // админ
            $items = [
                    ['label' => 'Главная', 'icon' => 'dashboard', 'url' => ['/']],
                    ['label' => 'Карьера', 'icon' => 'dashboard', 'options' => ['class' => 'header']],
                    ['label' => 'Запросы и резюме', 'icon' => 'file-text', 'url' => ['/vacancy-request'],],
                    ['label' => 'Вопросы', 'icon' => 'question-circle-o', 'url' => ['/career-question']],
                    ['label' => 'Вакансии', 'icon' => 'address-card', 'url' => ['/vacancy']],
                    ['label' => 'Категорий вакансии', 'icon' => 'calendar-o', 'url' => ['/vacancy-category']],
                    ['label' => 'Информация', 'icon' => 'info', 'url' => ['/career-info']],
                    ['label' => 'История наших успехов', 'icon' => 'list-ul', 'url' => ['/career-history']],
                    ['label' => 'Первая страница', 'icon' => 'first-order', 'url' => ['/career-main-list']],
                    ['label' => 'Vacancy send friends', 'icon' => 'first-order', 'url' => ['/vacancy-send']],

                ];

        }else{ // менеджер
            $items = [
                ['label' => 'Главная', 'icon' => 'dashboard', 'url' => ['/']],
                ['label' => 'Новости', 'icon' => 'newspaper-o', 'url' => ['/news']],
                ['label' => 'Страницы',
                    'icon' => 'clone',
                    'url' => '#',
                    'items' => [
                        ['label' => 'FAQ', 'icon' => 'file-o', 'url' => ['/pages/faq']],
                        ['label' => 'Контакты', 'icon' => 'file-o', 'url' => ['/pages/contacts']],
                    ]
                ],
                ['label' => 'Выйти', 'icon' => 'exit', 'url' => ['/site/logout']]
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