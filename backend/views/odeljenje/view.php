<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Odeljenje */

$this->title = $model->id_odeljenje;
$this->params['breadcrumbs'][] = ['label' => 'Odeljenje', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odeljenje-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_odeljenje], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_odeljenje], [
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
            'id_odeljenje',
            'naziv',
        ],
    ]) ?>

</div>
