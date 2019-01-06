<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Direktor */

$this->title = 'Create Direktor';
$this->params['breadcrumbs'][] = ['label' => 'Direktor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direktor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
