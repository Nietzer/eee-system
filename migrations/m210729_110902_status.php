<?php

use yii\db\Schema;
use yii\db\Migration;

class m210729_110902_status extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%status}}',
            [
                'id'=> $this->primaryKey(),
                'description'=> $this->text()->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%status}}');
    }
}
