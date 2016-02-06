<?php

use yii\db\Schema;
use yii\db\Migration;

class m160130_172105_create_word_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%word}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(40)->notNull(),
            ]);
    }

    public function down()
    {
        $this->dropTable('{{%word}}');
    }

}
