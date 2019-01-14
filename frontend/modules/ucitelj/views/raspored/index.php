<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RasporedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rasporeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspored-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <!-- <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dan',
            'br_casa',
            'id_predmet',
            'id_odeljenje',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?> -->

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

</div>
