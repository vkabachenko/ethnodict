<?php

use yii\db\Migration;

class m160423_081211_create_file_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'upload_file' => $this->string(255)->notNull(),
            'description' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%file}}');
    }
}
