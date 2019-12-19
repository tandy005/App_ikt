<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <h3>Form tambah DN</h3>

            <form action="" method="post" class="mt-3">


                <div class="form-group">
                    <label for="no_dn">NO DN </label>
                    <input type="text" class="form-control" name="no_dn" autocomplete="off">
                    <small class="form-text text-danger"><?= form_error('no_dn') ?></small>
                </div>


                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <select class="custom-select" id="tujuan" name="tujuan">

                        <?php foreach ($tujuan as $j) : ?>
                            <?php if ($j == $tujuan['tujuan']) : ?>
                                <option value="<?= $j; ?>" selected> <?= $j; ?> </option>

                            <?php else : ?>
                                <option value="<?= $j; ?>"> <?= $j; ?> </option>

                            <?php endif; ?>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal">TGL Diterima </label>
                    <input type="text" class="form-control tanggal" id="tgl" name="tgl_diterima" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="custom-select" id="status" name="status">

                        <?php foreach ($status as $j) : ?>
                            <?php if ($j == $status['status']) : ?>
                                <option value="<?= $j; ?>" selected> <?= $j; ?> </option>

                            <?php else : ?>
                                <option value="<?= $j; ?>"> <?= $j; ?> </option>

                            <?php endif; ?>
                        <?php endforeach; ?>

                    </select>
                </div>



                <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Delivery</button>
            </form>
        </div>
    </div>
</div>