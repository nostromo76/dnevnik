<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\roditelj\models\OtvorenaVrata */

$this->title = 'Update Otvorena Vrata: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Otvorena Vratas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_otvorena_vrata, 'url' => ['view', 'id' => $model->id_otvorena_vrata]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="otvorena-vrata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
