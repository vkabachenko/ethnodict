<?php

use yii\db\Migration;

class m160324_080522_update_word_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%word}}','description','text');
    }

    public function down()
    {
        $this->dropColumn('{{%word}}','description');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
