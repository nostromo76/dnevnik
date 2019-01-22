<?php

namespace frontend\modules\direktor\controllers;

use yii\web\Controller;

/**
 * Default controller for the `direktor` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
