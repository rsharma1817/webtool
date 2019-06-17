<?php
// source: C:\wamp64\www\webtool/apps/webtool/public/themes/webtool/css/graph.css

use Latte\Runtime as LR;

class Template8f269a5ddd extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<style>
.link {
    fill: none;
    /*stroke: #666;*/
    stroke-width: 1.5px;
}

.linkOver {
    stroke-width: 2.5px;
}

#licensing {
    fill: green;
}

.link.licensing {
    stroke: green;
}

.link.resolved {
    stroke-dasharray: 0,2 1;
}

text {
    font: 10px sans-serif;
    font-weight: bold;
    pointer-events: none;
    text-shadow: 0 1px 0 #fff, 1px 0 0 #fff, 0 -1px 0 #fff, -1px 0 0 #fff;
    color: black;
}

.nodeSelected {
    stroke: black;
    stroke-width: 1px;
}

.nodeNormal {
    stroke: #CCC;
    stroke-width: 1px;
}

.entity_cxn {
    fill: #008000;
    color: #008000;
}

.entity_frame {
    fill: #D80000;
    color: #D80000;
}

.entity_st {
    color: white;
    fill: black;
}

.entity_fe {
    color: white;
    fill: white;
    stroke: black;
}

.entity_ce {
    color: white;
    fill: white;
    stroke: black;
}

.entity_lu {
    color: gray;
    fill: gray;
    stroke: black;
}

.datagrid-row-selected {
    background: white;
    color: #000000;
}    
<?php
		$iterations = 0;
		foreach ($data->relationData as $relation) {
			?>.<?php echo LR\Filters::escapeCss($relation['id']) /* line 80 */ ?> {
    stroke: <?php echo $relation['color'] /* line 81 */ ?>;
}
marker path.<?php echo LR\Filters::escapeCss($relation['id']) /* line 83 */ ?> {
    fill: <?php echo $relation['color'] /* line 84 */ ?>;
}
<?php
			$iterations++;
		}
?>

</style><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['relation'])) trigger_error('Variable $relation overwritten in foreach on line 79');
		
	}

}
