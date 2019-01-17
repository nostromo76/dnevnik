<?php

namespace frontend\modules\poruke\controllers;

use yii\web\Controller;
use frontend\modules\poruke\models\User;
use Yii;

class PorukeController extends Controller {
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionFetch(){
        if(Yii::$app->request->isAjax) {
            $user_id = Yii::$app->user->identity->getId();
            $model = User::findBySql('SELECT `*` FROM `user` WHERE `id` != ' . $user_id . ';')->all();
            $output = '
            <table class="table table-bordered table-striped">
             <tr>
              <td>Username</td>
              <td>Status</td>
              <td>Action</td>
             </tr>
        ';

            foreach ($model as $row) {
                $output .= '
                 <tr>
                  <td>' . $row->username . '</td>
                  <td></td>
                  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' . $row->id . '" data-tousername="' . $row->username . '">Start Chat</button></td>
                 </tr>
                 ';
            }

            $output .= '</table>';

            echo $output;
            }
        }
}