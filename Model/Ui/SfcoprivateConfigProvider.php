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

namespace Sofinco\Epayment\Model\Ui;

use Magento\Checkout\Model\ConfigProviderInterface;
// use Magento\Framework\App\Config\ScopeConfigInterface;
// use Magento\Framework\View\Asset\Source;
use \Magento\Framework\ObjectManagerInterface;
use Sofinco\Epayment\Gateway\Http\Client\ClientMock;
use Sofinco\Epayment\Model\Ui\SfcoprivateConfig;

/**
 * Class ConfigProvider
 */
final class SfcoprivateConfigProvider implements ConfigProviderInterface
{
    const CODE = 'sfco_private';

    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return [
            'payment' => [
                self::CODE => [
                    'cards' => $this->getCards()
                ]
            ]
        ];
    }

    public function getCards()
    {
        $object_manager = \Magento\Framework\App\ObjectManager::getInstance();
        $sfcoprivateConfig = $object_manager->get('Sofinco\Epayment\Model\Ui\SfcoprivateConfig');
        $assetSource = $object_manager->get('Magento\Framework\View\Asset\Source');
        $assetRepository = $object_manager->get('Magento\Framework\View\Asset\Repository');

        $cards = [];
        $types = $sfcoprivateConfig->getCards();
        if (!is_array($types)) {
            $types = explode(',', $types);
        }
        foreach ($types as $code) {
            $asset = $assetRepository->createAsset('Sofinco_Epayment::images/' . strtolower($code) . '.45.png');
            $placeholder = $assetSource->findRelativeSourceFilePath($asset);
            if ($placeholder) {
                list($width, $height) = getimagesize($asset->getSourceFile());
                $cards[] = [
                    'value' => $code,
                    'url' => $asset->getUrl(),
                    'title' => $code,
                    'width' => $width,
                    'height' => $height
                ];
            }
        }
        return $cards;
    }
}
