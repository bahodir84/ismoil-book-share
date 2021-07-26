<?php

use yii\db\Migration;

/**
 * Class m210726_030843_app_text
 */
class m210726_030843_app_text extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%app_text}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()->unique(),
            'app_language_id' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-app_text-app_language_id',
            'app_text',
            'app_language_id'
        );

        $this->addForeignKey(
            'fk-app_text-app_language_id',
            'app_text',
            'app_language_id',
            'app_language',
            'id',
            'CASCADE'
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_030843_app_text cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_030843_app_text cannot be reverted.\n";

        return false;
    }
    */
}
