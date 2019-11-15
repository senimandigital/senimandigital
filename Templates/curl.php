<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://modul.senimandigital.kom/raw.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "path=\anggota\administrator\anggota_edit.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);
echo $server_output;
?>