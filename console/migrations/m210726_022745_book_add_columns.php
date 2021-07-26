<?php

use yii\db\Migration;

/**
 * Class m210726_022745_book_add_columns
 */
class m210726_022745_book_add_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%book}}', 'title', $this->string(64)->notNull());
        $this->addColumn('{{%book}}', 'description', $this->text()->null());
        $this->addColumn('{{%book}}', 'category_id', $this->integer()->null());
        $this->addColumn('{{%book}}', 'book_language_id', $this->integer()->null());
        $this->addColumn('{{%book}}', 'barcode', $this->string(32)->null());
        $this->addColumn('{{%book}}', 'date_publish', $this->date()->null());
        $this->addColumn('{{%book}}', 'pages', $this->smallInteger()->null());
        $this->addColumn('{{%book}}', 'type_id', $this->integer()->null());
        $this->addColumn('{{%book}}', 'status_id', $this->integer()->null());
        $this->addColumn('{{%book}}', 'location', $this->string(512)->null());

        $this->createIndex(
            'idx-book-category_id',
            'book',
            'category_id'
        );

        $this->addForeignKey(
            'fk-book-category_id',
            'book',
            'category_id',
            'category',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-book-book_language_id',
            'book',
            'book_language_id'
        );

        $this->addForeignKey(
            'fk-book-book_language_id',
            'book',
            'book_language_id',
            'book_language',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-book-type_id',
            'book',
            'type_id'
        );

        $this->addForeignKey(
            'fk-book-type_id',
            'book',
            'type_id',
            'type',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-book-status_id',
            'book',
            'status_id'
        );

        $this->addForeignKey(
            'fk-book-status_id',
            'book',
            'status_id',
            'status',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_022745_book_add_columns cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_022745_book_add_columns cannot be reverted.\n";

        return false;
    }
    */
}
