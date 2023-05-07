<?php 

class Application {
    protected $model = 'Model';
    protected $controller = "Home";
    protected $method = "index";
    protected $params = [];

    public function __construct() {
        $url = $this->getURL();

        // check if default controller exists
        if (file_exists('../app/controllers/' . ucfirst(strtolower($this->controller)) . '.php' )) {
            if (!is_null($url[0])) {
                $this->controller = ucfirst(strtolower($url[0]));
                unset($url[0]);
            }
        } else if (!file_exists('../app/controllers/' . ucfirst(strtolower($this->controller)) . '.php' )) {
            $data['title'] = 'Not Found';
            require_once '../app/views/layouts/header.php';
            require_once '../app/views/errors/404.php';
            require_once '../app/views/layouts/footer.php';
            return;
        }
        
        
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                if (file_exists('../app/controllers/' . get_class($this->controller) . '.php')) {
                    if (!is_null($url[1])) {
                        $this->controller = (string)ucfirst($url[1]);
                        unset($url[1]);
                    }
                } else if (!file_exists('../app/controllers/' . (string)ucfirst(strtolower($this->controller)) . '.php')) {
                        $data['title'] = 'Not Found';
                        require_once '../app/views/layouts/header.php';
                        require_once '../app/views/errors/404.php';
                        require_once '../app/views/layouts/footer.php';
                        return;
                }
                
                require_once '../app/controllers/' . $this->controller . '.php';
                $this->controller = new $this->controller;
                
                if (isset($url[2])) {
                    if (method_exists($this->controller, $url[2])) {
                        $this->method = $url[2];
                        unset($url[2]);
                    }
                }
                
                if (!empty($url)) {
                    $this->params = array_values($url);
                }
                
                return call_user_func_array([$this->controller, $this->method], $this->params);
            }
        }
        
        if (!empty($url)) {
            $this->params = array_values($url);
        }
        
        return call_user_func_array([$this->controller, $this->method], $this->params);
        
    }


    public function getURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
                
            return $url;
        }
    }

}