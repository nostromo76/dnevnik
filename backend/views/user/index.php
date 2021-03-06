<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Korisnici';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Kreiraj Novog Korisnika', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            if($model->role==1){
                return ['class'=>'info'];
            }elseif($model->role==2){
                return ['class'=>'warning'];
            }elseif($model->role==4){
                return ['class'=>'success'];
            }elseif($model->role==8){
                return ['class'=>'danger'];
            }else{
            }
        },
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'first_name',
            'last_name',
            'username',
            'role',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
