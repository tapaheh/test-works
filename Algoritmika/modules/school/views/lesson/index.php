<?php
use yii\grid\{GridView, SerialColumn};
use yii\widgets\Pjax;

$this->title = 'Уроки';
$this->params['breadcrumbs'] = ['label' => $this->title];
?>

<div class="site">
    <?php Pjax::begin(['id' => 'lessons']) ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $search,
            'columns' => [
                ['class' => SerialColumn::class],
                'name',
                'groupName',
                'teacherName',
                'time'
            ]
        ]) ?>
    <?php Pjax::end() ?>
</div>