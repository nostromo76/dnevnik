<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\ucitelj\models\UciteljSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ucitelj';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucitelj-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj Ocene', ['/ucitelj/ocena/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ucitelj',
            'user_id',
            'id_odeljenje',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
</div>
