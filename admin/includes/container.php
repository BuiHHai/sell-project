<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <title>Manager admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
 
    <!-- Liên kết Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>bootstrap/css/bootstrap.min.css"/>  -->
    <!-- css system -->
    <link rel="stylesheet" type="text/css" href="<?php echo $_DOMAIN; ?>css/style-admin.css"/>
    <!-- font-awesome -->
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>font-awesome-4.7.0/css/font-awesome.min.css">
 
    <!-- Liên kết thư viện jQuery -->
    <script src="<?php echo $_DOMAIN; ?>js/jquery.min.js"></script>        
</head>
<body>
    <div class="container">
       <?php 
		require_once 'includes/sidebar.php';
     	?>
     	<div class="content">
     		<?php 
     			require_once 'includes/header.php';
     			require_once 'includes/content.php';
				require_once 'includes/footer.php';
     		 ?>

     	</div>
    </div>

        <!-- Liên kết thư viện jQuery Form -->
    <!-- <script src="<?php echo $_DOMAIN; ?>js/jquery.form.min.js"></script>   -->
</body>
</html>
   