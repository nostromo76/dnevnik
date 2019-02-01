<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Ocena */

$this->title = 'Ažuriraj Ocenu ' . $model->vrednost_ocena;
$this->params['breadcrumbs'][] = ['label' => 'Ocene', 'url' => ['/ucitelj/ucitelj']];
?>
<div class="ocena-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vrednost_ocena')->textInput() ?>

    <?= $form->field($model, 'zakljucena_ocena')->dropDownList([1=>1,2=>2,3=>3,4=>4,5=>5],['prompt'=>'Izaberi ocenu']) ?>


    <div class="form-group">
        <?= Html::submitButton('Sačuvaj', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
