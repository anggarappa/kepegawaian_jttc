<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id_jabatan'])) {
    $stmt = $pdo->prepare('SELECT * FROM jabatan WHERE id_jabatan = ?');
    $stmt->execute([$_GET['id_jabatan']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM jabatan WHERE id_jabatan = ?');
            $stmt->execute([$_GET['id_jabatan']]);
            $msg = 'Berhasil hapus data jabatan!';
        } else {
            header('Location: jabatan.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Contact #<?=$contact['id_jabatan']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete contact #<?=$contact['id_jabatan']?>?</p>
    <div class="yesno">
        <a href="delete_jabatan.php?id_jabatan=<?=$contact['id_jabatan']?>&confirm=yes">Yes</a>
        <a href="delete_jabatan.php?id_jabatan=<?=$contact['id_jabatan']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>