<?php

class Sumedia_Router
{

    private $routes = [];

    /**
     * Adds a route to the router
     * @param string $path
     * @param callable $callback
     */

    public function addRoute(string $path, callable $callback) : void {
        $this->routes[$path] = $callback;
    }

    /**
     * Handles the request and returns the response
     * @param string $request_uri
     * @return mixed
     */
    public function handleRequest(string $request_uri) {
        // Check if the requested URI matches any route (exact or regex)
        foreach ($this->routes as $path => $callback) {
            // If the route contains regex pattern (e.g., /products/(\d+))
            if (preg_match('/\(.+\)/', $path)) {
                $pattern = '#^' . $path . '$#';
                if (preg_match($pattern, $request_uri, $matches)) {
                    array_shift($matches); // Remove the full match
                    return call_user_func_array($callback, $matches);
                }
            } else {
                // Exact match
                if ($request_uri === $path) {
                    return call_user_func($callback);
                }
            }
        }

        // If no route matches, return a 404 response
        http_response_code(404);
        return [ 'error' => 'Not Found' ];
    }

}