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
        for ($i = 0; $i <= 10000; $i++) {
            $this->insert('visits', [
                'datetime' => new Expression("FROM_UNIXTIME(UNIX_TIMESTAMP('2020-04-30 14:53:27') + FLOOR(0 + (RAND() * 63072000)))"),
                'status' => mt_rand(1, 2)
            ]);
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
