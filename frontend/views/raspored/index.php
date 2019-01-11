<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RasporedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rasporeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspored-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Raspored', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dan',
            'br_casa',
            'id_predmet',
            'id_odeljenje',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?> -->

    <table class="table table-striped table-bordered">
        <tr>
            <th>Br Casa</th>
            <th>Ponedeljak</th>
            <th>Utorak</th>
            <th>Sreda</th>
            <th>Cetvrtak</th>
            <th>Petak</th>
        </tr>
        <tr>
        <?php
            foreach ($raspored as $item){ ?>
                <tr>
                    <td><?= $item->br_casa ?></td>
                    <td><?= $item->predmet->naziv ?></td>
                </tr>
            <?php }  ?>
        </tr>
    </table>

</div>
