<?php
header("Content-Type: application/json");
error_reporting(0);

$plaka_kronik = $_GET['plaka'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://ccis.cordisnetwork.com/CWC/bridgeDebt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPGET, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36");
curl_setopt($ch, CURLOPT_POSTFIELDS,
"query=plakatabtoplamborc&PlateNumber=$plaka_kronik&IsTotalDebtQuery=1&Hash=79974");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Accept-Encoding: gzip, deflate, br',
'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7',
'Connection: keep-alive',
'Cache-Control: max-age=0',
'Host: ccis.cordisnetwork.com',
'Referer: https://ccis.cordisnetwork.com/CWC/bridgeDebt',
'Origin: CisMemberService Service',
'sec-ch-ua-mobile: ?0',
'sec-ch-ua-platform: "Windows"',
'Sec-Fetch-Dest: document',
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-User: ?1',
'Upgrade-Insecure-Requests: 1',
'sec-ch-ua: "Not_A Brand";v="99", "Google Chrome";v="109", "Chromium";v="109"',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
));
$kronik_resp = curl_exec($ch);
$kronik_resp = preg_replace('/lang="tr"[\s\S]+?td style="height:5px;"/', '', $kronik_resp);
$kronik_resp = str_replace("</html>", "lovegunbabykyonikksexmilkshake", $kronik_resp);
$kronik_resp = preg_replace('/tbody[\s\S]+?lovegunbabykyonikksexmilkshake/', '', $kronik_resp);
$kronik_resp = str_replace('<html ></td>', "baslasex", $kronik_resp);
$kronik_resp = preg_replace('/baslasex[\s\S]+?style="height:5px;"/', '', $kronik_resp);
$kronik_resp = str_replace('></td>
</tr>', "baslıyoruz", $kronik_resp);
$kronik_resp = str_replace('<td style="height:5px;"baslıyoruz
</', "", $kronik_resp);
$kronik_resp = str_replace('baslıyoruz', "", $kronik_resp);
$kronik_resp = str_replace('<!DOCTYPE html>', "", $kronik_resp);
$kronik_resp = str_replace("<tr class='printtr'>", "", $kronik_resp);
$kronik_resp = str_replace('<tr>', "", $kronik_resp);
$kronik_resp = str_replace('</tr>', "", $kronik_resp);
$kronik_resp = str_replace('> <', ">-<", $kronik_resp);
$kronik_resp = str_replace('><', ">-<", $kronik_resp);
preg_match_all('@<td class="textStyle" >(.*?)</td>@', $kronik_resp, $kronik_resp);

$plaka_kronik = $plaka_kronik;
$borcturu_kronik = $kronik_resp[1][0];
$isimsoyisim_kronik = $kronik_resp[1][7];
$tc_kronik = $kronik_resp[1][8];
$buro_kronik = $kronik_resp[1][9];
$burotel_kronik = $kronik_resp[1][10];
$ceza_kronik = $kronik_resp[1][5];
$toplamceza_kronik = $kronik_resp[1][11];
echo json_encode(array("success" => true, "plaka"=> $plaka_kronik_kronik, "borç_Türü"=> $borcturu_kronik, "İsim_Soyisim" => $isimsoyisim_kronik, "TC" => $tc_kronik, "Büro" => $buro_kronik, "Büro_Telefon" => $burotel_kronik, "Yazilan_Ceza" => $ceza_kronik, "Toplam_Ceza" => $toplamceza_kronik), JSON_UNESCAPED_UNICODE);