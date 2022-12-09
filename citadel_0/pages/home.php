<?php 
include './blocks/doctype.php'; 
global $route;
?>
    <title>Home page</title>
    <?php for($i=0;$i<count($route->routePage['home']['filesCss']);$i++){   ?>
        <link href="<?= CSS.$route->routePage['home']['filesCss'][$i];?>" rel="stylesheet" type="text/css" />
    <?php } ?>

</head>
<body>
    <?php for($i=0;$i<count($route->routePage['home']['filesBlock']);$i++){ 
        include BLOCKS.$route->routePage['home']['filesBlock'][$i];    
    } ?>

    <?php for($i=0;$i<count($route->routePage['home']['filesJS']);$i++){ ?>
        <script src="<?= JS.$route->routePage['home']['filesJS'][$i];?>"></script>
    <?php } ?>
    
</body>
</html>