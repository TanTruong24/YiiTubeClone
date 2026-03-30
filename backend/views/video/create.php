<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Videos $model */

$this->title = 'Create Videos';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="video-upload-center">
        <div class="d-flex flex-column align-items-center justify-content-center text-center video-upload-box">
            <div class="upload-icon">
                <i class="fas fa-upload"></i>
            </div>
            <p>Drag and drop your video file to upload it.</p>
            <p class="text-muted">Your videos will be private until you publish them.</p>

            <div class="d-flex align-items-center gap-2 flex-wrap">
                <label class="btn btn-primary btn-file mb-0">
                    Select files to upload
                    <input type="file" id="videoFile" name="video" accept="video/*">
                </label>
                <span id="videoFileName" class="text-muted">No file selected</span>
            </div>
        </div>
    </div>

</div>

<?php
$this->registerJs(<<<JS
document.getElementById('videoFile')?.addEventListener('change', function (event) {
    var fileName = event.target.files && event.target.files.length ? event.target.files[0].name : 'No file selected';
    var target = document.getElementById('videoFileName');
    if (target) {
        target.textContent = fileName;
    }
});
JS);
?>
