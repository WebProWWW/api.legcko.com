<?php
namespace app\assets;

use yii\web\AssetBundle;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use Yii;

class SiteAsset extends AssetBundle
{

    public function init()
    {
        parent::init();
        $manifest = Yii::getAlias('@webroot') . '/dist/manifest.json';
        if (file_exists($manifest)) {
            $manifest = Json::decode(file_get_contents($manifest));
            $this->js = [
                ArrayHelper::getValue($manifest, 'site.js'),
            ];
            $this->css = [
                ArrayHelper::getValue($manifest, 'site.css'),
            ];
        }
    }

}