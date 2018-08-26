<script type="text/javascript">
    $('button[data-confirm]').on('click', function(e) {
        e.preventDefault();
        var $title   = $(this).data('confirm_title');
        var $text    = $(this).data('confirm_message');
        var $form_id = $(this).data('confirm_form');

        swal({
            title: $title,
            text: $text,
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: true,
                confirm: true
            },
            closeOnClickOutside: false
        })
        .then(willDelete => {
            if (willDelete) {
                document.getElementById($form_id).submit();
            }
        });

    });
</script>
