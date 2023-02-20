<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id_kontrak'])) {
    $stmt = $pdo->prepare('SELECT * FROM kontrak WHERE id_kontrak = ?');
    $stmt->execute([$_GET['id_kontrak']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM kontrak WHERE id_kontrak = ?');
            $stmt->execute([$_GET['id_kontrak']]);
            $msg = 'Berhasil hapus data kontrak!';
        } else {
            header('Location: kontrak.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Contact #<?=$contact['id_kontrak']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete contact #<?=$contact['id_kontrak']?>?</p>
    <div class="yesno">
        <a href="delete_kontrak.php?id_kontrak=<?=$contact['id_kontrak']?>&confirm=yes">Yes</a>
        <a href="delete_kontrak.php?id_kontrak=<?=$contact['id_kontrak']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>