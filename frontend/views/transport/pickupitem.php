<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 03.12.2018
 * Time: 10:28
 */

use common\helpers\LangHelper;
use frontend\assets\IrbisAsset;

IrbisAsset::register($this);

$title = 'title_'.$lang;
$content = 'content_'.$lang;
$file_title = 'file_title_'.$lang;
$destination = 'destination_'.$lang;
$podves_front = 'podves-front_'.$lang;
$podves_back = 'podves-back_'.$lang;
$abs = 'abs_'.$lang;
$gears = 'gears_'.$lang;

$this->title = LangHelper::t("ТРАНСПОРТ", "TRANSPORT", "TRANSPORT") . '. ' . $transport->$title;
// echo '<pre>'; print_r($data); echo '</pre>';

$_transport_types = [
    LangHelper::t("АВТОБУСЫ", "AVTOBUSLAR", "BUSES"),
    LangHelper::t("ГРУЗОВЫЕ АВТОМОБИЛИ", "YUK AVTOMOBILLARI", "TRUCKS"),
    LangHelper::t("СПЕЦ АВТОМОБИЛИ", "MAXSUS AVTOULOVLAR", "SPECIAL BODY TRUCKS"),
    LangHelper::t("ПИКАПЫ", "PIKAPLAR", "PICKUPS"),
];

$_transport_url = [
    'bus',
    'trucks',
    'special',
    'pickups',
];


@$data['destination'] = @$data[$destination] ?? @$data['destination'];
@$data['podves-front'] = @$data[$podves_front] ?? @$data['podves-front'];
@$data['podves-back'] = @$data[$podves_back] ?? @$data['podves-back'];
@$data['abs'] = @$data[$abs] ?? @$data['abs'];
@$data['gears'] = @$data[$gears] ?? @$data['gears'];
// расположение поршней
$_engine['type'][0] =LangHelper::t("Рядный", "Bir qator", "In line");
$_engine['type'][1] =LangHelper::t("V-образный", "V-simon", "V-type");
$_engine['cilinders'][0] = 3;
$_engine['cilinders'][1] = 4;
$_engine['cilinders'][2] = 6;
$_engine['cilinders'][3] = 8;
$_engine['drive'][0] =LangHelper::t("Передний", "Old", "Front");
$_engine['drive'][1] =LangHelper::t("Задний", "Orqa", "Rear");
$_engine['drive'][2] =LangHelper::t("Оба", "Barchasi", "Both");
$_engine['gearbox'][0] =LangHelper::t("Механическая", "Mexanik", "Manual");
$_engine['gearbox'][1] =LangHelper::t("Автоматическая", "Avtomatik", "Automatic");
$_engine['gearstop-front'][0] =LangHelper::t("Дисковые", "Diskli", "Disc");
$_engine['gearstop-front'][1] =LangHelper::t("Барабанные", "Barabanli", "Drum");
$_engine['gearstop-back'][0] =LangHelper::t("Дисковые", "Diskli", "Disc");
$_engine['gearstop-back'][1] =LangHelper::t("Барабанные", "Barabanli", "Drum");
$_engine['fuel-type'][0] =LangHelper::t("Бензин", "Benzin", "Petrol");
$_engine['fuel-type'][1] =LangHelper::t("Дизель", "Dizel", "Diesel");
$_engine['fuel-type'][2] =LangHelper::t("Газ", "Gaz", "Gas");
$_engine['abs'][0] =LangHelper::t("Имеется", "Mavjud", "Available");
$_engine['abs'][1] =LangHelper::t("Не имеется", "Mavjud emas", "Not available");
$_engine['abs']['Есть'] =LangHelper::t("Имеется", "Mavjud", "Available");
$_engine['abs']['Нет'] =LangHelper::t("Не имеется", "Mavjud emas", "Not available");
?>
    <style>

        @media (max-width: 768px) {
            .container {
                margin: 0 0;
            }
            html {
                overflow-x: auto;
            }
        }
        @media (max-width: 768px) {

        }
        @media (max-width: 768px) {
            .tab-content h3 {
                padding: 0 30px !important;
            }
            #exTab2 a {
                padding: 0 30px !important;
            }
            .tab-content p {
                padding: 0 30px !important;
            }
        }
        .tab-content p {
            padding: 0 15px;
            font-size: 40px;
        }

        .tab-content img {

        }

        .tab-content h3 {
            line-height: 28px;
            margin-top: 20px;
            padding: 0 15px;
            font-size: 18px !important;
            color: #868786;
        }

        #exTab2 a {
            padding: 0 15px;
            color: #868786;
            font-weight: bolder;
            font-size: 20px;
        }

        #exTab2 li.active a {
            color: #ffffff;
            background-color: #be2829;
        }

        #exTab2 a:hover {
            color: #ffffff;
            background-color: #be2829;
        }

        .ButtonBox {
            display: inline-block;
            position: relative;
            background-color: #c62829;
            padding: 14px 60px 14px 18px;
            overflow: hidden;
            transition: background-color .2s cubic-bezier(.52, .08, .18, 1) 0s;
            text-transform: uppercase;
        }

    </style>
    <div class="transport-page section-gap">
        <div class="small_container">
            <div class="flex_row_beet" style="align-items:flex-start;flex-wrap:wrap">
                <?php $_title = preg_replace("/<br>/Ui", "  ", $transport->$title) ?>
                <div class="mTitle" data-aos="fade-right"><?= $_title ?></div>
                <?php if (isset($data['file']) && $data['file'] != '') { ?>
                    <a href="/uploads/transport/<?= $transport->id . '/' . $data['file'] ?>" download
                       class="download"><?= LangHelper::t("СКАЧАТЬ", "YUKLAB OLISH", "DOWNLOAD"); ?>
                        : <?= $transport->$file_title ?></a>
                <?php } ?>
            </div>
<?php if(!empty($pikups->$content)){?>
            <p style="font-size: 18px; color: #868786; line-height: 28px; margin: 0;"><?=$pikups->$content?> </p>
<?php }?>
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="gallery gallerySlider">
                    <div class="wrap">

                        <?php if ($transport->gallery) {
                            foreach ($transport->gallery as $gallery) {
                                ?>
                                <div class="item">
                                    <div>
                                        <img src="/uploads/transport/<?= $gallery->transport_id . '/gallery/thumb/' . $gallery->image ?>"
                                             alt="">
                                        <a href="/uploads/transport/<?= $gallery->transport_id . '/gallery/' . $gallery->image ?>"
                                           data-lightbox="gallery" class="overlayBlack">
                                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                 width="2.3098mm"
                                                 height="2.28mm" version="1.1"
                                                 style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd"
                                                 viewBox="0 0 17.24 17.02">
                                            <g>
                                                <g>
                                                    <path d="M-0 6.9c0,1.33 0.14,2.27 0.7,3.37 0.46,0.91 1.1,1.82 1.92,2.45 0.97,0.75 1.73,1.14 2.96,1.45 0.27,0.07 0.46,0.09 0.77,0.13 1.54,0.21 2.85,-0.13 4.19,-0.8l0.9 -0.52 3.01 3.71c0.72,0.76 1.11,0.06 1.83,-0.65 0.21,-0.22 0.98,-0.87 0.98,-1.15 0,-0.62 -0.86,-1.1 -1.39,-1.56 -0.65,-0.57 -1.44,-1.17 -2.13,-1.75 -0.09,-0.08 -0.17,-0.13 -0.27,-0.21 -0.13,-0.11 -0.12,-0.12 -0.28,-0.21 0.04,-0.15 0.12,-0.26 0.2,-0.39 0.09,-0.14 0.14,-0.25 0.21,-0.39 0.91,-1.82 0.97,-3.74 0.32,-5.66 -0.08,-0.25 -0.17,-0.4 -0.26,-0.63l-0.3 -0.56c-0.06,-0.1 -0.12,-0.17 -0.18,-0.27l-0.36 -0.5c-0.15,-0.21 -0.65,-0.75 -0.85,-0.91 -0.85,-0.65 -0.8,-0.71 -1.87,-1.22 -0.37,-0.18 -0.89,-0.33 -1.32,-0.44 -1.44,-0.35 -3.15,-0.19 -4.48,0.41 -1.61,0.72 -2.6,1.72 -3.44,3.17l-0.41 0.89c-0.08,0.22 -0.15,0.45 -0.22,0.68 -0.12,0.41 -0.23,1.05 -0.23,1.56zm7.16 -5.46c3.14,0 5.68,2.54 5.68,5.68 0,3.13 -2.54,5.68 -5.68,5.68 -3.14,0 -5.68,-2.54 -5.68,-5.68 0,-3.14 2.54,-5.68 5.68,-5.68z"></path>
                                                    <path d="M3.68 7.82c-0.01,-0.47 0.01,-0.78 0.14,-1.23 0.55,-1.93 1.81,-3.01 3.79,-3.23 0.27,0 0.43,-0.03 0.49,-0.09 0.36,-0.61 0.09,-0.9 -0.81,-0.88 -2.41,0.03 -3.94,1.31 -4.6,3.84 -0.09,0.33 -0.23,0.97 -0.08,1.36 0.11,0.29 0.63,0.48 0.89,0.42 0.1,-0.02 0.16,-0.08 0.18,-0.19z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        </a>
                                    </div>
                                </div>
                            <?php }
                        } ?>

                    </div>
                </div>
            <div class="nav-tabs">
                <div class="menu-links">
                    <a href="#" class="active"><?=LangHelper::t("ОСНОВНЫЕ ХАРАКТЕРИСТИКИ", "ASOSIY TASNIFLARI", "MAIN SPECIFICATIONS"); ?></a>
                    <a href="#"><?=LangHelper::t("ДВИГАТЕЛЬ", "DVIGATEL", "ENGINE"); ?></a>
                    <a href="#"><?=LangHelper::t("ТОРМОЗНАЯ СИСТЕМА", "TORMOZ TIZIMI", "BRAKE SYSTEM"); ?></a>
                    <a href="#"><?=LangHelper::t("ПРОЧИЕ ХАРАКТЕРИСТИКИ", "BOSHQA TASNIFLARI", "OTHER SPECIFICATIONS"); ?></a>
                </div>
            </div>
            <div class="tab-caption">
            <div class="tab-pane active">
                <div class="box" style="transition-delay:.1s">
                    <div>
                        <div class="t"><?=LangHelper::t("Назначение", "Vazifasi", "Classification"); ?></div>
                        <div class="scrollY">
                            <p><?=LangHelper::t("Тип", "Turi", "Type") . ': ' . @$data['destination'] ?><br>
                                <?=LangHelper::t("Класс", "Klassi", "Class") . ': ' . @$data['class'] ?></p>
                        </div>
                    </div>

                </div>
                <div class="box" style="transition-delay:.2s">
                    <div>
                        <div class="t"><?=LangHelper::t("Размеры", "O'lchamlari", "Overall dimensions"); ?>, mm</div>
                        <div class="scrollY">
                            <p><?=LangHelper::t("Длина", "Uzunligi", "Length") . ': ' . @$data['length'] ?><br>
                                <?=LangHelper::t("ширина", "Kengligi", "Width") . ': ' . @$data['width'] ?><br>
                                <?=LangHelper::t("Высота", "Balandligi", "Height") . ': ' . @$data['height'] ?><br></p>
                        </div>
                    </div>

                </div>
                <div class="box" style="transition-delay:.3s">
                    <?php if($transport->type==0 or $transport->type==3){ ?>
                    <div>
                        <div class="t"><?=LangHelper::t("Пассажиры", "Yo'lovchilar", "Passengers"); ?></div>
                        <div class="scrollY">
                            <p><?=LangHelper::t("Пассажиров", "Yo'lovchilar soni", "Total passenger capacity") . ': ' . @$data['count'] ?><br>
                                <?=LangHelper::t("Мест для сидения", "O'rindiqlar", "Number of seats") . ': ' . @$data['count_branch'] ?>
                            </p>
                        </div>
                    </div>
                    <?php }else{ ?>
                        <div>
                            <div class="t"><?=LangHelper::t("Размеры кузова", "Kuzov o'lchamlari", "Body dimentions"); ?>, mm</div>
                            <div class="scrollY">
                                <p><?=LangHelper::t("Длина", "Uzunligi", "Length") . ': ' . @$data['length_trucks'] ?><br>
                                    <?=LangHelper::t("ширина", "Kengligi", "Width") . ': ' . @$data['width_trucks'] ?><br>
                                    <?=LangHelper::t("Высота", "Balandligi", "Height") . ': ' . @$data['height_trucks'] ?><br></p>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <div class="box" style="transition-delay:.4s">
                    <div>
                        <div class="t"><?=LangHelper::t("Масса, кг", "Massasi, kg", "Weight, kg"); ?></div>
                        <div class="scrollY">
                            <p>
                                <?=LangHelper::t("Полная масса", "To'la og'irligi", "GVM") . ': ' . @$data['mass'] ?><br>
                                <?=  LangHelper::t("Грузоподъемность", "Yuk ko'tarish qobiliyati", "Payload") . ': ' . @$data['mass-max'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box" style="transition-delay:.5s">

                    <div>
                        <div class="t"><?=LangHelper::t("Топлива", "Yoqilg`i", "Fuel"); ?></div>
                        <div class="scrollY">

                            <p><?=LangHelper::t("Тип", "Turi", "Type") . ': ' . $_engine['fuel-type'][ @$data['fuel-type'] ] ?></p>
                            <p><?=LangHelper::t("Расход топлива", "Yoqilg`i sarfi", "Fuel consumption") . ': ' . @$data['expense_city'] ?></p>
                            <p><?=LangHelper::t("Объем бака", "Hajmi", "Volume of the tank") . ': ' . @$data['fuel-size'] ?></p>

                        </div>
                    </div>

                    <?php /*

                     <div>
                        <div class="t"><?=LangHelper::t("КОЛИЧЕСТВО ДВЕРЕЙ", "ESHIKLAR SONI", "NUMBER OF DOORS"); ?></div>
                        <div class="scrollY">
                            <p><?=@$data['doors'] ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="t"><?=LangHelper::t("МАКСИМАЛЬНАЯ СКОРОСТЬ, КМ/Ч", "MAKSIMAL TEZLIGI, KM/SOAT", "MAX.SPEED, KM/H"); ?></div>
                        <div class="scrollY">
                            <p><?=@$data['speed'] ?></p>
                        </div>
                    </div>

                    <div>
                        <div class="t"><?=LangHelper::t("КОМПЛЕКТАЦИЯ", "BUTLANGANLIGI", "EQUIPMENT"); ?></div>
                        <div class="scrollY">
                            <p>- <?=LangHelper::t("Пневматическая подвеска", "Pnevmatik osma", "Air suspension"); ?></p>
                            <p>- <?=LangHelper::t("Боковые стекла на клеевом соединении", "Yelimlangan yon oynalar", "Side glasses with adhesive joint"); ?></p>
                            <p>- <?=LangHelper::t("Форточки на боковых стеклах", "Yon oynalari fortochkalari", "Side glass vents"); ?></p>
                            <p>- <?=LangHelper::t("Зеркала заднего вида с подогревом", "Issitgishli orqani ko'rish ko'zgulari", "Rearview mirror with heating"); ?></p>
                            <p>- <?=LangHelper::t("Трафаретные маршрутоукахатели", "Trafaretli yo'nalish ko'rsatgichlari", "Bus route digital display"); ?></p>
                            <p>- <?=LangHelper::t("Сиденье водителя с механическим подрессориванием", "Haydovchi o'rindig'i mehanik osmali", "Driver's seat with mechanical spring"); ?></p>
                            <p>- Пневматическая подвеска</p>
                            <p>- Боковые стекла на клеевом соединении</p>
                            <p>- Форточки на боковых стеклах</p>
                            <p>- Зеркала заднего вида с подогревом</p>
                            <p>- Трафаретные маршрутоукахатели</p>
                            <p>- Сиденье водителя с механическим подрессориванием</p>
                        </div>
                    </div> */ ?>

                </div>
            </div>
            <div class="tab-pane">
                <div class="box" style="transition-delay:.1s">
                    <div>
                        <div class="t"><?=LangHelper::t("Модель", "Model", "Model"); ?></div>
                        <div class="scrollY">
                            <p><?=@$data['engine_model'] ?></p>
                        </div>
                    </div>


                </div>
                <div class="box" style="transition-delay:.2s">

                    <div>
                        <div class="t"><?=LangHelper::t("Объем", "Hajmi", "Volume"); ?>, cm<sup>3</sup></div>
                        <div class="scrollY">
                            <p><?=@$data['engine_volume'] ?></p>
                        </div>
                    </div>

                </div>
                <div class="box" style="transition-delay:.3s">
                    <div>
                        <div class="t"><?=LangHelper::t("Мощность, л.с. / об.мин", "Quvvati, o.k./ayl.", "Max.power, h.p/rpm"); ?></div>
                        <div class="scrollY">
                            <p><?=@$data['max-power'] . ' / ' . @$data['power-rotate'] ?></p>
                        </div>
                    </div>

                </div>
                <div class="box" style="transition-delay:.4s">
                    <div>
                        <div class="t"><?=LangHelper::t("Количество цилиндров", "Silindr soni", "Number of cilinders"); ?></div>
                        <div class="scrollY">
                            <p><?=@$_engine['cilinders'][@$data['cilinders']] ?></p>
                        </div>
                    </div>

                </div>
                <div class="box" style="transition-delay:.5s">
                    <div>
                        <div class="t"><?=LangHelper::t("Тип", "Turi", "Type"); ?></div>
                        <div class="scrollY">
                            <p><?=@$_engine['type'][@$data['type']] ?></p>
                        </div>
                    </div>
                    <?php /*
                    <div>
                        <div class="t">КОМПЛЕКТАЦИЯ</div>
                        <div class="scrollY">
                            <p>- Пневматическая подвеска</p>
                            <p>- Боковые стекла на клеевом соединении</p>
                            <p>- Форточки на боковых стеклах</p>
                            <p>- Зеркала заднего вида с подогревом</p>
                            <p>- Трафаретные маршрутоукахатели</p>
                            <p>- Сиденье водителя с механическим подрессориванием</p>
                            <p>- Пневматическая подвеска</p>
                            <p>- Боковые стекла на клеевом соединении</p>
                            <p>- Форточки на боковых стеклах</p>
                            <p>- Зеркала заднего вида с подогревом</p>
                            <p>- Трафаретные маршрутоукахатели</p>
                            <p>- Сиденье водителя с механическим подрессориванием</p>
                        </div>
                    </div> */ ?>
                </div>
            </div>
            <div class="tab-pane">
                <div class="box" style="transition-delay:.1s">
                    <div>
                        <div class="t"><?=LangHelper::t("Передние", "Oldi", "Front "); ?></div>
                        <div class="scrollY">
                            <p><?=@$_engine['gearstop-front'][@$data['gearstop-front']] ?></p>
                        </div>
                    </div>
                </div>
                <div class="box" style="transition-delay:.2s">
                    <div>
                        <div class="t"><?=LangHelper::t("Задние", "Orqa", "Rear"); ?></div>
                        <div class="scrollY">
                            <p><?=@$_engine['gearstop-back'][@$data['gearstop-back']] ?></p>
                        </div>
                    </div>
                </div>
                <div class="box" style="transition-delay:.3s">
                    <div>
                        <div class="t"><?=LangHelper::t("Подвеска передняя", "Old osmasi", "Front suspension"); ?></div>
                        <div class="scrollY">
                            <p><?=@$data['podves-front']?></p>
                        </div>
                    </div>
                </div>
                <div class="box" style="transition-delay:.4s">
                    <div>
                        <div class="t"><?=LangHelper::t("Подвеска задняя", "Orqa osmasi", "Rear suspension"); ?></div>
                        <div class="scrollY">
                            <p><?=@$data['podves-back']?></p>
                        </div>
                    </div>
                </div>
                <div class="box" style="transition-delay:.5s">
                    <div>
                        <div class="t"><?=LangHelper::t("Система ABS", "ABS tizimi", "ABS system"); ?></div>
                        <div class="scrollY">
                            <p><?= @$_engine['abs'][@$data['abs']] ?><br>
                        </div>
                    </div>
                    <?php
                    /*
                    <div>
                        <div class="t">КОМПЛЕКТАЦИЯ</div>
                        <div class="scrollY">
                            <p>- Пневматическая подвеска</p>
                            <p>- Боковые стекла на клеевом соединении</p>
                            <p>- Форточки на боковых стеклах</p>
                            <p>- Зеркала заднего вида с подогревом</p>
                            <p>- Трафаретные маршрутоукахатели</p>
                            <p>- Сиденье водителя с механическим подрессориванием</p>
                            <p>- Пневматическая подвеска</p>
                            <p>- Боковые стекла на клеевом соединении</p>
                            <p>- Форточки на боковых стеклах</p>
                            <p>- Зеркала заднего вида с подогревом</p>
                            <p>- Трафаретные маршрутоукахатели</p>
                            <p>- Сиденье водителя с механическим подрессориванием</p>
                        </div>
                    </div> */
                    ?>
                </div>
            </div>
            <div class="tab-pane">
                <div class="box" style="transition-delay:.1s">
                    <div>
                        <div class="t"><?=LangHelper::t("Коробка передач", "Uzatmalar qutisi", "Transmission"); ?></div>
                        <div class="scrollY">
                            <p><?= @$_engine['gearbox'][@$data['gearbox']] ?><br>
                               <?=LangHelper::t("Количество передач", "Uzatishlar soni", "Number of speeds") . ': ' . @$data['gearbox_count'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box" style="transition-delay:.2s">
                    <div>
                        <div class="t"><?=LangHelper::t("Колесная формула", "G'ildirak formulasi (nisbati)", "Driving system"); ?></div>
                        <div class="scrollY">
                            <p><?=@$data['gears'] ?></p>
                        </div>

                    </div>
                </div>
                <div class="box" style="transition-delay:.3s">
                    <div>
                        <div class="t"><?=LangHelper::t("шини/колеса", "shinalar/g'ildiraklar", "tires/wheels"); ?></div>
                        <div class="scrollY">
                            <p><?=LangHelper::t("Размер Шин", "Shinalar o'lchami", "Tire size") . ': ' . @$data['шин'] ?></p>
                            <p><?=LangHelper::t("Размер Шин", "G'ildiraklar o'lchami", "Wheel size") . ': ' . @$data['колёс'] ?></p>
                        </div>
                    </div>
                    <?php /*<div>
                        <div class="t"><?=LangHelper::t("Привод", "Yuritma", "Wheel drive"); ?></div>
                        <div class="scrollY">
                            <p><?=@$_engine['drive'][@$data['drive']] ?></p>
                        </div>
                    </div> */ ?>
                </div>
                <div class="box" style="transition-delay:.4s">
                    <div>
                        <div class="t"><?=LangHelper::t("База автомобиля", "Avtomobil bazasi", "Wheel base"); ?>, mm</div>
                        <div class="scrollY">
                            <p><?=@$data['base'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="box" style="transition-delay:.5s">
                    <div>
                        <div class="t"><?=LangHelper::t("Колея", "G'ildiraklar orasidagi masofa", "Wheeltrack"); ?>, mm</div>
                        <div class="scrollY">
                            <p><?=LangHelper::t("Передняя", "Old", "Front") . ': ' . @$data['base_front'] ?><br>
                               <?=LangHelper::t("Задняя", "Orqa", "Rear") . ': ' . @$data['base_back'] ?>
                            </p>
                        </div>
                    </div>
                    <?php /*
                    <div>
                        <div class="t">КОМПЛЕКТАЦИЯ</div>
                        <div class="scrollY">
                            <p>- Пневматическая подвеска</p>
                            <p>- Боковые стекла на клеевом соединении</p>
                            <p>- Форточки на боковых стеклах</p>
                            <p>- Зеркала заднего вида с подогревом</p>
                            <p>- Трафаретные маршрутоукахатели</p>
                            <p>- Сиденье водителя с механическим подрессориванием</p>
                            <p>- Пневматическая подвеска</p>
                            <p>- Боковые стекла на клеевом соединении</p>
                            <p>- Форточки на боковых стеклах</p>
                            <p>- Зеркала заднего вида с подогревом</p>
                            <p>- Трафаретные маршрутоукахатели</p>
                            <p>- Сиденье водителя с механическим подрессориванием</p>
                        </div>
                    </div> */ ?>
                </div>
            </div>
        </div>
        </div>
        <div class="colors-pan">
            <section><?=LangHelper::t("Цвета автомобилей", "Avtomobil ranglari", "Car colors"); ?> </section>
            <ul id="colors-pan-id">
                <li onclick="change_color('col1', 'Splash White', '#DADBD9')" >
                    <input id="col1" type="radio"name="color" /><label for="col1" class="wrapper-1 c-circle" style="background-color: #DADBD9"></label>
                    <div class="c-line"></div>
                </li>
                <li onclick="change_color('col2', 'Titanium Silver', '#DADBD9')">
                    <input id="col2" type="radio" name="color" /><label for="col2" class="wrapper-1 c-circle" style="background-color: #C0BFBF"></label>
                    <div class="c-line"></div>
                </li>
                <li onclick="change_color('col3', 'Galena Gray metallic', '#DADBD9')">
                    <input id="col3" type="radio" name="color" /><label for="col3" class="wrapper-1 c-circle" style="background-color: #8B8A89"></label>
                    <div class="c-line"></div>
                </li>
                <li onclick="change_color('col4', 'Obsidian Gray mica', '#DADBD9')">
                    <input id="col4" type="radio" name="color" /><label for="col4" class="wrapper-1 c-circle" style="background-color: #5E5E5E"></label>
                    <div class="c-line"></div>
                </li>
                <li onclick="change_color('col5', 'Cosmic Black mica', '#DADBD9')">
                    <input id="col5" type="radio" name="color" /><label for="col5" class="wrapper-1 c-circle" style="background-color: #151414"></label>
                    <div class="c-line"></div>
                </li>
                <li onclick="change_color('col6', 'Sapphire Blue mica', '#DADBD9')">
                    <input id="col6" type="radio" name="color" /><label for="col6" class="wrapper-1 c-circle" style="background-color: #2B3280"></label>
                    <div class="c-line"></div>
                </li>
                <li onclick="change_color('col7', 'Red Spinel mica', '#DADBD9')" class="active">
                    <input id="col7" type="radio" name="color" /><label for="col7" class="wrapper-1 c-circle" style="background-color: #871518"></label>
                    <div class="c-line"></div>
                </li>
            </ul>
            <div id="auto-color-text">
                Red Spinel mica
            </div>
            <script type="text/javascript">

                let hh = $('.row.tab-pane.active').outerHeight( true );
                    $('.spectre-tab').css('height', hh + 'px');

                window.addEventListener("resize", function () {
                    let hh = $('.row.tab-pane.active').outerHeight( true );
                        $('.spectre-tab').css('height', hh + 'px');
                });


                function change_height() {
                    setTimeout(function () {
                        let hh = $('.row.tab-pane.active').outerHeight( true );
                        $('.spectre-tab').css('height', hh + 'px');
                    }, 50)
                }


                function change_color(id, text, color) {
                    $('#colors-pan-id li').removeClass('active')
                    $('#auto-color-text').html(text)
                    $('#'+id).parent().addClass('active')
                }
            </script>
        </div>
    </div>
</div>
<?php if (!empty($tabpanelactive && $tabpanel)) { ?>
<div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div id="exTab2">
                <ul class="nav nav-tabs mobile-for">

                    <li class="active">
                        <a class="under-hover" class="active" href="#<?=$tabpanelactive->id?>" data-toggle="tab"><?=$tabpanelactive->$title?></a>
                    </li>
                    <?php foreach ($tabpanel as $t):?>
                    <li><a class="under-hover preload" href="#<?=$t->id?>" data-toggle="tab"><?=$t->$title?></a>
                    </li>
                 <?php endforeach;?>
                </ul>

            </div>
        </div>
    </div>
    <div class="tab-content spectre-tab" style="margin-bottom: 30px; height: auto !important;">
        <div class="row tab-pane active" id="<?=$tabpanelactive->id?>">
            <div class="col-md-6">
                <div class="tab-content">
                    <img src="/uploads/tab-panel/<?=$tabpanelactive->photo?>" class="tab-pane active" alt=""
                         style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="tab-pane active" style="margin-top: 30px;">
                    <p><?=$tabpanelactive->$title?></p>
                    <h3><?=$tabpanelactive->$content?>
                    </h3>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            </div>
        </div>
        <?php foreach ($tabpanel as $t):?>
        <div class="row tab-pane" id="<?=$t->id?>">
            <div class="col-md-6">
                <div class="tab-content">
                    <img src="/uploads/tab-panel/<?=$t->photo?>" class="tab-pane active" alt=""
                         style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="tab-pane" style="margin-top: 30px;">
                    <p><?=$t->$title?></p>
                    <h3><?=$t->$content?>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            </div>
        </div>
<?php endforeach;?>
    </div>
<?php } ?>

<?php if($transport->id == 32){?>
    <div class="container" style="">
        <div class="row" >
            <div class="col-md-6" style="margin-top: 30px;">
             <img src="/images/Screenshot_3.png" alt="" style="width: 100%;">
                </a>
            </div>
            <div class="col-md-3 ext mobile-margin"  style="margin-top: 160px;">
                <a href="/images/360/index.html" class="ButtonBox js_internal-link under-hover preload"
                   style="opacity: 1; text-decoration: none; transform: matrix(1, 0, 0, 1, 0, 0);">
                    <span class="ButtonBox-text ButtonBox-text-a"><img src="/images/360-video-icon-png-1-original.png"> <span>ЭКС/ИНТЕРЬЕР</span></span>
                    <span class="ButtonBox-icon">
                                        <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path
                                                    d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
                                    </span>
                </a>
            </div>

            <div class="col-md-3"></div>
        </div>
    </div>

<?php }?>
<?php if(!empty($pikups)){?>
    <div class="container gallerylink" style="padding: 0 10px;">
        <div class="row">
            <div class="col-md-6" style="margin: 30px 0;">
                <div class="archive section-gap" data-aos="fade-up" style="padding: 0 0 !important;">
                    <div class="transition-height">
                        <div class="boxes archive_slider" style="margin-top: 0 !important;">
                            <a href="/transport/galleryitem/<?=$pikups->transport_id?>" class="item preload gallery-bg-fix"
                               style="background-image:url(/uploads/pikups-page/<?=$pikups->gallery_image?>); width: 100%; height: 315px; background-size:cover; background-position: right;">
                                <div>
                                    <div>
                                        <span class="title"><?=LangHelper::t("ГАЛЕРЕЯ", "GALEREYA", "PHOTOS"); ?></span>
                                        <span class="day"></span>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin: 30px 0; position: relative">
                <div class="spectre-video-container">
                    <iframe width="100%" height="100%" src="<?=$pikups->youtube_link?>" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

<?php }?>

    <div data-aos="fade-up">
    <div class="site_bread">
        <div class="centerBox">
            <a href="/"><?= LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
            <a href="/transport"><?= LangHelper::t("КАТЕГОРИИ МАШИН", "MASHINA KATEGORIYALARI", "MACHINE CATEGORIES"); ?></a>
            <a href="/transport/<?= $_transport_url[$transport->type] ?>"><?= Yii::t('app', $_transport_types[$transport->type]) ?></a>
            <span><?= $transport->model ?></span>
        </div>
    </div>

<?= $this->render('../layouts/_footer') ?>

<?php
$script = "$('document').ready(function(){

    $('.scrollY').overlayScrollbars({});
    $('.nav-tabs .menu-links a').click(function(e){
      e.preventDefault();
      var eq = $(this).index();
      if($(this).hasClass('active')){

      }else {
        $('body').css({'pointer-events': 'none'});

        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');

        $('.tab-caption .tab-pane').removeClass('active');
        setTimeout(function(){
          $('.tab-caption .tab-pane').eq(eq).addClass('active');
          $('body').css({'pointer-events': 'auto'});
        }, 500);
      }
    });

    $('.tab-caption').overlayScrollbars({});

});";

$this->registerJs($script, yii\web\View::POS_END);
