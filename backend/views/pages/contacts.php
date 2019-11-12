<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 30.08.2017
 * Time: 17:01
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Страница Контакты';

?>

<?php $form = ActiveForm::begin(
    [
        'id' => 'page-form',
        //'enableClientValidation' => false,
        //'enableAjaxValidation' => false,
        /*'options' => [
            //'class' => 'form-horizontal',
            //'enctype' => 'multipart/form-data',
        ]*/

    ]); ?>

    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Самарканд</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Ташкент</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Ссылки</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_11" data-toggle="tab" aria-expanded="true">RU</a></li>
                            <li class=""><a href="#tab_12" data-toggle="tab" aria-expanded="false">UZ</a></li>
                            <li class=""><a href="#tab_13" data-toggle="tab" aria-expanded="false">EN</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_11">
                                <label>Адрес</label>
                                <input type="text" name="pages[sam_address_ru]" class="form-control" value="<?=@$data['sam_address_ru']?>">
                                <label>Телефон 1</label>
                                <input name="pages[sam_phone1_ru]" class="form-control" value="<?=@$data['sam_phone1_ru']?>">
                                <label>Телефон 2</label>
                                <input name="pages[sam_phone2_ru]" class="form-control" value="<?=@$data['sam_phone2_ru']?>">
                                <label>Факс</label>
                                <input name="pages[sam_fax_ru]" class="form-control" value="<?=@$data['sam_fax_ru']?>">
                                <label>Email</label>
                                <input name="pages[sam_email_ru]" class="form-control" value="<?=@$data['sam_email_ru']?>">
                                <label>Сайт</label>
                                <input name="pages[sam_site_ru]" class="form-control" value="<?=@$data['sam_site_ru']?>">
                            </div>
                            <div class="tab-pane" id="tab_12">
                                <label>Адрес</label>
                                <input type="text" name="pages[sam_address_uz]" class="form-control" value="<?=@$data['sam_address_uz']?>">
                                <label>Телефон 1</label>
                                <input name="pages[sam_phone1_uz]" class="form-control" value="<?=@$data['sam_phone1_uz']?>">
                                <label>Телефон 2</label>
                                <input name="pages[sam_phone2_uz]" class="form-control" value="<?=@$data['sam_phone2_uz']?>">
                                <label>Факс</label>
                                <input name="pages[sam_fax_uz]" class="form-control" value="<?=@$data['sam_fax_uz']?>">
                                <label>Email</label>
                                <input name="pages[sam_email_uz]" class="form-control" value="<?=@$data['sam_email_uz']?>">
                                <label>Сайт</label>
                                <input name="pages[sam_site_uz]" class="form-control" value="<?=@$data['sam_site_uz']?>">
                            </div>
                            <div class="tab-pane" id="tab_13">
                                <label>Адрес</label>
                                <input type="text" name="pages[sam_address_en]" class="form-control" value="<?=@$data['sam_address_en']?>">
                                <label>Телефон 1</label>
                                <input name="pages[sam_phone1_en]" class="form-control" value="<?=@$data['sam_phone1_en']?>">
                                <label>Телефон 2</label>
                                <input name="pages[sam_phone2_en]" class="form-control" value="<?=@$data['sam_phone2_en']?>">
                                <label>Факс</label>
                                <input name="pages[sam_fax_en]" class="form-control" value="<?=@$data['sam_fax_en']?>">
                                <label>Email</label>
                                <input name="pages[sam_email_en]" class="form-control" value="<?=@$data['sam_email_en']?>">
                                <label>Сайт</label>
                                <input name="pages[sam_site_en]" class="form-control" value="<?=@$data['sam_site_en']?>">
                            </div>
                            
                            <label>Широта</label>
                            <input name="pages[sam_lat]" class="form-control" value="<?=@$data['sam_lat']?>">
                            <label>Долгота</label>
                            <input name="pages[sam_lon]" class="form-control" value="<?=@$data['sam_lon']?>">

                        </div>
                    </div>
                    
                </div>
                <div class="tab-pane" id="tab_2">

                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_14" data-toggle="tab" aria-expanded="true">RU</a></li>
                            <li class=""><a href="#tab_15" data-toggle="tab" aria-expanded="false">UZ</a></li>
                            <li class=""><a href="#tab_16" data-toggle="tab" aria-expanded="false">EN</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_14">
                                <label>Адрес</label>
                                <input type="text" name="pages[tash_address_ru]" class="form-control" value="<?=@$data['tash_address_ru']?>">
                                <label>Телефон 1</label>
                                <input name="pages[tash_phone1_ru]" class="form-control" value="<?=@$data['tash_phone1_ru']?>">
                                <label>Телефон 2</label>
                                <input name="pages[tash_phone2_ru]" class="form-control" value="<?=@$data['tash_phone2_ru']?>">
                                <label>Факс</label>
                                <input name="pages[tash_fax_ru]" class="form-control" value="<?=@$data['tash_fax_ru']?>">
                                <label>Email</label>
                                <input name="pages[tash_email_ru]" class="form-control" value="<?=@$data['tash_email_ru']?>">
                                <label>Сайт</label>
                                <input name="pages[tash_site_ru]" class="form-control" value="<?=@$data['tash_site_ru']?>">
                            </div>
                            <div class="tab-pane" id="tab_15">
                                <label>Адрес</label>
                                <input type="text" name="pages[tash_address_uz]" class="form-control" value="<?=@$data['tash_address_uz']?>">
                                <label>Телефон 1</label>
                                <input name="pages[tash_phone1_uz]" class="form-control" value="<?=@$data['tash_phone1_uz']?>">
                                <label>Телефон 2</label>
                                <input name="pages[tash_phone2_uz]" class="form-control" value="<?=@$data['tash_phone2_uz']?>">
                                <label>Факс</label>
                                <input name="pages[tash_fax_uz]" class="form-control" value="<?=@$data['tash_fax_uz']?>">
                                <label>Email</label>
                                <input name="pages[tash_email_uz]" class="form-control" value="<?=@$data['tash_email_uz']?>">
                                <label>Сайт</label>
                                <input name="pages[tash_site_uz]" class="form-control" value="<?=@$data['tash_site_uz']?>">
                            </div>
                            <div class="tab-pane" id="tab_16">
                                <label>Адрес</label>
                                <input type="text" name="pages[tash_address_en]" class="form-control" value="<?=@$data['tash_address_en']?>">
                                <label>Телефон 1</label>
                                <input name="pages[tash_phone1_en]" class="form-control" value="<?=@$data['tash_phone1_en']?>">
                                <label>Телефон 2</label>
                                <input name="pages[tash_phone2_en]" class="form-control" value="<?=@$data['tash_phone2_en']?>">
                                <label>Факс</label>
                                <input name="pages[tash_fax_en]" class="form-control" value="<?=@$data['tash_fax_en']?>">
                                <label>Email</label>
                                <input name="pages[tash_email_en]" class="form-control" value="<?=@$data['tash_email_en']?>">
                                <label>Сайт</label>
                                <input name="pages[tash_site_en]" class="form-control" value="<?=@$data['tash_site_en']?>">
                            </div>
                            
                            <label>Широта</label>
                            <input name="pages[tash_lat]" class="form-control" value="<?=@$data['tash_lat']?>">
                            <label>Долгота</label>
                            <input name="pages[tash_lon]" class="form-control" value="<?=@$data['tash_lon']?>">

                        </div>
                    </div>
                    
                </div>
                <div class="tab-pane" id="tab_3">

                    <!-- Custom Tabs -->
                    <div class="row">
                        <div class="col-md-12" id="tab_17">
                            <label>Facebook</label>
                            <input type="text" name="pages[facebook]" class="form-control" value="<?=@$data['facebook']?>">
                            <label>Telegram</label>
                            <input name="pages[telegram]" class="form-control" value="<?=@$data['telegram']?>">
                            <label>Instagram</label>
                            <input name="pages[insta]" class="form-control" value="<?=@$data['insta']?>">
                            <label>Youtube</label>
                            <input name="pages[youtube]" class="form-control" value="<?=@$data['youtube']?>">
                        </div>
                    </div>

                </div>

            </div>




        </div>

        <input type="hidden" name="Pages[page]" value="contacts">

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success' ]) ?>
        </div>

    </div>

<?php ActiveForm::end(); ?>
