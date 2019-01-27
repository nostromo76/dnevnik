<?php

namespace backend\controllers;

use Yii;
use backend\models\Obavestenja;
use backend\models\ObavestenjaSearch;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObavestenjaController implements the CRUD actions for Obavestenja model.
 */
class ObavestenjaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            "access"=> [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','update','create','delete','view'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Obavestenja models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')){
            $searchModel = new ObavestenjaSearch();
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
     * Displays a single Obavestenja model.
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
     * Creates a new Obavestenja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')){
            $model = new Obavestenja();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_obavestenja]);
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
     * Updates an existing Obavestenja model.
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
                return $this->redirect(['view', 'id' => $model->id_obavestenja]);
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
     * Deletes an existing Obavestenja model.
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
     * Finds the Obavestenja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Obavestenja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Obavestenja::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
