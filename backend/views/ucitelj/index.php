<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UciteljSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ucitelj';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucitelj-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ucitelj', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ucitelj',
            [
                'attribute'=>'user_id',
                'value'=>'user.username',
            ],
            //'user_id',
            //'user.first_name','user.last_name',
            [
                'attribute'=>'id_odeljenje',
                'value'=>'odeljenje.naziv',
            ],
            //'id_odeljenje',
            //'odeljenje.naziv',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
