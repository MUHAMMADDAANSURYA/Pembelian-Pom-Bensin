<?php
$file = 'transaksi.txt';
$transaksi = [];

if (file_exists($file)) {
    $lines = file($file);
    $transaksiBaru = [];
    
    foreach ($lines as $line) {
        $line = trim($line);
        
        if (empty($line)) {
            if (!empty($transaksiBaru)) {
                $transaksi[] = $transaksiBaru;
                $transaksiBaru = [];
            }
        } else {
            list($key, $value) = explode(': ', $line);
            $transaksiBaru[$key] = $value;
        }
    }

    if (!empty($transaksiBaru)) {
        $transaksi[] = $transaksiBaru;
    }
}

echo json_encode($transaksi);
?>
