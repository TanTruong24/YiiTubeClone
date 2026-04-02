<?php

use yii\db\Migration;

class m260402_034310_create_fulltext_index_on_video extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER TABLE {{%videos}} ADD FULLTEXT INDEX `idx_fulltext_title_description_tags` (title, description, tags)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m260402_034310_create_fulltext_index_on_video cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260402_034310_create_fulltext_index_on_video cannot be reverted.\n";

        return false;
    }
    */
}
