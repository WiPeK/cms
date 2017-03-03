<!-- <p class="pull-right">Strona wygenerowana dnia <strong><?php //echo date('Y-m-d H-i-s') ?></strong> w czasie <strong>{elapsed_time}</strong> sek</p> -->
<script>
	$(document).ready(function(){												
       	
      	// Initialize navgoco with default options
        $(".main-menu").navgoco({
            caret: '<span class="caret"></span>',
            accordion: false,
            openClass: 'open',
            save: true,
            cookie: {
                name: 'navgoco',
                expires: false,
                path: '/'
            },
            slide: {
                duration: 300,
                easing: 'swing'
            }
        });
  
        	
      });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
        <!--nice scroll -->
    <script src="<?php echo site_url() . 'assets/js/nicescroll/jquery.nicescroll.min.js'; ?>"></script>
    <script>
        var nice = false;
        $(document).ready(
          function() { 
            nice = $("html").niceScroll();
          }
        );
    </script>
</body>
</html>