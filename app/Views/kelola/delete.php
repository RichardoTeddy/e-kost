<!-- =========== PAGE TITLE ========== -->
<div class="page_title gradient_overlay" style="background: url(images/page_title_bg.jpg);">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h1>Hapus Kamar</h1>
                    <ol class="breadcrumb">
                        <li>Kelola</li>
                        <li>Hapus Kamar</li>
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
                        <h2 class="form_title"><i class="fa"></i>Hapus Kamar</h2>
                        <form method="post" action="/delete" class="inner">
                            <div class="form-group">
                                <input class="form-control" name="idKamar" placeholder="Masukkan ID Kamar yang akan dihapus" type="text">
                            </div>
                            <button class="button btn_lg btn_blue btn_full" type="button" data-toggle="modal" data-target="#myModal">Hapus
                                Kamar</button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">PERINGATAN!</h4>
                                        </div>
                                        <div class="modal-body">
                                            Apa Anda Yakin Ingin Menghapus Kamar Ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-danger">Ya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="a_center mt10">
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    </div>
</main>