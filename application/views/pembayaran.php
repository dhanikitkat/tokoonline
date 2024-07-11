<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "Total Belanja Anda Rp." . number_format($grand_total, 0, ',', '.');
                ?>
            </div> <br><br>
            <h3>Input Alamat Pengiriman dan Pembayaran</h3>
            <form action="<?php echo base_url() ?>dashboard/proses_pesanan" method="post">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Rangga El Bantani" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Alamat Tempat Tinggal</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" placeholder="No Telepon" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jasa Pengiriman</label>
                    <select class="form-control" name="kurir" required>
                        <option value="">Pilih salah satu</option>
                        <option value="JNE">JNE</option>
                        <option value="TIKI">TIKI</option>
                        <option value="JNT">JNT</option>
                        <option value="SiCepat">SiCepat</option>
                        <option value="Pos Indonesia">Pos Indonesia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select class="form-control" name="metode_pembayaran" required>
                        <option value="">Pilih salah satu</option>
                        <option value="BNI Virtual Account">BNI Virtual Account</option>
                        <option value="Mandiri Virtual Account">Mandiri Virtual Account</option>
                        <option value="BCA Virtual Account">BCA Virtual Account</option>
                        <option value="BRI Virtual Account">BRI Virtual Account</option>
                        <option value="QRIS">QRIS</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mb-3">Bayar</button>
            </form>
        <?php } else {
                    echo "<h4>Keranjang Anda Masih Kosong!</h4>";
                } ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>