<?php

use yii\db\Migration;

class m160702_113603_rename_id_etymology_in_etymology_citation extends Migration
{
    public function up()
    {
        $this->dropForeignKey('citation_etymology','{{%etymology_citation}}');
        $this->dropIndex('id_etymology','{{%etymology_citation}}');
        $this->renameColumn('{{%etymology_citation}}','id_etymology','id_parent');
        $this->createIndex('id_parent','{{%etymology_citation}}','id_parent');
        $this->addForeignKey('citation_etymology','{{%etymology_citation}}','id_parent',
            '{{%word_etymology}}','id','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('citation_etymology','{{%etymology_citation}}');
        $this->dropIndex('id_parent','{{%etymology_citation}}');
        $this->renameColumn('{{%etymology_citation}}','id_parent','id_etymology');
        $this->createIndex('id_etymology','{{%etymology_citation}}','id_etymology');
        $this->addForeignKey('citation_etymology','{{%etymology_citation}}','id_etymology',
            '{{%word_etymology}}','id','CASCADE');
    }

}
