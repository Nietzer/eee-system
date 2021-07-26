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
 *
 * @property Speciality $speciality
 * @property Subject $subject
 * @property Type $type
 * @property Cathedra $cathedra
 * @property Status $status
 * @property Author $id0
 * @property Speciality $speciality0
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
            [['name', 'date_term', 'cathedra_id', 'speciality_id', 'subject_id', 'type_id', 'file', 'status_id'], 'required'],
            [['date_create', 'date_term'], 'safe'],
            [['cathedra_id', 'speciality_id', 'subject_id', 'type_id', 'status_id'], 'integer'],
            [['name', 'file'], 'string', 'max' => 255],
            [['speciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Speciality::className(), 'targetAttribute' => ['speciality_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['cathedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cathedra::className(), 'targetAttribute' => ['cathedra_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['id' => 'plan_id']],
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

    /**
     * Gets query for [[Speciality]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(Speciality::className(), ['id' => 'speciality_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Cathedra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCathedra()
    {
        return $this->hasOne(Cathedra::className(), ['id' => 'cathedra_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Author::className(), ['plan_id' => 'id']);
    }

    /**
     * Gets query for [[Speciality0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality0()
    {
        return $this->hasOne(Speciality::className(), ['id' => 'speciality_id']);
    }
}
