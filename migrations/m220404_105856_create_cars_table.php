<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cars}}`.
 */
class m220404_105856_create_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cars}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'year' => $this->integer(6),
            'color' => $this->string(200),
            'engine' => $this->string(25),
            'engine_type_id' => $this->integer(11),
            'kpp_id' => $this->integer(11),
            'price' => $this->float(11, 2),
            'currency_id' => $this->integer(11)
        ]);

        $this->addForeignKey(
            'fk-cars-engine_type_id',
            'cars',
            'engine_type_id',
            'engine_types',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-kpps_kpp_id',
            'cars',
            'kpp_id',
            'kpps',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-currency_id',
            'cars',
            'currency_id',
            'currencies',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cars}}');
    }
}
