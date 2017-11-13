<?php

use yii\db\Migration;

/**
 * Handles the creation of table `players`.
 */
class m171031_124934_create_players_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('players', [
            'id' => $this->primaryKey(),
            'is_user' => $this->integer(),
            'in_team' => $this->integer(),
            'goals' => $this->integer(),
            'passes' => $this->integer(),
            'name' => $this->string(),
            'date' => $this->date(),
            'captain' => $this->integer(),
            'best_player_count' => $this->integer(),
            'photo' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('players');
    }
}
