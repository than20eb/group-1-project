<?php
require_once __DIR__ . "/../../Template.php";

Template::header("Profile");
?>

<p>
    Logged in as <b><?= $this->user->username ?></b>
</p>

<?php if ($this->user->premium === 1) : ?>
    <p>(admin user)</p>
<?php endif; ?>

<form action="<?= $this->home ?>/auth/premium" method="post">
    <input type="submit" value="Update to Premium" class="btn">
</form>

<?php if ($this->user->premium === 1) : ?>
    <form action="<?= $this->home ?>/auth/location" method="post">
        <input type="text" name="location" placeholder="Save your Location"> <br> 
        <input type="submit" value="Set Location" class="btn">
    </form> 
<?php endif; ?>


<h2>Profile Settings</h2>
<form action="<?= $this->home ?>/auth/logout" method="post">
    <input type="submit" value="Log out" class="btn delete-btn">
</form>

<!-- 
<form action="<?= $this->home ?>/auth/delete" method="post">
    <input type="submit" value="Delete" class="btn delete-btn">
</form> -->

<?php Template::footer(); ?>