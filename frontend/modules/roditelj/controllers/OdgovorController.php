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

            $roditelj = Roditelj::find()->select('id_roditelj')->where(['user_id' => Yii::$app->user->id ])->one();
            $odeljenje_id = Odeljenje::find()->select('id_odeljenje')->where(['ucitelj_id' => $roditelj ])->one();
            $ido = $odeljenje_id->id_odeljenje;

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
