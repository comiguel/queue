<?php

namespace app\api\modules\v1\controllers;

use yii\rest\ActiveController;

class QueueController extends ActiveController
{
    public $modelClass = 'app\api\modules\v1\models\Job';

    public function actionArrayDummy() {
    	return [
    		1,2,3,4,5,6,7,8,9,0
    	];
    }
}

