$(document).ready(function(){

    $('.datatable').DataTable();

    $('#keyword').keyup(function(){

        let keyword = $(this).val();

        $.ajax({
            url: 'cari_produk.php',
            method: 'GET',
            data: {
                keyword: keyword
            },
            success: function(data){
                $('#hasil').html(data);
            }
        });

    });

});