<?php

namespace frontend\modules\poruke\controllers;

use frontend\modules\poruke\models\Roditelj;
use Yii;
use frontend\modules\poruke\models\Poruke;
use frontend\modules\poruke\models\PorukeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\poruke\models\Ucitelj;

/**
 * PorukeController implements the CRUD actions for Poruke model.
 */
class PorukeController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Poruke models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorukeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Poruke model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Poruke model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $ucitelj_id = Ucitelj::find()->select('id_ucitelj')->where(['user_id' => Yii::$app->user->id ])->one();
        $roditelj_id = Roditelj::find()->select('id_roditelj')->where(['user_id' => Yii::$app->user->id ])->one();
        $model = new Poruke();

        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->user->identity->role == 4){
                $model->ucitelj_id = $ucitelj_id->id_ucitelj;
            } else if(Yii::$app->user->identity->role == 8) {
                $model->roditelj_id = $roditelj_id->id_roditelj;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id_poruke]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Poruke model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_poruke]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Poruke model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Poruke model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Poruke the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Poruke::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
