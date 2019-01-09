<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Odeljenje */

$this->title = 'Create Odeljenje';
$this->params['breadcrumbs'][] = ['label' => 'Odeljenjes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odeljenje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
