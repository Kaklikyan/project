<?php

use yii\db\Migration;

/**
 * Handles adding team_id to table `teams_information`.
 */
class m171005_084600_add_team_id_column_to_teams_information_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('teams_information', 'team_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
