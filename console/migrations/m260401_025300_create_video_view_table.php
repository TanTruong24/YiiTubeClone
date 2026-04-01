<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%video_view}}`.
 */
class m260401_025300_create_video_view_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%video_view}}', [
            'id' => $this->primaryKey(),
            'video_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            '{{%fk-video_view-video_id}}',
            '{{%video_view}}',
            'video_id',
            '{{%videos}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-video_view-user_id}}',
            '{{%video_view}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%video_view}}');
    }
}
