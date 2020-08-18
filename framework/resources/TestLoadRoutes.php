<?php

namespace Hleb\Constructor\Routes;


class LoadRoutes
{
    private $cache_routes = HL_RESOURCES_DIR  . "routes.from_test_protect_method.txt";

    private $routes_directory;
    
    
    function test_set_cache_path(string $path)
    {
        $this->cache_routes = $path;        
    }

    function test_set_routes_path(string $path)
    {
        $this->routes_directory = $path;
    }
    
    

    public function update($data)
    {
        return $data;
    }


    public function loadCache()
    {

        $content = file_get_contents($this->cache_routes);

        if (empty($content)) {

            return false;
        }

        return json_decode($content, true);

    }

    public function comparison()
    {
        return true;
    }
}