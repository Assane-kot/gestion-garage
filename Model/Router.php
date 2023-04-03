<?php
    require_once 'vendor/autoload.php';
    use FastRoute\RouteCollector;
    use FastRoute\Dispatcher;

    class Router {
        private $dispatcher;

        public function __construct() {
            $this->dispatcher = \FastRoute\simpleDispatcher(function(RouteCollector $r) {
                // Ajout des routes ici avec la méthode addRoute()
                $r->addRoute('GET', '/', ['HomeController', 'index']);
                $r->addRoute('GET', '/users', ['UserController', 'index']);
                $r->addRoute('GET', '/users/{id:\d+}', ['UserController', 'show']);
                $r->addRoute('POST', '/users', ['UserController', 'create']);
                $r->addRoute('PUT', '/users/{id:\d+}', ['UserController', 'update']);
                $r->addRoute('DELETE', '/users/{id:\d+}', ['UserController', 'delete']);
            });
        }

        public function dispatch($httpMethod, $uri) {
            return $this->dispatcher->dispatch($httpMethod, $uri);
        }

        public function addRoute($httpMethod, $uri, $handler) {
            $this->dispatcher->addRoute($httpMethod, $uri, $handler);
        }
    }
?>
