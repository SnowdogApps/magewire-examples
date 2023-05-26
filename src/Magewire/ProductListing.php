<?php

namespace Snowdog\MagewireExamples\Magewire;

use Magewirephp\Magewire\Component;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class ProductListing extends Component
{
    const CATEGORY_ID = 23;

    public $products = [];

    public $colorFilter = null;

    public $sizeFilter = null;

    protected $listeners = [
        'filtersize',
        'filtercolor'
    ];

    public function __construct(private CollectionFactory $collectionFactory)
    {
    }

    public function mount(): void
    {
        $this->products = $this->getProductCollectionByCategories()->toArray();
    }

    public function getProductCollectionByCategories()
    {
        $collection = $this->collectionFactory->create();
        $collection->addAttributeToSelect('name', 'color', 'size');
        $collection->addCategoriesFilter(['in' => self::CATEGORY_ID]);
        return $collection;
    }

    public function filtercolor(string $value)
    {
        $this->colorFilter = $value;
        $this->updateProducts();
    }

    public function filtersize(string $value)
    {
        $this->sizeFilter = $value;
        $this->updateProducts();
    }

    public function updateProducts()
    {
        $collection = $this->getProductCollectionByCategories();
        if ($this->colorFilter) {
            $collection->addAttributeToFilter('color', $this->colorFilter);
        }
        if ($this->sizeFilter) {
            $collection->addAttributeToFilter('size', $this->sizeFilter);
        }

        $this->products = $collection->toArray();

    }
}
