<?php

    /** @var \common\models\Videos $model */

    use yii\helpers\Url;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col-sm-8">
        <div class="ratio ratio-16x9 mb-3">
            <video src="<?php echo $model->getVideoLink() ?>"
            poster="<?php echo $model->getThumbnailLink() ?>"controls></video>
        </div>
        <h6 class='mt-2'><?php echo $model->title ?></h6>
        <div  class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <?php echo $model->getViews()->count() ?> views . <?php echo \Yii::$app->formatter->asDate($model->created_at) ?>
            </div>
            <div>
                <?php Pjax::begin() ?>
                <?php echo $this->render('_like_dislike', [
                    'model' => $model
                ]) ?>
                <?php Pjax::end() ?>
            </div>
        </div>

    </div>
    <div class="col-sm-4 text-end">
        <a href="<?php echo Url::to(['/video/index']) ?>" class="btn btn-secondary">Back to list</a>
</div>