<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ucenik */

$this->title = 'Create Ucenik';
$this->params['breadcrumbs'][] = ['label' => 'Ucenik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucenik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
