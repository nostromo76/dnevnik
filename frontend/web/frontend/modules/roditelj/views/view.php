<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\roditelj\models\OtvorenaVrata */

$this->title = $model->id_otvorena_vrata;
$this->params['breadcrumbs'][] = ['label' => 'Otvorena Vratas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="otvorena-vrata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_otvorena_vrata], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_otvorena_vrata], [
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
            'id_otvorena_vrata',
            'naslov',
            'otvorena_vrata:ntext',
            'vreme',
            'id_ucitelj',
            'id_roditelj',
        ],
    ]) ?>

</div>
