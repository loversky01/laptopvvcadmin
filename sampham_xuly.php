<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
    'https://laptopvvc.online/',
    'ck_44a100539b80802c7e50665eeff8b0740bd5c6a0',
    'cs_a7b3ca077bf6973b01c49d6cd425302c70a0921f',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true // Force Basic Authentication as query string true and using under HTTPS
    ]
);
?>

<?php echo json_encode($woocommerce->get('products')); ?>