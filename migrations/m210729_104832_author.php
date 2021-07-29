<?php

use yii\db\Schema;
use yii\db\Migration;

class m210729_104832_author extends Migration
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
            '{{%author}}',
            [
                'id'=> $this->primaryKey(),
                'user_id'=> $this->integer()->notNull(),
                'plan_id'=> $this->integer()->notNull(),
                'main_author'=> $this->tinyInteger()->notNull(),
            ],$tableOptions
        );
        $this->createIndex('user_id','{{%author}}',['user_id','plan_id'],false);
        $this->createIndex('user_id_2','{{%author}}',['user_id'],false);
        $this->createIndex('plan_id','{{%author}}',['plan_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('user_id', '{{%author}}');
        $this->dropIndex('user_id_2', '{{%author}}');
        $this->dropIndex('plan_id', '{{%author}}');
        $this->dropTable('{{%author}}');
    }
}
