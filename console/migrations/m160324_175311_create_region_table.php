<?php

use yii\db\Migration;

class m160324_175311_create_region_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%region}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
        ]);
        $this->insert('{{%region}}',[
            'name' => 'Псковский'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%region}}');
    }
}
