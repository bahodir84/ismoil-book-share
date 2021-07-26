<?php

use yii\db\Migration;

/**
 * Class m210726_030115_bookmark
 */
class m210726_030115_bookmark extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bookmark}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'status' => $this->boolean()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-bookmark-user_id',
            'bookmark',
            'user_id'
        );

        $this->addForeignKey(
            'fk-bookmark-user_id',
            'bookmark',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-bookmark-book_id',
            'bookmark',
            'book_id'
        );

        $this->addForeignKey(
            'fk-bookmark-book_id',
            'bookmark',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_030115_bookmark cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_030115_bookmark cannot be reverted.\n";

        return false;
    }
    */
}
