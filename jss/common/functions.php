<?php
include "common/config.php";

if (!function_exists('format_amount')) {
    function format_amount($balance) {
        $formatted_balance = number_format($balance, 4, '.', '');
        if (strpos($formatted_balance, '.') !== false && substr($formatted_balance, -3) == '.0000') {
            return substr($formatted_balance, 0, -3);
        } else {
            return $formatted_balance;
        }
    }
}

//if (!function_exists('old_get_todays_price')) {
//    function old_get_todays_price($curr = 'USD', $key = 'price_gram_24k') {
//        if (!empty($_SESSION['price_gram_24k'])) {
//            return $_SESSION[$key];
//        }
//        $apiKey = "goldapi-xksltnvkqo1-io";
//        $myHeaders = array(
//            'x-access-token: ' . $apiKey,
//            'Content-Type: application/json'
//        );
//        $curl = curl_init();
//        $url = "https://www.goldapi.io/api/XAU/{$curr}";
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => $url,
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_FOLLOWLOCATION => true,
//            CURLOPT_HTTPHEADER => $myHeaders
//        ));
//        try {
//            $response = curl_exec($curl);
//            curl_close($curl);
//            if ($response) {
//                $data = json_decode($response, true);
//                if ($data && isset($data['price_gram_24k'])) {
//                    $_SESSION['price_gram_24k'] = $data['price_gram_24k'];
//                    $_SESSION['price_gram_22k'] = $data['price_gram_22k'];
//                    return $_SESSION[$key];
//                }
//            }
//        } catch (\Exception $exc) {
//            return "";
//        }
//    }
//}

if (!function_exists('get_todays_price')) {
    function get_todays_price($base = 'USD', $key = 'price_gram_24k') {
        if (!empty($_SESSION['price_gram_24k'])) {
            return $_SESSION[$key];
        }
        $apiKey = "8aa6e4a893233d3439a47fe23f52eef8";
        $url = "https://api.metalpriceapi.com/v1/carat?api_key={$apiKey}&base={$base}";
        try {
            $response = file_get_contents($url);
            if ($response) {
                $data = json_decode($response, true);
                if ($data && isset($data['data']) && !empty($data['data']['24k'])) {
                    $_SESSION['price_gram_24k'] = $data['data']['24k'] * 5;
                    return $_SESSION[$key];
                }
            }
        } catch (\Exception $exc) {
            return "";
        }
    }
}
//
//if (!function_exists('old_latest_conversion_rates')) {
//    function old_latest_conversion_rates($base, $currencies) {
//        if (!empty($_SESSION['currency_rates'])) {
//            return $_SESSION['currency_rates'];
//        }
//        $apiKey = "09b3e83db99d4723a91210c6a3dbb1d6";
//        $url = "https://openexchangerates.org/api/latest.json?app_id={$apiKey}&base={$base}&symbols={$currencies}";
//        try {
//            $response = file_get_contents($url);
//            if ($response) {
//                $data = json_decode($response, true);
//                if ($data && isset($data['rates'])) {
//                    $_SESSION['currency_rates'] = $data['rates'];
//                    return $data['rates'];
//                }
//            }
//        } catch (\Exception $exc) {
//            return "";
//        }
//    }
//}

if (!function_exists('latest_conversion_rates')) {
    function latest_conversion_rates($base, $currencies) {
        if (!empty($_SESSION['currency_rates'])) {
            return $_SESSION['currency_rates'];
        }
        $apiKey = "8aa6e4a893233d3439a47fe23f52eef8";
        $url = "https://api.metalpriceapi.com/v1/latest?api_key={$apiKey}&base={$base}&currencies={$currencies}";
        try {
            $response = file_get_contents($url);
            if ($response) {
                $data = json_decode($response, true);
                if ($data && isset($data['rates'])) {
                    $_SESSION['currency_rates'] = $data['rates'];
                    return $data['rates'];
                }
            }
        } catch (\Exception $exc) {
            return "";
        }
    }
}

if (!function_exists('convert_currency')) {
    function convert_currency($gold_in_gram = 0, $base = 'USD', $currencies = 'USD,LKR,INR,GBP') {

        $LKRtoUsd = 0.0033;
        $LKRtoInr = 0.28;
        $LKRtoGbp = 0.0026;

        $rates = latest_conversion_rates($base, $currencies);
        global $db;
        $selq= "SELECT * FROM tb_admin_config WHERE config_name = 'commission'";
        $res = mysqli_query($db, $selq);
        $rowc = mysqli_fetch_assoc($res);
        $commission_config = json_decode($rowc['value'], true);
        
        $rates_of_gold = [];
        foreach ($rates as $key => $value) {
            $rates_of_gold[$key] = ($gold_in_gram * $value) + $commission_config[$key]??0;
        }

        $deductAmountSql =  "SELECT * FROM `deducted-gold` WHERE id = '1'";
        $deductAmountResult =  mysqli_query($db,$deductAmountSql);
        $deductAmountFetch = mysqli_fetch_assoc($deductAmountResult);

        $rates_of_gold['LKR'] = $rates_of_gold['LKR'] - $deductAmountFetch['deduct_amount'];
        $rates_of_gold['USD'] = $rates_of_gold['USD'] - ($deductAmountFetch['deduct_amount'] * $LKRtoUsd);
        $rates_of_gold['INR'] = $rates_of_gold['INR'] - ($deductAmountFetch['deduct_amount'] * $LKRtoInr);
        $rates_of_gold['GBP'] = $rates_of_gold['GBP'] - ($deductAmountFetch['deduct_amount'] * $LKRtoGbp);

        return $rates_of_gold;
    }
}

if (!function_exists('getOriginalGoldPrice')) {
    function getOriginalGoldPrice($gold_in_gram = 0, $base = 'USD', $currencies = 'USD,LKR,INR,GBP') {

        $rates = latest_conversion_rates($base, $currencies);
        global $db;
        $selq= "SELECT * FROM tb_admin_config WHERE config_name = 'commission'";
        $res = mysqli_query($db, $selq);
        $rowc = mysqli_fetch_assoc($res);
        $commission_config = json_decode($rowc['value'], true);

        $rates_of_gold = [];
        foreach ($rates as $key => $value) {
            $rates_of_gold[$key] = ($gold_in_gram * $value) + $commission_config[$key]??0;
        }
        return $rates_of_gold['LKR'];
    }
}