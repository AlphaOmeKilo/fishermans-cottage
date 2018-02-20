
      <footer class="site-footer">
      </footer>
    </div><!-- .wrap -->

    <?php wp_footer(); ?>

    <?php if ( ENVIRONMENT == 'development' ): ?>
      <script type="text/javascript" src="<?php fc_include( 'dist/js/main.js', true ) ?>"></script>
    <?php else : ?>
      <script type="text/javascript" src="<?php fc_include( 'dist/js/main.min.js', true ) ?>"></script>
    <?php endif ?>
  </body>
</html>
