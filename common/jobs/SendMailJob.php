<?php

namespace common\jobs;

use common\models\User;
use yii\base\BaseObject;
use yii\queue\JobInterface;

class SendMailJob extends BaseObject implements JobInterface
{
    public $userId;
    public $channelId;

    public function execute($queue)
    {
        \Yii::info(
            "Start SendMailJob for userId={$this->userId} channelId={$this->channelId}",
            __METHOD__
        );

        $user = User::findOne($this->userId);
        $channel = User::findOne($this->channelId);

        if (!$user || !$channel || empty($channel->email)) {
            \Yii::warning(
                "Skip SendMailJob due to missing data. userId={$this->userId} channelId={$this->channelId}",
                __METHOD__
            );
            return;
        }

        $sent = \Yii::$app->mailer->compose([
            'html' => 'subscriber-html',
            'text' => 'subscriber-text',
        ], [
            'user' => $user,
            'channel' => $channel,
        ])
            ->setFrom(\Yii::$app->params['senderEmail'])
            ->setTo($channel->email)
            ->setSubject('New subscriber for your channel')
            ->send();
        \Yii::info(
            "Finish SendMailJob sent=" . ($sent ? 'true' : 'false') . " userId={$this->userId} channelId={$this->channelId}",
            __METHOD__
        );
    }
}