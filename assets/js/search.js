// var keyword = document.getElementById('keyword');
//     var submit = document.getElementById('submit');
//     var results = document.getElementById('results');

//     keyword.addEventListener('keyup', function() {
       

//         var xhr = new XMLHttpRequest();
//         xhr.onreadystatechange = function(){
//             if(xhr.readyState == 4 && xhr.status == 200){
//                 results.innerHTML = xhr.responseText;

//             }
//         }

//         xhr.open('GET', 'url', true);
//     xhr.send();
//     });

$(document).ready(function(){
    $('#keyword').keyup(function(){
        var keyword = $(this).val();
        $.ajax({
            url: "<?php echo site_url('applicationn/index');?>",
            type: "POST",
            data: {keyword: keyword},
            success:function(data){
                $('#results').html(data);
            }
        });
    });
});
