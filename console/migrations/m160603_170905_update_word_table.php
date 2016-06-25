<?php

use yii\db\Migration;

class m160603_170905_update_word_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%word}}','id_category', 'integer');
        $this->createIndex('id_category','{{%word}}','id_category');
        $this->addForeignKey('word_category','{{%word}}','id_category',
            '{{%category}}','id','SET NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%word}}','id_category');
    }


}
