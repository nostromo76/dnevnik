<?php

namespace frontend\modules\direktor\controllers;

use Yii;
use frontend\modules\direktor\models\Ocena;
use frontend\modules\direktor\models\OcenaSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
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
        if(Yii::$app->user->can('direktor')){
            $predmet = Predmet::find()->select('id_predmet,naziv')->all();

            foreach($predmet as $pre){
                $q = Yii::$app->db->createCommand("SELECT `predmet`.`naziv` AS predmet, AVG(`ocena`.`zakljucena_ocena`) AS prosek FROM `ocena` 
                                                    JOIN `predmet` ON `ocena`.`id_predmet`=`predmet`.`id_predmet`
                                                  WHERE `ocena`.id_predmet = $pre->id_predmet");
                $model = $q->queryAll();
                foreach ($model as $item){
                    $model2[] = $item;
                }
            }
            $json_data = json_encode($model2);
            file_put_contents('prosek.json', $json_data);
            return $this->render('index');
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }
}

    /**
     * Displays a single Ocena model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    /**
     * Creates a new Ocena model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionDirektor()
    {
        if(Yii::$app->user->can('direktor')){
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
    public function actionDirekto($id)
    {
        if(Yii::$app->user->can('direktor')){
            $predmet = Predmet::find()->select('id_predmet,naziv')->all();

            foreach($predmet as $pre){
                $q = Yii::$app->db->createCommand("SELECT `predmet`.`naziv` AS predmet, AVG(`ocena`.`zakljucena_ocena`) AS prosek FROM `ocena` 
                                                    JOIN `predmet` ON `ocena`.`id_predmet`=`predmet`.`id_predmet`
                                                    JOIN `ucenik` ON `ocena`.`id_ucenik` = `ucenik`.`id_ucenik`
                                                  WHERE `ocena`.id_predmet = $pre->id_predmet AND `ucenik`.`id_odeljenje` = $id");
                $model = $q->queryAll();
                foreach ($model as $item){
                    $model2[] = $item;
                }
            }
            $json_data = json_encode($model2);
            file_put_contents('prosekOdejenje.json', $json_data);
            return $this->render('dview');
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
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('direktor')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['site/login']);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
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
