<?php $this->load->view('static/gallery/gallery_header'); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php $images = $this->gallery_m->get_images_url(); ?>
<!-- <div class="container">
    <h1>Bootstrap Image Gallery Demo</h1>
    <blockquote>
        <p>Bootstrap Image Gallery is an extension to <a href="http://blueimp.github.io/Gallery/">blueimp Gallery</a>, a touch-enabled, responsive and customizable image &amp; video gallery.<br>It displays images and videos in the modal dialog of the <a href="http://getbootstrap.com/">Bootstrap</a> framework, features swipe, mouse and keyboard navigation, transition effects, fullscreen support and on-demand content loading and can be extended to display additional content types.</p>
    </blockquote>
    <form class="form-inline">
        <!-- <div class="form-group">
            <button id="video-gallery-button" type="button" class="btn btn-success btn-lg">
                <i class="glyphicon glyphicon-film"></i>
                Launch Video Gallery
            </button>
        </div> 
        <div class="form-group">
            <button id="image-gallery-button" type="button" class="btn btn-primary btn-lg">
                <i class="glyphicon glyphicon-picture"></i>
                Launch Image Gallery
            </button>
        </div>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-success btn-lg">
            <i class="glyphicon glyphicon-leaf"></i>
            <input id="borderless-checkbox" type="checkbox"> Borderless
          </label>
          <label class="btn btn-primary btn-lg">
            <i class="glyphicon glyphicon-fullscreen"></i>
            <input id="fullscreen-checkbox" type="checkbox"> Fullscreen
          </label>
        </div>
    </form>
    <br>
    <!-- The container for the list of example images 
    <div id="links">
        <?php if(isset($images) && count($images)):  
        foreach($images as $image): ?>
                <a class="" href="<?php echo $image['img_url']; ?>" title="<?php echo $image['img_title']; ?>" data-gallery>
                    <img class="img-thumbnail" src="<?php echo $image['thumb_url']; ?>" alt="<?php echo $image['img_title']; ?>">
                </a> 
    <?php endforeach; else: ?>
        <div id="blank_gallery">Galeria tymczasowo jest pusta</div>
    <?php endif; ?>
    </div>
   
</div>-->
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<!--<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <!--<div class="slides"></div>
    <!-- Controls for the borderless lightbox 
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>-->
    <!-- The modal dialog, which will be used to wrap the lightbox content 
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container-fluid container_center">
    <?php $this->load->view('inc/strap_top'); ?>
    <?php $this->load->view('inc/strap_logo'); ?>
    <?php $this->load->view('inc/menu'); ?>
    <div class="row body_row row_subview">
        <div class="col-lg-9 left_body"> 
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="gallery_heading">Galeria</h2>
                    <form class="form-inline">
                        <!-- <div class="form-group">
                            <button id="video-gallery-button" type="button" class="btn btn-success btn-lg">
                                <i class="glyphicon glyphicon-film"></i>
                                Launch Video Gallery
                            </button>
                        </div> -->
                        <div class="form-group">
                            <button id="image-gallery-button" type="button" class="btn btn-primary btn-lg no_border_radius">
                                <i class="glyphicon glyphicon-picture"></i>
                                Uruchom galerię
                            </button>
                        </div>
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-success btn-lg no_border_radius">
                            <i class="glyphicon glyphicon-leaf"></i>
                            <input id="borderless-checkbox" type="checkbox"> Bez krawędzi
                          </label>
                          <label class="btn btn-primary btn-lg no_border_radius">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                            <input id="fullscreen-checkbox" type="checkbox"> Pełny ekran
                          </label>
                        </div>
                    </form>
                </div>              
            </div>
            <div class="bottom_space"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="links">
                        <?php if(isset($images) && count($images)):  
                        foreach($images as $image): ?>
                                <a class="" href="<?php echo $image['img_url']; ?>" title="<?php echo $image['img_title']; ?>" data-gallery>
                                    <img class="no_border_radius" src="<?php echo $image['thumb_url']; ?>" alt="<?php echo $image['img_title']; ?>">
                                </a> 
                        <?php endforeach; else: ?>
                            <div id="blank_gallery">Galeria tymczasowo jest pusta</div>
                        <?php endif; ?>
                    </div>
                </div>    
            </div>          
        </div>

        <div class="col-lg-3 right_body">
            <?php $this->load->view('inc/right_body'); ?>   
        </div> <!-- right body -->
    </div>
</div>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('inc/modals'); ?>
<?php $this->load->view('inc/footer_s'); ?>

<?php $this->load->view('static/gallery/gallery_footer'); ?>