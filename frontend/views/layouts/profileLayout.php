<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\sidenav\SideNav;
use yii\helpers\Url;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>

    <!-- Beautiful checkboxes -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<?php
NavBar::begin([
    'brandLabel' => 'Football',
    'brandUrl' => '/main/my-team',
    'innerContainerOptions' => ['class' => 'container-fluid'],
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top top-nav-bar',
    ],
]);
$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Contact', 'url' => ['/site/contact']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= Alert::widget() ?>

<div id="full-page-content">
    <div id="left-menu">
        <?php

        $item = Yii::$app->controller->id;
        $action = Yii::$app->controller->action->id;

        $user_team = \common\models\User::find()->select('in_team')->where(['id' => Yii::$app->user->id])->one();

        if($user_team->in_team == 1){
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'encodeLabels' => false,
                'containerOptions' => [
                        'class' => 'left-menu-nav',
                ],
                'items' => [
                    ['label' => 'News', 'icon' => 'home', 'url' => Url::to(['/main/index']),  'active' => ($item == '')],
                    ['label' => 'My team', 'icon' => 'dashboard', 'url' => Url::to(['/main/my-team']),  'active' => ($item == 'main')],
                    ['label' => 'Challenge', 'icon' => 'home', 'url' => Url::to(['/challenge/index']),  'active' => ($item == 'challenge')],
                    //['label' => 'Field', 'icon' => 'home', 'url' => '/fields/',  'active' => ($item == 'fields')],

                    ['label' => 'My profile', 'icon' => 'user','active' => ($item == 'news'), 'items' =>
                        [
                            ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/main/news'])]
                        ],
                    ],

                    ['label' => 'Other', 'icon' => 'other','active' => ($item == 'other'), 'items' =>
                        [
                            ['label' => 'Teams', 'icon' => 'team', 'active' => ($action == 'teams'), 'url' => Url::to(['/other/teams'])],
                            ['label' => 'Players', 'icon' => 'player', 'active' => ($action == 'players'), 'url' => Url::to(['/other/players'])],
                            ['label' => 'Fields', 'icon' => 'field', 'active' => ($action == 'fields'), 'url' => Url::to(['/other/fields'])]
                        ],
                    ],

                    ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/main/something']),  'active' => ($item == 'something')],
                    ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/main/something']), 'active' => ($item == 'something')],

                ],
            ]);
        }else{
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'encodeLabels' => false,
                'heading' => 'Main menu',
                'items' => [
                    ['label' => 'News', 'icon' => 'home', 'url' => Url::to(['/main/index']),  'active' => ($item == 'index')],
                    ['label' => 'Ստեխծել թիմ', 'icon' => 'home', 'url' => Url::to(['/main/create-team']),  'active' => ($item == 'create-team')],


                    ['label' => 'My profile', 'icon' => 'user','active' => ($item == 'news'), 'items' =>
                        [
                            ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/main/news'])]
                        ],
                    ],
                    ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/main/something']),  'active' => ($item == 'something')],
                    ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/main/something']), 'active' => ($item == 'something')],

                ],
            ]);
        }

        ?>
        <div class="left-menu-bottom">
            <ul>
                <li><a href=""><i class="fa fa-user" aria-hidden="true"></i>  Profile</a></li>
                <li><a href=""><i class="fa fa-cog" aria-hidden="true"></i>  Settings</a></li>
                <li></li>
            </ul>
        </div>
    </div>
    <div id="center-content">
        <div style="display: flex">
            <div class="my-team-content clearfix" style="flex: 1">
                <?= $content ?>
            </div>
            <div id="additional-widget">
                <?= 'asdasd' ?>
            </div>
        </div>

        <!--<div style="background-color: #008080; margin: 20px 0 -30px 0; box-shadow: 0 0 4px -1px #68686b; position: absolute;width: 100%; bottom: 0">
            <div>asdasdsad</div>
            <div>asdasdsad</div>
            <div>asdasdsad</div>
            <div>asdasdsad</div>
            <div>asdasdsad</div>
        </div>-->
    </div>
</div>

<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>