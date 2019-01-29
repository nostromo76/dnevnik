<?php

namespace frontend\modules\ucitelj\controllers;

use Yii;
use frontend\modules\ucitelj\models\Ocena;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\ucitelj\models\Ucitelj;
use frontend\modules\ucitelj\models\Odeljenje;

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
     * Creates a new Ocena model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('ucitelj')){

            $odeljenje = Ucitelj::find()->select('id_odeljenje')->where(['user_id' => Yii::$app->user->id ])->one();
            $ocena = Odeljenje::find()->select('id_odeljenje')->where(['id_odeljenje' => $odeljenje ])->one();
            $ido = $ocena->id_odeljenje;

            $model = new Ocena();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['/ucitelj/ucitelj']);
            }

            return $this->render('create', [
                'model' => $model,
                'ido' => $ido,
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }

    /**
     * Updates an existing Ocena model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('ucitelj')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['ucitelj/view', 'id' => $model->id_ucenik,'ime' => $model->ucenik->username]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }

    /**
     * Deletes an existing Ocena model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


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
