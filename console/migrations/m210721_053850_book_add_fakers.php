<?php

use Faker\Factory;
use yii\db\Migration;

/**
 * Class m210721_053850_book_add_fakers
 */
class m210721_053850_book_add_fakers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Factory::create();

        for($i=1; $i<=15; $i++){
            $current = time()-rand(1,5000);
            $this->insert('book',[
                'author'=> $faker->name,
                'status' => rand(1, 5),
                'created_at' => $current,
                'updated_at' => $current
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210721_053850_book_add_fakers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210721_053850_book_add_fakers cannot be reverted.\n";

        return false;
    }
    */
}
