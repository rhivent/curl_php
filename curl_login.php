<?php
/*
	Setelah menganalisa target login yang, sekarang saatnya kita melakukan login otomatis menggunakan cURL, berikut ini adalah fungsi-fungsi yang akan kita gunakan 
	curl_init() untuk inisialisasi Curl library
	curl_setopt() untuk mengatur opsi Curl, adapun opsi-opsi yang kita gunakan untuk login nantinya adalah.
	CURLOPT_URL Untuk mendefinisikan URL tujuan, dari data yang sudah kita dapat, pada opsi ini bisa ditaruh  contoh.com/login.php
	CURLOPT_FOLLOWLOCATION Seperti namanya "ikuti lokasi", berfungsinya akan mengikuti jika URL contoh.com/login.php mengalihkan halaman ke contoh.com/cektransaksi.php jika nantinya sudah berhasil login. Secara umum akan digunakan jika halaman yang ingin kita cURL mungkin akan mengalihkan ke halaman lain.
	CURLOPT_POSTFIELDS Berfungsi mengirim data post, data yang rencananya akan kita kirim adalah username dan pass.
	CURLOPT_RETURNTRANSFER Berfungsi untuk mentranfer data dari hasil eksekusi cURL dengan curl_exec() ke sebuah $variabel, jika menggunakan tanpa CURLOPT_RETURNTRANSFER  maka halaman hasil curl akan langsung ditampilkan, dan sebaliknya jika memakai  CURLOPT_RETURNTRANSFER data akan disimpan dahulu ke sebuah $variable untuk menampilkannya bisa menggunakan fungsi echo($variable).
	CURLOPT_COOKIEJAR Menyimpan cookie pada file tertentu, kita menggunakan opsi ini karena sistem login target menggunakan SESSION untuk mengidentifikasi user sudah login atau belum (saya ragu tentang penjelasan opsi ini, silahkan sobat cek ke sumber lainnya ya).
	CURLOPT_COOKIEFILE Menggunakan file cookie yang sudah ada, kita menggunakan opsi ini karena sistem login target menggunakan SESSION untuk mengidentifikasi user sudah login atau belum (saya ragu tentang penjelasan opsi ini, silahkan sobat cek ke sumber lainnya ya).
	curl_exec() untuk mengeksekusi query cURL yang sudah selesai di atur.
	curl_close() untuk menutup sistem cURL.
*/

$ch = curl_init();
$data=array(
'username'=>'admin',
'pass'=>'password',
);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL, "https://contoh.com/login.php");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie-name.txt');  
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie-name.txt');
$hasil=curl_exec($ch);
curl_close ($ch);
echo $hasil;
?>