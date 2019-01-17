<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\UciteljO */

$this->title = 'Create Ucitelj O';
//$this->params['breadcrumbs'][] = ['label' => 'Ucitelj Os', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucitelj-o-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
