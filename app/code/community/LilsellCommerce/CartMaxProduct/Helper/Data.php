<?php
/**
 * @category    LilsellCommerce
 * @package     LilsellCommerce CartMaxProduct
 * @author      Ciaran Hale <ciaranhale@gmail.com>
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class LilsellCommerce_CartMaxProduct_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_ACTIVE                           = 'sales/lilsellcommerce_cartmaxproduct/active';
    const XML_PATH_CART_MAX_AMOUNT                  = 'sales/lilsellcommerce_cartmaxproduct/cart_max_amount';
    const XML_PATH_CART_MAX_AMOUNT_MSG              = 'sales/lilsellcommerce_cartmaxproduct/cart_max_amount_msg';

    public function isModuleEnabled($moduleName = null)
    {
        if ((int)Mage::getStoreConfig(self::XML_PATH_ACTIVE, Mage::app()->getStore()) != 1) {
            return false;
        }

        return parent::isModuleEnabled($moduleName);
    }

    public function getCartMaxAmount($store = null)
    {
        return (int)Mage::getStoreConfig(self::XML_PATH_CART_MAX_AMOUNT, $store);
    }

    public function getCartMaxAmountMsg($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_CART_MAX_AMOUNT_MSG, $store);
    }
}
