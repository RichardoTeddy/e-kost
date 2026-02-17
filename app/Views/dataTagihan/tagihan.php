<!-- =========== PAGE TITLE ========== -->
<div class="page_title gradient_overlay" style="background: url(images/page_title_bg.jpg)">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h1>Data Tagihan</h1>
                    <ol class="breadcrumb">
                        <li>Dashboard</li>
                        <li>Data Tagihan</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- =========== MAIN ========== -->
<main id="room_page">
    <div class="container">
        <!-- <div class="table-responsive"> -->
        <table class="table table-wrapper ">
            <h2>Daftar Tagihan:</h2><br>
            <thead>
                <tr>
                    <th>ID Sewa</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Masa Berlaku</th>
                    <th>Tanggal Awal</th>
                    <th>ID Kamar</th>
                    <th>ID Pelanggan</th>
                    <th>Total Tagihan</th>
                </tr>
            </thead>
            <tbody>
                <?php $l = 1 ?>
                <?php foreach ($list as $l) : ?>
                    <tr>
                        <td><?= esc($l['sewa_id']); ?></td>
                        <td><?= esc($l['nama']); ?></td>
                        <td><?= esc($l['email']); ?></td>
                        <td><?= esc($l['no_hp']); ?></td>
                        <td><?= esc($l['masa_berlaku']); ?></td>
                        <td><?= esc($l['tanggal_awal']); ?></td>
                        <td><?= esc($l['kamar_id']); ?></td>
                        <td><?= esc($l['pelanggan_id']); ?></td>
                        <td><?= esc($l['biaya']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>

</main>