<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 30.11.2018
 * @var $transport \common\models\Transport
 * Time: 16:05
 */

use common\helpers\LangHelper;
use yii\helpers\Html;

\frontend\assets\AppAsset::register($this);

$title = 'title_' . $lang;
$_title = LangHelper::t("КАТЕГОРИИ МАШИН", "MASHINA KATEGORIYALARI", "MACHINE CATEGORIES");
$this->title = $_title;
$_engine['cilinders'][0] = 3;
$_engine['cilinders'][1] = 4;
$_engine['cilinders'][2] = 6;
$_engine['cilinders'][3] = 8;
?>

<style>
    button:focus {
        outline: none !important;
        border: none;
    }
</style>


<div class="products section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?= $_title ?></div>
        <div class="flex_row">
            <div class="item" data-aos="zoom-in">
                <a href="/transport/bus" class="wrap">
                    <div class="icon">
                        <img src="/images/transport/bus.jpg">
                    </div>
                    <div class="mTitle2"><?= LangHelper::t("АВТОБУСЫ", "AVTOBUSLAR", "BUSES"); ?></div>
                </a>
            </div>
            <div class="item" data-aos="zoom-in">
                <a href="/transport/trucks" class="wrap preload">
                    <div class="icon">
                        <img src="/images/transport/truck.jpg">
                    </div>
                    <div class="mTitle2"><?= LangHelper::t("ГРУЗОВЫЕ АВТОМОБИЛИ", "YUK AVTOMOBILLARI", "TRUCKS"); ?></div>
                </a>
            </div>
            <div class="item" data-aos="zoom-in">
                <a href="/transport/special" class="wrap preload">
                    <div class="icon">
                        <img src="/images/transport/special.jpg">
                    </div>
                    <div class="mTitle2"><?= LangHelper::t("СПЕЦ АВТОМОБИЛИ", "MAXSUS AVTOULOVLAR", "SPECIAL BODY TRUCKS"); ?></div>
                </a>
            </div>
            <div class="item" data-aos="zoom-in">
                <a href="/transport/pickups" class="wrap preload">
                    <div class="icon">
                        <img style="height: 155px; background-color: white;" src="/images/1595412091.png">
                    </div>
                    <div class="mTitle2"><?= LangHelper::t("ПИКАПЫ", "PIKAPLAR", "PICKUPS"); ?></div>
                </a>
            </div>
        </div>

        <div class="container">
            <div class="configuration">
                <h2>КОНФИГУРАТОР</h2>
                <div class="select-type">
                    <div class="progress-step">
                        <div class="done p-hide" id="option-1-1">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="in-progress" id="option-1-2">
                            <i class="fas fa-chevron-circle-right"></i>
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="right-content">
                        <h3>1. Тип транспортного средства</h3>
                        <ul class="step-1">
                            <li id="select-type-1" onclick="select_type(1)">
                                <label>
                                    <input type="radio" name="type" value="1">
                                    <img src="/images/transport/modern-bus.svg" class="reverse-img">
                                    <span>Автобус</span>
                                </label>
                            </li>
                            <li id="select-type-2" id="select-typ-2" onclick="select_type(2)">
                                <label>
                                    <input type="radio" name="type" value="2">
                                    <img src="/images/transport/kamaz.svg">
                                    <span>Грузовой автомобиль</span>
                                </label>
                            </li>
                            <li id="select-type-3" id="select-typ-3" onclick="select_type(3)">
                                <label>
                                    <input type="radio" name="type" value="3" >
                                    <img src="/images/transport/a.png" class="reverse-img">
                                    <span>Специализированный автомобиль</span>
                                </label>
                            </li>
                            <li id="select-type-4" id="select-typ-4" onclick="select_type(4)">
                                <label>
                                    <input type="radio" name="type" value="4">
                                    <img src="/images/transport/pickup.svg">
                                    <span>Пикап</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="configuration">
                <?= Html::beginForm(['transport/search'], 'POST'); ?>
                <div id="type-1">
                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>2. <?= LangHelper::t("Назначение", "Vazifasi", "Classification"); ?></h3>
                            <ul class="step-2">
                                <li>
                                    <label>
                                        <input type="radio" name="destination" value="Городской">
                                        <span>Городской</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="destination" value="Междугородний">
                                        <span>Междугородные</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="destination" value="Пригородные">
                                        <span>Пригородные</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="destination" value="Туристические">
                                        <span>Туристические</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>3. по длине / пассажировместимости:</h3>
                            <select name="passengers" class="classic">
                                <option value="15">малого класса — (7 - 7,5 м / 15-45 чел.)
                                </option>
                                <option value="46">среднего класса — (8 - 9,5 м / 46-80 чел.)</option>
                                <option value="81">большого класса — (10-11 м / 81-115 чел.)</option>
                                <option value="116">особо большого класса — (12 - 17 м / 116 и более чел.)</option>
                            </select>
                        </div>
                    </div>


                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>4. <?= LangHelper::t("Топлива", "Yoqilg`i", "Fuel"); ?></h3>
                            <ul class="step-2">
                                <li>
                                    <label>
                                        <input type="radio" name="back" value="1">
                                        <span><?= LangHelper::t("Дизель", "Dizel", "Diesel"); ?> </span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="back" value="2">
                                        <span><?= LangHelper::t("Газ", "Gaz", "Gas"); ?> </span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button type="submit">
                        <a onclick="show_generated()" id="generated_button" class="ButtonBox js_internal-link"
                           style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);text-decoration: none;">
                            <span class="ButtonBox-text">Сконфигурировать</span>
                            <span class="ButtonBox-icon">
                <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path
                            d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
            </span>
                        </a>
                    </button>
                </div>

                <?= Html::endForm(); ?>
            </div>
            <div class="configuration">
                <?= Html::beginForm(['transport/search1'], 'POST'); ?>
                <div id="type-2">
                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>2. Обычный (тип кузова):</h3>
                            <select name="mass" class="classic">
                                <option value="1">бортовой</option>
                                <option value="2">тентованный</option>
                            </select>
                        </div>
                    </div>

                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>3. Специализированный:</h3>
                            <select name="special" class="classic">
                                <option value="Aвтофургон">автофургон</option>
                                <option value="изотермический">изотермический</option>
                                <option value="рефрижератор">рефрижератор</option>
                                <option value="самосвал">самосвал</option>
                                <option value="тягач">тягач</option>
                                <option value="автоцистерны">автоцистерны (водовоз, молоковоз, ассенизаторы и др.)
                                </option>
                                <option value="мусоровозы">мусоровозы</option>
                            </select>
                        </div>
                    </div>

                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>4. Грузоподъёмность:</h3>
                            <select name="trucks" class="classic">
                                <option value="4">от 1 до 4 тонн</option>
                                <option value="8">от 4 до 8 тонн</option>
                                <option value="12">от 8 до 12 тонн</option>
                                <option value="16">от 12 до 16 тонн</option>
                                <option value="20">от 16 до 20 тонн</option>
                                <option value="25">от 20 и более</option>
                            </select>
                        </div>
                    </div>
                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>5. Тип топлива:</h3>
                            <ul class="step-2">
                                <li>
                                    <label>
                                        <input type="radio" name="front" value="0">
                                        <span><?= LangHelper::t("Бензин", "Benzin", "Petrol"); ?></span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="front" value="1">
                                        <span><?= LangHelper::t("Дизель", "Dizel", "Diesel"); ?> </span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="front" value="2">
                                        <span><?= LangHelper::t("Газ", "Gaz", "Gas"); ?> </span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>
                                6. <?= LangHelper::t("Колесная формула", "G'ildirak formulasi (nisbati)", "Driving system"); ?></h3>
                            <ul class="step-2">
                                <li>
                                    <label>
                                        <input type="radio" name="gears" value="4х2">
                                        <span>4х2</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="gears" value="4х4">
                                        <span>4х4 </span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="gears" value="6х4">
                                        <span>6х4 </span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button type="submit">
                        <a onclick="show_generated()" id="generated_button" class="ButtonBox js_internal-link"
                           style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);text-decoration: none;">
                            <span class="ButtonBox-text">Сконфигурировать</span>
                            <span class="ButtonBox-icon">
                <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path
                            d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
            </span>
                        </a>
                    </button>
                </div>

                <?= Html::endForm(); ?>
            </div>
            <div class="configuration">
                <?= Html::beginForm(['transport/search2'], 'POST'); ?>
                <div id="type-3">
                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>
                                2. <?= LangHelper::t("СПЕЦ АВТОМОБИЛИ", "MAXSUS AVTOULOVLAR", "SPECIAL BODY TRUCKS") ?> </h3>
                            <select name="auto" class="classic">
                                <option value="Пожарный">Пожарные машины</option>
                                <option value="скорой">Автомобили скорой медицинской помощи</option>
                                <option value="Автовышка">Автовышки</option>
                                <option value="Водовоз">Водовоз</option>
                                <option value="other">Др.</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit">
                        <a onclick="show_generated()" id="generated_button" class="ButtonBox js_internal-link"
                           style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);text-decoration: none;">
                            <span class="ButtonBox-text">Сконфигурировать</span>
                            <span class="ButtonBox-icon">
                <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path
                            d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
            </span>
                        </a>
                    </button>
                </div>

                <?= Html::endForm(); ?>
            </div>
            <div class="configuration">
                <?= Html::beginForm(['transport/search3'], 'POST'); ?>
                <div id="type-4">
                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>2. <?= LangHelper::t("Коробка передач", "Uzatmalar qutisi", "Transmission"); ?>:</h3>
                            <ul class="step-2">
                                <li>
                                    <label>
                                        <input type="radio" name="gearbox" value="1">
                                        <span>Автоматическая</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="gearbox" value="2">
                                        <span>Механическая</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>
                                3. <?= LangHelper::t("Колесная формула", "G'ildirak formulasi (nisbati)", "Driving system"); ?></h3>
                            <ul class="step-2">
                                <li>
                                    <label>
                                        <input type="radio" name="gears" value="4х2">
                                        <span>4х2</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="gears" value="4х4">
                                        <span>4х4</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>4. Объём двигателя:</h3>
                            <ul class="step-2">
                                <li>
                                    <label>
                                        <input type="radio" name="volume" value="2 499">
                                        <span>2 499 см3</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="volume" value="2 999">
                                        <span>2 999 см3</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="select-type">
                        <div class="progress-step">
                            <div class="done p-hide">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="in-progress">
                                <i class="fas fa-chevron-circle-right"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="right-content">
                            <h3>5. Кабина:</h3>
                            <ul class="step-2">
                                <li>
                                    <label>
                                        <input type="radio" name="count" value="1">
                                        <span>Однорядная</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="count" value="2">
                                        <span>Двухрядная</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button type="submit">
                        <a onclick="show_generated()" id="generated_button" class="ButtonBox js_internal-link"
                           style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);text-decoration: none;">
                            <span class="ButtonBox-text">Сконфигурировать</span>
                            <span class="ButtonBox-icon">
                <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path
                            d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
            </span>
                        </a>
                    </button>

                </div>

                <?= Html::endForm(); ?>
            </div>
        </div>
    </div>

    <?php

    if (isset($transport)) {
        ?>
        <div class="container">
            <div class="generate">
                <?php foreach ($transport as $t):
                    $data = json_decode($t->data, true);
                    $data = $data['complect'];
                    ?>

                    <div class="generated-contend">
                        <header>
                            <section class="left-content">
                                <h4>КОНФИГУРАЦИЯ</h4>
                                <table>
                                    <tbody>
                                    <tr>
                                        <?php if (!empty(@$data['destination'])): ?>
                                            <td>Тип техники</td>
                                            <td><?= LangHelper::t("Тип", "Turi", "Type") . ': ' . @$data['destination'] ?></td>
                                        <?php endif ?>
                                    </tr>
                                    <tr>
                                        <?php if (!empty(@$data['gears_en'])): ?>
                                            <td><?= LangHelper::t("Колесная формула", "G'ildirak formulasi (nisbati)", "Driving system"); ?></td>
                                            <td><?= @$data['gears_en'] ?></td>
                                        <?php endif ?>
                                    </tr>
                                    <tr>
                                        <?php if (!empty(@$data['engine_model'])): ?>
                                            <td><?= LangHelper::t("Модель", "Model", "Model"); ?></td>
                                             <td><?= @$data['engine_model'] ?></td>
                                        <?php endif ?>
                                    </tr>
                                    <tr>
                                        <?php if (!empty(@$data['cilinders'])): ?>
                                            <td><?= LangHelper::t("Мощность, л.с. / об.мин", "Quvvati, o.k./ayl.", "Max.power, h.p/rpm"); ?></td>
                                            <td><?= @$_engine['cilinders'][@$data['cilinders']] ?></td>
                                        <?php endif ?>
                                    </tr>
                                    </tbody>
                                </table>
                            </section>
                            <section class="right-content">
                                <?php if ($t->id == 31 or $t->id == 32 or $t->id == 29) { ?>
                                    <h4>РЕЗУЛЬТАТЫ</h4>
                                    <div class="results">
                                        <img src="/uploads/transport/<?= $t->id ?>/thumb/<?= $t->image ?>">
                                        <div>
                                            <a href="pickupitem/<?= $t->id ?>"><?= $t->$title ?></a>
                                            <p></p>
                                        </div>
                                    </div>
                                    <a href="https://samauto.uz/dillers" class="ButtonBox js_internal-link"
                                       style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);text-decoration: none;">
                                        <span class="ButtonBox-text">Найти дилера</span>
                                        <span class="ButtonBox-icon">
                        <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path
                                    d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
                    </span>
                                    </a>
                                <?php } ?>
                                <?php if (!($t->id == 31 or $t->id == 32 or $t->id == 29)) { ?>
                                    <h4>РЕЗУЛЬТАТЫ</h4>
                                    <div class="results">
                                        <img src="/uploads/transport/<?= $t->id ?>/thumb/<?= $t->image ?>">
                                        <div>
                                            <a href="item/<?= $t->id ?>"><?= $t->$title ?></a>
                                            <p></p>
                                        </div>
                                    </div>
                                    <a href="https://samauto.uz/dillers " class="ButtonBox js_internal-link"
                                       style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);text-decoration: none;">
                                        <span class="ButtonBox-text">Найти дилера</span>
                                        <span class="ButtonBox-icon">
                        <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path
                                    d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
                    </span>
                                    </a>
                                <?php } ?>
                            </section>
                        </header>
                    </div>
                <?php endforeach;
                ?>
            </div>
        </div>

    <?php } ?>
</div>


<div data-aos="fade-up" data-aos-delay="300">

    <div class="site_bread">
        <div class="centerBox">
            <a href="/"><?= LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
            <span><?= LangHelper::t("КАТЕГОРИИ МАШИН", "MASHINA KATEGORIYALARI", "MACHINE CATEGORIES"); ?></span>
        </div>
    </div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $("#type-1").addClass('p-hide');
        $("#type-2").addClass('p-hide');
        $("#type-3").addClass('p-hide');
        $("#type-4").addClass('p-hide');

        var props = {
            type: ''
        }

        let type_1_props = {
            val_2: '',
            val_3: '',
            val_4: ''
        }
        let type_2_props = {
            val_2: '',
            val_3: '',
            val_4: '',
            val_5: '',
            val_6: ''
        }
        let type_3_props = {
            val_2: ''
        }
        let type_4_props = {
            val_2: '',
            val_3: '',
            val_4: '',
            val_5: ''
        }

        $('#type-1').on('change', function() {
          type_1_props.val_2 = $('input[name=destination]:checked', '#type-1').val() ? $('input[name=destination]:checked', '#type-1').val() : '';
          type_1_props.val_3 = $('select[name=passengers]', '#type-1').val() ? $('select[name=passengers]', '#type-1').val() : '';
          type_1_props.val_4 = $('input[name=back]:checked', '#type-1').val() ? $('input[name=back]:checked', '#type-1').val() : '';

          console.log(type_1_props)
        });
        $('#type-2').on('change', function() {
          type_2_props.val_2 = $('select[name=mass]', '#type-2').val() ? $('select[name=mass]', '#type-2').val() : '';
          type_2_props.val_3 = $('select[name=special]', '#type-2').val() ? $('select[name=special]', '#type-2').val() : '';
          type_2_props.val_4 = $('select[name=trucks]', '#type-2').val() ? $('select[name=trucks]', '#type-2').val() : '';

          type_2_props.val_5 = $('input[name=front]:checked', '#type-2').val() ? $('input[name=front]:checked', '#type-2').val() : '';
          type_2_props.val_6 = $('input[name=gears]:checked', '#type-2').val() ? $('input[name=gears]:checked', '#type-2').val() : '';
          console.log(type_2_props)
        });
        $('#type-3').on('change', function() {
          type_3_props.val_2 = $('select[name=auto]', '#type-3').val() ? $('select[name=auto]', '#type-3').val() : '';
          console.log(type_3_props)
        });
        $('#type-4').on('change', function() {
          type_4_props.val_2 = $('input[name=gearbox]:checked', '#type-4').val() ? $('input[name=gearbox]:checked', '#type-4').val() : '';
          type_4_props.val_3 = $('input[name=gears]:checked', '#type-4').val() ? $('input[name=gears]:checked', '#type-4').val() : '';
          type_4_props.val_4 = $('input[name=volume]:checked', '#type-4').val() ? $('input[name=volume]:checked', '#type-4').val() : '';
          type_4_props.val_5 = $('input[name=count]:checked', '#type-4').val() ? $('input[name=count]:checked', '#type-4').val() : '';

          console.log(type_4_props)
        });


        function select_type(val) {
            $("#select-type-1").removeClass('active')
            $("#select-type-2").removeClass('active')
            $("#select-type-3").removeClass('active')
            $("#select-type-4").removeClass('active')

            let name_id = "#select-type-" + val;
            $(name_id).addClass('active');
            $('#option-1-1').removeClass('p-hide');
            $('#option-1-2').addClass('p-hide');


            // show, hide types content
            let name_id_show = "#type-" + val;
            $("#type-1").addClass('p-hide');
            $("#type-2").addClass('p-hide');
            $("#type-3").addClass('p-hide');
            $("#type-4").addClass('p-hide');
            $(name_id_show).removeClass('p-hide');

            props.type = val;
            console.log(props)
        }

        function show_generated() {
            $('.generated-contend').removeClass('p-hide');
            $('#generated_button').addClass('p-hide')

            $.ajax({url: "https://api.thedogapi.com/v1/images/search?size=med&mime_types=jpg&format=json&has_breeds=true&order=RANDOM", success: function(result){
                console.log(result[0].height)
              }});
        }
    </script>

    <?= $this->render('../layouts/_footer') ?>