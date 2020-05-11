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

    public static function getMinDate()
    {
        return Visit::find()
            ->select('datetime')
            ->orderBy(['datetime' => SORT_ASC])
            ->limit(1)
            ->scalar();
    }

    public static function getMaxDate()
    {
        return Visit::find()
            ->select('datetime')
            ->orderBy(['datetime' => SORT_DESC])
            ->limit(1)
            ->scalar();
    }
}