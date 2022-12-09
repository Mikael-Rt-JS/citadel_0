<div class="header_menu">
    <nav class="list_menu"></nav>
    
    <?php if(isset($_SESSION['client'])){ ?>
        <?php if($_SESSION['client']['admin']==="1"){ ?>
            <div class="client">
                <img class="client_avatar" src="<?=UPLOADER.'avatar-default-icon.png';?>" title="" alt=""/>
                <span><?=$_SESSION['client']['username'];?></span>
                <a class="logout" href="<?= MAIN_PATH.'/logout';?>">Log out</a>
            </div>
        <?php }else if($_SESSION['client']['admin']==="0"){ ?>
            <div class="client">
                <a class="logout" href="<?= MAIN_PATH.'/logout';?>">Log out</a>
            </div>
        <?php } ?>
    <?php } ?>
    
    
    <?php if(!isset($_SESSION['client'])){ ?>
        <div class="btn_group">
            <?php if($urlCutData!=='signin' && $urlCutData!=='signup'){ ?>
                <a href="<?= MAIN_PATH.'/signin';?>">signin</a>
                <a href="<?= MAIN_PATH.'/signup';?>">signup</a>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="menu-btn" id="brgMenu">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<div class="menu">
    <nav class="left_menu"></nav>
</div>

<!-- lang('EN')['menu'][0]; -->