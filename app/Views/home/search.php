<article class="room_list">
    <div class="row row-flex">
        <div class="col-lg-4 col-md-5 col-sm-12">
            <figure>
                <a href="room.html" class="hover_effect h_link h_blue">
                    <img src="images/rooms/<?= esc($hasil['gambar']) ?>" class="img-responsive" alt="Image">
                </a>
            </figure>
        </div>
        <div class="col-lg-8 col-md-7 col-sm-12">
            <div class="room_details row-flex">
                <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                    <h5>No: <?= esc($hasil['kamar_id']) ?></h5><br>
                    <h3><a href="/bookingform"> <?= esc($hasil['nama']) ?> </a></h3>
                    <p>
                        <?= esc($hasil['deskripsi']) ?>
                    </p>
                    <div class="room_services">
                        <i class="fa fa-wifi" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Free WiFi" data-original-title="WiFi"></i>
                        <i class="fa fa-television" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Plasma TV with cable Channel" data-original-title="Plasma TV"></i>
                        <i class="fa fa-cutlery" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Restaurant" data-original-title="Restaurant"></i>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                    <div class="room_price_inner">
                        <span class="room_price_number"> Rp<?= number_format(esc($hasil['harga']), 0, "", ".") ?> </span>
                        <small class="upper"> per Month </small>
                        <a href="/<?= esc($hasil['kamar_id'], 'url') ?>" class="button  btn_blue btn_full upper">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>