<?php
namespace common\helpers;

use yii\helpers\Html as HelpersHtml;
use yii\helpers\Url;

class Html
{
    public static function channelLink($user, $schema=false)
    {
        // In console workers, absolute URLs may fail without web UrlManager config.
        if ($schema && \Yii::$app instanceof \yii\console\Application) {
            $frontendUrl = rtrim((string)(\Yii::$app->params['frontendUrl'] ?? ''), '/');
            if ($frontendUrl !== '') {
                $url = $frontendUrl . '/c/' . rawurlencode($user->username);
            } else {
                $url = '/c/' . rawurlencode($user->username);
            }
        } else {
            $url = Url::to([
                '/channel/view', 'username' => $user->username,
            ], $schema);
        }

        return HelpersHtml::a($user->username, $url, 
        ['class' => 'text-dark channel-link']);
    }
}
