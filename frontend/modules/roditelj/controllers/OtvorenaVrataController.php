<?php

namespace frontend\modules\roditelj\controllers;

use Yii;
use frontend\modules\roditelj\models\OtvorenaVrata;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\roditelj\models\Roditelj;

/**
 * OtvorenaVrataController implements the CRUD actions for OtvorenaVrata model.
 */
class OtvorenaVrataController extends Controller
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
     * Lists all OtvorenaVrata models.
     * @return mixed
     */
/*    public function actionIndex()
    {
        $searchModel = new OtvorenaVrataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/

    /**
     * Displays a single OtvorenaVrata model.
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
     * Creates a new OtvorenaVrata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    {
        $roditelj_id = Roditelj::find()->select('id_roditelj')->where(['user_id' => Yii::$app->user->id ])->one();
        $query= Yii::$app->db->createCommand('SELECT `ucenik`.`id_odeljenje`, `odeljenje`.`ucitelj_id` FROM `roditelj`
            JOIN `ucenik` ON `roditelj`.`id_ucenik`=`ucenik`.`id_ucenik`
            JOIN `odeljenje` ON `ucenik`.`id_odeljenje`=`odeljenje`.`id_odeljenje`
            WHERE `ucenik`.`id_roditelj` = '.$roditelj_id->id_roditelj.'.');
        $ucenik_odeljenje = $query->queryAll();
        $model = new OtvorenaVrata();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_ucitelj = $ucenik_odeljenje[0]['ucitelj_id'];
            $model->id_roditelj = $roditelj_id->id_roditelj;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id_otvorena_vrata]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OtvorenaVrata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
/*    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_otvorena_vrata]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

    /**
     * Deletes an existing OtvorenaVrata model.
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
     * Finds the OtvorenaVrata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OtvorenaVrata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OtvorenaVrata::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
