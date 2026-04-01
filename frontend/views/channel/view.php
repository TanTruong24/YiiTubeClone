<?php

    /** @var yii\web\View $this */
    /** @var common\models\User $channel */
    /** @var yii\data\ActiveDataProvider $dataProvider */

    use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

    $this->title = $channel->username;
    $initial     = strtoupper(substr($channel->username, 0, 1));
?>

<div class="position-relative mb-4 rounded-3 overflow-hidden border">
	<div
		class="w-100"
		style="height: 190px; background: linear-gradient(120deg, #f8f9fa 0%, #e9ecef 40%, #dee2e6 100%);"
	></div>

	<div class="px-4 pb-4" style="margin-top: -52px;">
		<div class="d-flex flex-column flex-md-row align-items-md-end gap-3">
			<div
				class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
				style="width: 104px; height: 104px; font-size: 2rem; background: #212529; border: 4px solid #fff;"
			>
				<?php echo Html::encode($initial) ?>
			</div>

			<div class="flex-grow-1">
				<h1 class="h3 mb-1"><?php echo Html::encode($channel->username) ?></h1>
				<p class="text-secondary mb-0">
					@<?php echo Html::encode($channel->username) ?> ·
					Tạo từ <?php echo Yii::$app->formatter->asDate($channel->created_at, 'php:m/Y') ?>
				</p>
			</div>

           <?php Pjax::begin()?>
			<div class="d-flex gap-2">
                <?php echo $this->render('_subscribe', [
                    'channel' => $channel,
                ]) ?>
			</div>
            <?php Pjax::end()?>
		</div>
	</div>
</div>
<?php echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '@frontend/views/video/_video_item',
    'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions'=> [
        'tag' => false
    ]
]) ?>

