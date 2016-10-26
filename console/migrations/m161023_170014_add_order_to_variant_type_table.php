<?php

use yii\db\Migration;

class m161023_170014_add_order_to_variant_type_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%variant_type}}','order', 'integer not null');
        $this->update('{{%variant_type}}',['order' => 1],['id' => 1]);
        $this->update('{{%variant_type}}',['order' => 2],['id' => 4]);
        $this->update('{{%variant_type}}',['order' => 3],['id' => 2]);
        $this->update('{{%variant_type}}',['order' => 4],['id' => 3]);
        $this->update('{{%variant_type}}',['order' => 5],['id' => 5]);
    }

    public function down()
    {
        $this->dropColumn('{{%variant_type}}','order');
    }
}
