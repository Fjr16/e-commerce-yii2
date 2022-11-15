<?php

use yii\db\Migration;

/**
 * Class m220816_095224_add_level_to_user_table
 */
class m220816_095224_add_level_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{$user}}', 'level', $this->string(255)->notNull()->after('username'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('{{$user}}', 'level');

    }
}
