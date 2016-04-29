<?php

use yii\db\Migration;

class m160427_052515_create_parent_word_table extends Migration
{
    public function up()
    {
        $this->dropTable('{{%word_file}}'); // drop previous table

        $this->createTable('{{%parent_file}}', [
            'id' => $this->primaryKey(),
            'id_parent' => $this->integer()->notNull(),
            'id_file' => $this->integer()->notNull(),
            'parent_namespace' => $this->string(255)->notNull(),
        ]);

        $this->createIndex('id_file','{{%parent_file}}','id_file');

        $this->addForeignKey('parent_file_file','{{%parent_file}}','id_file',
            '{{%file}}','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%parent_file}}');
    }
}
