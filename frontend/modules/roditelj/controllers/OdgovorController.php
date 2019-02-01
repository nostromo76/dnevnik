<?php

namespace frontend\modules\roditelj\controllers;


use Yii;
use frontend\modules\roditelj\models\Odgovor;
use frontend\modules\roditelj\models\Roditelj;
use frontend\modules\roditelj\models\Odeljenje;
use frontend\modules\roditelj\models\Obavestenja;
use frontend\modules\roditelj\models\OdgovorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
/**
 * OdgovorController implements the CRUD actions for Odgovor model.
 */
class OdgovorController extends Controller
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
     * Lists all Odgovor models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('roditelj')){

            $ucitelj = Roditelj::find()->select('ucitelj_id')->where(['user_id' => Yii::$app->user->id ])->one();

            $ucitelj_id = Odeljenje::find()->select('ucitelj_id')->where(['ucitelj_id' => $ucitelj ])->one();
            $ido = $ucitelj_id->ucitelj_id;


            $model = Odgovor::find()
                ->select('*')
                ->where(['odgovor.id_ucitelj'=> $ido ])
                ->limit(15)
                ->all();

            $searchModel = new OdgovorSearch();
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
     * Finds the Odgovor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Odgovor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Odgovor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
