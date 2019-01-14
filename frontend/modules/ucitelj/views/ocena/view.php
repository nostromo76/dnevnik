<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Ocena */

//$this->title = $model->id_ocena;
$this->params['breadcrumbs'][] = ['label' => 'Nazad', 'url' => ['ucitelj/view', 'id' => $model->id_ucenik,'ime' => $model->ucenik->username]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocena-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_ocena], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_ocena], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_ocena',
            'vrednost_ocena',
            'zakljucena_ocena',
            'id_ucenik',
            'id_predmet',
        ],
    ]) ?>

</div>
