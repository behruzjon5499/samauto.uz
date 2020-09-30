<?php


namespace backend\helpers;


class TextHelper
{
    public static function text($model, $lang = 'ru')
    {
        $attribute = 'text_' . $lang;

        $template = <<<HTML
<div class="box box-default box-solid collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{title}</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            {body}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
HTML;


        $return = strtr($template, [
            '{title}' => $model->getAttributeLabel($attribute),
            '{body}' => $model->$attribute
        ]);

        return $return;
    }
}