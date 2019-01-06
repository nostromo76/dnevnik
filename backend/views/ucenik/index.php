<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UcenikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ucenik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucenik-index">

    <h1><?= Html::encode($this->title) ?></h1>
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
            'id_odeljenje',
            'id_roditelj',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
