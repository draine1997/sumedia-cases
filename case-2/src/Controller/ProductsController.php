<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 */
class ProductsController extends AppController
{

    public function index() {

        $products = $this->Products->find()
            ->where([
                'price IS NOT' => null,
                'price !='     => '0',
            ])
            ->all()
            ->toList();

        $this->set(compact('products'));
        
    }

    /**
     * Get  products
     *
     * @return \Cake\Http\Response|null
     */
    public function getAll() : \Cake\Http\Response {
        $this->request->allowMethod([ 'get' ]);

        $products = $this->Products->find()
            ->where([
                'price IS NOT' => null,
                'price !='     => '0',
            ])
            ->all()
            ->toList();

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($products));
    }

    /**
     * Get a specific product by ID
     *
     * @param int $id Product ID
     * @return \Cake\Http\Response|null
     */
    public function getProduct(int $id) : \Cake\Http\Response {
        $this->request->allowMethod([ 'get' ]);

        // Logic to fetch a single product by ID
        try {
            $product = $this->Products->find()
                ->where([
                    'product_id'   => $id,
                    'price IS NOT' => null,
                    'price !='     => '0',
                ])
                ->firstOrFail();
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($product));

        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            // Send error
            return $this->response
                ->withStatus(404)
                ->withType('application/json')
                ->withStringBody(json_encode([ 'error' => 'Product not found' ]));
        }
    }


    /**
     * Returns cheapest product
     * 
     * @return \Cake\Http\Response|null
     */
    public function getCheapestProduct() : \Cake\Http\Response {
        $this->request->allowMethod([ 'get' ]);

        try {
            $product = $this->Products->find()
                ->where([
                    'price IS NOT' => null,
                    'price !='     => '0',
                ])
                ->order([ 'price' => 'ASC' ])
                ->firstOrFail();

            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($product));

        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            // Send error
            return $this->response
                ->withStatus(404)
                ->withType('application/json')
                ->withStringBody(json_encode([ 'error' => 'Product not found' ]));
        }
    }

}
