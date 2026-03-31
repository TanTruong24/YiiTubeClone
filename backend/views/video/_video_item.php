<?php
/** @var common\models\Videos $model */

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<div class="d-flex">
  <div class="flex-shrink-0">
    <a href="<?php echo Url::to(['/video/update', 'id' => $model->id]) ?>">
        <div class="ratio ratio-16x9 mb-3 " style="width: 140px;">
            <video 
                src="<?php echo $model->getVideoLink() ?>"
                poster="<?php echo $model->getThumbnailLink() ?>">
            </video>
        </div>
    </a>

  </div>
  <div class="flex-grow-1 ms-3">
    <h6><?php echo $model->title ?></h6>
    <?php echo StringHelper::truncateWords($model->description != null ? $model->description: "", 10)   ?>
  </div>
</div>