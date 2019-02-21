<!-- Sortable -->
<link rel="stylesheet" href="{{asset("assets/global/own/plugins/jquery_ui/jquery-ui.css")}}">
<script type="text/javascript" src="{{asset("assets/global/own/plugins/jquery_ui/jquery-ui.js")}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        /*
        var updateIndex = function (e, ui) {
            var data = $(this).sortable('toArray');
            var input = $('#sort_input');
            input.val(data);
            input.attr('data-change', 1);

            $('td.index', ui.item.parent()).each(function (i) {
                $(this).html(i + 1);
            });


            var itemid = [];
            $('input:hidden.itemid').each(function (e) {
                itemid.push($(this).val());
            });
            console.log(itemid);


        };
        */

        // sortable
        $(".mySortable").sortable(
            {
//                stop: updateIndex,
            }
        );
//        console.log("sortable: " + updateIndex());
    });
</script>