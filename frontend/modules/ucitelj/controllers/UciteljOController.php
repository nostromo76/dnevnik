<?php

namespace frontend\modules\ucitelj\controllers;

use Yii;
use frontend\modules\ucitelj\models\UciteljO;
use frontend\modules\ucitelj\models\UciteljOSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * UciteljOController implements the CRUD actions for UciteljO model.
 */
class UciteljOController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UciteljO models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('ucitelj')) {
            $model = UciteljO::find()
                ->select('*')
                ->from('otvorene_vrata_insert')
                ->join('JOIN',
                    'otvorena_vrata',
                    'otvorena_vrata.id_roditelj=otvorene_vrata_insert.id_roditelj')
                ->join('JOIN',
                    'roditelj',
                    'roditelj.id_roditelj=otvorena_vrata.id_roditelj')
                ->join('JOIN',
                    'user',
                    'user.id=roditelj.user_id')
                ->all();

            $searchModel = new UciteljOSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }

    /**
     * Displays a single UciteljO model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('ucitelj')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }

    }

    protected function findModel($id)
    {
        if (($model = UciteljO::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
