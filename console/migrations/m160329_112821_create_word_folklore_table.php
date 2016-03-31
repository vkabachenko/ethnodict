<?php

use yii\db\Migration;

class m160329_112821_create_word_folklore_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%word_folklore}}', [
            'id' => $this->primaryKey(),
            'id_word' => $this->integer()->notNull(),
            'fragment' => $this->text(),
            'id_region' => $this->integer(),
            'id_folklore' => $this->integer(),
        ]);

        $this->createIndex('id_region','{{%word_folklore}}','id_region');
        $this->createIndex('id_word','{{%word_folklore}}','id_word');
        $this->createIndex('id_folklore','{{%word_folklore}}','id_folklore');

        $this->addForeignKey('folklore_word','{{%word_folklore}}','id_word',
            '{{%word}}','id','CASCADE');
        $this->addForeignKey('folklore_region','{{%word_folklore}}','id_region',
            '{{%region}}','id','SET NULL');
        $this->addForeignKey('folklore_folklore','{{%word_folklore}}','id_folklore',
            '{{%folklore}}','id','SET NULL');
    }

    public function down()
    {
        $this->dropTable('{{%word_folklore}}');
    }
}
