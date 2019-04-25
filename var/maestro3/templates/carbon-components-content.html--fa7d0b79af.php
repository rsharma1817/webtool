<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/public/themes/carbon/components/content.html

use Latte\Runtime as LR;

class Templatefa7d0b79af extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		$class = ($page->getTemplateName() == 'fullcenter' ? 'bx--content-full' : 'bx--content bx--content__side-nav--expanded');
		?><div id="centerPane" class="<?php echo LR\Filters::escapeHtmlAttr($class) /* line 2 */ ?>">
        <?php echo $page->generate('content') /* line 3 */ ?>

</div>

<?php
		return get_defined_vars();
	}

}
