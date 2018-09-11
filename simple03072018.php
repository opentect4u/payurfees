<?php
echo curl_post($params,$method='POST');
function curl_post($params,$method)	{
$params['order_id'] = "Order_".date(YmdHis);
if($_REQUEST['amt'])
{
$params['amount'] =number_format($_REQUEST['amt'],2);
}
else
{
$params['amount'] = 1.00;
}
$params['currency'] = "INR";
$params['customer_email'] = "sales@websys.co.in";
$params['customer_phone'] = "9831157136";
$params['product_id'] = "prod-141835";
$params['return_url'] = "http://www.payurfees.com/handleResponse.php";
$params['description'] = "Sample description";
$params['billing_address_first_name'] = "Arindra";
$params['billing_address_last_name'] = "Datta";
$params['billing_address_line1'] = "5/1c/2";
$params['billing_address_line2'] = "Deshopriya Park East";
$params['billing_address_line3'] = "Kolkata";
$params['billing_address_city'] = "Kolkata";
$params['billing_address_state'] = "West Bengal";
$params['billing_address_country'] = "India";
$params['billing_address_postal_code'] = "700029";
$params['billing_address_phone'] = "986743210";
$params['billing_address_country_code_iso'] = "IND";
$params['shipping_address_first_name'] = "Websys";
$params['shipping_address_last_name'] = "Company";
$params['shipping_address_line1'] = "Wadia Centre";
$params['shipping_address_line2'] = "Fourth Floor";
$params['shipping_address_line3'] = "Worli";
$params['shipping_address_city'] = "Mumbai";
$params['shipping_address_state'] = "Maharashtra";
$params['shipping_address_postal_code'] = "400064";
$params['shipping_address_phone'] = "986743210";
$params['shipping_address_country_code_iso'] = "IND";
$params['shipping_address_country'] = "India";
$params['udf1'] = "2018 Apr 1001_2018 Mar 1006";
$params['udf2'] = "10_Class V";
$params['udf3'] = "Ramkrishna Mission Vidyapith";
$mg_api = 'BF4221C71EFB4F44B16001BBF6D96474';
$curl_post_url = "https://axisbank.juspay.in/orders";
$ch = curl_init();
curl_setopt ($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt ($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_VERBOSE, 0);
curl_setopt ($ch, CURLOPT_HEADER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_USERPWD, $mg_api . ":");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_POST, true);
curl_setopt ($ch, CURLOPT_HEADER, false);
curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, $method);
curl_setopt ($ch, CURLOPT_URL, $curl_post_url);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt ($ch, CURLOPT_TIMEOUT, 0);
$result = curl_exec($ch);
curl_close($ch);
$res = json_decode($result,TRUE);
//return $res;
echo "<pre>";
//print_r($result);


//echo "<p>My Paramerter</p>";
//echo $res[order_id];
// for web
//echo $res[payment_links][web];
?>
<img src="giphy.gif" />
<meta http-equiv="refresh" content="2;url=<?php echo $res[payment_links][web];?>" />

<?php

//for mobile

//echo $res[payment_links][mobile];;
exit;
}
?>