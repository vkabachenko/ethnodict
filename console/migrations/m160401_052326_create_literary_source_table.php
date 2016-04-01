<?php

use yii\db\Migration;

class m160401_052326_create_literary_source_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%literary_source}}', [
            'id' => $this->primaryKey(),
            'short_link' => $this->string(20)->notNull(),
            'long_link' => $this->string(255)->notNull(),
        ]);

        $this->createIndex('short_link','{{%literary_source}}','short_link',true);
    }

    public function down()
    {
        $this->dropTable('{{%literary_source}}');
    }
}
