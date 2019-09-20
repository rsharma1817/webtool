<?php
// source: /home/framenetbr/public_html/webtoolmm/app//UI/templates/mformdialog.html

use Latte\Runtime as LR;

class Templatee63fa430db extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		?><form <?php echo $painter->getAttributes($control) /* line 1 */ ?> >
    
<?php
		if (($menubar != '')) {
			?>		<?php echo $menubar /* line 4 */ ?>

<?php
		}
		if (($validators != '')) {
?>
	<div id="divError" style="display:none"></div>
<?php
		}
		?>        <?php echo $fields /* line 9 */ ?>

<?php
		if (($help != '')) {
?>
	<div class="mFormHelp">
		<?php echo $help /* line 12 */ ?>

	</div>
<?php
		}
?>
</form>
<?php
		if (($buttons != '')) {
			?>	<div id="<?php echo LR\Filters::escapeHtmlAttr($control->id) /* line 17 */ ?>_buttons">
		<?php echo $buttons /* line 18 */ ?>

	</div>
<?php
		}
		if (($tools != '')) {
			?>	<div id="<?php echo LR\Filters::escapeHtmlAttr($control->id) /* line 22 */ ?>_tools">
		<?php echo $tools /* line 23 */ ?>

	</div>
<?php
		}
		if (($validators != '')) {
?>
<script>
$(function () {

    $('#<?php echo $control->id /* line 30 */ ?>').bootstrapValidator({
        excluded: [':disabled'],
        container: '#divError',
        message: 'Este valor não é válido',
        fields: { 
            <?php echo $validators /* line 35 */ ?>

        }
    });    
});
</script>
<?php
		}
?>

<?php
		return get_defined_vars();
	}

}
