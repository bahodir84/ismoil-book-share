<?php

use yii\db\Migration;

/**
 * Class m210719_102544_book
 */
class m210719_102544_book extends Migration
{


    public function up()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'author' => $this->string(64)->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%book}}');
    }

}
