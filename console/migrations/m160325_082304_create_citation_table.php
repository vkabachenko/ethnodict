<?php

use yii\db\Migration;

class m160325_082304_create_citation_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%word_citation}}', [
            'id' => $this->primaryKey(),
            'id_word' => $this->integer()->notNull(),
            'fragment' => $this->text(),
            'id_region' => $this->integer()
        ]);

        $this->createIndex('id_region','{{%word_citation}}','id_region');
        $this->createIndex('id_word','{{%word_citation}}','id_word');
        $this->addForeignKey('citation_word','{{%word_citation}}','id_word',
            '{{%word}}','id','CASCADE');
        $this->addForeignKey('citation_region','{{%word_citation}}','id_region',
            '{{%region}}','id','SET NULL');
    }

    public function down()
    {
        $this->dropTable('{{%word_citation}}');
    }
}
