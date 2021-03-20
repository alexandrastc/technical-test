<?php
include('versionb/All_classes/Main_finance.php');

$title_data= 'Hello!';
$output_data= '';

if ($_SERVER['REQUEST_URI'] === '/time') {
    $data = new Main_finance();
    $title_data = 'Time';
    $output_data = $data->today();
} elseif ($_SERVER['REQUEST_URI'] === '/price') {
    include('Main_host.php');
    $host = new Main_host();
    $query = 'SELECT * FROM option WHERE name = \'price\'';
    $result = mysqli_query($host->link, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $price = $row['value'];
    }else{
        $price = 0;
    }
	$data = new Main_finance();
    $title_data = 'Today\'s price';
    $output_data = ' final price: ' . $data->VAT($price, $tax);
    $output_data .= ' Tax: ' . $tax;
} else {
    include('Main_host.php');
    $host = new Main_host();
    $query = 'SELECT * FROM articletype WHERE Description = \'Article\'';
    $result = mysqli_query($host->link, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $query = 'SELECT * FROM articles WHERE ArticleTypeId = '.$row['keyid'].' ORDER BY LiveDate DESC LIMIT 1';
        $result = mysqli_query($host->link, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $title_data = $row['Title'];
            $output_data = $row['Text'];
        }
    }
}
require('versionb/theme.php');

?>
