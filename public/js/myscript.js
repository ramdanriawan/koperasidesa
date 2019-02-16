$(document).ready(function(){
    $('.barangJumlah').keyup(function(){
        if ( $('.barangHarga').val() == "" ) {
            swal({
                type: 'error',
                timer: 1000,
                icon: 'error',
                showConfirmButton: false,
                text: 'Isi harga dulu!'
            });

            $(this).val('');
        }

        $('.barangTotal').val(parseInt($(this).val()) * parseInt($('.barangHarga').val()));
    });

    $('.destroy').submit(function(e){
        e.preventDefault();

        swal({
            title: "Hapus data ini?",
            text: "Data yang dihapus akan hilang selamanya!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if(willDelete){
                $.ajax({
                    url: $(this).attr('action'),
                    data: {
                        _token: $(this).find('[name=_token]').val(),
                        method: $(this).find('[name=_method]').val(),
                    },
                    method: 'delete',
                    success: () => {
                        location.href = '';
                    }
                });
            }
        });
    });

    $('.pembelianBarang').change(function(){
        $.ajax({
            url: urlGetBarang + $(this).val(),
            success: (response) => {
                $('.pembelianHarga').val(response.harga);
            }
        })
    });

    $('.pembelianJumlah').keyup(function(){
        $('.pembelianTotal').val(parseInt($(this).val()) * parseInt($('.pembelianHarga').val()));
    });

    $('.pengeluaranBarang').change(function(){
        $.ajax({
            url: urlGetBarang + $(this).val(),
            success: (response) => {
                $('.pengeluaranHarga').val(response.harga);
            }
        })
    });

    $('.pengeluaranJumlah').keyup(function(){
        $('.pengeluaranTotal').val(parseInt($(this).val()) * parseInt($('.pengeluaranHarga').val()));
    });
});