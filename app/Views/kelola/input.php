<!-- =========== PAGE TITLE ========== -->
<div class="page_title gradient_overlay" style="background: url(images/page_title_bg.jpg);">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h1>Input Kamar</h1>
                    <ol class="breadcrumb">
                        <li>Kelola</li>
                        <li>Input Kamar</li>
                    </ol>
                </div>
                <div class="col-md-6 col-sm-6">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========== MAIN ========== -->
<main id="room_page">
    <div class="container">
        <div class="col-6">
            <div class="sidebar">
                <aside class="widget">
                    <div class="vbf">
                        <h2 class="form_title"><i class="fa"></i>Input Kamar</h2>
                        <form method="post" action="/input" class="inner" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <input class="form-control" name="idKamar" placeholder="Masukkan ID Kamar" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="namaKamar" placeholder="Masukkan Nama Kamar" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Kamar" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="fasilitas" placeholder="Masukkan Fasilitas Kamar" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="gambar" type="file">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="harga" placeholder="Masukkan Harga Kamar" type="number">
                            </div>
                            <button class="button btn_lg btn_blue btn_full" type="button" data-toggle="modal" data-target="#myModal">Input Data
                                Kamar</button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">PERINGATAN!</h4>
                                        </div>
                                        <div class="modal-body">
                                            Apa Anda Yakin Ingin Menambah Kamar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-primary">Ya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="a_center mt10">
                                <a href="booking-form.html" class="a_b_f"></a>
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    </div>
</main>