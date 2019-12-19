/**
 * Sofinco Epayment module for Magento
 *
 * Feel free to contact Sofinco e-commerce at support@paybox.com for any
 * question.
 *
 * LICENSE: This source file is subject to the version 3.0 of the Open
 * Software License (OSL-3.0) that is available through the world-wide-web
 * at the following URI: http://opensource.org/licenses/OSL-3.0. If
 * you did not receive a copy of the OSL-3.0 license and are unable
 * to obtain it through the web, please send a note to
 * support@paybox.com so we can mail you a copy immediately.
 *
 * @version   1.0.0
 * @author    BM Services <contact@bm-services.com>
 * @copyright 2012-2017 Sofinco e-commerce
 * @license   http://opensource.org/licenses/OSL-3.0
 * @link      http://www.paybox.com/
 */
/*browser:true*/
/*global define*/
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'sfco_cb',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_multi-method'
            },
            {
                type: 'sfco_threetime',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_multi-method'
            },
            {
                type: 'sfco_paypal',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_simple-method'
            },
            {
                type: 'sfco_private',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_multi-method'
            },
            {
                type: 'sfco_prepaid',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_multi-method'
            },
            {
                type: 'sfco_financial',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_multi-method'
            },
            {
                type: 'sfco_bcmc',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_simple-method'
            },
            {
                type: 'sfco_paybuttons',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_multi-method'
            },
            {
                type: 'sfco_maestro',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_simple-method'
            },
            {
                type: 'sfco_s3xcb',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_simple-method'
            },
            {
                type: 'sfco_s3xcbsf',
                component: 'Sofinco_Epayment/js/view/payment/method-renderer/sfco_simple-method'
            }
        );

        // Add view logic here if needed

        return Component.extend({});
    }
);
