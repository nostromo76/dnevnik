<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Odeljenje */

$this->title = 'Ažuriraj Odeljenje';
$this->params['breadcrumbs'][] = ['label' => 'Odeljenje', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_odeljenje, 'url' => ['view', 'id' => $model->id_odeljenje]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="odeljenje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formu', [
        'model' => $model,
    ]) ?>

</div>
