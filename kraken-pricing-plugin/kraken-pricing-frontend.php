<?php
/**
 * Plugin Name: Kraken Pricing Frontend
 * Plugin URI: 
 * Description: Examen FlexVega
 * Version: 1.0
 * Author: Miquel García Pérez
 * Author URI: 
 */


function kraken_init_frontend(){

    wp_register_style('bootstrap', plugins_url('kraken-pricing-plugin/css/bootstrap.css'));
    wp_enqueue_style('bootstrap');

    wp_register_script('bootstrapjs', plugins_url('kraken-pricing-plugin/js/bootstrap.js'));
    wp_register_script('krakenPricingFrontend', plugins_url('kraken-pricing-plugin/js/kraken-pricing-frontend.js'));

    wp_enqueue_script('bootstrapjs');
    wp_enqueue_script('krakenPricingFrontend');

 }

function kraken_table_prices_frontend(){

    $table = '

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Coin</th>
                <th scope="col">Ask</th>
                <th scope="col">Bid</th>
            </tr>
        </thead>
        <tbody>
            <tr id="btc">
                <th scope="row">Bitcoin (BTC)</th>
                <td>€</td>
                <td>€</td>
               
             </tr>
             <tr id="doge">
                <th scope="row">Dogecoin (DOGE)</th>
                <td>€</td>
                <td>€</td>
               
             </tr>
        </tbody>
    </table>
    
    
    ';    
    
  return $table;

}

add_action("init","kraken_init_frontend");

add_shortcode("kraken-pricing-frontend","kraken_table_prices_frontend");


?>