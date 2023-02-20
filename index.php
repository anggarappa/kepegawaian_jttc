<?php
include 'functions.php';
$pdo = pdo_connect_mysql();


// $stmt = $pdo->prepare('SELECT * FROM kontak ORDER BY id LIMIT :current_page, :record_per_page');
$stmt = $pdo->prepare('SELECT jabatan.id_jabatan, jabatan.nama_jabatan, jabatan.gaji,
kontrak.nama, kontrak.jenis_kelamin, kontrak.lama_kontrak FROM jabatan INNER JOIN kontrak ON jabatan.id_jabatan=kontrak.id_kontrak;');
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<?=template_header('Read')?>

<div class="content read">
	<h2>Read Data</h2>
    <a href="jabatan.php" class="create-contact">Data Jabatan</a>
    <a href="kontrak.php" class="create-contact">Data Kontrak</a>
	<table>
        <thead>
            <tr>
                <td>id</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Jabatan</td>
                <td>Lama kontrak</td>
                <td>Gaji</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id_jabatan']?></td>
                <td><?=$contact['nama']?></td>
                <td><?=$contact['jenis_kelamin']?></td>
                <td><?=$contact['nama_jabatan']?></td>
                <td><?=$contact['lama_kontrak']?> Tahun</td>
                <td><?=$contact['gaji']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?=template_footer()?>