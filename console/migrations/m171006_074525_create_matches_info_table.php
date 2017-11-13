<?php

use yii\db\Migration;

/**
 * Handles the creation of table `matches_info`.
 */
class m171006_074525_create_matches_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('matches_info', [
            'id' => $this->primaryKey(),
            'first_side' => $this->integer(),
            'second_side' => $this->integer(),
            'match_score' => $this->string(),
            'match_winner' => $this->integer(),
            'match_date' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('matches_info');
    }
}
