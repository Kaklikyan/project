<?php

use yii\db\Migration;

/**
 * Handles the creation of table `matches_info_statistic`.
 */
class m171031_093602_create_matches_info_statistic_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('matches_info_statistic', [
            'id' => $this->primaryKey(),
            'match_info_id' => $this->integer(),
            'first_side_scored' => $this->integer(),
            'first_side_passed' => $this->integer(),
            'second_side_scored' => $this->integer(),
            'second_side_passed' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('matches_info_statistic');
    }
}
