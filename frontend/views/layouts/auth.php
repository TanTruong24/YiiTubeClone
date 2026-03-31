<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');
?>
<main class="d-flex">
    <div class="content-wrapper p-3">
        <?php echo Alert::widget() ?>
        <?php echo $content ?>
    </div>
</main>

<?php $this->endContent(); ?>