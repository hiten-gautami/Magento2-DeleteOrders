<?php

 
namespace Elsnertech\DeleteOrders\Plugin\Sales\Block\Adminhtml\Order;

use Magento\Sales\Block\Adminhtml\Order\View as OrderView;
use Magento\Framework\UrlInterface;
use Magento\Framework\AuthorizationInterface;

class View
{
  /** @var \Magento\Framework\UrlInterface */
  protected $_urlBuilder;

  /** @var \Magento\Framework\AuthorizationInterface */
  protected $_authorization;

  public function __construct(
    UrlInterface $url,
    AuthorizationInterface $authorization
  ) {
    $this->_urlBuilder = $url;
    $this->_authorization = $authorization;
  }

  public function beforeSetLayout(OrderView $view) {
		$message ='Are you sure you want to delete this?';
		$url = $this->_urlBuilder->getUrl('deleteorders/order/deleteOrder', ['id' => $view->getOrderId()]);

		$view->addButton(
		  'solutionexcel_deleteorders_adminhtml_order_view_add_button',
		  [
			'label' => __('Delete'),
			'class' => 'solutionexcel_deleteorder',
			'onclick' => "confirmSetLocation('{$message}', '{$url}')"
		  ]
		);
  }
}