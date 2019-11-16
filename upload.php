<?php
$dizin = 'img/';
$dosyaAdi = date("d-m-Y_H-i-s") . '_' . rand(0000000000,9999999999) . '.jpg';
$yuklenecek_dosya = $dizin . $dosyaAdi;
$url = "https://orneksite.com/img/"; // sonuna / koymanız gerekiyor.


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
