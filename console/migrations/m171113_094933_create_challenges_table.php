<?php

use yii\db\Migration;

/**
 * Handles the creation of table `challenges`.
 */
class m171113_094933_create_challenges_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('challenges', [
            'id' => $this->primaryKey(),
            'from' => $this->integer(),
            'to' => $this->integer(),
            'date' => $this->timestamp(),
            'duration' => $this->string(),
            'referee' => $this->integer(),
            'vest' => $this->integer(),
            'previous_match_id' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('challenges');
    }
}
