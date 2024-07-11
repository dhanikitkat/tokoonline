<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Invoice</h1>
    <div class="col-6">
        <?php echo $this->session->flashdata('message'); ?>
        <a href="<?php echo base_url('admin/invoice/print') ?>" class="btn btn-sm btn-outline-secondary"><i class="fa fa-print"> Print</i></a>
        <!-- Example single danger button -->
        <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-download"> </i> Export
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo base_url('admin/invoice/pdf') ?>"> PDF</a>
            <a class="dropdown-item" href="<?php echo base_url('admin/invoice/excel') ?>"> Excel</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>Id Invoice</th>
                    <th>Nama Pemesan</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Kurir</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Batas Pembayaran</th>
                    <th>Aksi</th>
                </tr>
                <?php
                foreach ($invoice as $inv) : ?>
                    <tr>
                        <td><?php echo $inv->id ?></td>
                        <td><?php echo $inv->nama ?></td>
                        <td><?php echo $inv->alamat ?></td>
                        <td><?php echo $inv->no_telp ?></td>
                        <td><?php echo $inv->kurir ?></td>
                        <td><?php echo $inv->metode_pembayaran ?></td>
                        <td><?php echo $inv->tgl_pesan ?></td>
                        <td><?php echo $inv->batas_bayar ?></td>
                        <td><?php echo anchor('admin/invoice/detail/' . $inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>