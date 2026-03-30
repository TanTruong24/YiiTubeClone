<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$this->beginContent('@backend/views/layouts/base.php');
?>
<main class="d-flex">
    <div class="content-wrapper p-3">
        <?php echo Alert::widget() ?>
        <?php echo $content ?>
    </div>
</main>

<?php $this->endContent(); ?>