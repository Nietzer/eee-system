<?php

use yii\db\Schema;
use yii\db\Migration;

class m210729_110823_link_speciality_cathedra extends Migration
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
            '{{%link_speciality_cathedra}}',
            [
                'id'=> $this->primaryKey(),
                'cathedra_id'=> $this->integer()->notNull(),
                'speciality_id'=> $this->integer()->notNull(),
            ],$tableOptions
        );
        $this->createIndex('cathedra_id','{{%link_speciality_cathedra}}',['cathedra_id'],false);
        $this->createIndex('speciality_id','{{%link_speciality_cathedra}}',['speciality_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('cathedra_id', '{{%link_speciality_cathedra}}');
        $this->dropIndex('speciality_id', '{{%link_speciality_cathedra}}');
        $this->dropTable('{{%link_speciality_cathedra}}');
    }
}
