<?php

namespace common\actions;

use Yii;
use common\models\File;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class DownloadAction extends Action
{
    public function run($id)
    {
        /* @var $model File */

        $model = File::findOne($id);
        $path = $model->getUploadedFilePath('upload_file');

        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path, $model->upload_file);
        }
        else {
            throw new NotFoundHttpException('The requested file does not exist.');
        }
    }
}