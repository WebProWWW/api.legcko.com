<?php
namespace app\assets;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\AssetBundle;
use Yii;

class AdminAsset extends AssetBundle
{
    public function init()
    {
        parent::init();
        $manifest = Yii::getAlias('@webroot') . '/dist/manifest.json';
        if (file_exists($manifest)) {
            $manifest = Json::decode(file_get_contents($manifest));
            $this->js = [
                ArrayHelper::getValue($manifest, 'admin.js'),
            ];
            $this->css = [
                ArrayHelper::getValue($manifest, 'admin.css'),
            ];
        }
    }
}