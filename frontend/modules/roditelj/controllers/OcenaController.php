<?php

namespace frontend\modules\roditelj\controllers;

use frontend\modules\roditelj\models\Roditelj;
use Yii;
use frontend\modules\roditelj\models\Ocena;
use frontend\modules\roditelj\models\OcenaSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OcenaController implements the CRUD actions for Ocena model.
 */
class OcenaController extends Controller
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
     * Lists all Ocena models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('roditelj')){
            $ucenik_id = Roditelj::find()->select('id_ucenik')->where(['user_id' => Yii::$app->user->id ])->one();
            $id_roditelj_ucenik = $ucenik_id->id_ucenik;
            $model = Ocena::find()
                ->select('*')
                ->join( 'JOIN',
                        'predmet',
                        "ocena.id_predmet=predmet.id_predmet")
                ->join( 'JOIN',
                        'ucenik',
                        "ocena.id_ucenik=ucenik.id_ucenik")
                ->where(['ocena.id_ucenik'=>$id_roditelj_ucenik])
                ->all();
            $searchModel = new OcenaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'model' => $model,
                'dataProvider' => $dataProvider,
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }
    /**
     * Finds the Ocena model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ocena the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ocena::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
