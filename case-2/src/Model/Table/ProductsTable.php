<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class ProductsTable extends Table
{
    public function initialize(array $config) : void {
        parent::initialize($config);

        $this->setTable('products');       // actual DB table name
        $this->setPrimaryKey('product_id');
        $this->setDisplayField('name');    // or whatever field you prefer
    }
}