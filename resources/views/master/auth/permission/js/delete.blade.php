<script type="text/javascript">
    function isDelete(id) {
        var user = "<?= auth()->user()->profile->fullName ?>"
        swal({
            title: "Confirmation Delete",
            text: `${user}, Are you sure Delete Permanent Data Permission ?`,
            type: "question",
            showCancelButton: !0,
            cancelButtonText: "Batal...",
            confirmButtonText: "Lanjutkan...",
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "delete/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal({
                                title               : "Successfully",
                                text                : results.message, 
                                type                : "success",
                                showCancelButton    : false,
                                showConfirmButton   : false,
                            }),
                            setInterval(function() { window.location.reload(); }, 3000);
                        } else {
                            swal("Failed Process", results.message, "info");
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }
</script>