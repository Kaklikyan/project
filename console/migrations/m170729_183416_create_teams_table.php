<?php

use yii\db\Migration;

/**
 * Handles the creation of table `teams`.
 */
class m170729_183416_create_teams_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('teams',
            [
                'id' => $this->primaryKey(),
                'creator' => $this->integer(),
                'title' => $this->string(),
                'logo' => $this->string(),
                'challenge' => $this->integer()
            ]);

        $this->addForeignKey('getPlayer', 'teams', 'id', 'team_players', 'team_id', 'CASCADE', 'CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('teams');
    }
}
