<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UcenikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ucenik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucenik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ucenik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ucenik',
            'ime',
            'prezime',
            'username',
            [
                'attribute'=>'id_odeljenje',
                'value'=>'odeljenje.naziv',
            ],
            //'id_odeljenje',
            [
                'attribute'=>'id_roditelj',
                'value'=>'roditelj.user.username',
            ],
            //'id_roditelj',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
