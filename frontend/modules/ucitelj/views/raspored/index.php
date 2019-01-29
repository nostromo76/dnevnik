<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RasporedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Raspored';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspored-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if(empty($prvi)||empty($drugi)||empty($treci)||empty($cetv)||empty($peti)||empty($sest)){
            echo '<h4>Trenutno nema rasporeda za vaše odeljenje</h4>';
        } else { ?>

        <table class="table table-striped table-bordered">
            <tr>
                <th>Br Casa</th>
                <th>Ponedeljak</th>
                <th>Utorak</th>
                <th>Sreda</th>
                <th>Cetvrtak</th>
                <th>Petak</th>
            </tr>
            <tr>
                <td>1</td>
                <?php foreach ($prvi as $prv){
                    echo '<td>'.$prv->predmet->naziv.'</td>';
                }
                ?>
            </tr>
            <tr>
                <td>2</td>
                <?php foreach ($drugi as $dru){
                    echo '<td>'.$dru->predmet->naziv.'</td>';
                }
                ?>
            </tr>
            <tr>
                <td>3</td>
                <?php foreach ($treci as $tre){
                    echo '<td>'.$tre->predmet->naziv.'</td>';
                }
                ?>
            </tr>
            <tr>
                <td>4</td>
                <?php foreach ($cetv as $cet){
                    echo '<td>'.$cet->predmet->naziv.'</td>';
                }
                ?>
            </tr>
            <tr>
                <td>5</td>
                <?php foreach ($peti as $pet){
                    echo '<td>'.$pet->predmet->naziv.'</td>';
                }
                ?>
            </tr>
            <tr>
                <td>6</td>
                <?php foreach ($sesti as $sest){
                    echo '<td>'.$sest->predmet->naziv.'</td>';
                }
                ?>
            </tr>
        </table>

    <?php } ?>

</div>
