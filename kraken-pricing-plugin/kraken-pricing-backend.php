<?php
/**
 * Plugin Name: Kraken Pricing Backend
 * Plugin URI: 
 * Description: Examen FlexVega
 * Version: 1.0
 * Author: Miquel García Pérez
 * Author URI: 
 */

 function kraken_init_backend(){

    wp_register_style('bootstrap', plugins_url('kraken-pricing-plugin/css/bootstrap.css'));
    wp_enqueue_style('bootstrap');

    wp_register_script('bootstrapjs', plugins_url('kraken-pricing-plugin/js/bootsrap.js'));
    wp_enqueue_script('bootstrapjs');

 }

function kraken_table_prices_backend(){

    $curl = curl_init();

    $url_Bitcoin = "https://api.kraken.com/0/public/Ticker?pair=XBTEUR";
    $url_Doge = "https://api.kraken.com/0/public/Ticker?pair=DOGEEUR";

    curl_setopt($curl, CURLOPT_URL, $url_Bitcoin);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $curl_data = curl_exec($curl);
    
    $response_data_bitcoin = json_decode($curl_data, true);

    curl_setopt($curl, CURLOPT_URL, $url_Doge);

    $curl_data = curl_exec($curl);

    $response_data_doge = json_decode($curl_data, true);


    curl_close($curl);

    $table = '';
    
    //$table .= var_dump($response_data_doge);

    $table .= '

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Coin</th>
                <th scope="col">Ask</th>
                <th scope="col">Bid</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Bitcoin (BTC)</th>
                <td>€' . $response_data_bitcoin['result']['XXBTZEUR']['a'][0] . '</td>
                <td>€' . $response_data_bitcoin['result']['XXBTZEUR']['b'][0] . '</td>
               
             </tr>
             <tr>
                <th scope="row">Dogecoin (DOGE)</th>
                <td>€' . $response_data_doge['result']['XDGEUR']['a'][0] . '</td>
                <td>€' . $response_data_doge['result']['XDGEUR']['b'][0] . '</td>
               
             </tr>
        </tbody>
    </table>
    
    
    ';    

    return $table;
}

add_action("init","kraken_init_backend");

add_shortcode("kraken-pricing-backend","kraken_table_prices_backend");


?>