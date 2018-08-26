<script type="text/javascript">
$.fn.openMenu = function() {
    var className = $(this).attr('class');
    if (className == "treeview") {
        $(this).addClass("menu-open");
    } else if (className == "treeview-menu") {
        $(this).parent().addClass("menu-open");
        $(this).css({
            display: "block"
        });
    }
};
$.fn.closeMenu = function() {
    var className = $(this).attr('class');
    var count = $(this).length;
    if (count > 1) {
        $.each($(this), function(key, element) {
            className = $(element).attr('class');
            if (className == "treeview menu-open") {
                $(element).removeClass("menu-open");
            } else if (className == "treeview-menu") {
                $(element).parent().removeClass("menu-open");
                $(this).css({
                    display: "none"
                });
            }
        });
    } else {
        if (className == "treeview menu-open") {
            $(this).removeClass("menu-open");
        } else if (className == "treeview-menu") {
            $(this).parent().removeClass("menu-open");
            $(this).css({
                display: "none"
            });
        }
    }
};

$(".search-menu-box").on('input', function() {
    var filter = $(this).val();
    $(".sidebar-menu li:not(.header)").each(function() {
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show();
            $(this).parentsUntil(".treeview").openMenu();
        }
    });
});
</script>
