<?php

namespace app\modules\school\models;

use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string $name
 * @property string $time
 *
 * @property LessonGroup[] $lessonGroups
 * @property Group[] $groups
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['time'], 'safe'],
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
            'name' => 'Название',
            'time' => 'Время',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessonGroups()
    {
        return $this->hasMany(LessonGroup::className(), ['lesson_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['id' => 'group_id'])->viaTable('lesson_group', ['lesson_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\school\queries\LessonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\school\queries\LessonQuery(get_called_class());
    }
}
