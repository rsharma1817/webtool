<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/public/themes/carbon/components/cv-loading.html

use Latte\Runtime as LR;

class Templatefe9c073db1 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div class="bx--loading-overlay" style="position:absolute">
    <div id=<?php echo LR\Filters::escapeHtmlAttrUnquoted($idLoadingDiv) /* line 2 */ ?> data-loading class="bx--loading">
        <svg class="bx--loading__svg" viewBox="-75 -75 150 150">
            <title>Loading</title>
            <circle class="bx--loading__stroke" cx="0" cy="0" r="37.5"></circle>
        </svg>
    </div>
</div><?php
		return get_defined_vars();
	}

}
