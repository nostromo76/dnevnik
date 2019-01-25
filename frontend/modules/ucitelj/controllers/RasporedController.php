<?php

namespace frontend\modules\ucitelj\controllers;

use Yii;
use frontend\modules\ucitelj\models\Raspored;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * RasporedController implements the CRUD actions for Raspored model.
 */
class RasporedController extends Controller
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
     * Lists all Raspored models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('ucitelj')){
            $prvi = Raspored::find()->where(['br_casa' => 1])->all();
            $drugi = Raspored::find()->where(['br_casa' => 2])->all();
            $treci = Raspored::find()->where(['br_casa' => 3])->all();
            $cetv = Raspored::find()->where(['br_casa' => 4])->all();
            $peti = Raspored::find()->where(['br_casa' => 5])->all();
            $sesti = Raspored::find()->where(['br_casa' => 6])->all();

            return $this->render('index', [
                'prvi' => $prvi,
                'drugi' => $drugi,
                'treci' => $treci,
                'cetv' => $cetv,
                'peti' => $peti,
                'sesti' => $sesti,
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }
}
