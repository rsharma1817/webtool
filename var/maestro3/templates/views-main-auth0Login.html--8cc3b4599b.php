<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/views/main/auth0Login.html

use Latte\Runtime as LR;

class Template8cc3b4599b extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		echo $page->fetch('auth0Login', ['data' => $data]) /* line 1 */;
		return get_defined_vars();
	}

}
