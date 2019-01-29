<?php

namespace frontend\modules\ucitelj\controllers;

use frontend\modules\ucitelj\models\Odeljenje;
use yii\web\ForbiddenHttpException;
use frontend\modules\ucitelj\models\Ucenik;
use Yii;
use frontend\modules\ucitelj\models\Ocena;
use frontend\modules\ucitelj\models\Ucitelj;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UciteljController implements the CRUD actions for Ucitelj model.
 */
class UciteljController extends Controller
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
     * Lists all Ucitelj models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('ucitelj')){

            $odeljenje = Ucitelj::find()->select('id_odeljenje')->where(['user_id' => Yii::$app->user->id ])->one();
            $ocena = Odeljenje::find()->select('id_odeljenje')->where(['id_odeljenje' => $odeljenje ])->one();
            $idu = $ocena->id_odeljenje;

            $ucenik = Ucenik::find()
                ->select('*')
                ->where(['ucenik.id_odeljenje'=> $idu ])
                ->all();

            return $this->render('index', ['ucenik' => $ucenik]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }

    /**
     * Displays a single Ucitelj model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $ime)
    {
        if(Yii::$app->user->can('ucitelj')){
            $ocene = Ocena::find()
                            ->select('*')
                            ->join('JOIN','predmet','ocena.id_predmet = predmet.id_predmet')
                            ->join('JOIN','ucenik','ocena.id_ucenik = ucenik.id_ucenik')
                            ->where(['ucenik.id_ucenik' => $id])
                            ->all();
            return $this->render('view', [
                'ocene' => $ocene,
                'ime' => $ime
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }
    /**
     * Finds the Ucitelj model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ucitelj the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ucitelj::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
