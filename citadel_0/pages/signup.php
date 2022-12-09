<?php 
include MANAG.ucfirst($urlCutData).'.php'; 
include './blocks/doctype.php'; 
global $route;

?>
    <title><?= ucfirst($urlCutData); ?> page</title>
    <?php for($i=0;$i<count($route->routePage[$urlCutData]['filesCss']);$i++){   ?>
        <link href="<?= CSS.$route->routePage[$urlCutData]['filesCss'][$i];?>" rel="stylesheet" type="text/css" />
    <?php } ?>

</head>
<body>
    <?php for($i=0;$i<count($route->routePage[$urlCutData]['filesBlock']);$i++){ 
        include BLOCKS.$route->routePage[$urlCutData]['filesBlock'][$i];    
    } ?>

    <?php for($i=0;$i<count($route->routePage[$urlCutData]['filesJS']);$i++){ ?>
        <script src="<?= JS.$route->routePage[$urlCutData]['filesJS'][$i];?>"></script>
    <?php } ?>
</body>
</html>
