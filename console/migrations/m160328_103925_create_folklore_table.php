<?php

use yii\db\Migration;

class m160328_103925_create_folklore_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%folklore}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
        ]);
        $this->insert('{{%folklore}}',[
            'name' => 'Песня'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%folklore}}');
    }
}
