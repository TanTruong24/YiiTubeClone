<?php

    /** @var \yii\web\View $this */
    /** @var string $content */

    use frontend\assets\AppAsset;
    use yii\bootstrap5\Html;

    AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags()?>
    <title><?php echo Html::encode($this->title) ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet">
    <?php $this->head()?>
</head>
<body class="h-100">
<?php $this->beginBody()?>

<div class="wrap min-vh-100 d-flex flex-column">
    <?php echo $this->render('_header') ?>
    <?php echo $content ?>
</div>

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage();
