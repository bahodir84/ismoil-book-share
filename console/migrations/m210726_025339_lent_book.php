<?php

use yii\db\Migration;

/**
 * Class m210726_025339_lent_book
 */
class m210726_025339_lent_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lent_book}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-lent_book-user_id',
            'lent_book',
            'user_id'
        );

        $this->addForeignKey(
            'fk-lent_book-user_id',
            'lent_book',
            'user_id',
            'user',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-lent_book-book_id',
            'lent_book',
            'book_id'
        );

        $this->addForeignKey(
            'fk-lent_book-book_id',
            'lent_book',
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
        echo "m210726_025339_lent_book cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_025339_lent_book cannot be reverted.\n";

        return false;
    }
    */
}
