<?php

use yii\db\Migration;

/**
 * Class m210726_024511_borrowed_book
 */
class m210726_024511_borrowed_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%borrowed_book}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'date_borrow' => $this->date()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'duration' => $this->smallInteger()->notNull(),
            'expired' => $this->boolean()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-borrowed_book-user_id',
            'borrowed_book',
            'user_id'
        );

        $this->addForeignKey(
            'fk-borrowed_book-user_id',
            'borrowed_book',
            'user_id',
            'user',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-borrowed_book-book_id',
            'borrowed_book',
            'book_id'
        );

        $this->addForeignKey(
            'fk-borrowed_book-book_id',
            'borrowed_book',
            'book_id',
            'book',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_024511_borrowed_book cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_024511_borrowed_book cannot be reverted.\n";

        return false;
    }
    */
}
