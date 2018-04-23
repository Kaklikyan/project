<?php

use yii\db\Migration;

/**
 * Handles the creation of table `players_transfer`.
 */
class m171211_122116_create_players_transfer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('players_transfer', [
            'id' => $this->primaryKey(),
            'player_id' => $this->integer(),
            'invite_from' => $this->integer(),
            'request_to' => $this->integer(),
            'date' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('players_transfer');
    }
}
