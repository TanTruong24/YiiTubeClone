<?php

namespace frontend\controllers;

use common\jobs\SendMailJob;
use common\models\Subscriber;
use common\models\User;
use common\models\Videos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ChannelController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['subscribe'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionView($username)
    {
        $channel = $this->findChannel($username);

        $dataProvider = new ActiveDataProvider(
            [
                'query' => Videos::find()->creator($channel->id)->published()
            ]
        );

        return $this->render('view', [
            'channel' => $channel,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findChannel($username)
    {
        $channel = User::findByUsername($username);
        if (!$channel) {
            throw new NotFoundHttpException('Channel not found');
        }
        return $channel;
    }

    public function actionSubscribe($username)
    {
        $channel = $this->findChannel($username);

        $subscriber = $channel->isSubscribed(\Yii::$app->user->id);
        if (!$subscriber) {
            $subscriber = new Subscriber();
            $subscriber->user_id = \Yii::$app->user->id;
            $subscriber->channel_id = $channel->id;
            $subscriber->created_at = time();
            if ($subscriber->save()) {
                $jobId = \Yii::$app->queue->push(new SendMailJob([
                    'userId' => \Yii::$app->user->id,
                    'channelId' => $channel->id,
                ]));
                \Yii::info(
                    "Queued SendMailJob #{$jobId} for userId=" . \Yii::$app->user->id . " channelId={$channel->id}",
                    __METHOD__
                );
            }
        } else {
            $subscriber->delete();

        }

        return $this->renderAjax('_subscribe', [
            'channel' => $channel,
        ]);
        


    }
}