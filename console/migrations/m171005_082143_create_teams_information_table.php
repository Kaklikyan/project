<?php

use yii\db\Migration;

/**
 * Handles the creation of table `teams_information`.
 */
class m171005_082143_create_teams_information_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('teams_information', [
            'id' => $this->primaryKey(),
            'team_id' => $this->integer(),
            'games_count' => $this->integer(),
            'number_of_wins' => $this->integer(),
            'number_of_looses' => $this->integer(),
            'number_of_players' => $this->integer(),
            'last_game_link' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('teams_information');
    }
}
