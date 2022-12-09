<h1><?= ucfirst($urlCutData); ?> page</h1>
<form action="<?=MAIN_PATH;?>/signin" method="post">
    <p class="errMsg"><?php if(isset($errMsg['auth'])) echo $errMsg['auth'];?></p>

    <label>Your email:</label>
    <input type="text" placeholder="Your email" name="email" class="" value="<?= $email; ?>"/>
    <p class="errMsg"><?php if(isset($errMsg['email'])) echo $errMsg['email'];?></p>

    <label>Your password</label>
    <input type="password" placeholder="Your password" name="password" class="" />
    <p class="errMsg"><?php if(isset($errMsg['password'])) echo $errMsg['password'];?></p>

    <input type="submit" value="signin"/>
    <a href="<?=MAIN_PATH;?>/signup">Signup</a>
</form>