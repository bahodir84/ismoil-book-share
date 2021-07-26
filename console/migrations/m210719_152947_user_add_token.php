<?php

use yii\db\Migration;

/**
 * Class m210719_152947_user_add_token
 */
class m210719_152947_user_add_token extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'token', $this->string(128)->defaultValue(null));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'token');
    }
}
