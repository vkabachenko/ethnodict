<?php

use yii\db\Migration;

class m160411_051815_create_combination_citation_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%combination_citation}}', [
            'id' => $this->primaryKey(),
            'id_combination' => $this->integer()->notNull(),
            'fragment' => $this->text(),
            'id_region' => $this->integer()
        ]);

        $this->createIndex('id_region','{{%combination_citation}}','id_region');
        $this->createIndex('id_combination','{{%combination_citation}}','id_combination');
        $this->addForeignKey('citation_combination','{{%combination_citation}}','id_combination',
            '{{%word_combination}}','id','CASCADE');
        $this->addForeignKey('combination_citation_region','{{%combination_citation}}','id_region',
            '{{%region}}','id','SET NULL');
    }

    public function down()
    {
        $this->dropTable('{{%combination_citation}}');
    }
}
