<?php

use yii\db\Migration;

/**
 * Handles the creation of table `challenge_team_statistic`.
 */
class m171117_140126_create_challenge_team_statistic_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('challenge_team_statistic', [
            'id' => $this->primaryKey(),
            'challenge_id' => $this->integer(),
            'who' => $this->string(),
            'whom' => $this->string(),
            'decision' => $this->string(),
            'decision_date' => $this->timestamp()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('challenge_team_statistic');
    }
}
