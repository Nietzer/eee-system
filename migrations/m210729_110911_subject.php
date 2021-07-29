<?php

use yii\db\Schema;
use yii\db\Migration;

class m210729_110911_subject extends Migration
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
            '{{%subject}}',
            [
                'id'=> $this->primaryKey(),
                'name'=> $this->string(255)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%subject}}');
    }
}
