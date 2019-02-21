<script type="text/javascript" src="{{asset("assets/global/own/plugins/maxlength/bootstrap-maxlength.js")}}"></script>
<script type="">
    $("input[maxlength]").maxlength({
        limitReachedClass: "label label-danger",
        alwaysShow: true,
        placement: "top-left"
    });
</script>