<?php
require_once __DIR__ . "/../../Template.php";

Template::header("Profile");
?>
<h2>Profile Settings</h2>
<p>
    Hello <b><?= $this->user->username ?>!</b>
</p>

<?php if ($this->user->premium === 1) : ?>
    <p> Premium User Status</p>
<?php else : ?>
    <p> Would like to aquire Premium Status and save your location?</p>
<?php endif; ?>
<form action="<?= $this->home ?>/auth/premium" method="post">
    <input class="btn" type="submit" value="Change Status" >
</form>

<?php if ($this->user->premium === 1) : ?>
    Location: <b><?= $this->user->location ?></b>
    <form action="<?= $this->home ?>/auth/location" method="post">
        <input type="text" name="location" placeholder="Save your Location"> <br> 
        <input type="submit" value="Set Location" class="btn">
    </form> 
<?php endif; ?>



<form action="<?= $this->home ?>/auth/logout" method="post">
    <input type="submit" value="Log out" class="btn delete-btn">
</form>

<!-- 
<form action="<?= $this->home ?>/auth/delete" method="post">
    <input type="submit" value="Delete" class="btn delete-btn">
</form> -->

<?php Template::footer(); ?>