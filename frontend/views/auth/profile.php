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



<form action="<?= $this->home ?>/auth/update" method="post">
    <input type="password" name="password" placeholder="Password"> <br>
    <input type="password" name="confirm_password" placeholder="Confirm password"> <br>
    <input type="submit" value="Update Password" class="btn">
</form>

<form action="<?= $this->home ?>/auth/logout" method="post">
    <input type="submit" value="Log out" class="btn delete-btn">
</form>


<?php Template::footer(); ?>