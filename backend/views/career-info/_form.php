<?php

use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
mihaildev\elfinder\Assets::noConflict($this);
?>

<div class="vacancy-form">

    <?php 	$form = ActiveForm::begin(
        [
            'id' => 'vacancy-form',
				//'enableClientValidation' => false,
				//'enableAjaxValidation' => false,
				// 'action' => $model->isNewRecord ? '/admin/' : '/admin/.../update?id=' . $model->id ,
            'options' => [
                //'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data',
            ]
        ]);?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">

                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

                <div class="box box-default box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $model->getAttributeLabel('text_ru')?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?= $form->field($model, 'text_ru')->widget(CKEditor::className(),[
                            'editorOptions' =>
                                \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',[
                                    'preset' => 'full',
                                    'inline' => false,
                                ]),

                        ])->label(false);
                        ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <div class="tab-pane" id="tab_2">
                <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

                <div class="box box-default box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $model->getAttributeLabel('text_uz')?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?= $form->field($model, 'text_uz')->widget(CKEditor::className(),[
                            'editorOptions' =>
                                \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',[
                                    'preset' => 'full',
                                    'inline' => false,
                                ]),

                        ])->label(false);
                        ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>

            <div class="tab-pane" id="tab_3">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>


                    <div class="box box-default box-solid collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?= $model->getAttributeLabel('text_en')?></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?= $form->field($model, 'text_en')->widget(CKEditor::className(),[
                                'editorOptions' =>
                                    \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',[
                                        'preset' => 'full',
                                        'inline' => false,
                                    ]),

                            ])->label(false);
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

            </div>
        </div>
    </div>


    <?php echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'dropZoneTitle' => 'Загрузите аватар.',
            'msgPlaceholder' => 'Загрузите аватар.',
            'initialPreviewAsData'=>true,
            'initialPreview' => [
                $model->preview_img ? '<img src="/uploads/career/info/' . $model->preview_img . '" width="200">': '<img src="/uploads/career/info/no-image.png" width="200">',
            ],
            'showRemove' => false,
            'showUpload' => false,

        ]
    ]); ?>

<?= $form->field($model, "status")
        ->dropDownList([
            "0" => "Отключен",
            "1" => "Включен",
        ], $param = ["options" => [$model->status => ["selected" => true]]]);
     ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
