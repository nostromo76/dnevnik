<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObavestenjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obavestenja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obavestenja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin() ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Obavestenja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_obavestenja',
            'naziv',
            'opis:ntext',
            [
                    'attribute' => 'id_odeljenje',
                    'value' => 'odeljenje.naziv'
            ]
            ,
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end() ?>
</div>
