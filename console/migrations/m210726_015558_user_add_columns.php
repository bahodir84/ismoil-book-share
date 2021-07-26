<?php

use yii\db\Migration;

/**
 * Class m210726_015558_user_add_columns
 */
class m210726_015558_user_add_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'firstname', $this->string(32)->null());
        $this->addColumn('{{%user}}', 'lastname', $this->string(32)->null());
        $this->addColumn('{{%user}}', 'phone', $this->string(20)->null());
        $this->addColumn('{{%user}}', 'contact_phone', $this->string(20)->null());
        $this->addColumn('{{%user}}', 'province_id', $this->integer()->null());
        $this->addColumn('{{%user}}', 'city_id', $this->integer()->null());
        $this->addColumn('{{%user}}', 'birthdate', $this->date()->null());
        $this->addColumn('{{%user}}', 'passport_sn', $this->string(9)->null());
        $this->addColumn('{{%user}}', 'gender', $this->string(6)->null());
        $this->addColumn('{{%user}}', 'owner_type_id', $this->integer()->null());
        $this->addColumn('{{%user}}', 'find_option_id', $this->integer()->null());

        $this->createIndex(
            'idx-user-province_id',
            'user',
            'province_id'
        );

        $this->addForeignKey(
            'fk-user-province_id',
            'user',
            'province_id',
            'province',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-user-city_id',
            'user',
            'city_id'
        );

        $this->addForeignKey(
            'fk-user-city_id',
            'user',
            'city_id',
            'city',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-user-owner_type_id',
            'user',
            'owner_type_id'
        );

        $this->addForeignKey(
            'fk-user-owner_type_id',
            'user',
            'owner_type_id',
            'owner_type',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-user-find_option_id',
            'user',
            'find_option_id'
        );

        $this->addForeignKey(
            'fk-user-find_option_id',
            'user',
            'find_option_id',
            'find_option',
            'id',
            'RESTRICT'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_015558_user_add_columns cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_015558_user_add_columns cannot be reverted.\n";

        return false;
    }
    */
}
