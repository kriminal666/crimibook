@if (session()->has('flash_message'))

    <script type="text/javascript">
        swal({
            title: "{{session('flash_message.title')}}",
            text: "{{session('flash_message.message')}}",
            type: "{{session('flash_message.level')}}",
            timer: 2000,
            showConfirmButton: false
        });
    </script>


@endif


@if (session()->has('flash_message_overlay'))

    <script type="text/javascript">
        swal({
            title: "{{session('flash_message_overlay.title')}}",
            text: "{{session('flash_message_overlay.message')}}",
            type: "{{session('flash_message_overlay.level')}}",
            confirmButtonText:  'Okay'
        });
    </script>


@endif

@if(session()->has('flash_message_delete'))
    <script type="text/javascript">
        swal({
        title: "{{session('flash_message_delete.title')}}",
        text: "{{session('flash_message_delete.message')}}",
        type: "{{session('flash_message_delete.level')}}",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
        },
        function() {
            var form = $('.status__delete-form');

            var status_id = $("[name='status_id']", form).val();
            console.log(status_id);
            var token = $("[name='_token']", form).val();

            var url = 'http://crimibook.dev/status/' + status_id;

            // Do delete
            $.ajax({
                url: url,
                data: {"_method": "DELETE", _token: token},
                type: 'POST',
                success: function (data) {
                    swal({
                        title: "Deleted!",
                        text: "Status has been deleted.",
                        type: "success",
                        closeOnConfirm: false
                    }, function () {
                        location.reload();
                    });
                },
                error: function (xhr, status) {
                    swal({
                        title: "Error!",
                        text: "Error deleting Status",
                        type: "error",
                        closeOnConfirm: false
                    }, function () {
                        location.reload();
                    });
                }
            });
        });
    </script>



@endif