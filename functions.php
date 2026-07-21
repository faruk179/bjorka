<?php

function rupiah($angka){

    return "Rp ".
    number_format(
        $angka,
        0,
        ',',
        '.'
    );
}

function tanggal($tanggal){

    return date(
        'd-m-Y',
        strtotime($tanggal)
    );
}
?>