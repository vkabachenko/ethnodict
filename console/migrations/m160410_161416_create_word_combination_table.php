<?php

use yii\db\Migration;

class m160410_161416_create_word_combination_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%word_combination}}', [
            'id' => $this->primaryKey(),
            'id_word' => $this->integer()->notNull(),
            'combination' => $this->text()->notNull(),
            'explanation' => $this->text(),
        ]);

        $this->createIndex('id_word','{{%word_combination}}','id_word');
        $this->addForeignKey('combination_word','{{%word_combination}}','id_word',
            '{{%word}}','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%word_combination}}');
    }
}
