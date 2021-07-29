<?php

use yii\db\Schema;
use yii\db\Migration;

class m210729_110824_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_link_speciality_cathedra_cathedra_id',
            '{{%link_speciality_cathedra}}','cathedra_id',
            '{{%cathedra}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_link_speciality_cathedra_speciality_id',
            '{{%link_speciality_cathedra}}','speciality_id',
            '{{%speciality}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_link_speciality_cathedra_cathedra_id', '{{%link_speciality_cathedra}}');
        $this->dropForeignKey('fk_link_speciality_cathedra_speciality_id', '{{%link_speciality_cathedra}}');
    }
}
