<?php

use kartik\date\DatePicker;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */

\backend\assets\EditorAsset::register($this);

?>

<div class="news-form">

    <?php $form = ActiveForm::begin([
        'id' => 'product-form',
        'options' => [
            'enctype' => 'multipart/form-data',
        ]
    ]); ?>

    <?php

    // $year = Yii::$app->cache->get('year');


    ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">

                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

                <div class="row">
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <label class="box-title">Текст</label>
                        <textarea class="textarea_ru" name="News[text_ru]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$model->text_ru ?></textarea>
                    </div>
                </div>
                <?= $form->field($model, 'link_ru')->textInput(['maxlength' => true]) ?>

            </div>
            <div class="tab-pane" id="tab_2">
                <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>


                <div class="row">
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <label class="box-title">Текст</label>
                        <textarea class="textarea_uz" name="News[text_uz]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$model->text_uz ?></textarea>
                    </div>
                </div>
                <?= $form->field($model, 'link_uz')->textInput(['maxlength' => true]) ?>

            </div>

            <div class="tab-pane" id="tab_3">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

                <div class="row">
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <label class="box-title">Текст</label>
                        <textarea class="textarea_en" name="News[text_en]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$model->text_en ?></textarea>
                    </div>
                </div>
                <?= $form->field($model, 'link_en')->textInput(['maxlength' => true]) ?>

            </div>
        </div>
    </div>

    <?php


    echo '<label>Дата</label>';
    echo DatePicker::widget([
        'name' => 'News[date]',
        'value' => date('d-m-Y', $model->isNewRecord ? time() : $model->date),
        'options' => ['placeholder' => 'Дата' ],
        'pluginOptions' => [
            'language' => 'ru',
            'format' => 'dd-mm-yyyy',
            'autoclose' => true,
            'todayHighlight' => true
        ]
    ]);
    ?>

    <div class="tab-pane" id="tab_photo">
        <p>Рекомендуемый размер 650 px 350 px</p>
        <button class="btn btn-success img_preview">Загрузить изображение</button>
        <div id="image-preview" style="display:none">
            <input type="file" name="News[tmp_image]" id="img_preview" class="image" accept="image/*">
        </div>

        <img width="266px" id="img_preview" class="thumb" src="<?= $model->isNewRecord  ? '' : '/uploads/news/'.$model->id .'/thumb/' . $model->image . '?v=' . rand(1000000,9999999) ?>" alt="">

    </div>

    <h3>Галерея</h3>
    <?php if(!$model->isNewRecord){ ?>
        <div class="form-group">
            <a href="/admin/news-gallery/create?news_id=<?=$model->id ?>" class="btn btn-warning">Добавить</a>
            <p>Добавление фото и видео в галерею новости</p>
        </div>

    <?php } ?>
    <?php if(isset($dataProvider)) { ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                /* ['attribute' => 'status',
                    'filter' => ['1' => 'Вкл.', '0' => 'Откл.',],
                    'content' => function ($data) {
                        return $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
                    }
                ], */

                ['attribute' => 'type',
                    'filter' => ['1' => 'Видео', '0' => 'Фото',],
                    'content' => function ($data) {
                        return $data->type ? '<span class="label label-success">Видео</span>' : '<span class="label label-warning">Фото</span>';
                    }
                ],
                ['attribute' => 'image',
                    'content' => function ($data) {
                        if($data->type==1){
                            return '<img width="100px" src="/uploads/video.png">';
                        }
                        return '<img width="100px" src="/uploads/news-gallery/'.$data->id .'/' .$data->image . '">';
                    }
                ],
                ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $data) {
                            return '<a href="/admin/news-gallery/update?id=' . $data->id . '" class=""><i class="fa fa-pencil"></i>&nbsp;</a>';
                        },
                        'delete' => function ($url, $data) {
                            return '<a href="/admin/news-gallery/delete?id=' . $data->id . '" class="delete-news-gallery"> <i class="fa fa-trash"></i></a>';
                        }
                    ]
                ],
            ],
        ]);
    }
    ?>

    <div class="form-group">
        <?= $form->field($model, 'hit')
            ->dropDownList(['Нет','Да'],
                $param = ['options' => [$model->hit => ['Selected' => true]]]
            ); ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, "status")
            ->dropDownList([
                "0" => "Отключен",
                "1" => "Включен",
            ],
                $param = ['options' => [$model->isNewRecord ? 1 : $model->status => ['Selected' => true]]]
            );
        ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = " 
$('document').ready(function(){
    
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
	
	$('.delete-news-gallery').click(function(){
	   if(!confirm('Подтвердите удаление!')){
	        return false;
	   } 
	});
	
	$('.textarea_ru').wysihtml5();
	$('.textarea_uz').wysihtml5();
	$('.textarea_en').wysihtml5();
	
});";
$this->registerJs($script, yii\web\View::POS_END);