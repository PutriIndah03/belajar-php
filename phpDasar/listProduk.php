<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
  </head>
  <body>
  <div class="container">
    <h1>List Produk</h1>

    <div class="row">
        <?php
        // Contoh data produk
        $produk = [
            [
                'nama' => 'Indomie',
                'harga' => '$4000',
            ],
            [
                'nama' => 'Indomie',
                'harga' => '$4000',
            ],
            [
                'nama' => 'Indomie',
                'harga' => '$4000',
            ],
            [
                'nama' => 'Indomie',
                'harga' => '$4000',
            ],
            [
                'nama' => 'Indomie',
                'harga' => '$4000',
            ],
            [
                'nama' => 'Indomie',
                'harga' => '$4000',
            ],
            [
                'nama' => 'Indomie',
                'harga' => '$4000',
            ],
            [
                'nama' => 'Indomie',
                'harga' => '$4000',
            ],
         
        ];

        foreach ($produk as $item) {
            echo '<div class="card" style="width: 15rem;">';
            echo '<img src="foto.jpg" class="card-img-top" alt="ini foto">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $item['nama'] .'</h5>';
            echo '<h5 class="card-title"> Harga : ' . $item['harga'] .'</h5>';
            echo '<a href="https://lifestyle.bisnis.com/read/20220307/223/1507816/8-varian-indomie-ini-cuma-ada-di-luar-negeri-tak-beredar-di-indonesia"><button type="button" class="btn btn-primary">selengkapnya</button></a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
  </body>
  </html>


       
