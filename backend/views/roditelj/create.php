<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Roditelj */

$this->title = 'Create Roditelj';
$this->params['breadcrumbs'][] = ['label' => 'Roditeljs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roditelj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
