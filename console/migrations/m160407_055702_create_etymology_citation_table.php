<?php

use yii\db\Migration;

class m160407_055702_create_etymology_citation_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%etymology_citation}}', [
            'id' => $this->primaryKey(),
            'id_etymology' => $this->integer()->notNull(),
            'fragment' => $this->text(),
            'id_region' => $this->integer()
        ]);

        $this->createIndex('id_region','{{%etymology_citation}}','id_region');
        $this->createIndex('id_etymology','{{%etymology_citation}}','id_etymology');
        $this->addForeignKey('citation_etymology','{{%etymology_citation}}','id_etymology',
            '{{%word_etymology}}','id','CASCADE');
        $this->addForeignKey('etymology_citation_region','{{%etymology_citation}}','id_region',
            '{{%region}}','id','SET NULL');
    }

    public function down()
    {
        $this->dropTable('{{%etymology_citation}}');
    }

}
