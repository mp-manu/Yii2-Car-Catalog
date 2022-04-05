<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%engine_types}}`.
 */
class m220404_104913_create_engine_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%engine_types}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'status' => $this->integer(2)->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%engine_types}}');
    }
}
