<?php

use yii\db\Migration;

class m160404_075733_create_etymology_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%word_etymology}}', [
            'id' => $this->primaryKey(),
            'id_word' => $this->integer()->notNull(),
            'description' => $this->text(),
            'id_source' => $this->integer(),
            'source_addition' => $this->string(255),
        ]);

        $this->createIndex('id_source','{{%word_etymology}}','id_source');
        $this->createIndex('id_word','{{%word_etymology}}','id_word');
        $this->addForeignKey('etymology_word','{{%word_etymology}}','id_word',
            '{{%word}}','id','CASCADE');
        $this->addForeignKey('etymology_source','{{%word_etymology}}','id_source',
            '{{%literary_source}}','id','SET NULL');
    }

    public function down()
    {
        $this->dropTable('{{%word_etymology}}');
    }
}
