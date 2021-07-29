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
            // [['name', 'cathedra_id', 'speciality_id', 'subject_id', 'type_id', 'file'], 'required'],
            [['date_create', 'date_term'], 'safe'],
            [['cathedra_id', 'speciality_id', 'subject_id', 'type_id', 'status_id'], 'integer'],
            [['name', 'file'], 'string', 'max' => 255],
            [['speciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => SpecialityForm::className(), 'targetAttribute' => ['speciality_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectForm::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeForm::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['cathedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => CathedraForm::className(), 'targetAttribute' => ['cathedra_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => StatusForm::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthorForm::className(), 'targetAttribute' => ['id' => 'plan_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'date_create' => 'Date Create',
            'date_term' => 'Срок выполнения',
            'cathedra_id' => 'Кафедра',
            'speciality_id' => 'Специальность',
            'subject_id' => 'Предмет',
            'type_id' => 'Type ID',
            'file' => 'Файл',
            'status_id' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Speciality]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(SpecialityForm::className(), ['id' => 'speciality_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(SubjectForm::className(), ['id' => 'subject_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeForm::className(), ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Cathedra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCathedra()
    {
        return $this->hasOne(CathedraForm::className(), ['id' => 'cathedra_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(StatusForm::className(), ['id' => 'status_id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(AuthorForm::className(), ['plan_id' => 'id']);
    }

    /**
     * Gets query for [[Speciality0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality0()
    {
        return $this->hasOne(SpecialityForm::className(), ['id' => 'speciality_id']);
    }
}
