<?php

use yii\db\Migration;

class m160629_100707_rename_id_word_in_word_citation_table extends Migration
{
    public function up()
    {
        $this->dropForeignKey('citation_word','{{%word_citation}}');
        $this->dropIndex('id_word','{{%word_citation}}');
        $this->renameColumn('{{%word_citation}}','id_word','id_parent');
        $this->createIndex('id_parent','{{%word_citation}}','id_parent');
        $this->addForeignKey('citation_parent','{{%word_citation}}','id_parent',
            '{{%word}}','id','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('citation_parent','{{%word_citation}}');
        $this->dropIndex('id_parent','{{%word_citation}}');
        $this->renameColumn('{{%word_citation}}','id_parent','id_word');
        $this->createIndex('id_word','{{%word_citation}}','id_word');
        $this->addForeignKey('citation_word','{{%word_citation}}','id_word',
            '{{%word}}','id','CASCADE');
    }


}
