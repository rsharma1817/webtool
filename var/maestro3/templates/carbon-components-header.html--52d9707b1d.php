<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/public/themes/carbon/components/header.html

use Latte\Runtime as LR;

class Template52d9707b1d extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>


<!--
  Copyright IBM Corp. 2016, 2018

  This source code is licensed under the Apache-2.0 license found in the
  LICENSE file in the root directory of this source tree.
-->

<header class="bx--header" role="banner" aria-label="SIGA3" data-header>
    <a class="bx--skip-to-content" href="#main-content" tabindex="0">Skip to main content</a>
    <a class="bx--header__name" href="javascript:void(0)" title="<?php echo LR\Filters::escapeHtmlAttr($manager->getOptions('platform')) /* line 12 */ ?>">
    <span class="bx--header__name--prefix">
      <?php echo LR\Filters::escapeHtmlText($manager->getOptions('project')) /* line 14 */ ?>

      &nbsp;
    </span>
        <?php echo LR\Filters::escapeHtmlText($manager->getOptions('platform')) /* line 17 */ ?>

    </a>
    <nav class="bx--header__nav" aria-label="Platform Name" data-header-nav>
        <ul class="bx--header__menu-bar" role="menubar" aria-label="Platform Name">
<?php
		$items = $manager->getL0Menu();
?>

<?php
		$iterations = 0;
		foreach ($items as $item) {
			if (count($item[5]) > 0) {
?>
            <li class="bx--header__submenu" data-header-submenu>
                <a class="bx--header__menu-item bx--header__menu-title" role="menuitem" aria-haspopup="true"
                   aria-expanded="false" href="javascript:void(0)" tabindex="0">
                    <?php echo LR\Filters::escapeHtmlText($item[0]) /* line 28 */ ?>

                    <svg class="bx--header__menu-arrow" width="12" height="7" aria-hidden="true">
                        <path d="M6.002 5.55L11.27 0l.726.685L6.003 7 0 .685.726 0z"></path>
                    </svg>
                </a>
                <ul class="bx--header__menu" role="menu" aria-label="<?php echo LR\Filters::escapeHtmlAttr($item[0]) /* line 33 */ ?>">
<?php
				$iterations = 0;
				foreach ($item[5] as $menuItem) {
?>
                    <li role="none">
                        <a class="bx--header__menu-item" role="menuitem" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($menuItem[1])) /* line 36 */ ?>" tabindex="-1">
            <span class="bx--text-truncate--end">
              <?php echo LR\Filters::escapeHtmlText($menuItem[0]) /* line 38 */ ?>

            </span>
                        </a>
                    </li>
<?php
					$iterations++;
				}
?>
                </ul>
            </li>
<?php
			}
			else {
?>
            <li>
                <a class="bx--header__menu-item" href="javascript:void(0)" role="menuitem" tabindex="0">
                    <?php echo LR\Filters::escapeHtmlText($item[0]) /* line 48 */ ?>

                </a>
            </li>
<?php
			}
			$iterations++;
		}
?>
        </ul>
    </nav>
    <nav class="bx--header__global">
<?php
		if (($manager->isLogged())) {
?>
        <div class="bx--header__global-text">
            <span><?php echo LR\Filters::escapeHtmlText($manager->getLogin()->getLogin()) /* line 58 */ ?></span>
        </div>
<?php
		}
		?>        <button class="bx--header__menu-trigger bx--header__action" aria-label="<?php echo LR\Filters::escapeHtmlAttr($title) /* line 61 */ ?>"
                title="<?php echo LR\Filters::escapeHtmlAttr($title) /* line 62 */ ?>" data-navigation-menu-panel-label-expand="<?php
		echo LR\Filters::escapeHtmlAttr($title) /* line 62 */ ?>"
                data-navigation-menu-panel-label-collapse="Close menu"
                data-product-switcher-target="#switcherLanguage">
<?php
		$lang = fnbr\models\Base::languages()[Manager::getSession()->idLanguage];
		$iconFlag = 'fnbrFlag' . ucfirst($lang);
		?>            <span class="fnbrFlag <?php echo LR\Filters::escapeHtmlAttr($iconFlag) /* line 67 */ ?> bx--navigation-menu-panel-expand-icon">&nbsp;</span>
            <?php echo $icon->carbon('close', "icon-16 bx--navigation-menu-panel-collapse-icon") /* line 68 */ ?>

        </button>
<?php
		if ((null !== $manager->getLogin())) {
			?>        <button class="bx--header__menu-trigger bx--header__action" aria-label="<?php echo LR\Filters::escapeHtmlAttr($title) /* line 71 */ ?>"
                title="<?php echo LR\Filters::escapeHtmlAttr($title) /* line 72 */ ?>" data-navigation-menu-panel-label-expand="<?php
			echo LR\Filters::escapeHtmlAttr($title) /* line 72 */ ?>"
                data-navigation-menu-panel-label-collapse="Close menu"
                data-product-switcher-target="#switcherNotification">
            <?php echo $icon->carbon('notification-on', "icon-16 bx--navigation-menu-panel-expand-icon") /* line 75 */ ?>

            <?php echo $icon->carbon('close', "icon-16 bx--navigation-menu-panel-collapse-icon") /* line 76 */ ?>

        </button>
        <button class="bx--header__menu-trigger bx--header__action" aria-label="<?php echo LR\Filters::escapeHtmlAttr($title) /* line 78 */ ?>"
                title="<?php echo LR\Filters::escapeHtmlAttr($title) /* line 79 */ ?>" data-navigation-menu-panel-label-expand="<?php
			echo LR\Filters::escapeHtmlAttr($title) /* line 79 */ ?>"
                data-navigation-menu-panel-label-collapse="Close menu"
                data-product-switcher-target="#switcherUser">
            <?php echo $icon->carbon('user', "icon-16 bx--navigation-menu-panel-expand-icon") /* line 82 */ ?>

            <?php echo $icon->carbon('close', "icon-16 bx--navigation-menu-panel-collapse-icon") /* line 83 */ ?>

        </button>
<?php
		}
		?>        <button class="bx--header__menu-trigger bx--header__action" aria-label="<?php echo LR\Filters::escapeHtmlAttr($title) /* line 86 */ ?>"
                title="<?php echo LR\Filters::escapeHtmlAttr($title) /* line 87 */ ?>" data-navigation-menu-panel-label-expand="<?php
		echo LR\Filters::escapeHtmlAttr($title) /* line 87 */ ?>"
                data-navigation-menu-panel-label-collapse="Close menu"
                data-product-switcher-target="#switcherPanel">
            <?php echo $icon->carbon('apps', "icon-16 bx--navigation-menu-panel-expand-icon") /* line 90 */ ?>

            <?php echo $icon->carbon('close', "icon-16 bx--navigation-menu-panel-collapse-icon") /* line 91 */ ?>

        </button>
    </nav>
</header>
<nav id="switcherPanel" class="bx--panel--overlay" aria-label="product switcher">
    <ul class="bx--product-switcher__product-list" style>
<?php
		$items = $manager->getAppSwitcher();
		$iterations = 0;
		foreach ($items as $item) {
?>
        <li class="bx--product-list__item">
            <a class="bx--product-link" tabindex="0" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($item[1])) /* line 100 */ ?>" aria-label="<?php
			echo LR\Filters::escapeHtmlAttr($item[0]) /* line 100 */ ?>">
                <span class="bx--product-link__name"><?php echo LR\Filters::escapeHtmlText($item[0]) /* line 101 */ ?></span>
            </a>
        </li>
<?php
			$iterations++;
		}
?>
    </ul>
</nav>
<nav id="switcherUser" class="bx--panel--overlay" aria-label="user switcher">

    <ul class="bx--product-switcher__product-list">
<?php
		$items = $manager->getActionsAuth('fnbr.profile');
		$iterations = 0;
		foreach ($items as $i => $item) {
?>

        <li class="bx--product-list__item">
<?php
			$action = MAction::parseAction($item[1]);
			$idLink = 'switchUser_' . $i;
			?>            <a class="bx--product-link" tabindex="0" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($item[1])) /* line 116 */ ?>" aria-label="<?php
			echo LR\Filters::escapeHtmlAttr($item[0]) /* line 116 */ ?>">
                <span class="bx--product-link__name"><?php echo LR\Filters::escapeHtmlText($item[0]) /* line 117 */ ?></span>
            </a>
        </li>
<?php
			$iterations++;
		}
?>
    </ul>
</nav>
<nav id="switcherLanguage" class="bx--panel--overlay" aria-label="language switcher">

    <ul class="bx--product-switcher__product-list">
<?php
		$items = $manager->getActions('fnbr.language');
		$iterations = 0;
		foreach ($items as $i => $item) {
?>

        <li class="bx--product-list__item">
<?php
			$action = MAction::parseAction($item[1]);
			$idLink = 'switchUser_' . $i;
			$iconFlag = 'fnbrFlag' . ucfirst($lang);
			?>            <a class="bx--product-link" tabindex="0" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($item[1])) /* line 133 */ ?>" aria-label="<?php
			echo LR\Filters::escapeHtmlAttr($item[0]) /* line 133 */ ?>">
                <span class="l-btn-icon <?php echo LR\Filters::escapeHtmlAttr($item[2]) /* line 134 */ ?> icon-16">&nbsp;</span>
                <span class="bx--product-link__name"><?php echo LR\Filters::escapeHtmlText($item[0]) /* line 135 */ ?></span>
            </a>
        </li>
<?php
			$iterations++;
		}
?>
    </ul>
</nav>
<nav id="switcherNotification" class="bx--panel--overlay" aria-label="product switcher">
    <ul class="bx--product-switcher__product-list" style>
        <li class="bx--product-list__item">
            <a class="bx--product-link" tabindex="0" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($item[1])) /* line 144 */ ?>" aria-label="<?php
		echo LR\Filters::escapeHtmlAttr($item[0]) /* line 144 */ ?>">
                <span class="bx--product-link__name"><?php echo LR\Filters::escapeHtmlText($item[0]) /* line 145 */ ?></span>
            </a>
        </li>
    </ul>
</nav>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['menuItem'])) trigger_error('Variable $menuItem overwritten in foreach on line 34');
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 23, 98, 111, 127');
		if (isset($this->params['i'])) trigger_error('Variable $i overwritten in foreach on line 111, 127');
		
	}

}
