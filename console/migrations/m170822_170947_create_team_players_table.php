<?php

use yii\db\Migration;

/**
 * Handles the creation of table `team_players`.
 */
class m170822_170947_create_team_players_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('team_players', [
            'id' => $this->primaryKey(),
            'team_id' => $this->integer(),
            'player_name' => $this->string(),
            'captain' => $this->integer(),
            'player_date' => $this->date(),
        ]);

        $this->addForeignKey('getTeam', 'team_players', 'team_id', 'teams', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('team_players');
    }
}
