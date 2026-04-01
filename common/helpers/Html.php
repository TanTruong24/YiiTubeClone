<?php

namespace common\helpers;

use yii\helpers\Html as HelpersHtml;

class Html {
    public static function channelLink($user)
    {
        return HelpersHtml::a($user->username, [
                    '/channel/view', 'username' => $user->username
                ], ['class' => 'text-dark channel-link']);
    }
}