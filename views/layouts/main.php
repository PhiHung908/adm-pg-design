<?php

use Hwg\hwgNavBar;

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

//use yii\bootstrap5\Nav;
//use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php if (1==12) {
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    }     
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
	} else if(1==1) {
		echo hwgNavBar::widget(['id' => preg_replace('/[^a-z]+/','',Yii::$app->homeUrl),
					'brandLabel' => Yii::$app->name,
					'brandUrl' => Yii::$app->homeUrl,
					'classFixed' => 'fixed-top',
					'branchName' => 'NavBar',
					'keyChild' => 'items',
					'map' => ['name' => 'label', 'route' => 'url'],
					'keyEncode' => null,
					'clientOptions' => ['flatMenu' => true ],
				]);
	}
    ?>
</header>


<main role="main" class="flex-shrink-0">
	<div class="row gx-0">
		<div class="col-10 col-sm-3">
			<?php
				echo hwgNavBar::widget(['id' => 'AaZzzz',
						'brandLabel' => Yii::$app->name,
						'brandUrl' => Yii::$app->homeUrl,
						//'brandOptions' => ['class' => 'navbar navbar-expand-md navbar-light bg-light'],
						'classFixed' => '',
						'treeTable' => 'menu', //default
						'navType' => 'menu',
						'menuAutoToggle' => false, //default
						'menuAlwayIconMin' => false, //default
						'menuInitMin' => true, //default
						//'navOptions' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
						'branchName' => 'NavMenu',
						'keyChild' => 'items',
						'map' => ['name' => 'label', 'route' => 'url'],
						'keyEncode' => null,
						'clientOptions' => ['id' => 'xyz', 'xxx' => 1 ]
						//, 'kk' => 1
					]);
			?>
		</div>
		<div class="col">
			<div class="container">
				<?= Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				]) ?>
				<?= Alert::widget() ?>
				<?= $content ?>
			</div>
		</div>
	</div>
</main>


<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
