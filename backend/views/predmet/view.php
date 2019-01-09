<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Predmet */

$this->title = $model->id_predmet;
$this->params['breadcrumbs'][] = ['label' => 'Predmets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="predmet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_predmet], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_predmet], [
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
            'id_predmet',
            'obavezni',
            'izborni',
        ],
    ]) ?>

</div>
