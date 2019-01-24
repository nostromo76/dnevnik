<?php

namespace frontend\modules\poruke\controllers;

use frontend\modules\poruke\models\Roditelj;
use Yii;
use frontend\modules\poruke\models\Poruke;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
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

        if(Yii::$app->user->can('ucitelj') || Yii::$app->user->can('roditelj')){
            $rola = Yii::$app->user->identity->role;
            $ucitelj_id = Ucitelj::find()->select('id_ucitelj')->where(['user_id' => Yii::$app->user->id ])->one();
            $roditelj_id = Roditelj::find()->select('id_roditelj')->where(['user_id' => Yii::$app->user->id ])->one();

            if($rola == 4){

                $svePorukeUcitelj = Poruke::findBySql('SELECT DISTINCT `roditelj_id` FROM `poruke` WHERE `ucitelj_id` = '.$ucitelj_id->id_ucitelj.';')->all();

                return $this->render('index', [
                    'svePorukeUcitelj' => $svePorukeUcitelj,
                ]);
            } else if($rola == 8){

                $svePorukeRoditelj = Poruke::findBySql('SELECT DISTINCT `ucitelj_id` FROM `poruke` WHERE `roditelj_id` = '.$roditelj_id->id_roditelj.';')->all();

                return $this->render('index', [
                    'svePorukeRoditelj' => $svePorukeRoditelj
                ]);
            }
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }

    /**
     * Displays a single Poruke model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('ucitelj') || Yii::$app->user->can('roditelj')){
            $ucitelj_id = Ucitelj::find()->select('id_ucitelj')->where(['user_id' => Yii::$app->user->id ])->one();
            $roditelj_id = Roditelj::find()->select('id_roditelj')->where(['user_id' => Yii::$app->user->id ])->one();
            $porukeUcitelj = Poruke::find()->where(['roditelj_id' => $id, 'ucitelj_id' => $ucitelj_id])->all();
            $porukeRoditelj = Poruke::find()->where(['ucitelj_id' => $id, 'roditelj_id' => $roditelj_id])->all();
            return $this->render('view', [
                'porukeUcitelj' => $porukeUcitelj,
                'porukeRoditelj' => $porukeRoditelj,
                'ucitelj_id' => $ucitelj_id,
                'roditelj_id' => $roditelj_id
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }

    /**
     * Creates a new Poruke model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('ucitelj') || Yii::$app->user->can('roditelj')){
            $rola = Yii::$app->user->identity->role;
            $ucitelj_id = Ucitelj::find()->select('id_ucitelj')->where(['user_id' => Yii::$app->user->id ])->one();
            $roditelj_id = Roditelj::find()->select('id_roditelj')->where(['user_id' => Yii::$app->user->id ])->one();
            if($rola == 8){
                $query= Yii::$app->db->createCommand('SELECT `ucenik`.`id_odeljenje`, `odeljenje`.`ucitelj_id` FROM `roditelj`
                    JOIN `ucenik` ON `roditelj`.`id_ucenik`=`ucenik`.`id_ucenik`
                    JOIN `odeljenje` ON `ucenik`.`id_odeljenje`=`odeljenje`.`id_odeljenje`
                    WHERE `ucenik`.`id_roditelj` = '.$roditelj_id->id_roditelj.'.');
                $ucenik_odeljenje = $query->queryAll();
            }
            $model = new Poruke();

            if ($model->load(Yii::$app->request->post())) {
                if($rola == 4){
                    $model->ucitelj_id = $ucitelj_id->id_ucitelj;
                    $model->od_korisnika = $ucitelj_id->id_ucitelj;
                    $model->ka_korisniku = $model->roditelj_id;
                    if($model->save()){
                        return $this->redirect(['view', 'id' => $model->roditelj_id]);
                    }
                } else if($rola == 8) {
                    $model->roditelj_id = $roditelj_id->id_roditelj;
                    $model->ucitelj_id = $ucenik_odeljenje[0]['ucitelj_id'];
                    $model->od_korisnika = $roditelj_id->id_roditelj;
                    $model->ka_korisniku = $model->ucitelj_id;
                    if($model->save()){
                        return $this->redirect(['view', 'id' => $model->ucitelj_id]);
                    }
                }
            }
            if($rola == 8){
                return $this->render('create', [
                    'model' => $model,
                    'ucenik_odeljenje' => $ucenik_odeljenje
                ]);
            } else if($rola == 4){
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }

    /**
     * Updates an existing Poruke model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionOdgovor($id)
    {
        if(Yii::$app->user->can('ucitelj') || Yii::$app->user->can('roditelj')){
            $rola = Yii::$app->user->identity->role;
            $model = new Poruke();
            $ucitelj_id = Ucitelj::find()->select('id_ucitelj')->where(['user_id' => Yii::$app->user->id ])->one();
            $roditelj_id = Roditelj::find()->select('id_roditelj')->where(['user_id' => Yii::$app->user->id ])->one();
            if ($model->load(Yii::$app->request->post())) {
                if($rola == 4){
                    $model->roditelj_id = $id;
                    $model->ucitelj_id = $ucitelj_id->id_ucitelj;
                    $model->od_korisnika = $ucitelj_id->id_ucitelj;
                    $model->ka_korisniku = $model->roditelj_id;
                    if($model->save()){
                        return $this->redirect(['view', 'id'=> $model->roditelj_id]);
                    }
                } else if($rola == 8){
                    $model->ucitelj_id = $id;
                    $model->roditelj_id = $roditelj_id->id_roditelj;
                    $model->od_korisnika = $roditelj_id->id_roditelj;
                    $model->ka_korisniku = $model->ucitelj_id;
                    if($model->save()){
                        return $this->redirect(['view', 'id'=> $model->ucitelj_id]);
                    }
                }
            }
            return $this->render('odgovor', [
                'model' => $model,
            ]);
        } else if(Yii::$app->user->isGuest){
            $this->redirect(['../site/login']);
        } else {
            throw new ForbiddenHttpException('Nemate pravo pristupa ovoj stranici');
        }
    }

    /**
     * Deletes an existing Poruke model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

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
