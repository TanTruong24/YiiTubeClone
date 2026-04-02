<?php
/** @var \common\models\User $user */

use common\helpers\Html;

/** @var \common\models\User $channel */


?>

<p>Hello <?php echo $channel->username ?></p>
<p>User <?php echo Html::channelLink($user, true) ?> has subscribed to your channel.</p>

<p>YiiTube</p>
