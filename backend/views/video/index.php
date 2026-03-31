<?php

use common\models\Videos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Videos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' =>'title',
                'content' => function($model){
                    return $this->render('_video_item', ['model' => $model]);
                }
            ],
            [
                'attribute' =>'status',
                'content' => function($model) {
                    return $model->getStatusLabel()[$model->status];
                 }
            ],
            //'has_thumbnail',
            //'video_name',
            'created_at:datetime',
            'updated_at:datetime',
            //'created_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Videos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                'buttons' => [
                    'delete' => function($url) {
                        return Html::a('Delete', $url,[
                            'data-method' => 'post',
                            'data-confirm' => 'Are you sure you want to delete this item?'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
