
    document.addEventListener('DOMContentLoaded', function() {
        var imageSelect = document.getElementById('image_id');
        var previewImage = document.getElementById('preview-image');
        var previewContainer = document.getElementById('preview-container');
        var previewName = document.getElementById('preview-name');

        previewContainer.style.display = 'none';
        previewName.style.display = 'none';

        imageSelect.addEventListener('change', function() {
            var selectedImage = this.value;
            // Ambil URL gambar yang dipilih
            var imageUrl = "<?php echo base_url('upload/avatar/'); ?>" + selectedImage;
            // Tampilkan pratinjau gambar
            previewImage.src = imageUrl;
            previewContainer.style.display = 'block';
            previewName.style.display = 'block';
        });
    });


    // document.addEventListener('DOMContentLoaded', function() {
    //     var imageSelect = document.getElementById('image_id');
    //     var previewImage = document.getElementById('preview-image');
    //     var previewContainer = document.getElementById('preview-container');
    //     var previewName = document.getElementById('preview-name');

     
    //     // Sembunyikan pratinjau gambar awal
    // previewContainer.style.display = 'none';
    // previewName.style.display = 'none';

     
    //     imageSelect.addEventListener('change', function() {
    //         var selectedImage = this.value;
    //         if (selectedImage) {
    //             // Ambil URL gambar yang dipilih
    //             var imageUrl = "<?= base_url('upload/avatar/')?>" + selectedImage;
    //             // Tampilkan pratinjau gambar
    //             previewImage.src = imageUrl;
    // previewContainer.style.display = 'block';
    // previewName.style.display = 'block';

    //         } else {
    //             // Sembunyikan pratinjau gambar jika tidak ada gambar yang dipilih
    // previewContainer.style.display = 'none';
    // previewName.style.display = 'none';

    //         }
    //     });
    // });