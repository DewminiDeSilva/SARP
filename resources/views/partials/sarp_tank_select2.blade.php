{{-- Requires jQuery. Initializes searchable tank dropdowns: select.sarp-tank-select --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    /* Match other MIS green dropdowns (e.g. btn-success / province–tank row) */
    .sarp-tank-select2-theme.select2-container {
        min-width: 220px;
        width: 100% !important;
        max-width: 100%;
    }
    .sarp-tank-select2-theme .select2-selection--single {
        min-height: 38px;
        padding: 6px 10px;
        height: auto;
        background-color: #198754 !important;
        border: 1px solid #28a745 !important;
        border-radius: 0.25rem;
        color: #fff !important;
    }
    .sarp-tank-select2-theme.select2-container--default.select2-container--focus .select2-selection--single,
    .sarp-tank-select2-theme.select2-container--default.select2-container--open .select2-selection--single {
        background-color: #157347 !important;
        border-color: #126926 !important;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.35);
    }
    .sarp-tank-select2-theme .select2-selection__rendered {
        color: #fff !important;
        line-height: 1.5;
        padding-left: 0 !important;
    }
    .sarp-tank-select2-theme .select2-selection__placeholder {
        color: rgba(255, 255, 255, 0.88) !important;
    }
    .sarp-tank-select2-theme .select2-selection__arrow {
        height: 36px !important;
        right: 6px !important;
    }
    .sarp-tank-select2-theme .select2-selection__arrow b {
        border-color: #fff transparent transparent transparent !important;
    }
    .sarp-tank-select2-theme.select2-container--open .select2-selection__arrow b {
        border-color: transparent transparent #fff transparent !important;
    }
    .sarp-tank-select2-theme .select2-selection__clear {
        color: #fff !important;
        margin-right: 22px;
        font-weight: bold;
    }
    .sarp-tank-select2-theme .select2-selection__clear:hover {
        color: #d4edda !important;
    }
    /* Dropdown panel */
    .select2-container--default .select2-dropdown.sarp-tank-select2-dropdown {
        border: 1px solid #28a745;
        border-radius: 0.25rem;
        box-shadow: 0 4px 12px rgba(18, 105, 38, 0.18);
        overflow: hidden;
    }
    .select2-container--default .select2-results__option {
        padding: 8px 12px;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #126926 !important;
        color: #fff !important;
    }
    .select2-container--default .select2-results__option[aria-selected="true"] {
        background-color: #d4edda !important;
        color: #0a4818 !important;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field {
        border: 1px solid #c3e6cb;
        border-radius: 0.25rem;
        padding: 6px 10px;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field:focus {
        border-color: #28a745;
        outline: none;
        box-shadow: 0 0 0 0.15rem rgba(40, 167, 69, 0.2);
    }
</style>
<script>
(function ($) {
    function ensurePresetOption($el) {
        var preset = $el.attr('data-selected');
        if (preset === undefined || preset === null) {
            preset = $el.val();
        }
        if (!preset) {
            return;
        }
        var exists = false;
        $el.find('option').each(function () {
            if ($(this).val() === String(preset)) {
                exists = true;
            }
        });
        if (!exists) {
            $el.append(new Option(preset, preset, true, true));
        } else {
            $el.val(preset);
        }
    }

    function initOne($el) {
        if (!$el.length || $el.data('sarpTankSelect2')) {
            return;
        }
        ensurePresetOption($el);
        $el.data('sarpTankSelect2', true);
        var ph = $el.data('placeholder') || 'Type to search tank name…';
        $el.select2({
            placeholder: ph,
            allowClear: true,
            width: '100%',
            dropdownCssClass: 'sarp-tank-select2-dropdown',
            ajax: {
                url: '/tanks',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return { q: params.term || '', limit: 300 };
                },
                processResults: function (data) {
                    return {
                        results: (data || []).map(function (t) {
                            var n = (t && t.tank_name) ? String(t.tank_name) : '';
                            return { id: n, text: n };
                        }).filter(function (x) {
                            return x.id.length > 0;
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 0
        });
        var $wrap = $el.next('.select2-container');
        if ($wrap.length) {
            $wrap.addClass('sarp-tank-select2-theme');
        }
        var v = $el.attr('data-selected') || $el.val();
        if (v) {
            $el.val(v).trigger('change');
        }
    }

    window.SarpInitTankSelects = function (selector) {
        $(selector || 'select.sarp-tank-select').each(function () {
            initOne($(this));
        });
    };

    window.SarpDestroyTankSelect = function ($select) {
        if ($select && $select.length && $select.data('select2')) {
            $select.select2('destroy');
        }
        if ($select && $select.length) {
            $select.removeData('sarpTankSelect2');
        }
    };

    $(function () {
        SarpInitTankSelects();
    });
})(jQuery);
</script>
