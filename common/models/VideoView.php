<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video_view}}".
 *
 * @property int $id
 * @property int $video_id
 * @property int $user_id
 *
 * @property User $user
 * @property Videos $video
 */
class VideoView extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video_view}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id', 'user_id'], 'required'],
            [['video_id', 'user_id'], 'integer'],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Videos::class, 'targetAttribute' => ['video_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Video]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\VideosQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Videos::class, ['id' => 'video_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\VideoViewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VideoViewQuery(get_called_class());
    }

}
