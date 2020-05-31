<?php

if(!file_exists(date("Y") . '/' . date("m"))) {
    mkdir(date("Y") . '/' . date("m"));
}
if(!file_exists(date("Y") . '/' . date("m"). '/'. date("d"))) {
    mkdir(date("Y") . '/' . date("m"). '/'. date("d"));
}

$dizin = date("Y") . '/' . date("m") . '/'. date("d") . '/';

$dosyaAdi = date("H-i-s") . '_' . rand(0000000000,9999999999) . '.jpg';
$yuklenecek_dosya = $dizin . $dosyaAdi;
$url = "https://asd.com/" . $dizin; // sonuna / koymanız gerekiyor. -- you have to put / at the end.


if (move_uploaded_file($_FILES['files']['tmp_name'][0], $yuklenecek_dosya))
{
    $result = [
        "success" => true,
        "files" => [
                [
                    "hash" => $dosyaAdi,
                    "name" => $dosyaAdi,
                    "url" => $url . $dosyaAdi,
                    "size" => $_FILES['files']['size'][0]
                ]
        ],

    ];
    print_r(json_encode($result));
} else {
    echo "Dosya yüklenemedi!\n";
}
?>
