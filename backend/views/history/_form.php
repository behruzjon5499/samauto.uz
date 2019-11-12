<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\history */
/* @var $form yii\widgets\ActiveForm */

?>


    <div class="history-form">

        <?php $form = ActiveForm::begin([
            'id' => 'history-form',
            'options' => [
                'enctype' => 'multipart/form-data',
            ]
        ]); ?>



        <div class="form-group">
            <?= $form->field($model, 'year')->input(['maxlength' => true]) ?>
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

        <h3>Список событий</h3>
        <?php if(!$model->isNewRecord){ ?>
            <div class="form-group">
                <a href="/admin/history-events/create?history_id=<?=$model->id ?>" class="btn btn-warning">Добавить событие</a>
            </div>
        <?php } ?>
        <?php if(isset($dataProvider)) { ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['attribute' => 'status',
                        'filter' => ['1' => 'Вкл.', '0' => 'Откл.',],
                        'content' => function ($data) {
                            return $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
                        }
                    ],
                    'date:date',
                    'title_ru',
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $data) {
                                return '<a href="/admin/history-events/update?id=' . $data->id . '" class=""><i class="fa fa-pencil"></i>&nbsp;</a>';
                            },
                            'delete' => function ($url, $data) {
                                return '<a href="/admin/history-events/delete?id=' . $data->id . '" class=""> <i class="fa fa-trash"></i></a>';
                            }
                        ]
                    ],
                ],
            ]);
        }
        ?>


        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>



    </div>

<?php /*
$script = "
var s= '';
$('document').ready(function(){

    if (window.File && window.FileList && window.FileReader) {

		$('#img_preview_gallery').on('change', function(e) {
			$('.pip').remove();
			$('#delete_gallery_files').val('');
		  var files = e.target.files,
			filesLength = files.length;
			img_gallery = filesLength;
			var file_id = 0;

			$(document).on('click','.remove',function(){
				//alert('delete '+$(this).parent('.pip').data('id'));
				$('#delete_gallery_files').val( $('#delete_gallery_files').val() +';'+ $(this).parent('.pip').data('id'))
				img_gallery--;
				$(this).parent('.pip').remove();
				if(img_gallery==0) $('input#img_preview_gallery').val('');
			});

		  for (var i = 0; i < filesLength; i++) {
			var f = files[i]
			var fileReader = new FileReader();
			fileReader.onload = (function(e) {
			  var file = e.target;
			  file_id++;


			  $('<span data-id=\"'+file_id+'\" class=\"pip\">' +
				'<img class=\"imageThumb\" src=\"' + e.target.result + '\" title=\"' + file.name + '\"/>' +
				'<br/><span class=\"remove\">Удалить</span>' +
				'</span>').insertAfter('#preview_gallery');


			});
			fileReader.readAsDataURL(f);
		  }

		});
	}

	// удаление из фото-видео галереи
	$('.remove-ajax').click(function(){
	    if(!confirm('Подтвердите удаление!') ) return false;
		var id = $(this).data('id');
		$(this).parent().remove();
		$.ajax({
			type: 'post',
            url: '/admin/history/delete-gallery-item',
            dataType: 'json',
            data: 'id='+id +'&_csrf='+yii.getCsrfToken(),
            success: function(data){
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );
			}
        });
	});

    $('.img_preview_gallery').click(function(){
		$('#img_preview_gallery.image').click();
	});

    $('.add-mission').click(function(){
        tabs = $('#tabs-hidden').html();
        $('.tabs-box').append(tabs);
        $('.add-mission').fadeOut();
    })

    $('.remove-mission').click(function(){
        $(this).fadeOut();
        $(this).parent().css('opacity','0.5');
        $(this).parent().find('input,textarea').prop('readonly',true);
        s += $(this).data('id') +',';
        $('#remove_history').val(s);
    })
	
});";
$this->registerJs($script, yii\web\View::POS_END); */