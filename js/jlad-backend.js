jQuery(document).ready(function ($) {
    var info_timer;
    /**
     * Tab Show and hide
     */
    $('.jlad-wrap .nav-tab').click(function () {
        var settings_ref = $(this).data('settings-ref');
        $('.jlad-wrap .nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        $('.jlad-settings-section').hide();
        $('.jlad-settings-section[data-settings-ref="' + settings_ref + '"]').show();
        if (settings_ref == 'help' || settings_ref == 'about') {
            $('.jlad-settings-action').hide();
        } else {
            $('.jlad-settings-action').show();
        }

    });

    /**
     * Template Preview Toggle
     */
    $('.jlad-template-dropdown').change(function () {
        var template = $(this).val();
        if (template != 'custom') {
            $('.jlad-custom-ref').hide();
            $('.jlad-template-ref').show();
            $('.jlad-each-template-preview').hide();
            $('.jlad-each-template-preview[data-template-ref="' + template + '"]').show();
        } else {
            $('.jlad-each-template-preview').hide();
            $('.jlad-template-ref').hide();
            $('.jlad-custom-ref').show();
        }

    });

    /**
     * Colorpicker Initialize
     */
    $('.jlad-colorpicker').wpColorPicker();

    /**
     * Open Media Uploader
     */
    $('.jlad-file-uploader').click(function () {
        var selector = $(this);

        var image = wp.media({
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
                .on('select', function (e) {
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_image = image.state().get('selection').first();
                    // We convert uploaded_image to a JSON object to make accessing it easier
                    // Output to the console uploaded_image
                    console.log(uploaded_image);
                    var image_url = uploaded_image.toJSON().url;
                    // Let's assign the url value to the input field
                    selector.parent().find('input[type="text"]').val(image_url);
                    selector.parent().find('.jlad-preview-holder').html('<img src="' + image_url + '"/>');
                });
    });

    /**
     * Save Settings
     */
    $('.jlad-settings-form').submit(function (e) {
        e.preventDefault();

        var settings_data = $(this).serialize();
        $.ajax({
            type: 'post',
            url: jlad_admin_js_object.admin_ajax_url,
            data: {
                action: 'jlad_settings_save_action',
                settings_data: settings_data,
                _wpnonce: jlad_admin_js_object.admin_ajax_nonce
            },
            beforeSend: function (xhr) {
                clearTimeout(info_timer);
                $('.jlad-info-wrap').slideDown(500);
                $('.jlad-info').html(jlad_admin_js_object.messages.wait)
                $('.jlad-loader').show();
            },
            success: function (res) {
                $('.jlad-loader').hide();
                $('.jlad-info').html(res);
                info_timer = setTimeout(function () {
                    $('.jlad-info-wrap').slideUp(500);
                }, 5000);

            }
        });
    });

    /**
     * Close Info
     *
     */
    $('.jlad-close-info').click(function () {
        $(this).parent().slideUp(500);
    });

    /**
     * Default settings restore
     */
    $('.jlad-settings-restore-trigger').click(function () {
        if (confirm(jlad_admin_js_object.messages.restore_confirm)) {
            $.ajax({
                type: 'post',
                url: jlad_admin_js_object.admin_ajax_url,
                data: {
                    action: 'jlad_settings_restore_action',
                    _wpnonce: jlad_admin_js_object.admin_ajax_nonce
                },
                beforeSend: function (xhr) {
                    clearTimeout(info_timer);
                    $('.jlad-info-wrap').slideDown(500);
                    $('.jlad-info').html(jlad_admin_js_object.messages.wait)
                    $('.jlad-loader').show();
                },
                success: function (res) {
                    $('.jlad-loader').hide();
                    $('.jlad-info').html(res);
                    location.reload();


                }
            });
        }
    });

    /**
     * Class show hide on select dropdown toggle
     */
    $('body').on('change', '.jlad-toggle-trigger', function () {
        var toggle_class = $(this).data('toggle-class');
        var toggle_value = $(this).val();
        $('.' + toggle_class).hide();
        $('.' + toggle_class + '[data-toggle-value="' + toggle_value + '"]').show();
    });
});