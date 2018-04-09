<script>
    $(document).ready(function () {
        var path = window.location.pathname;
        var list = path.split(/([a-z0-9]+)/i);
        var row = $('#' + list[1]);
        $(row).addClass("selected");
    });
</script>
