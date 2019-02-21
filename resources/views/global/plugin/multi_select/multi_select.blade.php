<link href="{{asset('assets/global/own/plugins/multi_select/multi_select.css')}}" rel="stylesheet"/>
<script src="{{asset('assets/global/own/plugins/multi_select/multi_select.js')}}" type="text/javascript"></script>


<script type="text/javascript">

    (function ($) {
        $(document).ready(function () {
            var multiSelect = $('[data-select-box-check]');
            if (multiSelect.val() != null) {
                multiSelect.multiselect({
                    columns: 1,
                    search: true,
                    selectAll: false,
                    maxHeight: 250,
                    texts: {
                        placeholder: 'انتخاب نمائید ...',
                        search: 'جستجو',
                        selectAll: 'انتخاب همه موارد',
                        selectedOptions: ' مورد '
                    }
                });
            }
            else {
                multiSelect.multiselect({
                    columns: 0,
                    search: false,
                    selectAll: false,
                    texts: {
                        placeholder: 'موردی یافت نشد ...'
                    }
                });
                $(".ms-options").remove();
            }
        });
    }(jQuery));
</script>