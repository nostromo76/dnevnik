<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Raspored */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Raspored', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspored-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ažuriraj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Obriši', ['delete', 'id' => $model->id], [
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
            'id',
            'dan',
            'br_casa',
            'id_predmet',
            'id_odeljenje',
        ],
    ]) ?>

</div>
