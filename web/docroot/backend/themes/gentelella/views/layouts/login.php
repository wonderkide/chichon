<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chichon | Login</title>

    <!-- Bootstrap -->
    <link href="<?= Yii::$app->assetManager->getPublishedUrl('@gtlAsset'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= Yii::$app->assetManager->getPublishedUrl('@gtlAsset'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= Yii::$app->assetManager->getPublishedUrl('@gtlAsset'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= Yii::$app->assetManager->getPublishedUrl('@gtlAsset'); ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= Yii::$app->assetManager->getPublishedUrl('@gtlAsset'); ?>/build/css/custom.min.css" rel="stylesheet">
    
    <!-- update Theme Style -->
    <link href="<?= Yii::$app->assetManager->getPublishedUrl('@gtlAsset'); ?>/css/style.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
            <?php echo $content; ?>
        </div>
          
      </div>
    </div>
  </body>
</html>

