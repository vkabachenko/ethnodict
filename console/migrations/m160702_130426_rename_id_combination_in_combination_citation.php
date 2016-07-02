<?php

use yii\db\Migration;

class m160702_130426_rename_id_combination_in_combination_citation extends Migration
{
    public function up()
    {
        $this->dropForeignKey('citation_combination','{{%combination_citation}}');
        $this->dropIndex('id_combination','{{%combination_citation}}');
        $this->renameColumn('{{%combination_citation}}','id_combination','id_parent');
        $this->createIndex('id_parent','{{%combination_citation}}','id_parent');
        $this->addForeignKey('citation_combination','{{%combination_citation}}','id_parent',
            '{{%word_combination}}','id','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('citation_combination','{{%combination_citation}}');
        $this->dropIndex('id_parent','{{%combination_citation}}');
        $this->renameColumn('{{%combination_citation}}','id_parent','id_combination');
        $this->createIndex('id_combination','{{%combination_citation}}','id_combination');
        $this->addForeignKey('citation_combination','{{%combination_citation}}','id_combination',
            '{{%word_combination}}','id','CASCADE');

    }

}
