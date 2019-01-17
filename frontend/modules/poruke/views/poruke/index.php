<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\modules\poruke\models\Ucitelj;
use frontend\modules\poruke\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\poruke\models\PorukeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Porukes';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="poruke-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Poruke', ['create', 'id' => Yii::$app->user->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_poruke',
            'poruka:ntext',
            'vreme',
            [
                'attribute' => 'roditelj_id',
                'value' => 'roditelj.user.fullName'
            ],
            [
                'attribute' => 'ucitelj_id',
                'value' => 'ucitelj.user.fullName'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
