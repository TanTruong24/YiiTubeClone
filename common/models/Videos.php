<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%videos}}".
 *
 * @property int $id
 * @property string $video_id
 * @property string $title
 * @property string|null $description
 * @property string|null $tags
 * @property int|null $status
 * @property int|null $has_thumbnail
 * @property string|null $video_name
 * @property int $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 */
class Videos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%videos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'tags', 'status', 'video_name', 'updated_at', 'created_by'], 'default', 'value' => null],
            [['has_thumbnail'], 'default', 'value' => 0],
            [['video_id', 'title', 'created_at'], 'required'],
            [['description'], 'string'],
            [['status', 'has_thumbnail', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['video_id'], 'string', 'max' => 16],
            [['title', 'tags'], 'string', 'max' => 512],
            [['video_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
            'title' => 'Title',
            'description' => 'Description',
            'tags' => 'Tags',
            'status' => 'Status',
            'has_thumbnail' => 'Has Thumbnail',
            'video_name' => 'Video Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\VideosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VideosQuery(get_called_class());
    }

}
