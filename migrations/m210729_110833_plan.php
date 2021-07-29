<?php

use yii\db\Schema;
use yii\db\Migration;

class m210729_110833_plan extends Migration
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
            '{{%plan}}',
            [
                'id'=> $this->primaryKey(),
                'name'=> $this->string(255)->notNull(),
                'date_create'=> $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
                'date_term'=> $this->date()->notNull(),
                'cathedra_id'=> $this->integer()->notNull(),
                'speciality_id'=> $this->integer()->notNull(),
                'subject_id'=> $this->integer()->notNull(),
                'type_id'=> $this->integer()->notNull(),
                'file'=> $this->string(255)->notNull(),
                'status_id'=> $this->integer()->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('cathedra_id','{{%plan}}',['cathedra_id'],false);
        $this->createIndex('speciality_id','{{%plan}}',['speciality_id','subject_id','type_id','status_id'],false);
        $this->createIndex('subject_id','{{%plan}}',['subject_id'],false);
        $this->createIndex('type_id','{{%plan}}',['type_id'],false);
        $this->createIndex('status_id','{{%plan}}',['status_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('cathedra_id', '{{%plan}}');
        $this->dropIndex('speciality_id', '{{%plan}}');
        $this->dropIndex('subject_id', '{{%plan}}');
        $this->dropIndex('type_id', '{{%plan}}');
        $this->dropIndex('status_id', '{{%plan}}');
        $this->dropTable('{{%plan}}');
    }
}
