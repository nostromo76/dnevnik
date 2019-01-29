<?php

namespace frontend\modules\ucitelj\controllers;


use frontend\modules\ucitelj\models\UciteljO;
use Yii;
use frontend\modules\ucitelj\models\Odgovor;
use frontend\modules\ucitelj\models\OdgovorSearch;
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
     * Creates a new Odgovor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id,$rod)
    {
        if(Yii::$app->user->can('ucitelj')){
            $model = new Odgovor();
            $ucitelj = UciteljO::find()->select('id_ucitelj')->where(['id_roditelj' => $rod, 'ovi_id' => $id])->one();

            if ($model->load(Yii::$app->request->post())) {
                $model->id_roditelj = $rod;
                $model->id_ucitelj = $ucitelj->id_ucitelj;
                if ($model->save()){
                    Yii::$app->session->setFlash('success','Uspešno ste odgovorili na zahtev!');
                    return $this->redirect(['/ucitelj/ucitelj-o']);
                }
            }
            return $this->render('create', [
                'model' => $model,
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
