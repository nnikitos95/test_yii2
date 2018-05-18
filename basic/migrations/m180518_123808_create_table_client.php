<?php

use yii\db\Migration;

/**
 * Class m180518_123808_create_table_client
 */
class m180518_123808_create_table_client extends Migration
{
    private $table = 'client';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultValue('0000-00-00 00:00:00')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
