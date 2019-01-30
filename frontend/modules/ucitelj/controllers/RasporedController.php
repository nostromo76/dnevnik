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

            $q = Yii::$app->db->createCommand('
                SELECT * FROM `raspored` 
	                JOIN `predmet` ON `raspored`.`id_predmet` = `predmet`.`id_predmet`
	                WHERE `raspored`.`id_odeljenje` = '.$ido.'
                ');
            $model = $q->queryAll();

            return $this->render('index', [
                'model' => $model,
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }
}
