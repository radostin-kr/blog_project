<?php
class Router{
    public function __construct() {
    }
    public function route() {
        $this->site();
    }

    private function site() {
        $defaultController = CONTROLLERS_PATH . 'DefaultController';
        $class = ( (!empty($_GET['controller'])) ? ucfirst($_GET['controller']) : 'Default' ) . 'Controller';
        print_r($class);
        echo "<br>";
        $file = realpath(CONTROLLERS_PATH . $class . '.php');
        print_r($file);
        if ($file != false) {
            try {
                $controller = new $class;
                if (!empty($_GET['action'])) {
                    $controller->navigator($_GET['action']);
                } else {
                    $controller->listBlogs();
                }
            } catch (ErrorException $ex) {
                CommonClass::phpExceptionHandler($ex);
                exit();
                echo $ex->getMessage();
            }
        } else {
            try {
                $defaultController = new $$defaultController;
                if (!empty($_GET['action'])) {
                    $defaultController->navigator($_GET['action']);
                }
            } catch (ErrorException $ex) {
                pre("Wrong controller");
                exit();
            }
        }
    }


}
