<?php
$id = $_GET['id'];

$judulbuku = query("SELECT * FROM buku WHERE bukuid='$id'");
$buku = array1($judulbuku);
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3" align="center">Ulasan Buku <?= $buku['judul'] ?></h6>
                    </div>
                </div>
                <?php
                $query = query("SELECT * FROM ulasanbuku INNER JOIN buku ON ulasanbuku.bukuid=buku.bukuid INNER JOIN user ON ulasanbuku.userid=user.userid WHERE ulasanbuku.bukuid='$id'");
                $cek = num_row1($query);

                if ($cek == 0) {
                ?>
                    <div class="card-body px-0 pb-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <h4 class="text-center">BELUM ADA ULASAN</h4>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {

                    while ($data = array1($query)) {
                    ?>
                        <div class="card-body px-0 pb-2">
                            <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
                                <div class="card">
                                    <div class="card-header p-3 pt-2">
                                        <div class="text-end pt-1">
                                            <p class="text-sm mb-0 text-start"><strong> <?= $data['username'] ?> </strong></p>
                                            <h6 class="mb-0 text-start"><?= $data['ulasan'] ?></h6>
                                        </div>
                                    </div>
                                    <hr class="dark horizontal my-0">
                                    <div class="card-footer p-3 text-end">
                                        <strong>Rating - <?= $data['rating'] ?>/10</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>


            </div>
        </div>
    </div>
</div>