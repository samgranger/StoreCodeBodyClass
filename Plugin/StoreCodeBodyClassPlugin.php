<?php
/**
 * Copyright © 2017 Sam Granger. All rights reserved.
 *
 * @author Sam Granger <sam.granger@gmail.com>
 */

namespace SamGranger\StoreCodeBodyClass\Plugin;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\View\Page\Config;
use Magento\Store\Model\StoreManagerInterface;


class StoreCodeBodyClassPlugin implements ObserverInterface
{
    protected $config;
    protected $storeManager;

    public function __construct(
        Config $config,
        StoreManagerInterface $storeManager
    ){
        $this->config = $config;
        $this->storeManager = $storeManager;
    }

    public function execute(Observer $observer){
        $storeCode = $this->storeManager->getStore()->getCode();
        $this->config->addBodyClass($storeCode);
    }
}