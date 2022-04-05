<?php

use yii\db\Migration;

/**
 * Class m220404_114304_add_column_cars_photo
 */
class m220404_114304_add_column_cars_photo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('cars', 'photo', 'varchar(255)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220404_114304_add_column_cars_photo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220404_114304_add_column_cars_photo cannot be reverted.\n";

        return false;
    }
    */
}
