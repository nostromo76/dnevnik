<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RasporedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Raspored';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspored-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Kreiraj Novi Raspored', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'dan',
            'br_casa',
            [
                    'attribute' => 'id_predmet',
                    'value' => 'predmet.naziv'
            ],
            //'id_predmet',
            [
                    'attribute' => 'id_odeljenje',
                    'value' => 'odeljenje.naziv'
            ],
            //'id_odeljenje',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
