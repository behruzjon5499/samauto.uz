<?php

namespace backend\helpers;

use common\models\VacancySend;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Vacancystatus
{
    public static function statusList()
    {
        return [
            VacancySend::STATUS_WAIT => 'Wait',
            VacancySend::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case VacancySend::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case VacancySend::STATUS_ACTIVE:
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
