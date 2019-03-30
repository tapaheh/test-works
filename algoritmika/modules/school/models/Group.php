<?php

namespace app\modules\school\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string $name
 * @property int $teacher_id
 *
 * @property Teacher $teacher
 * @property LessonGroup[] $lessonGroups
 * @property Lesson[] $lessons
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'teacher_id'], 'required'],
            [['teacher_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Нахвание',
            'teacher_id' => 'Учитель',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessonGroups()
    {
        return $this->hasMany(LessonGroup::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::className(), ['id' => 'lesson_id'])->viaTable('lesson_group', ['group_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\school\queries\GroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\school\queries\GroupQuery(get_called_class());
    }
}
