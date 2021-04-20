<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\GalleryAsset;

GalleryAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\Transport */
/* @var $form yii\widgets\ActiveForm */


$op = json_decode($model->data, true);

?>

    <div class="transport-form">

        <?php $form = ActiveForm::begin(
            [
                'id' => 'transport-form',
                //'enableClientValidation' => false,
                //'enableAjaxValidation' => false,
                // 'action' => $model->isNewRecord ? '/admin/' : '/admin/.../update?id=' . $model->id ,
                'options' => [
                    //'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data',
                ]
            ]); ?>

        <div class="">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Общие</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Параметры</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Фото</a></li>
                    <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Фотогалерея</a></li>
                    <?php //<li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Видео</a></li> ?>
                    <?php /*
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        Dropdown <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                    </ul>
                </li>
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                */ ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                        <div class="col-md-12">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_title_1" data-toggle="tab" aria-expanded="true">Название
                                            RU</a></li>
                                    <li class=""><a href="#tab_title_2" data-toggle="tab" aria-expanded="false">Название
                                            UZ</a></li>
                                    <li class=""><a href="#tab_title_3" data-toggle="tab" aria-expanded="false">Название
                                            EN</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_title_1">
                                        <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true])->label(false) ?>
                                    </div>
                                    <div class="tab-pane" id="tab_title_2">
                                        <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true])->label(false) ?>
                                    </div>
                                    <div class="tab-pane" id="tab_title_3">
                                        <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label(false) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <span class="clearfix"></span>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">

                        <div class="panel box">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse"
                                       aria-expanded="false" class="collapsed">
                                        Общие
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse" class="panel-collapse collapse" aria-expanded="false"
                                 style="height: 0px;">
                                <div class="box-body">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tabLang_1" data-toggle="tab"
                                                                  aria-expanded="true">RU</a></li>
                                            <li class=""><a href="#tabLang_2" data-toggle="tab"
                                                            aria-expanded="true">UZ</a></li>
                                            <li class=""><a href="#tabLang_3" data-toggle="tab"
                                                            aria-expanded="true">EN</a></li>
                                        </ul>
                                        <div class="tab-content">

                                            <div class="tab-pane active" id="tabLang_1">
                                                <label>Назначение Ru</label>
                                                <input type="text" name="complect[destination_ru]" class="form-control"
                                                       value="<?= @$op['complect']['destination_ru'] ?>"><br>

                                            </div>

                                            <div class="tab-pane " id="tabLang_2">
                                                <label>Назначение Uz</label>
                                                <input type="text" name="complect[destination_uz]" class="form-control"
                                                       value="<?= @$op['complect']['destination_uz'] ?>"><br>

                                            </div>

                                            <div class="tab-pane " id="tabLang_3">
                                                <label>Назначение En</label>
                                                <input type="text" name="complect[destination_en]" class="form-control"
                                                       value="<?= @$op['complect']['destination_en'] ?>"><br>

                                            </div>

                                        </div>
                                    </div>
                                    <label>Класс ТС</label>
                                    <input type="text" name="complect[class]" class="form-control"
                                           value="<?= @$op['complect']['class'] ?>"><br>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                           aria-expanded="false" class="collapsed">
                                            Двигатель
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="box-body">
                                        <label>Модель</label>
                                        <input type="text" name="complect[engine_model]" class="form-control"
                                               value="<?= @$op['complect']['engine_model'] ?>"><br>
                                        <label>Объем, см<sup>3</sup></label>
                                        <input type="text" name="complect[engine_volume]" class="form-control"
                                               value="<?= @$op['complect']['engine_volume'] ?>"><br>
                                        <?php /* <label>Мощность, л.с.</label>
                                    <input type="text" name="complect[power]" class="form-control" value="<?=@$op['complect']['power']?>"><br>
                                    <label>Максимальная мощность, л.с.</label>
                                    <input type="text" name="complect[max-power]" class="form-control" value="<?=@$op['complect']['max-power']?>"><br>
                                    */ ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Максимальная мощность, л.с.</label>
                                                <input type="text" name="complect[max-power]" class="form-control"
                                                       value="<?= @$op['complect']['max-power'] ?>"><br>
                                            </div>
                                            <div class="col-md-6">
                                                <label>При оборотах, об/мин</label>
                                                <input type="text" name="complect[power-rotate]" class="form-control"
                                                       value="<?= @$op['complect']['power-rotate'] ?>"><br>
                                            </div>
                                        </div>

                                        <?php /*<div class="row">
                                        <div class="col-md-6">
                                            <label>Крутящий момент, Н.м</label>
                                            <input type="text" name="complect[spin]" class="form-control" value="<?=@$op['complect']['spin']?>"><br>
                                        </div>
                                        <div class="col-md-6">
                                            <label>При оборотах, об/мин</label>
                                            <input type="text" name="complect[spin-rotate]" class="form-control" value="<?=@$op['complect']['spin-rotate']?>"><br>
                                        </div>
                                    </div> */ ?>

                                        <label>Цилиндров</label>
                                        <select name="complect[cilinders]" class="form-control">
                                            <option value="0"
                                                    <?= $op['complect']['cilinders'] == '0' ? 'selected' : '' ?>>3
                                            </option>
                                            <option value="1"
                                                    <?= $op['complect']['cilinders'] == '1' ? 'selected' : '' ?>>4
                                            </option>
                                            <option value="2"
                                                    <?= $op['complect']['cilinders'] == '2' ? 'selected' : '' ?>>6
                                            </option>
                                            <option value="3"
                                                    <?= $op['complect']['cilinders'] == '3' ? 'selected' : '' ?>>8
                                            </option>
                                        </select>
                                        <br>
                                        <label>Тип</label>
                                        <select name="complect[type]" class="form-control">
                                            <option value="0" <?= $op['complect']['type'] == '0' ? 'selected' : '' ?>>
                                                Рядный
                                            </option>
                                            <option value="1" <?= $op['complect']['type'] == '1' ? 'selected' : '' ?>>
                                                V-образный
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"
                                           aria-expanded="false" class="collapsed">
                                            Трансмиссия
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="box-body">
                                        <label>Привод</label>
                                        <select name="complect[drive]" class="form-control">
                                            <option value="0" <?= $op['complect']['drive'] == '0' ? 'selected' : '' ?>>
                                                Передний
                                            </option>
                                            <option value="1" <?= $op['complect']['drive'] == '1' ? 'selected' : '' ?>>
                                                Задний
                                            </option>
                                            <option value="2" <?= $op['complect']['drive'] == '2' ? 'selected' : '' ?>>
                                                Оба
                                            </option>
                                        </select>
                                        <br>
                                        <label>Коробка передач</label>
                                        <label>автоматическая или механическая</label>
                                        <?= $form->field($model, "auto_mex")
                                            ->dropDownList([
                                                "1" => "автоматическая",
                                                "2" => "механическая",
                                            ],
                                                $param = ['options' => [$model->isNewRecord ? 1 : $model->auto_mex => ['Selected' => true]]]
                                            )->label(false);
                                        ?>
                                        <br>
                                        <label>Количество передач</label>
                                        <input type="text" name="complect[gearbox_count]" class="form-control"
                                               value="<?= @$op['complect']['gearbox_count'] ?>">
                                        </br>
                                        <label>Подвеска</label>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="nav-tabs-custom">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tabLang_11" data-toggle="tab"
                                                                              aria-expanded="true">RU</a></li>
                                                        <li class=""><a href="#tabLang_22" data-toggle="tab"
                                                                        aria-expanded="true">UZ</a></li>
                                                        <li class=""><a href="#tabLang_33" data-toggle="tab"
                                                                        aria-expanded="true">EN</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tabLang_11">

                                                            <label>Передняя ось Ru</label>
                                                            <input type="text" name="complect[podves-front_ru]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-front_ru'] ?>">

                                                        </div>

                                                        <div class="tab-pane " id="tabLang_22">
                                                            <label>Передняя ось Uz</label>
                                                            <input type="text" name="complect[podves-front_uz]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-front_uz'] ?>">

                                                        </div>

                                                        <div class="tab-pane " id="tabLang_33">

                                                            <label>Передняя ось En</label>
                                                            <input type="text" name="complect[podves-front_en]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-front_en'] ?>">

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="nav-tabs-custom">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tabLang_111" data-toggle="tab"
                                                                              aria-expanded="true">RU</a></li>
                                                        <li class=""><a href="#tabLang_222" data-toggle="tab"
                                                                        aria-expanded="true">UZ</a></li>
                                                        <li class=""><a href="#tabLang_333" data-toggle="tab"
                                                                        aria-expanded="true">EN</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tabLang_111">
                                                            <label>Задняя ось Ru</label>
                                                            <input type="text" name="complect[podves-back_ru]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-back_ru'] ?>">
                                                        </div>

                                                        <div class="tab-pane " id="tabLang_222">
                                                            <label>Задняя ось Uz</label>
                                                            <input type="text" name="complect[podves-back_uz]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-back_uz'] ?>">
                                                        </div>
                                                        <div class="tab-pane " id="tabLang_333">
                                                            <label>Задняя ось En</label>
                                                            <input type="text" name="complect[podves-back_en]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-back_en'] ?>">
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <br>
                                        <label>Тормозная система</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Передняя ось</label>
                                                <select name="complect[gearstop-front]" class="form-control">
                                                    <option value="0"
                                                            <?= @$op['complect']['gearstop-front'] == '0' ? 'selected' : '' ?>>
                                                        Дисковые
                                                    </option>
                                                    <option value="1"
                                                            <?= @$op['complect']['gearstop-front'] == '1' ? 'selected' : '' ?>>
                                                        Барабанные
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Задняя ось</label>
                                                <select name="complect[gearstop-back]" class="form-control">
                                                    <option value="0"
                                                            <?= @$op['complect']['gearstop-back'] == '0' ? 'selected' : '' ?>>
                                                        Дисковые
                                                    </option>
                                                    <option value="1"
                                                            <?= @$op['complect']['gearstop-back'] == '1' ? 'selected' : '' ?>>
                                                        Барабанные
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="nav-tabs-custom">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tabLang_11" data-toggle="tab"
                                                                              aria-expanded="true">RU</a></li>
                                                        <li class=""><a href="#tabLang_22" data-toggle="tab"
                                                                        aria-expanded="true">UZ</a></li>
                                                        <li class=""><a href="#tabLang_33" data-toggle="tab"
                                                                        aria-expanded="true">EN</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tabLang_11">

                                                            <label>Передняя ось Ru</label>
                                                            <input type="text" name="complect[podves-front_ru]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-front_ru'] ?>">

                                                        </div>

                                                        <div class="tab-pane " id="tabLang_22">
                                                            <label>Передняя ось Uz</label>
                                                            <input type="text" name="complect[podves-front_uz]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-front_uz'] ?>">

                                                        </div>

                                                        <div class="tab-pane " id="tabLang_33">

                                                            <label>Передняя ось En</label>
                                                            <input type="text" name="complect[podves-front_en]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-front_en'] ?>">

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="nav-tabs-custom">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tabLang_111" data-toggle="tab"
                                                                              aria-expanded="true">RU</a></li>
                                                        <li class=""><a href="#tabLang_222" data-toggle="tab"
                                                                        aria-expanded="true">UZ</a></li>
                                                        <li class=""><a href="#tabLang_333" data-toggle="tab"
                                                                        aria-expanded="true">EN</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tabLang_111">
                                                            <label>Задняя ось Ru</label>
                                                            <input type="text" name="complect[podves-back_ru]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-back_ru'] ?>">
                                                        </div>

                                                        <div class="tab-pane " id="tabLang_222">
                                                            <label>Задняя ось Uz</label>
                                                            <input type="text" name="complect[podves-back_uz]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-back_uz'] ?>">
                                                        </div>
                                                        <div class="tab-pane " id="tabLang_333">
                                                            <label>Задняя ось En</label>
                                                            <input type="text" name="complect[podves-back_en]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['podves-back_en'] ?>">
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="nav-tabs-custom">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tabLang_1111" data-toggle="tab"
                                                                              aria-expanded="true">RU</a></li>
                                                        <li class=""><a href="#tabLang_2222" data-toggle="tab"
                                                                        aria-expanded="true">UZ</a></li>
                                                        <li class=""><a href="#tabLang_3333" data-toggle="tab"
                                                                        aria-expanded="true">EN</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tabLang_1111">

                                                            <label>Колесная формула Ru</label>
                                                            <input type="text" name="complect[gears_ru]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['gears_ru'] ?>">

                                                        </div>

                                                        <div class="tab-pane " id="tabLang_2222">
                                                            <label>Колесная формула Uz</label>
                                                            <input type="text" name="complect[gears_uz]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['gears_uz'] ?>">

                                                        </div>

                                                        <div class="tab-pane " id="tabLang_3333">

                                                            <label>Колесная формула En</label>
                                                            <input type="text" name="complect[gears_en]"
                                                                   class="form-control"
                                                                   value="<?= @$op['complect']['gears_en'] ?>">

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--                                    <label>Колесная формула</label>-->
                                        <!--                                    <input type="text" name="complect[gears]" class="form-control" value="-->
                                        <? //=@$op['complect']['gears']?><!--">-->
                                        <label>Колея</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Передняя ось</label>
                                                <input type="text" name="complect[base_front]" class="form-control"
                                                       value="<?= @$op['complect']['base_front'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Задняя ось</label>
                                                <input type="text" name="complect[base_back]" class="form-control"
                                                       value="<?= @$op['complect']['base_back'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"
                                           aria-expanded="false" class="collapsed">
                                            Размеры
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="box-body">
                                        <label>Ширина, мм</label>
                                        <input type="text" name="complect[width]" class="form-control"
                                               value="<?= @$op['complect']['width'] ?>"><br>
                                        <label>Длина, мм</label>
                                        <input type="text" name="complect[length]" class="form-control"
                                               value="<?= @$op['complect']['length'] ?>"><br>
                                        <label>Высота, мм</label>
                                        <input type="text" name="complect[height]" class="form-control"
                                               value="<?= @$op['complect']['height'] ?>"><br>
                                        <label>Колесная база, мм</label>
                                        <input type="text" name="complect[base]" class="form-control"
                                               value="<?= @$op['complect']['base'] ?>"><br>
                                        <label>Минимальный радиус разворота, мм</label>
                                        <input type="text" name="complect[radius]" class="form-control"
                                               value="<?= @$op['complect']['radius'] ?>"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"
                                           aria-expanded="false" class="collapsed">
                                            Габаритные размеры кузова (для грузовых авто)
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="box-body">
                                        <label>Ширина, мм</label>
                                        <input type="text" name="complect[width_trucks]" class="form-control"
                                               value="<?= @$op['complect']['width_trucks'] ?>"><br>
                                        <label>Длина, мм</label>
                                        <input type="text" name="complect[length_trucks]" class="form-control"
                                               value="<?= @$op['complect']['length_trucks'] ?>"><br>
                                        <label>Высота, мм</label>
                                        <input type="text" name="complect[height_trucks]" class="form-control"
                                               value="<?= @$op['complect']['height_trucks'] ?>"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"
                                           aria-expanded="false" class="collapsed">
                                            Топливо
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse6" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="box-body">
                                        <label>Вид топлива</label>
                                        <?= $form->field($model, "special")
                                            ->dropDownList([
                                                    "0" => "Бензин",
                                                    "1" => "Дизель",
                                                    "2" => "Газ",
                                                ]
                                            )->label(false);
                                        ?>

                                        <br>
                                        <label>Тип и марка</label>
                                        <input type="text" name="complect[fuel-model]" class="form-control"
                                               value="<?= @$op['complect']['fuel-model'] ?>"><br>
                                        <label>Объем топливного бака</label>
                                        <input type="text" name="complect[fuel-size]" class="form-control"
                                               value="<?= @$op['complect']['fuel-size'] ?>"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"
                                           aria-expanded="false" class="collapsed">
                                            Расход топлива на 100 км
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="box-body">
                                        <label>Городской режим, л</label>
                                        <input type="text" name="complect[expense_city]" class="form-control"
                                               value="<?= @$op['complect']['expense_city'] ?>"><br>
                                        <label>Загородный режим, л</label>
                                        <input type="text" name="complect[expence_out]" class="form-control"
                                               value="<?= @$op['complect']['expence_out'] ?>"><br>
                                        <label>Смешанный режим, л</label>
                                        <input type="text" name="complect[expense_both]" class="form-control"
                                               value="<?= @$op['complect']['expense_both'] ?>"><br>
                                    </div>
                                </div>
                            </div>

                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"
                                           aria-expanded="false" class="collapsed">
                                            Разное
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="box-body">
                                        <label>Время разгона до 100 км, сек</label>
                                        <input type="text" name="complect[accel_time]" class="form-control"
                                               value="<?= @$op['complect']['accel_time'] ?>"><br>
                                        <label>Максимальная скорость, км/час</label>
                                        <input type="text" name="complect[speed]" class="form-control"
                                               value="<?= @$op['complect']['speed'] ?>"><br>
                                        <label>Количество дверей</label>
                                        <input type="text" name="complect[doors]" class="form-control"
                                               value="<?= @$op['complect']['doors'] ?>"><br>
                                        <label>Количество пассажиров</label>
                                        <?= $form->field($model, 'count')->textInput(['maxlength' => true])->label(false)?><br>
                                        <label>Количество мест для сидения</label>
                                        <input type="text" name="complect[count_branch]" class="form-control"
                                               value="<?= @$op['complect']['count_branch'] ?>"><br>
                                        <label>Объем багажного отделения, л</label>
                                        <input type="text" name="complect[volume]" class="form-control"
                                               value="<?= @$op['complect']['volume'] ?>"><br>
                                        <label>Cнаряженная масса, кг</label>
                                        <input type="text" name="complect[mass]" class="form-control"
                                               value="<?= @$op['complect']['mass'] ?>"><br>
                                        <label>Грузоподъемность, кг</label>
                                        <?= $form->field($model, 'trucks')->textInput(['maxlength' => true])->label(false)?><br>
                                        <label>Система ABS</label>
                                        <select name="complect[abs]" class="form-control">
                                            <option value="0" <?= @$op['complect']['abs'] == '0' ? 'selected' : '' ?>>
                                                Имеется
                                            </option>
                                            <option value="1" <?= @$op['complect']['abs'] == '1' ? 'selected' : '' ?>>Не
                                                имеется
                                            </option>
                                        </select>
                                        <label>Размер Шин</label>
                                        <input type="text" name="complect[шин]" class="form-control"
                                               value="<?= @$op['complect']['шин'] ?>"><br>
                                        <label>Размер Колёс</label>
                                        <input type="text" name="complect[колёс]" class="form-control"
                                               value="<?= @$op['complect']['колёс'] ?>"><br>

                                        <label>Тип кузова</label>
                                        <?= $form->field($model, "tip_kuzov")
                                            ->dropDownList([
                                                "1" => "Бортовой",
                                                "2" => "Тентованный",
                                                "3" => "автофургон",
                                                "4" => "изотермический",
                                                "5" => "рефрижератор",
                                                "6" => "самосвал",
                                                "7" => "тягач",
                                                "8" => "автоцистерны (водовоз, молоковоз, ассенизаторы и др.)",

                                            ]
                                            )->label(false);
                                        ?>

                                        <label>Ряд</label>
                                        <?= $form->field($model, "doors")
                                            ->dropDownList([
                                                "1" => "однорядная",
                                                "2" => "двухрядная",
                                            ]
                                            )->label(false);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="tab_4">
                        <div>Рекомендуемый размер:<br>ширина 380 px, высота 230 px</div>

                        <button class="btn btn-success img_preview">Загрузить изображение</button>
                        <div id="image-preview" style="display:none">
                            <input type="file" name="Transport[tmp_image]" id="img_preview" class="image"
                                   accept="image/*">
                        </div>

                        <img width="266px" id="img_preview" class="thumb"
                             src="<?= $model->isNewRecord ? '' : '/uploads/transport/' . $model->id . '/thumb/' . $model->image . '?v=' . rand(1000000, 9999999) ?>"
                             alt="">


                    </div>

                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_5">
                        <div>Рекомендуемый размер:<br>ширина 800 px, высота 450 px</div>

                        <div class="btn btn-success img_preview_gallery" data-id="gallery">Загрузить изображения</div>
                        <div id="image-preview" style="display:none">
                            <input type="file" id="img_preview_gallery" name="Transport[tmp_gallery_images][]"
                                   class="image" accept="image/*" multiple/>
                        </div>

                        <div id="preview_gallery">

                            <?php

                            if ($gallery) {
                                $i = 0;
                                foreach ($gallery as $gal) {
                                    $i++;
                                    ?>
                                    <span class="pip_old">
                                        <img class="imageThumb"
                                             src="/uploads/transport/<?= $model->id . '/gallery/thumb/' . $gal->image . '?v=' . rand(1000000, 9999999) ?>"><br>
                                        <span class="remove-ajax" data-id="<?= $gal->id ?>">Удалить</span>
                                    </span>
                                <?php }
                            } ?>
                        </div>

                        <input type="hidden" name="delete_gallery_image" id="delete_gallery_image">


                    </div><!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>


        <div class="">

            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_title_11" data-toggle="tab" aria-expanded="true">Заголовок
                                прикрепленного файла RU</a></li>
                        <li class=""><a href="#tab_title_12" data-toggle="tab" aria-expanded="false">Заголовок
                                прикрепленного файла UZ</a></li>
                        <li class=""><a href="#tab_title_13" data-toggle="tab" aria-expanded="false">Заголовок
                                прикрепленного файла EN</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_title_11">
                            <?= $form->field($model, 'file_title_ru')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                        <div class="tab-pane" id="tab_title_12">
                            <?= $form->field($model, 'file_title_uz')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                        <div class="tab-pane" id="tab_title_13">
                            <?= $form->field($model, 'file_title_en')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div>Загрузить файл с характеристиками</div>

                        <button class="btn btn-success img_file">Загрузить файл</button>
                        <div id="image-preview" style="display:none">
                            <input type="file" name="Transport[tmp_file]" id="img_file" class="file">
                        </div>

                        <?php if (@$op['complect']['file'] != '') { ?>

                            <img width="150px" src="/uploads/file.png">
                            <button class="btn btn-danger remove-file" data-id="<?= $model->id ?>">Удалить файл</button>

                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>

                </div>


            </div>


        </div>

        <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, "type")
            ->dropDownList([
                "0" => "Автобусы",
                "1" => "Грузовики",
                "2" => "Спецтехника",
                "3" => "Пикапы",
            ], $param = ["options" => [$model->type => ["selected" => true]]]);
        ?>

        <p>Большее значение порядка, позволяет отобразить объект выше в списке</p>
        <?= $form->field($model, 'pos')->textInput(['maxlength' => true]) ?>

        <?php //= $form->field($model, 'type_id')->textInput(['maxlength' => true]) // тип кузова авто борт, цистерна и тд ?>

        <?php // = $form->field($model, 'category_id')->textInput() ?>


        <?= $form->field($model, "status")
            ->dropDownList([
                "0" => "Отключен",
                "1" => "Включен",
            ],
                $param = ['options' => [$model->isNewRecord ? 1 : $model->status => ['Selected' => true]]]
            );
        ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php $script = "$('document').ready(function(){
    var href = '{$_SERVER['REQUEST_URI']}';
    
	$(document).on('change','.image',function(){
	  var input = $(this)[0];
	  var obj = $(this);
	  if ( input.files && input.files[0] ) {
		if ( input.files[0].type.match('image.*') ) {
		  var reader = new FileReader();
		  reader.onload = function(e){ $('img#'+obj.attr('id')).attr('src', e.target.result);}
		  reader.readAsDataURL(input.files[0]);
		} else console.log('is not image mime type');
	  } else console.log('not isset files data or files API not support');  
	});  
	$('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });	
	$('.img_file').click(function(e){ e.preventDefault(); $('#img_file.file').click(); });	
    // удаление из фото галереи
	$('.remove-ajax').click(function(e){
		e.preventDefault();	
		if(!confirm('Подтвердите удаление')) return false;
		var id = $(this).data('id');		
		obj = $(this).parent();
		$.ajax({
			type: 'post',
            url: '/admin/transport/delete-gallery-item',            
            dataType: 'json',
            data: 'id='+id+'&_csrf='+yii.getCsrfToken(),
            success: function(data){
                if(data.status) obj.remove();
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});
	$('.remove-file').click(function(e){
		e.preventDefault();
		if(!confirm('Подтвердите удаление')) return false;
		var id = $(this).data('id');		
		obj = $(this).parent();
		$.ajax({
			type: 'post',
            url: '/admin/transport/delete-file',            
            dataType: 'json',
            data: 'id='+id+'&_csrf='+yii.getCsrfToken(),
            success: function(data){
                if(data.status) window.location.href = href;                
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});
});";
$this->registerJs($script, yii\web\View::POS_END);