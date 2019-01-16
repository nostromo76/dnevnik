<?php

namespace frontend\modules\ucitelj\controllers;

use Yii;
use frontend\modules\ucitelj\models\UciteljO;
use frontend\modules\ucitelj\models\UciteljOSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UciteljOController implements the CRUD actions for UciteljO model.
 */
class UciteljOController extends Controller
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
     * Lists all UciteljO models.
     * @return mixed
     */
    public function actionIndex()
    {
/*        SELECT *
        FROM `otvorene_vrata_insert`
    	JOIN `otvorena_vrata`
        	ON `otvorene_vrata_insert`.`id_roditelj`=`otvorena_vrata`.`id_roditelj`
		JOIN `roditelj`
			ON `otvorena_vrata`.`id_roditelj`=`roditelj`.`id_roditelj`
		JOIN `user`
			ON `roditelj`.`user_id`=`user`.`id`;*/

        $model = UciteljO::find()
            ->select('*')
            ->from('otvorene_vrata_insert')
            ->join( 'JOIN',
                'otvorena_vrata',
                'otvorena_vrata.id_roditelj=otvorene_vrata_insert.id_roditelj')
            ->join( 'JOIN',
                'roditelj',
                'roditelj.id_roditelj=otvorena_vrata.id_roditelj')
            ->join( 'JOIN',
                'user',
                'user.id=roditelj.user_id')
            ->all();

        $searchModel = new UciteljOSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UciteljO model.
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
     * Creates a new UciteljO model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
/*    public function actionCreate()
    {
        $model = new UciteljO();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    /**
     * Updates an existing UciteljO model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
/*    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

    /**
     * Deletes an existing UciteljO model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
/*    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the UciteljO model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UciteljO the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UciteljO::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
