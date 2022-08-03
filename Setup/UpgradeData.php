<?php
/**
 * Sofinco Epayment module for Magento
 *
 * Feel free to contact Sofinco at support@paybox.com for any
 * question.
 *
 * LICENSE: This source file is subject to the version 3.0 of the Open
 * Software License (OSL-3.0) that is available through the world-wide-web
 * at the following URI: http://opensource.org/licenses/OSL-3.0. If
 * you did not receive a copy of the OSL-3.0 license and are unable
 * to obtain it through the web, please send a note to
 * support@paybox.com so we can mail you a copy immediately.
 *
 * @version   1.0.7-psr
 * @author    BM Services <contact@bm-services.com>
 * @copyright 2012-2017 Sofinco
 * @license   http://opensource.org/licenses/OSL-3.0
 * @link      http://www.paybox.com/
 */

namespace Sofinco\Epayment\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * {@inheritdoc}
     *
     * @param WriterInterface $writerInterface
     */
    public function __construct(WriterInterface $writerInterface, ScopeConfigInterface $scopeConfig)
    {
        $this->writerInterface = $writerInterface;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($this->scopeConfig->getValue('payment/sfco_s3xcb/active') && $this->scopeConfig->getValue('payment/sfco_s3xcbsf/active')) {
            // Both methods are enabled, set the first one (sfco_s3xcb) to be active only (default behaviour)
            $this->writerInterface->save('payment/sfco_s3xcbsf/active', '0', 'default', 0);
        }

        $setup->endSetup();
    }
}
