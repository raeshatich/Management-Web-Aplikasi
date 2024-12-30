    function validasiEkstensi() {
        var inputFile = document.getElementById('file');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.pptx)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            alert('Silakan upload file yang dengan ekstensi .pptx');
            inputFile.value = '';
            return false;
        }
    }
