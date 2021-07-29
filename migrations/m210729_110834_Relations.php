<?php

use yii\db\Schema;
use yii\db\Migration;

class m210729_110834_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_plan_speciality_id',
            '{{%plan}}','speciality_id',
            '{{%speciality}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_plan_subject_id',
            '{{%plan}}','subject_id',
            '{{%subject}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_plan_type_id',
            '{{%plan}}','type_id',
            '{{%type}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_plan_cathedra_id',
            '{{%plan}}','cathedra_id',
            '{{%cathedra}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_plan_status_id',
            '{{%plan}}','status_id',
            '{{%status}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_plan_speciality_id', '{{%plan}}');
        $this->dropForeignKey('fk_plan_subject_id', '{{%plan}}');
        $this->dropForeignKey('fk_plan_type_id', '{{%plan}}');
        $this->dropForeignKey('fk_plan_cathedra_id', '{{%plan}}');
        $this->dropForeignKey('fk_plan_status_id', '{{%plan}}');
    }
}
