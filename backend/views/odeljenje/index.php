<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OdeljenjeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Odeljenje';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odeljenje-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Odeljenje', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_odeljenje',
            'naziv',
            'id_ucitelj',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
