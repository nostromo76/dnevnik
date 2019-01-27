<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Roditelj */

$this->title = $model->id_roditelj;
$this->params['breadcrumbs'][] = ['label' => 'Roditeljs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roditelj-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_roditelj], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_roditelj], [
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
            'id_roditelj',
            'id_ucenik',
            'user_id',
            'ucitelj_id',
        ],
    ]) ?>

</div>
