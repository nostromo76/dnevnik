<?php

namespace backend\controllers;

use yii\web\ForbiddenHttpException;

use Yii;
use backend\models\Predmet;
use backend\models\PredmetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PredmetController implements the CRUD actions for Predmet model.
 */
class PredmetController extends Controller
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
     * Lists all Predmet models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')){
            $searchModel = new PredmetSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa strani');
        }
    }

    /**
     * Displays a single Predmet model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('admin')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa strani');
        }
    }

    /**
     * Creates a new Predmet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')){
            $model = new Predmet();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_predmet]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa strani');
        }
    }

    /**
     * Updates an existing Predmet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_predmet]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa strani');
        }
    }

    /**
     * Deletes an existing Predmet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa strani');
        }
    }

    /**
     * Finds the Predmet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Predmet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Predmet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
