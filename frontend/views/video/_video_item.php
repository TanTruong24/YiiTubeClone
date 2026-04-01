<?php

/** @var \common\models\Videos $model */

use common\helpers\Html;
use yii\helpers\Url;

?>

<div class="card m-3" style="width: 14rem;">
    <a href="<?php echo Url::to(['/video/view', 'id' => $model->id]) ?>">
        <div class="ratio ratio-16x9 mb-3">
            <video src="<?php echo $model->getVideoLink() ?>"
            poster="<?php echo $model->getThumbnailLink() ?>"></video>
        </div>
    </a>
  <div class="card-body p-1">
    <h6 class="card-title m-0"><?php echo $model->title ?></h6>
    <p class="text-muted card-text m-0">
        <?php echo Html::channelLink($model->createdBy) ?>
    </p>
    <p class="text-muted card-text m-0">
        <?php echo $model->getViews()->count() ?> views . <?php echo \Yii::$app->formatter->asRelativeTime($model->created_at) ?>
    </p>
  </div>
</div>