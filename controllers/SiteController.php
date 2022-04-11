<?php
declare(strict_types=1);

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\search\HistorySearch;

class SiteController extends Controller
{
    private HistorySearch $historySearch;

    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function __construct($id, $module, HistorySearch $historySearch,  $config = [])
    {
        $this->historySearch = $historySearch;

        parent::__construct($id, $module, $config);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }


    /**
     * @param string $exportType
     * @return string
     */
    public function actionExport(string $exportType): string
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '2048M');

        return $this->render('export', [
            'dataProvider' => $this->historySearch->search(Yii::$app->request->queryParams),
            'exportType' => $exportType,
            'model' => $this->historySearch
        ]);
    }
}
