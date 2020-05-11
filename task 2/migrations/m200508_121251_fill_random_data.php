<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m200508_121251_fill_random_data
 */
class m200508_121251_fill_random_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($j = 0; $j <= 100; $j++) {
            $data = [];
            for ($i = 0; $i <= 10000; $i++) {
                $data[] = [
                    new Expression("FROM_UNIXTIME(UNIX_TIMESTAMP('2020-05-01 00:00:00') + FLOOR(0 + (RAND() * 86400 * 7)))"),
                    mt_rand(1, 2)
                ];
            }
            $this->batchInsert('visits', ['datetime', 'status'], $data);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('visits');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200508_121251_fill_random_data cannot be reverted.\n";

        return false;
    }
    */
}
