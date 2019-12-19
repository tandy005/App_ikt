<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <h3>Form Ubah DN</h3>

            <form action="" method="post" class="mt-3">

                <input type="hidden" class="form-control" name="id" autocomplete="off" value="<?= $delivery['id']; ?>">
                <div class=" form-group">
                    <label for="no_dn">NO DN </label>
                    <input type="text" class="form-control" name="no_dn" autocomplete="off" value="<?= $delivery['no_dn']; ?>">
                    <small class="form-text text-danger"><?= form_error('no_dn') ?></small>
                </div>


                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <select class="custom-select" id="tujuan" name="tujuan" value="<?= $delivery['tujuan']; ?>">

                        <?php foreach ($tujuan as $j) : ?>
                            <?php if ($j == $delivery['tujuan']) : ?>
                                <option value="<?= $j; ?>" selected> <?= $j; ?> </option>

                            <?php else : ?>
                                <option value="<?= $j; ?>"> <?= $j; ?> </option>

                            <?php endif; ?>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="tgl_diterima">Tanggal Diterima </label>
                    <input type="text" class="form-control tanggal" id="tgl_diterima" name="tgl_diterima" value="<?= $delivery['tgl_diterima']; ?>">
                </div>


                <div class="form-group">
                    <label for="tgl_kirim">Tanggal Kirim </label>
                    <input type="text" class="form-control tanggal" id="tgl_kirim" name="tgl_kirim" value="<?= $delivery['tgl_kirim']; ?>">
                </div>


                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="custom-select" id="status" name="status">

                        <?php foreach ($status as $j) : ?>
                            <?php if ($j == $delivery['status']) : ?>
                                <option value="<?= $j; ?>" selected> <?= $j; ?> </option>

                            <?php else : ?>
                                <option value="<?= $j; ?>"> <?= $j; ?> </option>

                            <?php endif; ?>
                        <?php endforeach; ?>

                    </select>
                </div>



                <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Delivery</button>
            </form>
        </div>
    </div>
</div>