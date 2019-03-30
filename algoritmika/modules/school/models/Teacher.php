<?php

namespace app\modules\school\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $name
 *
 * @property Group[] $groups
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['teacher_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\school\queries\TeacherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\school\queries\TeacherQuery(get_called_class());
    }
}
