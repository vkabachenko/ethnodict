<?php

use yii\db\Migration;

class m160423_091825_create_word_file_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%word_file}}', [
            'id' => $this->primaryKey(),
            'id_word' => $this->integer()->notNull(),
            'id_file' => $this->integer()->notNull(),
        ]);

        $this->createIndex('id_word','{{%word_file}}','id_word');
        $this->createIndex('id_file','{{%word_file}}','id_file');

        $this->addForeignKey('word_file_word','{{%word_file}}','id_word',
            '{{%word}}','id','NO ACTION');
        $this->addForeignKey('word_file_file','{{%word_file}}','id_file',
            '{{%file}}','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%word_file}}');
    }
}
