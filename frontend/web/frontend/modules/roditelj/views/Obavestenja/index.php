<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\roditelj\models\ObavestenjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obavestenjas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obavestenja-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Obavestenja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->id_obavestenja), ['view', 'id' => $model->id_obavestenja]);
        },
    ]) ?>
    <?php Pjax::end(); ?>
</div>
