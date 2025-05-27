<?php

class Sumedia_Products
{

    private $products = [];

    /**
     * Loads products from JSON file
     * @return void
     */
    private function loadDataFromJsonFile() : void {
        $jsonFile = __DIR__ . '/products.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            $products = json_decode($jsonData, true);

            // Filter products to ensure they have a price
            $products = array_filter($products, function ($product) {
                return isset($product['price']) && !empty($product['price']);
            });

            // Create array with product IDs as keys for lookup
            $products = array_column($products, null, 'id');

            $this->products = $products;
        } else {
            $this->products = [];
        }
    }

    /**
     * Get all products (load from JSON if not loaded)
     * @return array
     */
    public function getProducts() : array {
        if (empty($this->products)):
            $this->loadDataFromJsonFile();
        endif;

        return $this->products;
    }

    /**
     * Get product by ID
     * @param int $product_id
     * @return array
     */
    public function getProduct(int $product_id) : array {
        $products = $this->getProducts();
        return $products[$product_id] ?? [];
    }

    /**
     * Returns cheapest product
     * @return array
     */
    public function getCheapestProduct() : ?array {
        $products = $this->getProducts();

        $cheapestProduct = null;
        foreach ($products as $product):
            if ($product['price'] < $cheapestProduct['price']):
                $cheapestProduct = $product;
            endif;
        endforeach;

        return $cheapestProduct;
    }

}