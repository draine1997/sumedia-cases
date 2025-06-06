<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * ProductAmount cell
 */
class ProductAmountCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array<string, mixed>
     */
    protected array $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize() : void {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display() {
        $products = $this->fetchTable('Products')->find()
            ->where([
                'price IS NOT' => null,
                'price !='     => '0',
            ])
            ->all();
        $this->set('product_amount', $products->count());
    }
}
