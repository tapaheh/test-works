<?php

namespace app\modules\school\models;

use Yii;

/**
 * This is the model class for table "lesson_group".
 *
 * @property int $lesson_id
 * @property int $group_id
 *
 * @property Group $group
 * @property Lesson $lesson
 */
class LessonGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'group_id'], 'required'],
            [['lesson_id', 'group_id'], 'integer'],
            [['lesson_id', 'group_id'], 'unique', 'targetAttribute' => ['lesson_id', 'group_id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::className(), 'targetAttribute' => ['lesson_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lesson_id' => 'Урок',
            'group_id' => 'Группа',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['id' => 'lesson_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\school\queries\LessonGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\school\queries\LessonGroupQuery(get_called_class());
    }
}
