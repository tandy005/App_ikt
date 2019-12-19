<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h3 style="text-align : center"> Daftar DN</h3>
    <table border="1">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NO DN</th>
            <th scope="col">TUJUAN</th>
            <th scope="col">TGL DITERIMA</th>
            <th scope="col">TGL KIRIM</th>
            <th scope="col">STATUS</th>

        </tr>

        <?php
        $no = 1;
        foreach ($delivery as $dn) : ?>


            <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><?= $dn['no_dn'] ?></td>
                <td><?= $dn['tujuan'] ?></td>
                <td><?= $dn['tgl_diterima'] ?></td>
                <td><?= $dn['tgl_kirim'] ?></td>
                <td><?= $dn['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>


</body>

</html>