<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Odgovor */

$this->title = 'Create Odgovor';
$this->params['breadcrumbs'][] = ['label' => 'Odgovors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odgovor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php print_r($model->id_roditelj); ?>
    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
