<?php
namespace Core;

class Router extends \Core\Abstracts\Router
{

    /**
     * We will call this as follows:
     * Router::add('login', '/login', '\App\Controllers\Auth\LoginController', 'index')
     * ^ all route::add code should be included in app\config\routes.php
     * routes.php should be included immediately after classes autoload,
     * before new App() in bootloader
     *
     * Goal is to add entry to $this->routes
     * with the following information:
     *
     * @param string $name Route name determines the index,
     * which the route array will be saved in $this->routes
     *
     * @param string $url Url which belongs to controller
     *
     * @param string $controller_name Controller class name,
     * Example: \App\Controllers\HomeController
     *
     * @param string $controller_method Method name inside controller,
     * Example.: if controller has method index() for that page, we pass "index"
     *
     * @return mixed
     */
    public static function add(string $name, string $url, string $controller_name, string $controller_method = 'index'): void
    {
        // TODO: Implement add() method.
        self::$routes[$name] = [
            'url' => $url,
            'controller_name' => $controller_name,
            'controller_method' => $controller_method,

        ];
    }

    /**
     * Creates controller object based on it's class name
     *
     * @param string $controller_name Controller class name, ex.: \App\Controllers\HomeController
     * @return mixed Controller Object
     */
    protected static function getControllerInstance(string $controller_name)
    {
        // TODO: Implement getControllerInstance() method.
        return $instance = new $controller_name;

    }

    /**
     * Returns route array from $this->routes by $url
     * if route is not found, returns null
     *
     * @param $url
     * @return null|array
     */
    public static function getRouteByUrl($url): ?array
    {
        foreach (self::$routes as $route) {
            if ($route['url'] === $url) {
                return $route;
            }
        }
        return null;
    }

    /**
     * Gets route url by route name from $this->routes
     * We will use this to print various links in pages
     *
     * @param $name
     * @return string|null
     */
    public static function getUrl($name): ?string
    {

        return self::$routes[$name]['url']  ?? null;
    }

    /**
     * Gets route based on current URL ($_SERVER['REQUEST_URI'])
     * creates controller instance and executes its method
     *
     * Note, that urls could have parameters like products?id=3
     * it should ignore it while choosing the right controller
     *
     * Returns the html string, that the controller returns
     *
     * @return string HTML
     */
    public static function run(): ?string
    {
        // TODO: Implement run() method.
        $route = self::getRouteByUrl($_SERVER['REQUEST_URI']);

        if($route){
            $controller = self::getControllerInstance($route['controller_name']);
            return $controller->{$route['controller_method']}();
        }
//      var_dump($route);
//        var_dump($_SERVER['REQUEST_URI']);

        return null;
    }
}