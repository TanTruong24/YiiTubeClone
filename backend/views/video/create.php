<?php

    use yii\bootstrap5\ActiveForm;
    use yii\helpers\Html;

    /** @var yii\web\View $this */
    /** @var common\models\Videos $model */

    $this->title                   = 'Create Videos';
    $this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <div class="video-upload-center">
        <div class="d-flex flex-column align-items-center justify-content-center text-center video-upload-box">

            <?php $form = ActiveForm::begin([
                    'options' => [
                        'enctype' => 'multipart/form-data',
                    ],
            ])?>
            <?php echo $form->errorSummary($model) ?>
            
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
            <div class="mt-3 d-none" id="uploadSubmitWrap">
                <button type="submit" class="btn btn-success" id="uploadSubmitBtn" disabled>Save and continue</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>

