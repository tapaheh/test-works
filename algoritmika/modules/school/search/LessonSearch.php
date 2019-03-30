<?php

namespace app\modules\school\search;

use yii\data\ActiveDataProvider;
use yii\db\Expression;
use app\modules\school\models\{
    Group, Lesson, Teacher
};

class LessonSearch extends Lesson
{
    public $teacherName;
    public $groupName;

    public function rules()
    {
        return [
            [['name', 'teacherName'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return parent::attributeLabels() + [
            'teacherName' => 'Учитель',
            'groupName' => 'Группа'
        ];
    }

    public function search($params)
    {
        $query = self::find()
            ->addGroupToSelect()
            ->addTeacherToSelect()
            ->onWeek(date('Y-m-d'));

        $tb = self::tableName();
        $teacherTb = Teacher::tableName();
        $groupTb = Group::tableName();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 50,],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'time' => [
                    'asc' => [new Expression("$tb.time IS NULL"), "$tb.time" => SORT_ASC],
                    'desc' => [new Expression("$tb.time IS NULL"), "$tb.time" => SORT_DESC],
                ]
            ],
            'defaultOrder' => ['time' => 'asc']
        ]);

        if (! ($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', "LOWER($teacherTb.name)", mb_strtolower($this->teacherName)])
            ->andFilterWhere(['like', "LOWER($tb.name)", mb_strtolower($this->name)])
            ->andFilterWhere(['like', "LOWER($groupTb.name)", mb_strtolower($this->groupName)]);

        return $dataProvider;
    }
}
