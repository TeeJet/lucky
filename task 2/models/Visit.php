<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class Visit
 * @package app\models
 *
 * @property string $datetime
 * @property integer $status
 */

class Visit extends ActiveRecord
{
    const STATUS_IN = 1;
    const STATUS_OUT = 2;

    public static function tableName()
    {
        return 'visits';
    }

    public static function getGroupsWithCountByPeriod($start, $end)
    {
        return Visit::find()
            ->select(['datetime', 'status', 'COUNT(*) count'])
            ->orderBy('datetime')
            ->andWhere(['>=', 'datetime', $start])
            ->andWhere(['<=', 'datetime', $end])
            ->groupBy(['datetime', 'status'])
            ->asArray()
            ->all();
    }
}