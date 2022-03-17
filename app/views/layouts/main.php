<?php


use app\assets\SiteAsset;
use app\models\Page;

/* @var $this yii\web\View */
/* @var $content string */

SiteAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="date=no">
    <meta name="format-detection" content="address=no">
    <meta name="format-detection" content="email=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="yandex-verification" content="70fe3f682cbd4589">
    <title>API</title>
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<?= $content ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>