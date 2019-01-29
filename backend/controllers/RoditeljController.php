<?php

namespace backend\controllers;

use backend\models\Ucenik;
use yii\web\ForbiddenHttpException;

use Yii;
use backend\models\Roditelj;
use backend\models\RoditeljSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoditeljController implements the CRUD actions for Roditelj model.
 */
class RoditeljController extends Controller
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
     * Lists all Roditelj models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')){
            $searchModel = new RoditeljSearch();
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
     * Displays a single Roditelj model.
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
     * Creates a new Roditelj model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')){
            $model = new Roditelj();
            if ($model->load(Yii::$app->request->post())) {
                $query = Yii::$app->db->createCommand(
                    'SELECT `odeljenje`.`ucitelj_id` FROM `ucenik`
                        JOIN `odeljenje` ON `ucenik`.`id_odeljenje` = `odeljenje`.`id_odeljenje`
                        WHERE `ucenik`.`id_ucenik` = '.$model->id_ucenik.'
                ');
                $ucenik = $query->queryAll();
                $model->ucitelj_id = $ucenik[0]['ucitelj_id'];
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id_roditelj]);
                }
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
     * Updates an existing Roditelj model.
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
                return $this->redirect(['view', 'id' => $model->id_roditelj]);
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
     * Deletes an existing Roditelj model.
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
     * Finds the Roditelj model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Roditelj the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Roditelj::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
