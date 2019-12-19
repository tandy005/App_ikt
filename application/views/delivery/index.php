<div class="container">

    <?php if ($this->session->flashdata('flash')) : ?>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    DN
                    <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>

    <?php endif ?>




    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url() ?>/delivery/tambah" class="btn-sm btn-danger"><i class=" fas fa-plus fa-sm"></i>Tambah DN</a>
            <a href="<?= base_url() ?>/delivery/print_dn" class="btn-sm btn-primary"><i class=" fas fa-print fa-md"></i> Print</a>
            <a href="<?= base_url() ?>/delivery/print_pdf" class="btn-sm btn-warning"><i class=" fas fa-file fa-md"></i> PDF</a>
            <a href="<?= base_url() ?>/delivery/excel" class="btn-sm btn-success"><i class=" fas fa-print fa-md"></i> Excel</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-5">
            <form action="<?= base_url('delivery') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari......." name="key" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-outline-danger" type="submit" name="submit"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <table class="table table-striped mt-2">
            <h5>Results : <?= $total_rows ?></h5>
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NO DN</th>
                    <th scope="col">TUJUAN</th>
                    <th scope="col">TGL DITERIMA</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">TGL_KIRIM</th>
                    <th colspan="2">AKSI</th>

                </tr>
            </thead>
            <tbody>

                <?php if (empty($delivery)) : ?>

                    <tr>
                        <td colspan="7">
                            <div class="alert alert-danger" role="alert">
                                Data Tidak Ada
                            </div>
                        </td>
                    </tr>

                <?php endif; ?>

                <?php
                foreach ($delivery as $dn) : ?>


                    <tr>
                        <th scope="row"><?= ++$start ?></th>
                        <td><?= $dn['no_dn'] ?></td>
                        <td><?= $dn['tujuan'] ?></td>
                        <td><?= $dn['tgl_diterima'] ?></td>
                        <td><?= $dn['status'] ?></td>
                        <td><?= $dn['tgl_kirim'] ?></td>

                        <td>
                            <a href="<?= base_url(); ?>/delivery/ubah/<?= $dn['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        </td>
                        <td>
                            <a href="<?= base_url(); ?>/delivery/hapus/<?= $dn['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin AKan dihapus >');"><i class=" fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>

                <?php endforeach ?>

            </tbody>
        </table>
    </div>
    <?= $this->pagination->create_links(); ?>
</div>