<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\roditelj\models\OtvorenaVrata */

$this->title = 'Zakaži Otvorena Vrata';
//$this->params['breadcrumbs'][] = ['label' => 'Otvorena Vratas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="otvorena-vrata-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
