<?php

use yii\db\Migration;

/**
 * Class m220404_114540_add_column_cars_isHas
 */
class m220404_114540_add_column_cars_isHas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('cars', 'isHave', 'int(2)');
        $this->addColumn('cars', 'status', 'int(2)');
        $this->addColumn('cars', 'created_at', 'datetime');
        $this->addColumn('cars', 'created_by', 'int(11)');
        $this->addColumn('cars', 'updated_at', 'datetime');
        $this->addColumn('cars', 'updated_by', 'int(11)');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220404_114540_add_column_cars_isHas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220404_114540_add_column_cars_isHas cannot be reverted.\n";

        return false;
    }
    */
}
