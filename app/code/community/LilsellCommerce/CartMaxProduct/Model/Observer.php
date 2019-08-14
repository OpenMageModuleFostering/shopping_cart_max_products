<?php
/**
 * @category    LilsellCommerce
 * @package     LilsellCommerce CartMaxProduct
 * @author      Ciaran Hale <ciaranhale@gmail.com>
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class LilsellCommerce_CartMaxProduct_Model_Observer
{
    private $_helper;

    public function __construct()
    {
        $this->_helper = Mage::helper('lilsellcommerce_cartmaxproduct');
    }

    /**
     * Cannot have more than x number of products in the cart
     */
    public function enforceCartOrderLimit($observer)
    {
         if (!$this->_helper->isModuleEnabled()) {
            return;
        }
        $cart = Mage::getModel('checkout/cart')->getQuote();
        if ($cart->getItemsCount() > (float)$this->_helper->getCartMaxAmount()) {

            $maxCount = (float)$this->_helper->getCartMaxAmount();
            $fullWarning = $this->_helper->getCartMaxAmountMsg().' '.$maxCount;
            Mage::getSingleton('checkout/session')->addError($fullWarning);
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('checkout/cart'));
            Mage::app()->getResponse()->sendResponse();
            exit;
        }
    }
}
