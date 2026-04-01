<?php
/** @var yii\data\ActiveDataProvider $dataProvider */

use yii\widgets\ListView;

?>
<?php echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_video_item',
    'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions'=> [
        'tag' => false
    ]
]) ?>