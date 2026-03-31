<?php

use backend\assets\TagsInputAsset;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

    /** @var yii\web\View $this */
    /** @var common\models\Videos $model */
    /** @var yii\bootstrap5\ActiveForm $form */

    TagsInputAsset::register($this);
?>

<div class="videos-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-8">
            <?php echo $form->errorSummary($model) ?>

            <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <label for=""><?php echo $model->getAttributeLabel('thumbnail') ?></label>
                <div class="input-group mb-3">
                    <div>
                        <input type="file" class="form-control" id="thumbnail" 
                        name="thumbnail">
                        <img src="<?php echo $model->getThumbnailLink() ?>" class="img-thumbnail" style="max-width: 50%; height: auto;" alt="...">
                    </div>

                    <label class="input-group-text" for="thumbnail">Upload</label>
                </div>
            </div>

            <?php echo $form->field($model, 'tags', [
                'inputOptions' => [
                    'data-role' => 'tagsinput',
                ],
            ])->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <div class="ratio ratio-16x9 mb-3">
                <video src="<?php echo $model->getVideoLink() ?>"
                poster="<?php echo $model->getThumbnailLink() ?>"
                controls></video>
            </div>
            <div class='mb-3'>
                <div class="text-muted">Video Name</div>
                <?php echo Html::encode($model->video_name) ?>
            </div>

            <?php echo $form->field($model, 'status')->dropDownList($model->getStatusLabel()) ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
