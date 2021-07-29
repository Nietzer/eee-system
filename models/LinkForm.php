<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link_speciality_cathedra".
 *
 * @property int $id
 * @property int $cathedra_id
 * @property int $speciality_id
 *
 * @property Cathedra $cathedra
 * @property Speciality $speciality
 */
class LinkForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'link_speciality_cathedra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cathedra_id', 'speciality_id'], 'required'],
            [['cathedra_id', 'speciality_id'], 'integer'],
            [['cathedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => CathedraForm::className(), 'targetAttribute' => ['cathedra_id' => 'id']],
            [['speciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => SpecialityForm::className(), 'targetAttribute' => ['speciality_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cathedra_id' => 'Cathedra ID',
            'speciality_id' => 'Speciality ID',
        ];
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
     * Gets query for [[Speciality]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(SpecialityForm::className(), ['id' => 'speciality_id']);
    }
}
