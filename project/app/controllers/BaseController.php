<?php
class BaseController
{

    /**
     * Current template
     *
     * @var string
     */
    protected $template;

    /**
     * MyPDO instance
     *
     * @var MyPDO instance
     */
    protected $db;

    /**
     * @var ErrorLib
     */
    public $error;

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {

    }

    public function navigator($method) {

        if (!method_exists($this, $method)) {
            exit('Action not exists');
        }
        if (!is_callable(array($this, $method))) {
            exit('Action not exists');
        }

        $this->{$method}();
    }

}