<?php

use yii\db\Migration;

/**
 * Class m210726_014729_city
 */
class m210726_014729_city extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()->unique(),
            'province_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-city-province_id',
            'city',
            'province_id'
        );

        $this->addForeignKey(
            'fk-city-province_id',
            'city',
            'province_id',
            'province',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_014729_city cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_014729_city cannot be reverted.\n";

        return false;
    }
    */
}
