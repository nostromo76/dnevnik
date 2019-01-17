<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\roditelj\models\OcenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Poruke';

//$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="table-responsive">
    <div id="user_details"></div>
</div>

<?php
$script = <<<JS
    $(document).ready(function(){

         fetch_user();
        
         function fetch_user()
         {
          $.ajax({
           url:"fetch",
           type:"POST",
           success:function(data){
            $('#user_details').html(data);
           }
          })
         }
         
        }); 
JS;
$this->registerJs($script);
?>
