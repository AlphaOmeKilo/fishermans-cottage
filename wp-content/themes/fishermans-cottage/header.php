<!DOCTYPE html>
<html <?php language_attributes() ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <!--noptimize--><!--
      ╔══╦═╦╦╗╔══╦═╦╗ ╔╦═╦╗╔═╦═╦═╦═╦══╗╔╦══╦══╗
      ║╔╗║║║╔╝╚╗╗║╦╣╚╦╝║╦╣║║║║╬║╦╣╬║══╣║╠╗╔╩╗╗║
      ║╠╣║║║╚╗╔╩╝║╩╬╗║╔╣╩╣╚╣║║╔╣╩╣╗╬══║║╚╣║╔╩╝║
      ╚╝╚╩═╩╩╝╚══╩═╝╚═╝╚═╩═╩═╩╝╚═╩╩╩══╝╚═╩╝╚══╝
    --><!--/noptimize-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title( '' ) ?></title>

    <?php if ( ENVIRONMENT == 'development' ): ?>
      <link rel="stylesheet" href="<?php fc_include( 'dist/css/application.css', true ) ?>" type="text/css" media="screen">
    <?php else: ?>
      <link rel="stylesheet" href="<?php fc_include( 'dist/css/application.min.css', true ) ?>" type="text/css" media="screen">
    <?php endif ?>

    <?php wp_head() ?>

    <link rel="shortcut icon" sizes="16x16 32x32" href="<?php echo site_url() ?>/favicon.ico">
  </head>
  <body <?php body_class() ?>>
    <script type="text/javascript">
      document.body.className = document.body.className + ' loading';// hide body until dom is ready, but only for browsers that support JS
    </script>

    <div class="wrap">
      <header class="site-header"></header>
