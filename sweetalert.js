function sukses(pesan){

Swal.fire({

icon:'success',
title:'Berhasil',
text:pesan,
timer:1500,
showConfirmButton:false

});

}

function gagal(pesan){

Swal.fire({

icon:'error',
title:'Gagal',
text:pesan

});

}