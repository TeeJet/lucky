<?php

use yii\db\Migration;

/**
 * Class m200508_120855_init_tables
 */
class m200508_120855_init_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('visits', [
            'datetime' => $this->dateTime(),
            'status' => $this->tinyInteger()
        ]);

        $this->createIndex(
            'i-datetime',
            'visits',
            'datetime'
        );

        $this->createIndex(
            'i-datetime_status',
            'visits',
            ['datetime', 'status']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('visits');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200508_120855_init_tables cannot be reverted.\n";

        return false;
    }
    */
}
