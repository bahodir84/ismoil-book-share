<?php

use yii\db\Migration;

/**
 * Class m210726_025856_lent_book_add_column_status
 */
class m210726_025856_lent_book_add_column_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('lent_book','status', $this->boolean()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_025856_lent_book_add_column_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_025856_lent_book_add_column_status cannot be reverted.\n";

        return false;
    }
    */
}
