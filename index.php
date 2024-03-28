<?php
$data1 = ['nama' => 'Andi Santono', 'nim' => '0111111', 'nilai' => 95];
$data2 = ['nama' => 'Budi Kurniawan', 'nim' => '0111112', 'nilai' => 80];
$data3 = ['nama' => 'Candi Badur', 'nim' => '0111113', 'nilai' => 78];
$data4 = ['nama' => 'Denis Caputra', 'nim' => '0111114', 'nilai' => 76];
$data5 = ['nama' => 'Erik Manahel', 'nim' => '0111115', 'nilai' => 86];
$data6 = ['nama' => 'Fatril Nusanto', 'nim' => '0111116', 'nilai' => 50];
$data7 = ['nama' => 'Gayama Harustia', 'nim' => '0111117', 'nilai' => 20];
$data8 = ['nama' => 'Isma Lotono', 'nim' => '0111118', 'nilai' => 30];
$data9 = ['nama' => 'Jami Sayir', 'nim' => '0111119', 'nilai' => 70];
$data10 = ['nama' => 'Karni Buato', 'nim' => '0111110', 'nilai' => 65];

$ar_mahasiswa = [$data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10];

$ar_judul = ['No', 'Nama Mahasiswa', 'NIM', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

function tentukanGrade($nilai)
{
    if ($nilai >= 85) {
        return 'A';
    } elseif ($nilai >= 76) {
        return 'B';
    } elseif ($nilai >= 60) {
        return 'C';
    } elseif ($nilai >= 30) {
        return 'D';
    } else {
        return 'E';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Mahasiswa</title>
    <style>
        footer {
            padding: 20px;
            text-align: center;
            margin-top: 50px;
            background-color: yellowgreen;
        }
    </style>
</head>

<body>
    <h3 align="center">Data Nilai Mahasiswa</h3>
    <table border="1" cellpadding="10" cellspacing="2" width="100%">
        <thead>
            <tr>
                <?php foreach ($ar_judul as $judul) { ?>
                    <th><?= $judul ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total_nilai = 0;
            $jumlah_mahasiswa = count($ar_mahasiswa);
            $nilai_tertinggi = $ar_mahasiswa[0]['nilai'];
            $nilai_terendah = $ar_mahasiswa[0]['nilai'];

            foreach ($ar_mahasiswa as $mahasiswa) {
                $total_nilai += $mahasiswa['nilai'];
                if ($mahasiswa['nilai'] > $nilai_tertinggi) {
                    $nilai_tertinggi = $mahasiswa['nilai'];
                }
                if ($mahasiswa['nilai'] < $nilai_terendah) {
                    $nilai_terendah = $mahasiswa['nilai'];
                }
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $mahasiswa['nama'] ?></td>
                    <td><?= $mahasiswa['nim'] ?></td>
                    <td><?= $mahasiswa['nilai'] ?></td>
                    <td><?= ($mahasiswa['nilai'] >= 60) ? 'Lulus' : 'Tidak Lulus' ?></td>
                    <td><?= tentukanGrade($mahasiswa['nilai']) ?></td>
                    <td><?php
                        $grade = tentukanGrade($mahasiswa['nilai']);
                        switch ($grade) {
                            case 'A':
                                echo 'Sangat Memuaskan';
                                break;
                            case 'B':
                                echo 'Memuaskan';
                                break;
                            case 'C':
                                echo 'Cukup';
                                break;
                            case 'D':
                                echo 'Kurang';
                                break;
                            case 'E':
                                echo 'Sangat Kurang';
                                break;
                            default:
                                echo '-';
                                break;
                        }
                        ?></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot style="background-color: yellowgreen;">
            <tr>
                <td colspan="3" style="text-align: center;">Nilai Tertinggi</td>
                <td colspan="4" style="text-align: center;"><?= $nilai_tertinggi ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">Nilai Terendah</td>
                <td colspan="4" style="text-align: center;"><?= $nilai_terendah ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">Nilai Rata-rata</td>
                <td colspan="4" style="text-align: center;"><?= round($total_nilai / $jumlah_mahasiswa, 2) ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">Jumlah Mahasiswa</td>
                <td colspan="4" style="text-align: center;"><?= $jumlah_mahasiswa ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">Jumlah Keseluruhan Nilai</td>
                <td colspan="4" style="text-align: center;"><?= $total_nilai ?></td>
            </tr>
        </tfoot>
    </table>

    <footer>
        &copy; Jimmy Wira Arba'a
    </footer>
</body>

</html>