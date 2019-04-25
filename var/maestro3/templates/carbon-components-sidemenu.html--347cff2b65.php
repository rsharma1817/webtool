<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/public/themes/carbon/components/sidemenu.html

use Latte\Runtime as LR;

class Template347cff2b65 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<!--
<aside id="sideMenu" class="bx--side-nav__navigation bx--side-nav bx--side-nav--expanded side-nav side-nav__closed bx--side-nav--website" aria-label="Side navigation" data-side-nav>
-->
<aside id="sideMenu" class="bx--side-nav" aria-label="Side navigation" data-side-nav>
    <nav class="bx--side-nav__navigation" role="navigation" aria-label="Side navigation">
        <ul class="bx--side-nav__items">
<?php
		$items = $manager->getActionsAuth('fnbr',['language','profile']);
		$i = 0;
		$iterations = 0;
		foreach ($items as $i => $item) {
?>

<?php
			if (count($item[5]) > 0) {
?>
            <li class="bx--side-nav__item">

                <button class="bx--side-nav__submenu" type="button" aria-haspopup="true" aria-expanded="false">
                    <div class="bx--side-nav__icon">
                        <span class="l-btn-left l-btn-icon-left"><span class="<?php echo LR\Filters::escapeHtmlAttr($item[2]) /* line 16 */ ?>"></span></span>
                    </div>
                    <span class="bx--side-nav__submenu-title">
                        <?php echo LR\Filters::escapeHtmlText($item[0]) /* line 19 */ ?>

                    </span>
                    <div class="bx--side-nav__icon bx--side-nav__icon--small bx--side-nav__submenu-chevron">
                        <svg aria-hidden="true" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path d="M16 22L6 12l1.414-1.414L16 19.172l8.586-8.586L26 12 16 22z"></path>
                        </svg>
                    </div>
                </button>
                <ul class="bx--side-nav__menu" role="menu" hidden="">
<?php
				$iterations = 0;
				foreach ($item[5] as $j => $menuItem) {
					$action = MAction::parseAction($menuItem[1]);
					$idLink = 'sideMenu_' . $i . '_' . $j;
?>
                    <li class="bx--side-nav__menu-item" role="none">
                        <a id="<?php echo LR\Filters::escapeHtmlAttr($idLink) /* line 32 */ ?>" class="bx--side-nav__link maction" data-manager="action:'<?php
					echo $action /* line 32 */ ?>'" role="menuitem">
                            <?php echo LR\Filters::escapeHtmlText($menuItem[0]) /* line 33 */ ?>

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
            <li class="bx--side-nav__item">
                <a class="bx--side-nav__link" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($item[1])) /* line 41 */ ?>">
                    <span class="bx--side-nav__link-text"><?php echo LR\Filters::escapeHtmlText($item[0]) /* line 42 */ ?></span>
                </a>
            </li>
<?php
			}
			$iterations++;
		}
?>
        </ul>
    <footer class="bx--side-nav__footer">
        <button id="sideMenuToogle" class="bx--side-nav__toggle_wt" role="button" title="Change the side navigation menu">
            <div class="bx--side-nav__icon">
                <?php echo $icon->carbon('close', "icon-16 bx--side-nav__icon--collapse bx--side-nav-collapse-icon") /* line 51 */ ?>

                <?php echo $icon->carbon('chevron--right', "icon-16 bx--side-nav__icon--expand bx--side-nav-expand-icon") /* line 52 */ ?>

            </div>
            <span class="bx--assistive-text">
                Toggle the expansion state of the navigation
            </span>
        </button>
    </footer>
    </nav>

</aside>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['j'])) trigger_error('Variable $j overwritten in foreach on line 28');
		if (isset($this->params['menuItem'])) trigger_error('Variable $menuItem overwritten in foreach on line 28');
		if (isset($this->params['i'])) trigger_error('Variable $i overwritten in foreach on line 9');
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 9');
		
	}

}
