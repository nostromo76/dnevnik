<?php

namespace frontend\modules\roditelj\controllers;

use frontend\modules\roditelj\models\Odeljenje;
use frontend\modules\roditelj\models\Roditelj;
use Yii;
use frontend\modules\roditelj\models\Obavestenja;
use frontend\modules\roditelj\models\ObavestenjaSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObavestenjaController implements the CRUD actions for Obavestenja model.
 */
class ObavestenjaController extends Controller
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
     * Lists all Obavestenja models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('roditelj')){
			
            $ucitelj = Roditelj::find()->select('ucitelj_id')->where(['user_id' => Yii::$app->user->id ])->one();
            $odeljenje_id = Odeljenje::find()->select('id_odeljenje')->where(['ucitelj_id' => $ucitelj ])->one();
            $ido = $odeljenje_id->id_odeljenje;

            $model = Obavestenja::find()
                ->select('id_obavestenja, naziv, opis, vreme, id_odeljenje')
                ->where(['obavestenja.id_odeljenje'=> $ido ])
                ->orderBy('vreme DESC')
                ->limit(20)
                ->all();

            $searchModel = new ObavestenjaSearch();
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
     * Displays a single Obavestenja model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('roditelj')) {
            $obavestenje = Obavestenja::find()
                ->select('id_obavestenja, naziv, opis, vreme, id_odeljenje')
                ->where(['id_obavestenja'=>$id ])
                ->all();
            return $this->render('view', [
                'model' => $this->findModel($id),
                'obavestenje' => $obavestenje,

            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }

    /**
     * Finds the Obavestenja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Obavestenja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Obavestenja::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
