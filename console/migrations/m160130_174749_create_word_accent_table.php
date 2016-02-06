<?php

use yii\db\Schema;
use yii\db\Migration;

class m160130_174749_create_word_accent_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%word_accent}}', [
            'id' => $this->primaryKey(),
            'id_word' => $this->integer()->notNull(),
            'accent_position' => $this->integer()->notNull(),
        ]);
        $this->createIndex('id_word','{{%word_accent}}','id_word');
        $this->createIndex('id_word_position','{{%word_accent}}',
            ['id_word','accent_position'],true);
        $this->addForeignKey('word_accent_word','{{%word_accent}}','id_word',
            '{{%word}}','id','CASCADE');

    }

    public function down()
    {
        $this->dropTable('{{%word_accent}}');

    }

}
