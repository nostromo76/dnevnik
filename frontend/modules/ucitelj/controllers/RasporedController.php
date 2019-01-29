<?php

namespace frontend\modules\ucitelj\controllers;

use frontend\modules\ucitelj\models\Ucitelj;
use Yii;
use frontend\modules\ucitelj\models\Raspored;
use frontend\modules\ucitelj\models\Odeljenje;
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

            $odeljenje = Ucitelj::find()->select('id_odeljenje')->where(['user_id' => Yii::$app->user->id ])->one();
            $odeljenje_id = Odeljenje::find()->select('id_odeljenje')->where(['id_odeljenje' => $odeljenje ])->one();
            $ido = $odeljenje_id->id_odeljenje;

            $prvi = Raspored::find()->where(['br_casa' => 1, 'id_odeljenje' => $ido])->all();
            $drugi = Raspored::find()->where(['br_casa' => 2, 'id_odeljenje' => $ido])->all();
            $treci = Raspored::find()->where(['br_casa' => 3, 'id_odeljenje' => $ido])->all();
            $cetv = Raspored::find()->where(['br_casa' => 4, 'id_odeljenje' => $ido])->all();
            $peti = Raspored::find()->where(['br_casa' => 5, 'id_odeljenje' => $ido])->all();
            $sesti = Raspored::find()->where(['br_casa' => 6, 'id_odeljenje' => $ido])->all();

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
