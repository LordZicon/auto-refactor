<?php

class Router
{
    public function start($route)
    {
        $this->config = Config::get('routes');

        if (empty($route) || $route == '/') {
            if (isset($this->config['default'])) {
                $route = $this->config['default'];
            } else {
                $this->error();
            }
        }

        try {
            foreach ($this->config['routes'] as $path => $defaults) {

                $regex = '@' . preg_replace(
                    '@:([\w]+)@',
                    '(?P<$1>[^/]+)',
                    str_replace(')', ')?', (string) $path)
                ) . '@';
                $matches = [];

                if ( ! preg_match($regex, $route, $matches)) {
                    continue;
                }
                    
                $options = $defaults;
                foreach ($matches as $key => $value) {
                    if (is_numeric($key)) {
                        continue;
                    }

                    if ($key == 'controller') {
                        $value = ucfirst($value);
                    }

                    $options[$key] = $value;

                    if (isset($defaults[$key]) && strpos($defaults[$key], ":$key") !== false) {
                        $options[$key] = str_replace(":$key", $value, $defaults[$key]);
                    }
                }

                return $this->dispatch($options);
            }
        } catch (\Suggestotron\Controller\Exception $e) {
            $this->error();
        }
    }

    public function matchRoute($route, $path, $defaults)
    {

    }

    public function dispatch($options)
    {
        if (isset($options['controller']) && isset($options['action'])) {
            $callable = [$options['controller'], $options['action'] . 'Action'];
            if (is_callable($callable)) {
                $callable = [new $options['controller'], $options['action'] . 'Action'];
                $callable($options);
                //return;
            } else {
                $this->error();
            }
        } else {
            $this->error();
        }
    }

    public function error()
    {
        if (isset($this->config['errors'])) {
            $route = $this->config['errors'];
            $this->start($route);
        } else {
            echo "An unknown error occurred, please try again!";
        }

        exit;
    }
}