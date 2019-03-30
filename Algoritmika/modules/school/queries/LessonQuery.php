<?php

namespace app\modules\school\queries;

use yii\db\ActiveQuery;
use app\modules\school\models\{Group, Teacher};

/**
 * This is the ActiveQuery class for [[\app\modules\school\models\Lesson]].
 *
 * @see \app\modules\school\models\Lesson
 */
class LessonQuery extends ActiveQuery
{
    public function addGroupToSelect()
    {
        return $this->joinWith('groups', false)
            ->addSelect( "{$this->getPrimaryTableName()}.*")
            ->addSelect(Group::tableName() . ".name AS groupName");
    }

    public function addTeacherToSelect()
    {
        return $this->joinWith('groups.teacher', false)
            ->addSelect( "{$this->getPrimaryTableName()}.*")
            ->addSelect(Teacher::tableName() . ".name AS teacherName");
    }

    public function onWeek(string $date)
    {
        $dateTime = new \DateTime($date);
        $monday = clone $dateTime->modify(('Sunday' == $dateTime->format('l')) ? 'Monday last week' : 'Monday this week');
        $sunday = clone $dateTime->modify('Sunday this week');

        return $this->andWhere(
            "{$this->getPrimaryTableName()}.time BETWEEN :startTime AND :endTime OR {$this->getPrimaryTableName()}.time IS NULL",
            [
                'startTime' => $monday->format('Y-m-d 00:00:00'),
                'endTime' => $sunday->format('Y-m-d 23:59:59')
            ]
        );
    }
}
