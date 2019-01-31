<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Roditelj */

$this->title = 'Kreiraj Roditelja';
$this->params['breadcrumbs'][] = ['label' => 'Roditelj', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roditelj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
