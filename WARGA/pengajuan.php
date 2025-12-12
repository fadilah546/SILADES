<h2 class="fw-bold mb-2">Ajukan Surat Baru</h2>
<p class="text-muted mb-4">Pilih jenis surat yang ingin Anda ajukan</p>

<div class="row g-4">
    <?php
    $data = $koneksi->query("SELECT * FROM surat");
    foreach ($data as $d) {
    ?>

        <div class="col-md-4">
            <a href="index.php?p=form&id=<?= $d['id_surat'] ?>" class="text-decoration-none text-dark">
                <div class="card-option">
                    <div class="icon-box">
                        📄
                    </div>
                    <h6 class="fw-bold"><?= $d['nama_surat'] ?></h6>
                    <p class="text-muted small"><?= $d['deskripsi'] ?></p>
                    <?php
                    $list_syarat = "";
                    $syarat = preg_split("/\r\n|\n|\r/", $d['persyaratan']);
                    foreach ($syarat as $s) {
                        $s = ltrim(trim($s), ".");
                        if ($s != "") {
                            $list_syarat .= "<li>$s</li>";
                        }
                    }
                    ?>
                    <ul class="text-start small">
                        <?= $list_syarat ?>
                    </ul>
                </div>
            </a>
        </div>
    <?php } ?>
</div>