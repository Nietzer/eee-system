<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cathedra".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property int $active_status
 */
class CathedraForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cathedra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_name', 'active_status'], 'required'],
            [['active_status'], 'integer'],
            [['name', 'short_name'], 'string', 'max' => 255],
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
            'short_name' => 'Short Name',
            'active_status' => 'Active Status',
        ];
    }
}
