<?php

use yii\db\Migration;

class m260401_035956_alter_video_like_add_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = $this->db->schema->getTableSchema('{{%video_like}}', true);

        if ($table !== null && $table->getColumn('type') === null) {
            $this->addColumn('{{%video_like}}', 'type', $this->tinyInteger(1)->notNull()->defaultValue(1));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $table = $this->db->schema->getTableSchema('{{%video_like}}', true);

        if ($table !== null && $table->getColumn('type') !== null) {
            $this->dropColumn('{{%video_like}}', 'type');
        }

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260401_035956_alter_video_like_add_type cannot be reverted.\n";

        return false;
    }
    */
}
