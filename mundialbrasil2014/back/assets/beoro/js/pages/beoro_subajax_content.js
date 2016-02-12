/* [ ---- Beoro Admin - ajax content ---- ] */

$(function() {

    var updateSubContent = function(html) {
        var data = $(this).data();
        if (data && "jnavlasttrigger" in data) {
            $('#pageNavToolbar li').removeClass('current');
            // remove padding from ajax content
            //$('#ajax_content').closest('.w-box-content').removeClass('cnt_a cnt_b');
            $trigger = data['jnavlasttrigger'];

            // text content
            // beoro_multiupload1.init();
            if ($trigger.hasClass("c_text")) {
                //   $('#ajax_content').closest('.w-box-content').addClass('cnt_a');
                // help/faq content
            } else if ($trigger.hasClass("c_help_faq")) {
                setTimeout(beoro_accordion.init, 100);
                // datatables
            } else if ($trigger.hasClass("c_datatables")) {
                // load stylesheet
                beoro_multiupload1.init();
                beoro_textarea_counter.init();
                beoro_PageNavToolbar.init();
                //beoro_table_dinamic.init();
               
            
                if (document.createStyleSheet) {
                    document.createStyleSheet(CMS.globals.base_url + 'back/assets/beoro/js/lib/plupload/js/jquery.plupload.queue/css/plupload-beoro.css');
                    document.createStyleSheet(CMS.globals.base_url + 'back/assets/beoro/js/lib/datatables/css/datatables_beoro.css');
                }
                else {
                    $("head").append($("<link rel='stylesheet' href='" + CMS.globals.base_url + "back/assets/beoro/js/lib/plupload/js/jquery.plupload.queue/css/plupload-beoro.css' type='text/css' media='screen' />"));
                    $("head").append($("<link rel='stylesheet' href='" + CMS.globals.base_url + "back/assets/beoro/js/lib/datatables/css/datatables_beoro.css' type='text/css' media='screen' />"));

                }
                $.getScript(CMS.globals.base_url + "back/assets/beoro/js/form/bootstrap-fileupload.min.js");
                $.getScript(CMS.globals.base_url + "back/assets/beoro/js/lib/datatables/js/jquery.dataTables.min.js");
                $.getScript(CMS.globals.base_url + "back/assets/beoro/js/lib/ckeditor/ckeditor.js");
                 beoro_wysiwg.init();
                // load scripts
                $.getScript(CMS.globals.base_url + "back/assets/beoro/js/lib/datatables/js/jquery.dataTables.min.js").done(function() {
                    $.getScript(CMS.globals.base_url + "back/assets/beoro/js/lib/datatables/js/jquery.dataTables.sorting.js").done(function() {
                        $.getScript(CMS.globals.base_url + "back/assets/beoro/js/lib/datatables/js/jquery.dataTables.bootstrap.min.js").done(function() {
                            $('#dt_basic').dataTable({
                                "sPaginationType": "bootstrap_full",
                                "sScrollX": "100%",
                                "sScrollXInner": '150%',
                                "bScrollCollapse": true,
                                "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row-fluid'ip>",
                                "fnInitComplete": function(oSettings, json) {
                                    $('.ColVis_Button').addClass('btn btn-mini btn-inverse').html('Columns');
                                }
                            });
                        });
                    });
                });
            }
            $trigger.closest('li').addClass('current');
        }
    };

    //No esta bloqueado aun, bloqueamos, preparamos y enviamos la peticion
    $("#form_data").jNavigate({
        extTrigger: '.jnav-ext1',
        intTrigger: '.jnav-int1',
        useHistory: false,
        spinner: CMS.globals.base_url + 'back/assets/beoro/img/ajax_loader.gif',
        loaded: updateSubContent
    });

});