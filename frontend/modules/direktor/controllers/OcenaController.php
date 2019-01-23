<?php

namespace frontend\modules\direktor\controllers;

use Yii;
use frontend\modules\direktor\models\Ocena;
use frontend\modules\direktor\models\OcenaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\modules\direktor\models\Predmet;
use frontend\modules\direktor\models\Odeljenje;

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
     * Lists all Ocena models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OcenaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $predmet = Predmet::find()->select('id_predmet,naziv')->all();

        return $this->render('index', [
            'predmet' => $predmet,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ocena model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $predmet = Predmet::find()->select('id_predmet,naziv')->where(['id_predmet' => $id])->all();
        $id_predmet = $id;
        $q = Yii::$app->db->createCommand("SELECT AVG(`ocena`.`zakljucena_ocena`) AS Prosek 
                                                  FROM `ocena` WHERE `ocena`.id_predmet = $id_predmet");
        $model= $q->queryAll();


        return $this->render('view', [
            'model' => $model,
            'predmet' => $predmet,
        ]);
    }

    /**
     * Creates a new Ocena model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionDirektor()
    {
        $searchModel = new OcenaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $predmet = Predmet::find()->select('id_predmet,naziv')->all();
        $odeljenje = Odeljenje::find()->select('id_odeljenje,naziv')->all();

        return $this->render('dindex', [
            'predmet' => $predmet,
            'odeljenje' => $odeljenje,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Ocena model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDirekto($id, $idp)
    {
        $predmet = Predmet::find()->select('id_predmet,naziv')->where(['id_predmet' => $id])->all();
        $id_predmet = $id;
        $odeljenje = Odeljenje::find()->select('id_odeljenje,naziv')->where(['id_odeljenje' => $idp])->all();
        $id_odeljenje = $idp;
        $q = Yii::$app->db->createCommand("SELECT AVG(`ocena`.`zakljucena_ocena`) AS Prosek FROM `ocena`
                                                    JOIN `ucenik` ON `ocena`.`id_ucenik`=`ucenik`.`id_ucenik`
                                                    JOIN `odeljenje` ON `ucenik`.`id_odeljenje`=`odeljenje`.`id_odeljenje`
                                                    WHERE `ocena`.`id_predmet`= $id_predmet AND `odeljenje`.`id_odeljenje`= $id_odeljenje");
        $model= $q->queryAll();


        return $this->render('dview', [
            'model' => $model,
            'predmet' => $predmet,
            'odeljenje' => $odeljenje,
        ]);
    }
    
    /**
     * Deletes an existing Ocena model.
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
