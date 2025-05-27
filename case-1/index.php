<?php
/**
 * Entrypoint of your application.
 * Handle requests by returning appropriate responses.
 */

// Your code here
include __DIR__ . '/functions.php';
include __DIR__ . '/class.products.php';
include __DIR__ . '/class.router.php';

$cl_products = new Sumedia_Products();
$cl_router   = new Sumedia_Router();


// Get cheapest product
$cl_router->addRoute('/products/euroknaller', function () use ($cl_products) {
    $results = $cl_products->getCheapestProduct();

    if ($results === null):
        $results = [ 'error' => 'No products found' ];
        http_response_code(404);
    endif;

    return $results;
});

// Get all products
$cl_router->addRoute('/products', function () use ($cl_products) {
    $results = $cl_products->getProducts();

    if (empty($results)):
        $results = [ 'error' => 'No products found' ];
        http_response_code(404);
    endif;

    return $results;
});

// Get product by ID
$cl_router->addRoute('/products/(\d+)', function () use ($cl_products) {
    $product_id = (int) preg_replace('/\/products\//', '', $_SERVER['REQUEST_URI']);
    $results    = $cl_products->getProduct($product_id);

    if (empty($results)):
        $results = [ 'error' => 'No product found' ];
        http_response_code(404);
    endif;

    return $results;
});

$results = $cl_router->handleRequest($_SERVER['REQUEST_URI']);

header('Content-Type: application/json;');
echo json_encode($results, JSON_PRETTY_PRINT);