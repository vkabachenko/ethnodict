<?php

use yii\db\Migration;

class m160603_171925_update_literary_source_table extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%literary_source}}', 'long_link', 'text not null');

    }

    public function down()
    {
        $this->alterColumn('{{%literary_source}}', 'long_link', 'string(255) not null');
    }

}
