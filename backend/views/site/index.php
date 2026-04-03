<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

/** @var common\models\Videos $latestVideo */
/** @var int $numberOfView */
/** @var int $numberOfSubscribers */
/** @var common\models\Subscriber[] $subscribers */

$this->title = 'My Yii Application';
?>
<div class="site-index d-flex">
    <div class="card m-2" style="width: 14rem;">
        <?php if ($latestVideo): ?>
        <div class="ratio ratio-16x9 mb-3">
            <video src="<?php echo $latestVideo->getVideoLink() ?>"
            poster="<?php echo $latestVideo->getThumbnailLink() ?>"></video>
        </div>
        <div class="card-body">
            <h6 class="card-title"><?php echo $latestVideo->title ?></h6>
            <p class="card-text">
                Likes: <?php echo $latestVideo->getLikes()->count() ?> <br>
                Views: <?php echo $latestVideo->getViews()->count() ?>
            </p>
            <a href="<?php echo Url::to(['video/update', 'id' => $latestVideo->id]) ?>" class="btn btn-primary">
                Edit
            </a>
        </div>
        <?php else: ?>
            <div class="card-body">
                <h6 class="card-title
                ">You haven't uploaded any video yet</h6>
            </div>
        <?php endif; ?>
    </div>
    <div class="card m-2" style="width: 14rem;">
        <div class="card-body">
            <h6 class="card-title">Total Views</h6>
            <p class="card-text" style="font-size: 48px;">
                <?php echo $numberOfView ?>
            </p>
        </div>
    </div>
    <div class="card m-2" style="width: 14rem;">
        <div class="card-body">
            <h6 class="card-title">Total Subscribers</h6>
            <p class="card-text" style="font-size: 48px;">
                <?php echo $numberOfSubscribers ?>
            </p>
        </div>
    </div>
    <div class="card m-2" style="width: 14rem;">
        <div class="card-body">
            <h6 class="card-title">Latest Subscribers</h6>
            <?php foreach($subscribers as $subscriber): ?>
                <div>
                    <?php echo $subscriber->user->username ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
