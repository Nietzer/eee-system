<?php

use yii\db\Schema;
use yii\db\Migration;

class m210729_104847_cathedra extends Migration
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
            '{{%cathedra}}',
            [
                'id'=> $this->primaryKey(),
                'name'=> $this->string(255)->notNull(),
                'short_name'=> $this->string(255)->notNull(),
                'active_status'=> $this->tinyInteger(1)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%cathedra}}');
    }
}
