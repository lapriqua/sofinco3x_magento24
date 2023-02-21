require([
    'jquery',
], function ($) {
    if (typeof (jQuery) == 'undefined') {
        return;
    }

    jQuery(document).ready(function () {
        jQuery(document).on('change', '#sfco_payments_sfco_s3xcbsf_active', function () {
            if (jQuery(this).val() == '1') {
                jQuery('#sfco_payments_sfco_s3xcb_active').val('0').trigger('change');
            }
        });
        jQuery(document).on('change', '#sfco_payments_sfco_s3xcb_active', function () {
            if (jQuery(this).val() == '1') {
                jQuery('#sfco_payments_sfco_s3xcbsf_active').val('0').trigger('change');
            }
        });
    });
});
