
    function imgArch(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }

    }

    $('#avatar').change(function() {
        imgArch(this);

    });
