<!-- =========== PAGE TITLE ========== -->
<div class="page_title gradient_overlay" style="background: url(images/page_title_bg.jpg);">
    <div class="container">
        <div class="inner">
            <h1>Rooms List View</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>Rooms</li>
            </ol>
        </div>
    </div>
</div>

<!-- =========== MAIN ========== -->
<main id="rooms_list">
    <div class="container">
        <div class="text-center ">
            <form action="/search" method="post">
                <?= csrf_field() ?>
                <input type="text" name="key" placeholder="Masukkan No Kamar" class="form-control "><br>
                <input type="submit" name="submit" value="Search" class="button btn_yellow upper">
            </form>
        </div><br>
        <!-- ITEM -->
        <?php foreach ($list as $l) : ?>
            <article class="room_list" cl>
                <div class="row row-flex">
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <figure>
                            <a href="room.html" class="hover_effect h_link h_blue">
                                <img src="images/rooms/<?= esc($l['gambar']) ?>" class="img-responsive" alt="Image">
                            </a>
                        </figure>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <div class="room_details row-flex">
                            <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                                <h5>No: <?= esc($l['kamar_id']) ?></h5><br>
                                <h3><a href="/<?= esc($l['kamar_id'], 'url') ?>"> <?= esc($l['nama']) ?> </a></h3>
                                <p>
                                    <?= esc($l['deskripsi']) ?>
                                </p>
                                <div class="room_services">
                                    <i class="fa fa-wifi" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Free WiFi" data-original-title="WiFi"></i>
                                    <i class="fa fa-television" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Plasma TV with cable Channel" data-original-title="Plasma TV"></i>
                                    <i class="fa fa-cutlery" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Restaurant" data-original-title="Restaurant"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                                <div class="room_price_inner">
                                    <span class="room_price_number"> Rp<?= number_format(esc($l['harga']), 0, "", ".") ?> </span>
                                    <small class="upper"> per Month </small>
                                    <a href="/<?= esc($l['kamar_id'], 'url') ?>" class="button  btn_blue btn_full upper">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach ?>



    </div>
</main>


</div>