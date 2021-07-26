<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $id
 * @property string $name
 * @property string $date_create
 * @property string $date_term
 * @property int $cathedra_id
 * @property int $speciality_id
 * @property int $subject_id
 * @property int $type_id
 * @property string $file
 * @property int $status_id
 */
class PlanForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date_create', 'date_term', 'cathedra_id', 'speciality_id', 'subject_id', 'type_id', 'file', 'status_id'], 'required'],
            [['date_create', 'date_term'], 'safe'],
            [['cathedra_id', 'speciality_id', 'subject_id', 'type_id', 'status_id'], 'integer'],
            [['name', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_create' => 'Date Create',
            'date_term' => 'Date Term',
            'cathedra_id' => 'Cathedra ID',
            'speciality_id' => 'Speciality ID',
            'subject_id' => 'Subject ID',
            'type_id' => 'Type ID',
            'file' => 'File',
            'status_id' => 'Status ID',
        ];
    }
}
