<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Ucitelj */

//$this->title = $model->id_ucitelj;
$this->params['breadcrumbs'][] = ['label' => 'Nazad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucitelj-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Ucenik <?= $ime ?></h2>
   <table class="table table-striped table-bordered">
       <tr>
           <th>Trenutna ocena</th>
           <th>Zakljucena ocena</th>
           <th>Predmet</th>
       </tr>
           <?php foreach ($ocene as $ocena) { ?>
                <tr>
                    <th><a href="<?=Url::to(['/ucitelj/ocena/update', 'id' => $ocena->id_ocena])?>"><?= $ocena->vrednost_ocena ?></a></th>
                <th><?= $ocena->zakljucena_ocena ?></th>
                <th><?= $ocena->predmet['naziv'] ?></th>
                </tr>
           <?php } ?>
   </table>

</div>
