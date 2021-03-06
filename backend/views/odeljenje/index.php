<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OdeljenjeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Odeljenje';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odeljenje-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Kreiraj Novo Odeljenje', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_odeljenje',
            'naziv',
            [
                    'attribute' => 'ucitelj_id',
                    'value' => 'ucitelj.user.fullname'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
