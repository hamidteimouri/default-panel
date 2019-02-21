<!-- Datatable -->
<link rel="stylesheet" href="{{asset("assets/global/own/plugins/datatable/datatables.css")}}">
<link rel="stylesheet" href="{{asset("assets/global/own/plugins/datatable/own/rtl.css")}}">

<script type="text/javascript" src="{{asset("assets/global/own/plugins/datatable/DataTables-1.10.16/js/jquery.dataTables.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/global/own/plugins/datatable/DataTables-1.10.16/js/dataTables.bootstrap.js")}}"></script>
{{--<script type="text/javascript" src="{{asset("assets/global/own/plugins/datatable/datatables.min.js")}}"></script>--}}
{{--<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
<script>
    (function ($) {
        $(document).ready(function () {
            $(".myDatatable").DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Persian.json"
                }
            });
        });
    })(jQuery)
</script>
<!-- End Datatable -->
