    var flash = $('#flash').data('flash');
    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: flash
        })

    }
    $(document).on('click', '#btn-delete', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data akan dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "green",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus data ini!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = link;

            }
        });
    })