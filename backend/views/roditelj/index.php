<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RoditeljSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roditelj';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roditelj-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Roditelj', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_roditelj',
            [
                'attribute'=>'id_ucenik',
                'value'=>'ucenik.username',
            ],
            //'id_ucenik',
            [
                'attribute'=>'user_id',
                'value'=>'user.username',
            ],
            //'user_id',
            'ucitelj_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
