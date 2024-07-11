<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Data Barang</h3>
    <?php echo $this->session->flashdata('message'); ?>
    <form action="<?php echo base_url() . 'admin/data_barang/update'; ?>" method="post" enctype="multipart/form-data">

        <?php foreach ($barang as $brg) : ?>

            <input type="hidden" name="id_brg" value="<?php echo $brg->id_brg; ?>">

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg; ?>">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan; ?>">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="Elektronik" <?php if ($brg->kategori == 'Elektronik') {
                                                    echo 'selected';
                                                } ?>>Elektronik</option>
                    <option value="Pakaian Pria" <?php if ($brg->kategori == 'Pakaian Pria') {
                                                        echo 'selected';
                                                    } ?>>Pakaian Pria</option>
                    <option value="Pakaian Wanita" <?php if ($brg->kategori == 'Pakaian Wanita') {
                                                        echo 'selected';
                                                    } ?>>Pakaian Wanita</option>
                    <option value="Pakaian Anak" <?php if ($brg->kategori == 'Pakaian Anak') {
                                                        echo 'selected';
                                                    } ?>>Pakaian Anak</option>
                    <option value="Peralatan Olahraga" <?php if ($brg->kategori == 'Peralatan Olahraga') {
                                                            echo 'selected';
                                                        } ?>>Peralatan Olahraga</option>
                </select>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga; ?>">
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok; ?>">
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <?php if ($brg->gambar_brg != NULL) { ?>
                    <br>
                    <img src="<?php echo base_url('uploads/' . $brg->gambar_brg); ?>" width="100px">
                    <br><br>
                <?php } ?>
                <input type="file" name="gambar_brg" class="form-control" value="<?php echo $brg->gambar_brg; ?>">
            </div>

        <?php endforeach; ?>

        <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>

    </form>

</div>