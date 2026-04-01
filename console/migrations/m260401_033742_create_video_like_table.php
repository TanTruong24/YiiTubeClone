<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%video_like}}`.
 */
class m260401_033742_create_video_like_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%video_like}}', [
            'id' => $this->primaryKey(),
            'video_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'type' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-video_like-video_id',
            '{{%video_like}}',
            'video_id',
            '{{%videos}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-video_like-user_id',
            '{{%video_like}}',
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
        $this->dropTable('{{%video_like}}');
    }
}
