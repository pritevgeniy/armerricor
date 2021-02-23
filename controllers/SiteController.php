<?php

namespace app\controllers;

use app\models\events\CallIncoming;
use app\models\events\CustomerChangeQuality;
use app\models\events\FaxOutGoing;
use app\models\events\IncomingSms;
use app\models\events\SmsIncoming;
use app\models\events\TaskCreated;
use app\models\History;
use app\models\search\HistorySearch;
use app\services\EventService;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @param string $exportType
     * @return string
     */
    public function actionExport($exportType)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '2048M');

        $model = new HistorySearch();

        return $this->render('export', [
            'dataProvider' => $model->search(Yii::$app->request->queryParams),
            'exportType' => $exportType,
            'model' => $model
        ]);
    }
}
