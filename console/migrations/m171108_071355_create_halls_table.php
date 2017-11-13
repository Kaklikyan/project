<?php

use yii\db\Migration;

/**
 * Handles the creation of table `halls`.
 */
class m171108_071355_create_halls_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('halls', [
            'id' => $this->primaryKey(),
            'level' => $this->integer()->null(),
            'on_map' => $this->string()->null(),
            'gate_width' => $this->string()->null(),
            'gate_height' => $this->string()->null(),
            'address' => $this->string()->null(),
            'length' => $this->string()->null(),
            'width' => $this->string()->null(),
            'total_matches' => $this->string()->null(),
            'description' => $this->string()->null()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('halls');
    }
}
