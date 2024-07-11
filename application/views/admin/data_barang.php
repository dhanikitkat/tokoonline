<div class="container-fluid">
    <div class="col-6">
        <?php echo $this->session->flashdata('message'); ?>
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_barang"><i class="fa fa-plus"></i> Tambah Barang</button>
        <a href="<?php echo base_url('admin/data_barang/print') ?>" class="btn btn-sm btn-outline-secondary"><i class="fa fa-print"> Print</i></a>
        <!-- Example single danger button -->
        <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-download"> </i> Export
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo base_url('admin/data_barang/pdf') ?>"> PDF</a>
            <a class="dropdown-item" href="<?php echo base_url('admin/data_barang/excel') ?>"> Excel</a>
        </div>
    </div>
    <br>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar Barang</th>
            <th colspan="3">Aksi</th>

        </tr>
        <?php $no = 1;
        foreach ($barang as $brg) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $brg->nama_brg ?></td>
                <td><?php echo $brg->keterangan ?></td>
                <td><?php echo $brg->kategori ?></td>
                <td><?php echo $brg->harga ?></td>
                <td><?php echo $brg->stok ?></td>
                <td><?php echo $brg->gambar_brg ?></td>
                <td>
                    <div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>
                </td>
                <td> <?php echo anchor('admin/data_barang/edit/' . $brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
                <td>
                    <a href="<?php echo base_url('admin/data_barang/hapus/' . $brg->id_brg) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus barang ini?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_brg" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control" required>
                            <option value="">Pilih kategori</option>
                            <option value="Pakaian_Pria">Pakaian Pria</option>
                            <option value="Pakaian_Wanita">Pakaian Wanita</option>
                            <option value="Pakaian_Anak">Pakaian Anak</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Peralatan_Olahraga">Peralatan Olahraga</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" name="stok" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar Produk</label> <br>
                        <input type="file" name="gambar_brg" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>