<?php

use yii\db\Migration;

/**
 * Class m210726_013333_owner_type
 */
class m210726_013333_owner_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%owner_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_013333_owner_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_013333_owner_type cannot be reverted.\n";

        return false;
    }
    */
}