<?php

namespace backend\helpers;

use common\models\VacancyRequest;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Request
{
    public static function statusList()
    {
        return [
            VacancyRequest::STATUS_WAIT => 'Wait',
            VacancyRequest::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case VacancyRequest::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case VacancyRequest::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }
}
