<?php

use yii\db\Migration;

class m160603_170049_create_category_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(80)->notNull()
        ]);

        $this->insert('{{%category}}',[
            'name' => 'Постройки. Традиционное жилище'
        ]);
        $this->insert('{{%category}}',[
            'name' => 'Прядение. Ткачество. Домотканое полотно'
        ]);
        $this->insert('{{%category}}',[
            'name' => 'Традиционная одежда, обувь'
        ]);
        $this->insert('{{%category}}',[
            'name' => 'Традиционная пища'
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
