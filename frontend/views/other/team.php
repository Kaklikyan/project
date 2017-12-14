<?php
/**
 * Created by PhpStorm.
 * User: FS05
 * Date: 14/12/17
 * Time: 12:05
 */

use frontend\widgets\TeamWidget;

echo TeamWidget::widget([
        'team_data' => $team_data,
        'team_players' => $team_players,
        'closest_challenge' => $closest_challenge,
        'few_matches_data' => $few_matches_data,
        'last_match_data' => $last_match_data
    ]);