<?php
namespace app\modules\school\controllers;

use Yii;
use yii\web\Controller;
use app\modules\school\search\LessonSearch;

class LessonController extends Controller
{
    public function actionIndex()
    {
        $search = new LessonSearch();
        $dataProvider = $search->search(Yii::$app->request->queryParams);

        return $this->render('index', ['dataProvider' => $dataProvider, 'search' => $search]);
    }
}
