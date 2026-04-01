<?php

use yii\db\Migration;

/**
 * Adds created_at column to {{%video_view}} table.
 */
class m260401_040000_alter_video_view_table_add_created_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = $this->db->schema->getTableSchema('{{%video_view}}', true);

        if ($table !== null && $table->getColumn('created_at') === null) {
            $this->addColumn('{{%video_view}}', 'created_at', $this->integer()->notNull()->defaultValue(0));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $table = $this->db->schema->getTableSchema('{{%video_view}}', true);

        if ($table !== null && $table->getColumn('created_at') !== null) {
            $this->dropColumn('{{%video_view}}', 'created_at');
        }
    }
}
