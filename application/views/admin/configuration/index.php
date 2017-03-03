<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">
		<h3>Konfiguracja CMS</h3>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Informacje</h4>
      <p class="cmf_pr" id="cmscfg_sh_10">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_10">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_10">
        <p>Aby strona była lepiej pozycjonowana:</p>
        <div class="clearfix"></div>
        -zgodnie z prawdą uzupełniaj "description" oraz "keywords" <br>
        -w miarę możliwości udostępniaj treść na Google+ <br>
        -połącz ze sobą jak najwięcej serwisów społecznościowych <br>
      </div>
    </div>
    <hr>
		<div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Nazwa CMS</h4>
      <p class="cmf_pr" id="cmscfg_sh">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form">
        <?php echo form_open('admin/configuration/cmsname'); ?>
        <?php echo form_input('name', set_value('name', $cmsconfig->name),'class="input_wp"'); ?>
        <div class="clearfix"></div>
        <?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary no_border_radius btn_save_data btn_cmsconfig"'); ?>
        <?php echo form_close();?>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Regulamin</h4>
      <p class="cmf_pr" id="cmscfg_sh_2">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_2">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_2">
        <?php echo form_open('admin/configuration/cmsregulamin'); ?>
        <?php echo form_textarea('regulamin', set_value('regulamin', $cmsconfig->regulamin),'id="ckeditor" rows="4"'); ?>
        <div class="clearfix"></div>
        <?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary no_border_radius btn_save_data btn_cmsconfig btn-block"'); ?>
        <?php echo form_close();?>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Ikona</h4>
      <p class="cmf_pr" id="cmscfg_sh_3">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_3">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_3">
        <p>Plik musi mieć rozmiary 16x16 i rozszerzenie .ico</p>
        <div class="clearfix"></div>
        <?php echo form_open_multipart('admin/configuration/upload_icon');; ?>
        <?php echo form_upload('userfile','','class="input_file"'); ?>
        <div class="clearfix"></div>
        <?php echo form_submit('upload', 'Zapisz', 'class="btn btn-primary no_border_radius btn_cmsconfig btn_save_data"'); ?>
        <?php echo form_close();?>
       </div> 
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Logo</h4>
      <p class="cmf_pr" id="cmscfg_sh_4">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_4">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_4">
        <div class="old_logo">
          <img src="<?php echo site_url() . $cmsconfig->cmslogo; ?>" alt="">
        </div>
        <?php echo form_open_multipart('admin/configuration/upload_logo');; ?>
        <?php echo form_upload('userfile','','class="input_file"'); ?>
        <div class="clearfix"></div>
        <?php echo form_submit('upload', 'Zapisz', 'class="btn btn-primary no_border_radius btn_cmsconfig btn_save_data"'); ?>
        <?php echo form_close();?>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Facebook</h4>
      <p class="cmf_pr" id="cmscfg_sh_5">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_5">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_5">
        <div class="col-lg-6">
          <p>Podaj link do fanpage</p>
          <div class="clearfix"></div>
          <?php echo form_open('admin/configuration/facebook_link'); ?>
          <?php echo form_input('fb_link', '','class="input_wp"'); ?>
          <div class="clearfix"></div>
          <?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary no_border_radius btn_cmsconfig btn_save_data"'); ?>
          <?php echo form_close();?>
        </div>
        <div class="col-lg-6">
          <div class="fb-like-box" data-href="<?php echo $cmsconfig->fb_link; ?>" data-colorscheme="dark" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" data-width="270"></div>
        </div>
       </div> 
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Post dnia</h4>
      <p class="cmf_pr" id="cmscfg_sh_6">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_6">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_6">
        <p>Aktualny post dnia:</p>
        <div class="clearfix"></div>
        <p><?php echo $cmsconfig->today_post; ?></p>
        <div class="clearfix"></div>
        <?php echo form_open('admin/configuration/today_post'); ?>
        <?php echo form_dropdown('todaypost', $tod_post,'class="input_wp"'); ?>
        <div class="clearfix"></div>
        <?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary no_border_radius btn_cmsconfig btn_save_data"'); ?>
        <?php echo form_close();?>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">O serwisie</h4>
      <p class="cmf_pr" id="cmscfg_sh_7">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_7">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_7">
        <?php echo form_open('admin/configuration/about_service'); ?>
        <?php
          $data_textarea = array(
            'name' => 'about_service',
            'value' => $cmsconfig->about,
            'class' => 'input_about',
            'rows' => 10,
            'cols' => 113
          );
         echo form_textarea($data_textarea); ?>
        <div class="clearfix"></div>
        <?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary no_border_radius btn_cmsconfig btn_save_data btn-block"'); ?>
        <?php echo form_close();?>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Description</h4>
      <p class="cmf_pr" id="cmscfg_sh_8">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_8">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_8">
        <p>Opisz w maksymalnie 10 słowach zawartość strony. *Ważne przy pozycjonowaniu strony.</p>
        <div class="clearfix"></div>
          <?php echo form_open('admin/configuration/description'); ?>
            <?php
              $data_textarea = array(
                'name' => 'description',
                'value' => $cmsconfig->description,
                'class' => 'input_about',
                'rows' => 10,
                'cols' => 113
              );
           echo form_textarea($data_textarea); ?>
          <div class="clearfix"></div>
          <?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary no_border_radius btn_cmsconfig btn_save_data btn-block"'); ?>
          <?php echo form_close();?>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Keywords</h4>
      <p class="cmf_pr" id="cmscfg_sh_9">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_9">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_9">
        <p>Podaj słowa kluczowe oddzielone przecinkami. *Pamiętaj, aby podawać tylko słowa związane z treścią strony. Słowa niezgodne z treścią działają negatywnie na pozycjonowanie strony.</p>
        <div class="clearfix"></div>
          <?php echo form_open('admin/configuration/keywords'); ?>
            <?php
              $data_textarea = array(
                'name' => 'keywords',
                'value' => $cmsconfig->keywords,
                'class' => 'input_about',
                'rows' => 10,
                'cols' => 113
              );
           echo form_textarea($data_textarea); ?>
          <div class="clearfix"></div>
          <?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary no_border_radius btn_cmsconfig btn_save_data btn-block"'); ?>
          <?php echo form_close();?>
      </div>
    </div>
    <hr>
	</div>
</div>
<div class="bottom_space"></div>
