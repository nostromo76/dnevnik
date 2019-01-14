<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\ucitelj\models\OcenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ocenas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocena-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ocena', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ocena',
            'vrednost_ocena',
            'zakljucena_ocena',
            'id_ucenik',
            'id_predmet',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
