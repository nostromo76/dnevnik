<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;;
use frontend\modules\Roditelj\models\Roditelj;
use frontend\modules\Roditelj\models\Ucitelj;
use frontend\modules\Roditelj\models\OtvorenaVrata;

/* @var $this yii\web\View */
/* @var $model frontend\modules\roditelj\models\OtvorenaVrata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="otvorena-vrata-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'otvorena_vrata')->checkbox([true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
