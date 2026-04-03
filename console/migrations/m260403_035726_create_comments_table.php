<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m260403_035726_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'video_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'content' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'parent_id' => $this->integer()->null(),
        ]);

        $this->addForeignKey(
            'fk-comments-video_id',
            '{{%comments}}',
            'video_id',
            '{{%videos}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-comments-user_id',
            '{{%comments}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-comments-parent_id',
            '{{%comments}}',
            'parent_id',
            '{{%comments}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comments}}');
    }
}
