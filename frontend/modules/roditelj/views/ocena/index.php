<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\roditelj\models\OcenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ocene';

//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocena-index">

    <h1><?= Html::encode($this->title)?> učenika</h1>
    <br>
    <br>
    <?php
        if(empty($model)){
            echo '<h4>Trenutno nema ni jedne ocene za Vaše dete!</h4>';
        } else { ?>
    <table class="table table-striped">
        <tr>
            <th>Predmet</th>
            <th>Status</th>
            <th>Trenutna ocena</th>
            <th>Zaključena ocena</th>
            <th>Učenik</th>
        </tr>
        <?php foreach($model as $ocena){?>
            <tr>
                <th><?= $ocena->predmet['naziv']?></th>
                <th><?= $ocena->predmet['status']?></th>
                <td><?= $ocena->vrednost_ocena?></td>
                <td><?= $ocena->zakljucena_ocena?></td>
                <td><?= $ocena->ucenik['username']?></td>
            </tr>
        <?php } ?>
    </table>

    <?php } ?>
</div>
