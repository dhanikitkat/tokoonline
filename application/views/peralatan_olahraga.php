<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url('assets/img/slider1.png') ?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url('assets/img/slider2.png') ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url('assets/img/slider3.png') ?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row">
        <?php foreach ($peralatan_olahraga as $brg) : ?>
            <div class="col-sm-3 mb-3">
                <div class="card shadow-lg" style="width: 18rem;">
                    <img class="card-img-top" src="<?php echo base_url() . '/uploads/' . $brg->gambar_brg ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $brg->nama_brg ?></h5>
                        <small><?php echo $brg->keterangan ?></small>
                        <span class="badge badge-success">Rp <?php echo number_format($brg->harga, 0, ',', '.')  ?></span><br>
                        <?php echo anchor('dashboard/tambah_keranjang/' . $brg->id_brg, '<div class="btn btn-sm btn-primary"><i class="fa-regular fa-plus"></i> Keranjang</div>') ?>
                        <?php echo anchor('dashboard/detail/' . $brg->id_brg, '<div class="btn btn-sm btn-success"><i class="fa-solid fa-circle-info"></i> Detail</div>') ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>