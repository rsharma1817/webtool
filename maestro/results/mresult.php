<?php

/**
 * MResult.
 * Classe base para geração da response aos requests.
 */
abstract class MResult extends Illuminate\Http\Response
{

    protected $ajax;
    protected $content;

    public function __construct()
    {
        parent::__construct();
        $this->ajax = Manager::getAjax();
        $this->content = null;
    }

    public abstract function apply($request, $response);

    protected function setContentTypeIfNotSet($response, $contentType)
    {
        //$response->setContentTypeIfNotSet($contentType);
    }

    protected function nocache($response)
    {
        // headers apropriados para evitar caching
        $this->headers('Expires', 'Expires: Fri, 14 Mar 1980 20:53:00 GMT');
        $this->headers('Last-Modified', 'Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        $this->headers('Cache-Control', 'Cache-Control: no-cache, must-revalidate');
        $this->headers('Pragma', 'Pragma: no-cache');
        $this->headers('X-Powered-By', 'X-Powered-By: ' . Manager::version() . '/PHP ' . phpversion());
    }

}

