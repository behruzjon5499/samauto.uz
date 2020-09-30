<?php


namespace backend\helpers;


class Statushelper
{
    public static function status($model)
    {
        return $model->status == 0 || $model->status === null ? '<span class="label label-danger">Отключен</span>' : '<span class="label label-success">Включен</span>';
    }

    public static function view($model)
    {
        return $model->status == 0 || $model->status === null ? '<span class="label label-danger">Не просмотрено</span>' : '<span class="label label-success">Просмотрен</span>';
    }
}