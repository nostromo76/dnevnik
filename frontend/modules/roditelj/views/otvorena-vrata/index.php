<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\roditelj\models\OtvorenaVrataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Otvorena Vrata';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="otvorena-vrata-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Otvorena Vrata', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_otvorena_vrata',
            'naslov',
            'otvorena_vrata:ntext',
            'vreme',
            [
                'attribute' => 'id_ucitelj',
                'value' => 'ucitelj.user.username'
            ],
            //'id_ucitelj',
            [
                'attribute' => 'id_roditelj',
                'value' => 'roditelj.user.username'
            ],
            //'id_roditelj',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
