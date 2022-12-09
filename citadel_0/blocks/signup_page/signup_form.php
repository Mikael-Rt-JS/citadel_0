<h1><?= ucfirst($urlCutData); ?> page</h1>
<form action="<?=MAIN_PATH;?>/signup" method="post">
    <p class="signup_ok"><?=$signupStatus; ?></p>
    <label>Your userame:</label>
    <input type="text" placeholder="Your userame" name="username" class="" value="<?= $username; ?>"/>
    <p class="errMsg"><?php if(isset($errMsg['username'])) echo $errMsg['username'];?></p>

    <label>Your email:</label>
    <input type="text" placeholder="Your email" name="email" class="" value="<?= $email; ?>"/>
    <p class="errMsg"><?php if(isset($errMsg['email'])) echo $errMsg['email'];?></p>

    <label>Your password</label>
    <input type="password" placeholder="Your password" name="password" class=""/>
    <p class="errMsg"><?php if(isset($errMsg['password'])) echo $errMsg['password'];?></p>

    <label>Repeat password:</label>
    <input type="password" placeholder="Repeat password" name="repeat_password" class=""/>
    <p class="errMsg"><?php if(isset($errMsg['repeat_password'])) echo $errMsg['repeat_password'];?></p>

    <input type="submit" value="signup" name="signup"/>
    <a href="<?=MAIN_PATH;?>/signin">Signin</a>
</form>