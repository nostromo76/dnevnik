<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Direktor */

$this->title = $model->id_direktor;
$this->params['breadcrumbs'][] = ['label' => 'Direktor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direktor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_direktor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_direktor], [
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
            'id_direktor',
            'prosek_odeljenje',
            'prosek_skola',
            'id_user',
        ],
    ]) ?>

</div>
