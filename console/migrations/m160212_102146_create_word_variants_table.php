<?php

use yii\db\Schema;
use yii\db\Migration;

class m160212_102146_create_word_variants_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%word_variant}}', [
            'id' => $this->primaryKey(),
            'id_word' => $this->integer()->notNull(),
            'id_variant' => $this->integer()->notNull(),
            'id_type' => $this->integer()->notNull(),
            'comment' => $this->string(80)
        ]);

        $this->createTable('{{%variant_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(80)->notNull()
        ]);

        $this->insert('{{%variant_type}}',[
            'name' => 'Варианты ударения'
        ]);
        $this->insert('{{%variant_type}}',[
            'name' => 'Словообразовательные параллели'
        ]);
        $this->insert('{{%variant_type}}',[
            'name' => 'Номинативные параллели'
        ]);
        $this->insert('{{%variant_type}}',[
            'name' => 'Фонетические варианты'
        ]);
        $this->insert('{{%variant_type}}',[
            'name' => 'Морфологические варианты'
        ]);

        $this->createIndex('id_word','{{%word_variant}}','id_word');
        $this->createIndex('id_variant','{{%word_variant}}','id_variant');
        $this->createIndex('id_type','{{%word_variant}}','id_type');
        $this->createIndex('id_word_variant','{{%word_variant}}',
            ['id_word','id_variant','id_type'],true);

        $this->addForeignKey('main_word_variant','{{%word_variant}}','id_word',
            '{{%word}}','id','CASCADE');
        $this->addForeignKey('other_word_variant','{{%word_variant}}','id_variant',
            '{{%word}}','id','CASCADE');
        $this->addForeignKey('type_word_variant','{{%word_variant}}','id_type',
            '{{%variant_type}}','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%word_variant}}');
        $this->dropTable('{{%variant_type}}');
    }

}
