<?php

use yii\db\Migration;

/**
 * Class m180518_124453_create_table_bill
 */
class m180518_124453_create_table_bill extends Migration
{
    private $table = 'bill';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'client_id' => 'integer NOT NULL REFERENCES client(id)',
            'bill_date' => $this->timestamp(),
            'bill_pay' => $this->timestamp(),
            'price' => $this->integer()->unsigned(),
            'status' => $this->integer(),
            'name' => $this->string(),
            'bill_link' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180518_124453_create_table_bill cannot be reverted.\n";

        return false;
    }
    */
}
