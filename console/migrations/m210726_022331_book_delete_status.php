<?php

use yii\db\Migration;

/**
 * Class m210726_022331_book_delete_status
 */
class m210726_022331_book_delete_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('book','status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_022331_book_delete_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_022331_book_delete_status cannot be reverted.\n";

        return false;
    }
    */
}
