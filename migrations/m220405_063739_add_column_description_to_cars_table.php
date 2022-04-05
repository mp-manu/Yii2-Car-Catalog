<?php

use yii\db\Migration;

/**
 * Class m220405_063739_add_column_description_to_cars_table
 */
class m220405_063739_add_column_description_to_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('cars', 'description', 'text');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220405_063739_add_column_description_to_cars_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220405_063739_add_column_description_to_cars_table cannot be reverted.\n";

        return false;
    }
    */
}
