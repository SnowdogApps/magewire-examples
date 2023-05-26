<?php

namespace Snowdog\MagewireExamples\Controller\ProductFilter;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface
{
    private Context $context;

    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        $this->context = $context;
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}
