<?php

    use yii\helpers\Url;

?>
<a href="<?php echo Url::to(['/video/like', 'id' => $model->id]) ?>"
class="btn btn-sm <?php echo $model->isLikeBy(\Yii::$app->user->id) ? 'btn-outline-primary' : 'btn-outline-secondary' ?>"
data-method="post" data-pjax="1">
    <i class="fa-solid fa-thumbs-up"></i> <?php echo $model->getLikes()->count() ?>
</a>
<a href="<?php echo Url::to(['/video/dislike', 'id' => $model->id]) ?>"
class="btn btn-sm <?php echo $model->isDislikeBy(\Yii::$app->user->id) ? 'btn-outline-primary' : 'btn-outline-secondary' ?>"
data-method="post" data-pjax="1">
    <i class="fa-solid fa-thumbs-down"></i> <?php echo $model->getDislikes()->count() ?>
</a>