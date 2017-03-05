<?php 

$theme_option = get_option('mistiri_theme_options');

//Title baner

add_shortcode('title_banner', 'title_banner_func');

function title_banner_func($atts, $content = null){

  extract(shortcode_atts(array(

    'banner_bg'     => '',

    'title_page'     => '',

    'subtitle_page'     => '',

    'style_title'     => '',

        ), $atts));

  $bantit_img = wp_get_attachment_image_src($banner_bg,'');

  ob_start(); 

  ?>

  <?php if($style_title=='center'){?>

       <div class="section-title text-center">

          <h1><?php echo esc_attr($title_page );?></h1>

          <h2><?php echo esc_attr($subtitle_page );?></h2>

      </div>

  <?php }else{?>

<div class="breadcrumb-section image-bg" <?php if(!empty($bantit_img)){?>style="background:url(<?php echo esc_url($bantit_img[0]) ?>);" <?php }else{}?>>

    <div class="overlay"></div>

    <div class="breadcrumb-content">

        <div class="container text-center">

            <h1><span><?php echo esc_attr($title_page );?></span></h1>

            <p><?php echo esc_attr($subtitle_page );?></p>

        </div>

    </div><!-- breadcrumb content -->

</div><!-- breadcrumb section --> 

<?php }?>

 <?php  return ob_get_clean();

} 







add_shortcode('portfolio_projectone', 'portfolio_projectone_func');

function portfolio_projectone_func($atts, $content = null){

  extract(shortcode_atts(array(

    'id_projectcat'     => '',

        ), $atts));

  $id_projectcats = explode(',' ,$id_projectcat);

  ob_start(); 

  ?>

 <div class="portfolio-section">

    <div class="portfolio-content">

        <div class="text-center container">

            <ul class="portfoli-menu">

                <li><a href="#" class="active" data-filter="*"><?php echo esc_html__( 'All Projects', 'mistiri' );?></a></li>

                <?php $arr_catproject = array(

                      'post_type' => 'project',

                      'posts_per_page' => -1,

                      'tax_query' => array(

                          array(

                          'taxonomy' => 'project_category',

                          'field' => 'id',

                          'terms' => $id_projectcats,

                           )

                        )

                    );

                    $terms = get_terms('project_category',array(

                      'include' => $id_projectcats,

                      'orderby' =>'ID',

                    ));



                     foreach ($terms as $term){?>

                    <li><a href="#" data-filter=".<?php echo esc_attr($term->slug );?>"><?php echo esc_attr($term->name);?></a></li>

                   

                    <?php }

                      

                    ?>

            </ul>

        </div> 

        <div class="row portfolio-filter">

          <?php

            $query_catproject = new WP_Query($arr_catproject);

            if($query_catproject->have_posts()) : while($query_catproject->have_posts()) : $query_catproject->the_post();

            $title_project = get_post_meta(get_the_ID(), '_cmb_title_project', true);

            $subtitle_project = get_post_meta(get_the_ID(), '_cmb_subtitle_project', true);

            $url_thumproject = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(),'project_category') );

                  $list_term  = '';

                 $project_terms = get_the_terms(get_the_ID(),'project_category');

                  

           ?>

          <div class="portfolio col-sm-6 col-md-3 no-padding <?php  foreach ($project_terms as $project_term){

                   echo esc_attr($project_term->slug);echo ' ';

                     }?>">

            <div class="portfolio-item">

              <img class="img-responsive" src="<?php echo esc_url($url_thumproject );?>" alt="<?php the_title_attribute();?>">

              <div class="portfolio-overlay">

                <div class="portfolio-info">

                  <h4><?php echo esc_attr($title_project);?></h4>

                  <p><?php echo esc_attr($subtitle_project);?></p>

                </div>

                <div class="portfolio-icons">

                  <a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>

                  <a class="image-link" href="<?php echo esc_url($url_thumproject );?>"><i class="fa fa-search"></i></a>

                </div>

              </div> 

            </div> <!-- portfolio-item -->                    

          </div> <!-- portfolio -->

            <?php endwhile;endif;?>

          

        </div> <!-- row -->

    </div> <!-- portfolio content -->

</div> <!-- portfolio section -->   

 <?php  return ob_get_clean();

} 



//Project portfolio not full width

add_shortcode('portfolio_projecttwo', 'portfolio_projecttwo_func');

function portfolio_projecttwo_func($atts, $content = null){

  extract(shortcode_atts(array(

    'id_projectcattwo'     => '',

        ), $atts));

  $id_projectcats = explode(',' ,$id_projectcattwo);

  ob_start(); 

  ?>

    <div class="portfolio-section">

      <div class="portfolio-content container">

          <div class="text-center">

              <ul class="portfoli-menu">

                  <li><a href="#" class="active" data-filter="*"><?php echo esc_html__( 'All Projects', 'mistiri' );?></a></li>

                <?php $arr_catproject = array(

                      'post_type' => 'project',

                      'posts_per_page' => -1,

                      'tax_query' => array(

                          array(

                          'taxonomy' => 'project_category',

                          'field' => 'id',

                          'terms' => $id_projectcats,

                           )

                        )

                    );

                    $terms = get_terms('project_category',array(

                      'include' => $id_projectcats,

                      'orderby' =>'ID',

                      ));



                     foreach ($terms as $term){?>

                    <li><a href="#" data-filter=".<?php echo esc_attr($term->slug );?>"><?php echo esc_attr($term->name);?></a></li>

                   

                    <?php }

                      

                    ?>

              </ul>

          </div> 

        <div class="row portfolio-filter portfolio-two">

          <?php

            $query_catproject = new WP_Query($arr_catproject);

            if($query_catproject->have_posts()) : while($query_catproject->have_posts()) : $query_catproject->the_post();

            $title_project = get_post_meta(get_the_ID(), '_cmb_title_project', true);

            $subtitle_project = get_post_meta(get_the_ID(), '_cmb_subtitle_project', true);

            $url_thumproject = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(),'project_category') );

                  $list_term  = '';

                 $project_terms = get_the_terms(get_the_ID(),'project_category');

                  

           ?>

          <div class="portfolio col-sm-6 <?php  foreach ($project_terms as $project_term){

                   echo esc_attr($project_term->slug);echo ' ';

                     }?>">

            <div class="portfolio-item">

              <img class="img-responsive" src="<?php echo esc_url($url_thumproject );?>" alt="<?php the_title_attribute();?>">

              <div class="portfolio-overlay">

                <div class="portfolio-info">

                  <h4><?php echo esc_attr($title_project );?></h4>

                  <p><?php echo esc_attr($subtitle_project );?></p>

                </div>

                <div class="portfolio-icons">

                  <a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>

                  <a class="image-link" href="<?php echo esc_url($url_thumproject );?>"><i class="fa fa-search"></i></a>

                </div>

              </div> 

            </div> <!-- portfolio-item -->                    

          </div> <!-- portfolio -->

                    

          <?php endwhile;endif;?>

        </div> <!-- row -->

    </div> <!-- portfolio content -->

</div> <!-- portfolio section --> 

   <?php  return ob_get_clean();

} 







//Project portfolio three row

add_shortcode('portfolio_projectthree', 'portfolio_projectthree_func');

function portfolio_projectthree_func($atts, $content = null){

  extract(shortcode_atts(array(

    'id_projectcatthree'     => '',

        ), $atts));

  $id_projectcats = explode(',' ,$id_projectcatthree);

  ob_start(); 

  ?>



   <div class="portfolio-section">

    <div class="portfolio-content container">

        <div class="text-center">

            <ul class="portfoli-menu">

                <li><a href="#" class="active" data-filter="*"><?php echo esc_html__( 'All Projects', 'mistiri' );?></a></li>

                <?php $arr_catproject = array(

                      'post_type' => 'project',

                      'posts_per_page' => -1,

                      'tax_query' => array(

                          array(

                          'taxonomy' => 'project_category',

                          'field' => 'id',

                          'terms' => $id_projectcats,

                           )

                        )

                    );

                    $terms = get_terms('project_category',array(

                      'include' => $id_projectcats,

                      'orderby' =>'ID',

                       ));



                     foreach ($terms as $term){?>

                    <li><a href="#" data-filter=".<?php echo esc_attr($term->slug );?>"><?php echo esc_attr($term->name);?></a></li>

                   

                    <?php }

                      

                    ?>

            </ul>

        </div> 

        <div class="row portfolio-filter portfolio-two">

             <?php

            $query_catproject = new WP_Query($arr_catproject);

            if($query_catproject->have_posts()) : while($query_catproject->have_posts()) : $query_catproject->the_post();

            $title_project = get_post_meta(get_the_ID(), '_cmb_title_project', true);

            $subtitle_project = get_post_meta(get_the_ID(), '_cmb_subtitle_project', true);

            $url_thumproject = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(),'project_category') );

                  $list_term  = '';

                 $project_terms = get_the_terms(get_the_ID(),'project_category');

                  ?>



          <div class="portfolio col-sm-4 <?php  foreach ($project_terms as $project_term){

                   echo esc_attr($project_term->slug);echo ' ';

                     }?>">

            <div class="portfolio-item">

              <img class="img-responsive" src="<?php echo esc_url($url_thumproject );?>" alt="<?php the_title_attribute();?>">

              <div class="portfolio-overlay">

                <div class="portfolio-info">

                  <h4><?php echo esc_attr($title_project );?></h4>

                  <p><?php echo esc_attr($subtitle_project );?></p>

                </div>

                <div class="portfolio-icons">

                  <a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>

                  <a class="image-link" href="<?php echo esc_url($url_thumproject );?>"><i class="fa fa-search"></i></a>

                </div>

              </div> 

            </div> <!-- portfolio-item -->                    

          </div> <!-- portfolio -->

          <?php endwhile;endif;?>

        </div> <!-- row -->

    </div> <!-- portfolio content -->

  </div> <!-- portfolio section -->   

<?php  return ob_get_clean();

} 



//Service

add_shortcode('service_mistiri', 'service_mistiri_func');

function service_mistiri_func($atts, $content = null){

  extract(shortcode_atts(array(

    'img_service'     => '',

    'title_service'     => '',

    'style_service'     => '',

        ), $atts));

  $image_service = wp_get_attachment_image_src($img_service,'');

  ob_start(); 

  ?>

<div class="row">

<div class="no-padding">

  <?php if($style_service =='left'){?>

  <div class="item item-left">

    <?php }elseif($style_service =='right'){?>

     <div class="item item-right">

    <?php }else{?>

      <div class="item item-middle">

    <?php }?>

    <div class="service-image">

      <img class="img-responsive" src="<?php echo esc_url($image_service[0]);?>" alt="<?php the_title_attribute();?>">

    </div> 

    <h4><?php echo esc_attr($title_service );?></h4>

  </div>

</div>

</div>

  <?php  return ob_get_clean();

} 



//Service tab

add_shortcode('service_tab', 'service_tab_func');

function service_tab_func($atts, $content = null){

  extract(shortcode_atts(array(

    'idtab_service'     => '',

    'titletab_service'     => '',

    'styletab_service'     => '',

        ), $atts));

  ob_start(); 

  ?>

<?php 

  if($styletab_service=='open'){?>

   <div class="service-tabs text-center">

      <ul class="nav nav-tabs" role="tablist">

          <li role="presentation" class="active"><a href="#<?php echo esc_attr($idtab_service );?>" data-toggle="tab"><?php echo esc_attr($titletab_service );?></a></li>



  <?php }elseif($styletab_service=='close'){?>

      <li role="presentation"><a href="#<?php echo esc_attr($idtab_service );?>" data-toggle="tab"><?php echo esc_attr($titletab_service );?></a></li>

    </ul>                     

  </div>

  <?php }else{?>

    <li role="presentation"><a href="#<?php echo esc_attr($idtab_service );?>" data-toggle="tab"><?php echo esc_attr($titletab_service );?></a></li>

  <?php }

?>

    <?php  return ob_get_clean();

} 



//Testimonial



add_shortcode('testimonial', 'testimonial_func');

function testimonial_func($atts, $content = null){

  extract(shortcode_atts(array(

    'content_tes_left'     => '',

    'name_tes_left'     => '',

    'info_job_left'     => '',

    'content_tes_right'     => '',

    'name_tes_right'     => '',

    'info_job_right'     => '',

    'position_test'     => '',

        ), $atts));

  ob_start(); 

  ?>

<?php 

if($position_test=='open'){?>

  <div class="testimonial-slider">

                    

      <div class="left-content">

          <div class="testimonial">

              <div class="testimonial-icon">

                  <i class="fa fa-quote-left"></i>

              </div>

              <div class="testimonial-info">

                  <p><?php echo esc_attr($content_tes_left );?></p>

                  <h5><?php echo esc_attr($name_tes_left );?> | <?php echo esc_attr($info_job_left );?></h5>

              </div>

          </div>

      </div>

      <div class="right-content">

          <div class="testimonial">

              <div class="testimonial-icon">

                  <i class="fa fa-quote-left"></i>

              </div>

              <div class="testimonial-info">

                  <p><?php echo esc_attr($content_tes_right );?> </p>

                  <h5><?php echo esc_attr($name_tes_right );?> | <?php echo esc_attr($info_job_right );?></h5>

              </div>

          </div>

      </div>

<?php }elseif($position_test=='close'){?>

    <div class="left-content">

          <div class="testimonial">

              <div class="testimonial-icon">

                  <i class="fa fa-quote-left"></i>

              </div>

              <div class="testimonial-info">

                  <p><?php echo esc_attr($content_tes_left );?></p>

                  <h5><?php echo esc_attr($name_tes_left );?> | <?php echo esc_attr($info_job_left );?></h5>

              </div>

          </div>

      </div>

      <div class="right-content">

          <div class="testimonial">

              <div class="testimonial-icon">

                  <i class="fa fa-quote-left"></i>

              </div>

              <div class="testimonial-info">

                  <p><?php echo esc_attr($content_tes_right );?> </p>

                  <h5><?php echo esc_attr($name_tes_right );?> | <?php echo esc_attr($info_job_right );?></h5>

              </div>

          </div>

      </div>

    </div>

<?php

}else{?>

    <div class="left-content">

          <div class="testimonial">

              <div class="testimonial-icon">

                  <i class="fa fa-quote-left"></i>

              </div>

              <div class="testimonial-info">

                  <p><?php echo esc_attr($content_tes_left );?></p>

                  <h5><?php echo esc_attr($name_tes_left );?> | <?php echo esc_attr($info_job_left );?></h5>

              </div>

          </div>

      </div>

      <div class="right-content">

          <div class="testimonial">

              <div class="testimonial-icon">

                  <i class="fa fa-quote-left"></i>

              </div>

              <div class="testimonial-info">

                  <p><?php echo esc_attr($content_tes_right );?> </p>

                  <h5><?php echo esc_attr($name_tes_right );?> | <?php echo esc_attr($info_job_right );?></h5>

              </div>

          </div>

      </div>

<?php }?>

<?php  return ob_get_clean();

} 



//Tab featured

add_shortcode('tab_featured', 'tab_featured_func');

function tab_featured_func($atts, $content = null){

  extract(shortcode_atts(array(

    'icon_featured'     => '',

    'title_featured'     => '',

    'position_tabfeat'     => '',

    'id_featured'     => '',

        ), $atts));

  $icon_feature = wp_get_attachment_image_src($icon_featured,'');

  ob_start(); 

  ?>

<?php if($position_tabfeat=='open'){?>

   <div class="col-md-6 col-lg-5 no-padding">

      <div class="features-tabs">

          <ul class="nav nav-tabs" role="tablist">

              <li role="presentation" class="active features-before">

                  <a class="feature-tab" href="#<?php echo esc_attr($id_featured );?>" data-toggle="tab">

                    <span class="features-image features">

                      <img class="img-responsive" src="<?php echo esc_url($icon_feature[0] );?>" alt="<?php the_title_attribute();?>">

                    </span>

                    <?php echo esc_attr($title_featured);?>

                  </a>

              </li>



<?php }elseif($position_tabfeat=='close'){?>

        <li role="presentation" class="features-before">

            <a class="feature-tab" href="#<?php echo esc_attr($id_featured );?>" data-toggle="tab">

              <span class="features-image features">

                <img class="img-responsive" src="<?php echo esc_url($icon_feature[0] );?>" alt="<?php the_title_attribute();?>">

              </span>

              <?php echo esc_attr($title_featured);?>

            </a>

        </li>

      </ul>

    </div>

  </div>

<?php }else{?>

    <li role="presentation" class="before-middle">

            <a class="feature-tab" href="#<?php echo esc_attr($id_featured );?>" data-toggle="tab">

              <span class="features-image features">

                <img class="img-responsive" src="<?php echo esc_url($icon_feature[0] );?>" alt="<?php the_title_attribute();?>">

              </span>

              <?php echo esc_attr($title_featured);?>

            </a>

        </li>

<?php }?>

  <?php  return ob_get_clean();

} 





//ContentTab featured

add_shortcode('contenttab_featured', 'contenttab_featured_func');

function contenttab_featured_func($atts, $content = null){

  extract(shortcode_atts(array(

    'imagecontent_featured'     => '',

    'idcontent_featured'     => '',

    'content_featured'     => '',

    'list_featured'     => '',

    'position_contentfeat'     => '',

        ), $atts));

  $imagecontent_featured = wp_get_attachment_image_src($imagecontent_featured,'');

   $list_featureds = explode(',' , $list_featured);

  ob_start(); 

  ?>

  <?php if($position_contentfeat=='open'){?>

   <div class="col-md-6 col-lg-7 no-padding">

      <div class="right-content">

          <div class="tab-content">

              <div role="tabpanel" class="tab-pane active" id="<?php echo esc_attr($idcontent_featured);?>">

                  <div class="row">

                    <div class="col-sm-6 no-padding">

                      <div class="feature-image">

                        <img class="img-responsive" src="<?php echo esc_url($imagecontent_featured[0]);?>" alt="<?php the_title_attribute();?>">

                      </div>                                                    

                    </div>

                    <div class="col-sm-6 no-padding">

                      <div class="features-info">

                        <p><?php echo esc_attr($content_featured );?></p>

                        <ul class="features-list">

                          <?php foreach($list_featureds as $list){?>

                          <li><i class="fa fa-angle-right"></i><?php echo esc_attr($list);?></li>

                          <?php }?>

                        </ul>

                      </div>                                        

                    </div>

                  </div>

              </div><!-- tab pane -->

  <?php }elseif($position_contentfeat=='close'){?>

            <div role="tabpanel" class="tab-pane" id="<?php echo esc_attr($idcontent_featured);?>">

                <div class="row">

                  <div class="col-sm-6 no-padding">

                    <div class="feature-image">

                      <img class="img-responsive" src="<?php echo esc_url($imagecontent_featured[0]);?>" alt="<?php the_title_attribute();?>">

                    </div>                                                    

                  </div>

                  <div class="col-sm-6 no-padding">

                    <div class="features-info">

                      <p><?php echo esc_attr($content_featured );?></p>

                      <ul class="features-list">

                        <?php foreach($list_featureds as $list){?>

                        <li><i class="fa fa-angle-right"></i><?php echo esc_attr($list);?></li>

                        <?php }?>

                      </ul>

                    </div>                                        

                  </div>

                </div>

            </div><!-- tab pane -->

          </div>

        </div>

      </div>

  <?php }else{?>

      <div role="tabpanel" class="tab-pane" id="<?php echo esc_attr($idcontent_featured);?>">

          <div class="row">

            

            <div class="col-sm-6 no-padding">

              <div class="features-info">

                <p><?php echo esc_attr($content_featured );?></p>

                <ul class="features-list">

                  <?php foreach($list_featureds as $list){?>

                  <li><i class="fa fa-angle-right"></i><?php echo esc_attr($list);?></li>

                  <?php }?>

                </ul>

              </div>                                        

            </div>

            <div class="col-sm-6 no-padding">

              <div class="feature-image">

                <img class="img-responsive" src="<?php echo esc_url($imagecontent_featured[0]);?>" alt="<?php the_title_attribute();?>">

              </div>                                                    

            </div>

          </div>

      </div><!-- tab pane -->

  <?php }?>



    <?php  return ob_get_clean();

} 



//logo slider

add_shortcode('logo_slides', 'logo_slides_func');

function logo_slides_func($atts, $content = null){

  extract(shortcode_atts(array(

    'imagelogo_slides'     => '',

    'title_slide'     => '',

    'subtitle_slide'     => '',

    'link_purchase'     => '',

        ), $atts));

  $imagelogos = explode(",",$imagelogo_slides);

  ob_start(); 

  ?>





   <div class="clients-section image-bg">

            <div class="overlay"></div>

            <div id="brand-carousel" class="brand-item">

              <?php

                  foreach ($imagelogos as $key => $imagelogo) {

                      $image_src = wp_get_attachment_image_src($imagelogo,'');

                      $meta = wp_prepare_attachment_for_js($imagelogo);

                      $tes_title=$meta['title'];

                    ?>

                   <div class="brand-image">

                <img class="img-responsive" src="<?php echo esc_url($image_src[0]);?>" alt="<?php echo esc_attr($tes_title);?>">

              </div>

                 <?php }

              ?>

              

              

            </div>



           

        </div><!-- brands -->



      <?php  return ob_get_clean();

} 



//Purchase

add_shortcode('purchase', 'purchase_func');

function purchase_func($atts, $content = null){

  extract(shortcode_atts(array(

    'title_purchase'     => '',

    'subtitle_purchase'     => '',

    'link_purchase'     => '',

        ), $atts));

  ob_start(); 

  ?>

      <div class="coll-to-action">

          <div class="container">

            <div class="row">

              <div class="brand-info">

                <h3><?php echo esc_attr($title_purchase );?></h3>

                <p> <?php echo esc_attr($subtitle_purchase );?></p>                            

              </div>

              <div class="brand-button">

                <a href="<?php echo esc_url($link_purchase );?>" class="btn btn-primary"><?php echo esc_html__('Purchase Now', 'mistiri' );?> <span><i class="fa fa-arrow-right"></i></span></a>

              </div>

            </div>

          </div>

      </div>   

        <?php  return ob_get_clean();

} 



//Process

add_shortcode('process', 'process_func');

function process_func($atts, $content = null){

  extract(shortcode_atts(array(

    'title_process'     => '',

    'subtitle_process'     => '',

    'process_number'     => '',

    'img_process'     => '',

        ), $atts));

   $imgprocess = wp_get_attachment_image_src($img_process,'');

  ob_start(); 

  ?>
  <div class="col-md-5 hidden-xs hidden-sm">

    <div class="process-image">

        <img class="img-responsive" src="<?php echo esc_url($imgprocess[0] );?>" alt="<?php the_title_attribute();?>">

    </div>

</div>
<div class="col-md-7 col-sm-12">

      <div class="process-accordion">

          <div class="process-info">

              <div class="section-title">

                  <h1><?php echo esc_attr($title_process );?></h1>

                  <h2><?php echo esc_attr($subtitle_process );?></h2>

              </div>

              <div class="panel-group" id="process-accordion" role="tablist">

                <?php $processimages = vc_param_group_parse_atts( $atts['process_number'] );?>

                <?php 

                $i=1;

                  foreach((array)$processimages as $key => $processimage){

                        $number_img = wp_get_attachment_image_src($processimage['img_number'],'');

                        $icon_background = wp_get_attachment_image_src($processimage['icon_bg'],'');

                    ?>

                  <div class="panel panel-default <?php if($i==1){?>active-process<?php }else{}?>">

                      <div class="panel-heading" role="tab" id="<?php echo esc_attr($processimage['idtab_process'] );?>">

                          <div class="process-number">

                              <img class="img-responsive" src="<?php echo esc_url($number_img[0]);?>" alt="<?php the_title_attribute();?>">

                          </div> 

                          <div class="process-bg">

                              <img class="img-responsive" src="<?php echo esc_url($icon_background[0]);?>" alt="<?php the_title_attribute();?>">

                          </div>                                             

                          <h4 class="panel-title">

                            <a role="button" data-toggle="collapse" data-parent="#process-accordion" href="#<?php echo esc_attr($processimage['idcontent_process']);?>" aria-expanded="true" aria-controls="<?php echo esc_attr($processimage['idcontent_process']);?>">

                            <?php echo esc_attr($processimage['titlede_process'] );?>

                            </a>

                           </h4>

                      </div>

                      <div id="<?php echo esc_attr($processimage['idcontent_process']);?>" class="panel-collapse collapse <?php if($i==1){?>in<?php }else{}?>" role="tabpanel" aria-labelledby="initiation">

                          <div class="panel-body">                                      

                              <p><?php echo esc_attr($processimage['content_process']);?></p>

                          </div>

                      </div>

                  </div><!-- panel-default -->

                    <?php $i++; }?>

                  

              </div>                            

          </div>

      </div>

</div> 

  



<?php  return ob_get_clean();

} 



//History



add_shortcode('history', 'history_func');

function history_func($atts, $content = null){

  extract(shortcode_atts(array(

    'title_history'     => '',

    'subtitle_history'     => '',

    'timline_toptitleone'     => '',

    'timline_topsubtitleone'     => '',

    'timline_toptwo'     => '',

    'timline_subtoptwo'     => '',

    'timline_topthree'     => '',

    'timline_subtopthree'     => '',

    'posted_dateone'     => '',

    'posted_datetwo'     => '',

    'posted_datethree'     => '',

    'timline_bottomone'     => '',

    'timline_subbottomone'     => '',

    'timline_bottomtwo'     => '',

    'timline_subbottomtwo'     => '',

        ), $atts));

   

  ob_start(); 

  ?>

  <div class="timline-section section-padding">

      <div class="container">

          <div class="section-title text-center">

              <h1><?php echo esc_attr($title_history );?></h1>

              <h2><?php echo esc_attr($subtitle_history );?></h2>

          </div>

          <div class="timline-content">

              <div class="timline-top">

                  <div class="row">

                      <div class="col-sm-4">

                          <div class="timline-panel">

                              <div class="timline-overlay"></div>

                              <h4><?php echo esc_attr($timline_toptitleone );?></h4>

                              <p><?php echo esc_attr( $timline_topsubtitleone );?></p>

                          </div>

                      </div>

                      <div class="col-sm-4">

                          <div class="timline-panel">

                              <div class="timline-overlay"></div>

                              <h4><?php echo esc_attr($timline_toptwo );?></h4>

                              <p><?php echo esc_attr($timline_subtoptwo );?></p>

                          </div>

                      </div>

                      <div class="col-sm-4">

                          <div class="timline-panel">

                              <div class="timline-overlay"></div>

                              <h4><?php echo esc_attr($timline_topthree );?></h4>

                              <p><?php echo esc_attr($timline_subtopthree );?></p>

                          </div>

                      </div>

                  </div>

              </div>

            <div class="time-line hidden-xs">

              <div class="row">

                <div class="col-sm-12">

                  <div class="posted-date">

                    <ul class="posted list-inline">

                      <li class="year"><?php echo esc_attr($posted_dateone ); ?></li>

                      <li class="year"><?php echo esc_attr($posted_datetwo );?></li>

                      <li class="year"><?php echo esc_attr($posted_datethree );?></li>

                    </ul>

                  </div> 

                </div>                                     

              </div> 

            </div>                    

              <div class="timline-bottom">   

                  <div class="row">

                      <div class="col-sm-4 col-sm-offset-1">

                          <div class="timline-panel">

                              <div class="timline-overlay"></div>

                              <h4><?php echo esc_attr($timline_bottomone );?></h4>

                              <p><?php echo esc_attr($timline_subbottomone );?></p>

                          </div>

                      </div>

                      <div class="col-sm-4">

                          <div class="timline-panel">

                              <div class="timline-overlay"></div>

                              <h4><?php echo esc_attr($timline_bottomtwo );?></h4>

                              <p><?php echo esc_attr($timline_subbottomtwo );?></p>

                          </div>

                      </div>

                  </div>

              </div>

          </div>

      </div><!-- container -->

  </div><!-- timline section -->          

  <?php  return ob_get_clean();

} 





//Our team

add_shortcode('our_team', 'our_team_func');

function our_team_func($atts, $content = null){

  extract(shortcode_atts(array(

    'tit_ourteam'     => '',

    'subtit_ourteam'     => '',

    'detail_team'     => '',

        ), $atts));

   

  ob_start(); 

  ?>

 <div class="team-section section-padding">

  <div class="container">

      <div class="section-title text-center">

          <h1><?php echo esc_attr($tit_ourteam );?></h1>

          <h2><?php echo esc_attr($subtit_ourteam );?></h2>

      </div>

      <div class="team-members">

        <?php 

          $detail_teams = vc_param_group_parse_atts( $atts['detail_team'] );

        $a=0;

        $count = count($detail_teams);

                  foreach((array)$detail_teams as $key => $detailteam){

                        $team_img = wp_get_attachment_image_src($detailteam['img_team'],'');

                        $a++;

                    ?>

          <div class="team-member <?php if($a==1){?>member-first<?php }elseif($a==$count){?>member-last<?php }else{?>member-middle<?php }?>">

            <div class="member-image">

              <img class="img-responsive" src="<?php echo esc_url($team_img[0] );?>" alt="<?php the_title_attribute();?>"> 

            </div>

            <div class="team-info">

              <ul class="team-social">

                <li><a href="<?php echo esc_url($detailteam['link_fb_team'] );?>"><i class="fa fa-facebook"></i></a></li>

                <li><a href="<?php echo esc_url($detailteam['link_wt_team'] );?>"><i class="fa fa-twitter"></i></a></li>

                <li><a href="<?php echo esc_url($detailteam['linkedin_team'] );?>"><i class="fa fa-linkedin"></i></a></li>

                <li><a href="<?php echo esc_url($detailteam['envelope_team'] );?>"><i class="fa fa-envelope"></i></a></li>

              </ul>

              <div class="member-info">

                <h4><?php echo esc_attr($detailteam['name_team'] );?></h4>

                <p><?php echo esc_attr($detailteam['office_team'] );?></p>

              </div>

            </div>                            

          </div>

         

          <?php }?>

        </div><!-- row -->

    </div><!-- container -->

</div><!-- team section -->   

    <?php  return ob_get_clean();

} 





//Our skills

add_shortcode('our_skill', 'our_skill_func');

function our_skill_func($atts, $content = null){

  extract(shortcode_atts(array(

    'tit_smallskill'     => '',

    'tit_bigskill'     => '',

    'content_skill'     => '',

    'detail_skills'     => '',

        ), $atts));

   

  ob_start(); 

  ?>

 <div class="col-md-12">

    <div class="skills-info">

        <div class="section-title">

            <h1><?php echo esc_attr($tit_smallskill );?></h1>

            <h2><?php echo esc_attr($tit_bigskill );?></h2>

            <p><?php echo esc_attr($content_skill );?></p>

        </div>



        <div class="skill">

           <?php 

          $detailskills = vc_param_group_parse_atts( $atts['detail_skills'] ); 

             foreach((array)$detailskills as $key => $detailskill){



          ?>

            <label><?php echo esc_attr($detailskill['title_skills'] );?></label>

            <div class="skill-progress">

                <div class="progress">

                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr($detailskill['value_skills'] );?>" aria-valuemin="0" aria-valuemax="100" >

                    </div>

                </div>

            </div>



           <?php }?>

        </div><!-- skill -->                            

    </div>

</div>

      <?php  return ob_get_clean();

} 



//Map

add_shortcode('map_contact', 'map_contact_func');

function map_contact_func($atts, $content = null){

  global $theme_option;

  extract(shortcode_atts(array(

    'long_map'     => '',

    'lat_map'     => '',

        ), $atts));

   

  ob_start(); 

  ?>

  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3bFRmOCQKlm9ioP_idWYLdqq7N4fvT2o&callback=initMap"

    async defer></script> -->

 <div class="contact-form-section section-padding">

            <div id="gmap"></div>

            <div class="container">

                <div class="row">

                    <div class="col-sm-7">

                        <div class="contact-info">

                            <h2><?php echo esc_html__('Send Your Message Now!', 'mistiri' );?></h2>

                            <?php $theme_option = get_option('mistiri_theme_options'); 

                            if(isset($theme_option['contact_mistiri']) && !empty($theme_option['contact_mistiri'])){ ?>

                                <?php echo do_shortcode($theme_option['contact_mistiri']);

                            }?>                           

                        </div>                          

                    </div>

                </div><!-- row -->

            </div><!-- container -->

        </div><!-- contact form section -->  



<script type="text/javascript">

       // -------------------------------------------------------------

      //   Google Map 

      // -------------------------------------------------------------  



      jQuery(function($){



        var map;



        map = new GMaps({

          el: '#gmap',

          lat: <?php echo esc_attr($lat_map );?>,

          lng: <?php echo esc_attr($long_map );?>,

          scrollwheel:false,

          zoom: 10,

          zoomControl : false,

          panControl : true,

          streetViewControl : true,

          mapTypeControl: true,

          overviewMapControl: false,

          clickable: false

        });



        var image = '';

        map.addMarker({

          lat: <?php echo esc_attr($lat_map );?>,

          lng: <?php echo esc_attr($long_map );?>,

          icon: image,

          animation: google.maps.Animation.DROP,

          verticalAlign: 'bottom',

          horizontalAlign: 'center',

          backgroundColor: '#d3cfcf',

        });



      });



    </script>

        <?php  return ob_get_clean();

} 





//Banner home

add_shortcode('banner_home', 'banner_home_func');

function banner_home_func($atts, $content = null){

  extract(shortcode_atts(array(

    'title_bann'     => '',

    'subtit_bann'     => '',

    'img_bannerhome'     => '',

    'link_readmore'     => '',

        ), $atts));

   $bannerhome = wp_get_attachment_image_src($img_bannerhome,'');

  ob_start(); 

  ?>

<div class="home-section image-bg" <?php if(!empty($bannerhome)){?>style="background-image:url(<?php echo esc_url($bannerhome[0] );?>)"<?php }else{}?>>

    <div class="overlay"></div>  

    <div class="home-content">

        <div class="container text-center">

            <h1><?php echo esc_attr($title_bann );?></h1>

            <h2><span><?php echo esc_attr($subtit_bann );?></span></h2>

            <a href="<?php echo esc_url($link_readmore );?>" class="btn btn-primary"><?php echo esc_html__('Read more','mistiri');?><i class="fa fa-arrow-right"></i></a>

        </div><!-- container -->

    </div><!-- home content -->

</div><!-- home --> 

<?php  return ob_get_clean();

} 





//Service with text bottom

add_shortcode('service_text', 'service_text_func');

function service_text_func($atts, $content = null){

  extract(shortcode_atts(array(

    'img_bgservice'     => '',

    'img_iconservice'     => '',

    'title_ser'     => '',

    'subtit_ser'     => '',



    'img_bgservice2'     => '',

    'img_iconservice2'     => '',

    'title_ser2'     => '',

    'subtit_ser2'     => '',



    'img_bgservice3'     => '',

    'img_iconservice3'     => '',

    'title_ser3'     => '',

    'subtit_ser3'     => '',

    'text_bottom'     => '',



        ), $atts));

   $iconservice = wp_get_attachment_image_src($img_iconservice,'');

   $img_bgser = wp_get_attachment_image_src($img_bgservice,'');



   $iconservice2 = wp_get_attachment_image_src($img_iconservice2,'');

   $img_bgser2 = wp_get_attachment_image_src($img_bgservice2,'');



   $iconservice3 = wp_get_attachment_image_src($img_iconservice3,'');

   $img_bgser3 = wp_get_attachment_image_src($img_bgservice3,'');

  ob_start(); 

  ?>

  <div class="services">

      <div class="container">

          <div class="row">

              <div class="col-sm-4 no-padding">

                  <div class="service crane-lifting image-bg" style="background-image:url(<?php echo esc_url($img_bgser[0]);?>);">

                      <div class="overlay"></div>

                      <div class="image-box">

                          <img class="img-responsive" src="<?php echo esc_url($iconservice[0]);?>" alt="<?php the_title_attribute();?>">

                      </div>

                      <div class="box-title">

                          <h3><?php echo esc_attr( $title_ser );?></h3>

                          <p><?php echo esc_attr($subtit_ser );?> </p>

                      </div>

                  </div>

              </div>

              <div class="col-sm-4 no-padding">

                  <div class="service home-plumbing image-bg" style="background-image:url(<?php echo esc_url($img_bgser2[0]);?>);">

                      <div class="overlay"></div>

                      <div class="image-box">

                          <img class="img-responsive" src="<?php echo esc_url($iconservice2[0]);?>" alt="<?php the_title_attribute();?>">

                      </div>

                      <div class="box-title">

                          <h3><?php echo esc_attr($title_ser2 );?></h3>

                          <p><?php echo esc_attr($subtit_ser2 );?> </p>

                      </div>

                  </div>

              </div>

              <div class="col-sm-4 no-padding">

                  <div class="service house-plans image-bg" style="background-image:url(<?php echo esc_url($img_bgser3[0]);?>);">

                      <div class="overlay"></div>

                      <div class="image-box">

                          <img class="img-responsive" src="<?php echo esc_url($iconservice3[0]);?>" alt="<?php the_title_attribute();?>">

                      </div>

                      <div class="box-title">

                          <h3><?php echo esc_attr($title_ser3 );?></h3>

                          <p><?php echo esc_attr($subtit_ser3 );?></p>

                      </div>

                  </div>

              </div> 

          </div> 

          <div class="row service-title">

              <h4><?php echo esc_attr($text_bottom );?></h4>

          </div>                    

      </div><!-- container -->

  </div><!-- services --> 

  <?php  return ob_get_clean();

} 







//The Projects

add_shortcode('the_project', 'the_project_func');

function the_project_func($atts, $content = null){

  extract(shortcode_atts(array(

    'title_projects'     => '',

    'subtitle_projects'     => '',

    'id_projectsingle'     => '',



        ), $atts));

   $id_projectsingles = explode(',' ,$id_projectsingle);

  ob_start(); 

  ?>

<div class="portfolio-section">

    <div class="portfolio-title image-bg">

        <div class="overlay"></div>

        <div class="section-title">

            <div class="container">

                <h1><?php echo esc_attr($title_projects );?></h1>

                <h2><?php echo esc_attr($subtitle_projects );?></h2>

            </div>

        </div>

    </div>

     <div class="portfolio-content">

                <div class="portfolio-slider">

                  <?php 

                    $query_pr = new WP_Query(

                        array(

                            'post_type' => 'project',

                            'post__in' => $id_projectsingles,

                            'posts_per_page' => -1,



                          )

                      );

                      if($query_pr->have_posts()) : while($query_pr->have_posts()) : $query_pr->the_post();

                   $title_project = get_post_meta(get_the_ID(), '_cmb_title_project', true);

                    $subtitle_project = get_post_meta(get_the_ID(), '_cmb_subtitle_project', true);

                    $url_thumproject = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(),'projectcat') );



                  ?>

                    <div class="portfolio">

                        <div class="portfolio-item">

                            <img class="img-responsive" src="<?php echo esc_url($url_thumproject );?>" alt="<?php the_title_attribute();?>"> 

                        </div>

                        <div class="portfolio-overlay">

                            <div class="portfolio-info">

                                <h4><?php echo esc_attr($title_project );?></h4>

                                <p><?php echo esc_attr($subtitle_project );?></p>

                            </div>

                            <div class="portfolio-icons">

                                <a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>
                                <a class="image-link" href="<?php echo esc_url($url_thumproject );?>"><i class="fa fa-search"></i></a>

                            </div>

                        </div>                        

                    </div>

                    <?php endwhile;endif;?>

                    

                </div> 

            </div><!-- portfolio content -->

        </div><!-- portfolio section -->    



    <?php  return ob_get_clean();

} 



//BLOG & NEWS

add_shortcode('mistiri_blognew', 'mistiri_blognew_func');

function mistiri_blognew_func($atts, $content = null){

  global $theme_option;

  extract(shortcode_atts(

    array(

      'id_post' => '',

    ), $atts));

  $id_posts = explode(',' ,$id_post);

  ob_start(); 

  ?>

<?php 

  $wp_query = new WP_Query(

    array(

      'post_type' => 'post',

      'post__in' => $id_posts,

      'posts_per_page' => -1,

      )

  );

  $i=0;

  if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();



  $date_post =  get_the_date();

  $date = date_create($date_post);

  $date_event = date_format($date, 'M-d-Y');

  $arr = explode("-", $date_event);

  list($month, $day, $year) = $arr;

  $i++;

?>

        <?php if($i%2==0){?>

        <div class="blog-content blog-two">

          <div class="row">

            <div class="col-md-6 no-padding">

              <div class="entry-post">

                 <div class="entry-title">

                   <h4><a href="<?php the_permalink();?>"><?php the_title();?> </a></h4>

                 </div> 

                 <div class="post-content">

                  <div class="entry-meta">

                    <ul class="list-inline">

                       <li><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>

                       <li><i class="fa fa-folder-o"></i><?php 

                                     $categories =  get_the_category( get_the_ID(), 'category' );

                                     foreach ($categories as $cat){?>

                                    <a  href="<?php echo get_category_link($cat->cat_ID); ?> ">

                                        <?php echo esc_attr($cat->cat_name); ?> </a>

                                        <?php }?>

                                </li>

                       <li><a href="<?php the_permalink();?>"><i class="fa fa-comment-o"></i><?php comments_popup_link(__(' 0 comment','mistiri'),__(' 1 comment','mistiri'),__(' % comment','mistiri')); ?></a></li>

                     </ul>

                  </div>                   

                   <div class="entry-summary">

                    <p><?php echo mistiri_excerpt(37);?></p>

                     <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html__( 'Read More', 'mistiri' );?> <i class="fa fa-arrow-right"></i></a>

                   </div>                  

                 </div>

              </div><!-- entry-post -->

            </div>

            <div class="col-md-6 no-padding">

              <div class="blog-image">

                <div class="entry-thumbnail">        

                  <?php if(has_post_thumbnail()) : ?>

                      <img class="img-responsive" src="<?php the_post_thumbnail_url('post-thumb'); ?>" alt="">

                  <?php else : ?>

                      <?php if(isset($theme_option['blog_placeholder_img']) && !empty($theme_option['blog_placeholder_img'])) : ?>

                      <img class="img-responsive" src="<?php echo esc_attr($theme_option['blog_placeholder_img']['url']); ?>" alt="">

                      <?php endif; ?>

                  <?php endif; ?>

                </div>

                <div class="time">

                  

                  <h2><?php echo esc_attr($day );?> <span><?php echo esc_attr($month );?></span></h2>

                </div>

              </div> <!-- blog-image -->

            </div>                    

          </div><!-- row -->

        </div><!-- blog content -->

        <?php }else{?>

          <div class="blog-content blog-one">

              <div class="row">

                <div class="col-md-6 no-padding">

                  <div class="blog-image">

                    <div class="entry-thumbnail">

                      <?php if(has_post_thumbnail()) : ?>

                        <img class="img-responsive" src="<?php the_post_thumbnail_url('post-thumb'); ?>" alt="">

                      <?php else : ?>

                          <?php if(isset($theme_option['blog_placeholder_img']) && !empty($theme_option['blog_placeholder_img'])) : ?>

                          <img class="img-responsive" src="<?php echo esc_attr($theme_option['blog_placeholder_img']['url']); ?>" alt="">

                          <?php endif; ?>

                      <?php endif; ?>

                    </div>

                    <div class="time">

                      <h2><?php echo esc_attr($day );?> <span><?php echo esc_attr($month );?></span></h2>

                    </div>

                  </div> <!-- blog-image -->

                </div>

                <div class="col-md-6 no-padding">

                  <div class="entry-post">

                    <div class="entry-title">

                       <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>

                    </div> 

                    <div class="post-content">

                      <div class="entry-meta">

                        <ul class="list-inline">

                           <li><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>

                           <li><i class="fa fa-folder-o"></i><?php 

                                         $categories =  get_the_category( get_the_ID(), 'category' );

                                         foreach ($categories as $cat){?>

                                        <a  href="<?php echo get_category_link($cat->cat_ID); ?> ">

                                            <?php echo esc_attr($cat->cat_name); ?> </a>

                                            <?php }?>

                                    </li>

                           <li><a href="<?php the_permalink();?>"><i class="fa fa-comment-o"></i><?php comments_popup_link(__(' 0 comment','mistiri'),__(' 1 comment','mistiri'),__(' % comment','mistiri')); ?></a></li>

                         </ul>

                      </div>                   

                       <div class="entry-summary">

                        <p><?php echo mistiri_excerpt(37);?></p>

                         <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html__( 'Read More', 'mistiri' );?> <i class="fa fa-arrow-right"></i></a>

                       </div>                  

                     </div>

                  </div><!-- entry-post -->

                </div>

              </div><!-- row -->

            </div><!-- blog content -->

         <?php }?>

<?php endwhile;endif;?>

<?php  return ob_get_clean();

} 



// ///Content service style 01

add_shortcode('service_contentone', 'service_contentone_func');

function service_contentone_func($atts, $content = null){

 extract(shortcode_atts(array(

    'img_cttebone'     => '',

    'title_style_cttebone'     => '',

    'id_content_tab'     => '',

    'content_cttebone'     => '',

    'list_cttebone'     => '',

    'position_ccttebone'     => '',



        ), $atts));

 

    $img_cttebonee = wp_get_attachment_image_src($img_cttebone,'');

  ob_start(); 

  ?>

  <?php if($position_ccttebone=='open'){?>

 <div class="tab-content service-content">

 <div role="tabpanel" class="tab-pane fade in active" id="<?php echo esc_attr($id_content_tab);?>">

 <?php }else{?>

 <div role="tabpanel" class="tab-pane fade" id="<?php echo esc_attr($id_content_tab);?>">

 <?php }?>

      <div class="row">

        <div class="col-sm-6">

          <div class="service-image">

            <img class="img-responsive" src="<?php echo esc_url($img_cttebonee[0] );?>" alt="image"> 

          </div>

        </div>

        <div class="col-sm-6">

          <div class="service-info">

            <h4><?php esc_attr( $title_style_cttebone );?></h4>

            <p><?php echo esc_attr($content_cttebone );?></p>

            <ul class="service-structure list-inline">

              <?php $list_cttebones = vc_param_group_parse_atts( $atts['list_cttebone'] );



               foreach((array)$list_cttebones as $key => $cttebone){ ?>

              <li class="<?php echo esc_url( $cttebone['class_list'] );?>"><a href="<?php echo esc_url( $cttebone['link_list'] );?>"><i class="<?php echo esc_attr( $cttebone['icon_list'] );?>"></i></a><span><?php echo esc_attr( $cttebone['name_list'] );?></span></li>

              <?php }?>

            </ul>

          </div>

        </div>

      </div><!-- row --> 

   </div><!-- tab pane -->

    <?php if($position_ccttebone=='close'){?>

 </div>

 

 <?php }else{?>



 <?php }?>

  <?php  return ob_get_clean();

} 



// ///Content service style 02

add_shortcode('service_contenttwo', 'service_contenttwo_func');

function service_contenttwo_func($atts, $content = null){

 extract(shortcode_atts(array(

    'id_content_tabtwo'     => '',

    'title_style_cttebtwo'     => '',

    'content_cttebtwo'     => '',

    'content_cttebtwotwo'     => '',

    'img_cttebtwo'     => '',

    'position_ccttebtwo'     => '',



        ), $atts));

 

    $img_cttebtwoo = wp_get_attachment_image_src($img_cttebtwo,'');

  ob_start(); 

  ?>

  <?php if($position_ccttebtwo=='open'){?>

 <div class="tab-content service-content">

 <div role="tabpanel" class="tab-pane fade in active" id="<?php echo esc_attr($id_content_tabtwo);?>">

 <?php }else{?>

 <div role="tabpanel" class="tab-pane fade" id="<?php echo esc_attr($id_content_tabtwo);?>">

 <?php }?>

     <div class="row">

        <div class="col-sm-6">

          <div class="service-info">

            <h4><?php echo esc_attr( $title_style_cttebtwo );?></h4>

            <p><?php echo esc_attr( $content_cttebtwo );?></p>

            <p><?php echo esc_attr( $content_cttebtwotwo );?></p>

          </div>

        </div>

        <div class="col-sm-6">

          <div class="service-image">

            <img class="img-responsive" src="<?php echo esc_url($img_cttebtwoo[0] );?>" alt="image"> 

          </div>

        </div>

      </div><!-- row --> 

   </div><!-- tab pane -->

    <?php if($position_ccttebtwo=='close'){?>

 </div>

 

 <?php }else{?>



 <?php }?>

  <?php  return ob_get_clean();

} 





// ///Content service style 03

add_shortcode('service_contentthree', 'service_contentthree_func');

function service_contentthree_func($atts, $content = null){

 extract(shortcode_atts(array(

    'id_content_tabthree'     => '',

    'title_style_cttebthree'     => '',

    'content_cttebthree'     => '',

    'content_cttebtwothree'     => '',

    'position_ccttebthree'     => '',



        ), $atts));

 



  ob_start(); 

  ?>

  <?php if($position_ccttebthree=='open'){?>

 <div class="tab-content service-content">

 <div role="tabpanel" class="tab-pane fade in active" id="<?php echo esc_attr($id_content_tabthree);?>">

 <?php }else{?>

 <div role="tabpanel" class="tab-pane fade" id="<?php echo esc_attr($id_content_tabthree);?>">

 <?php }?>

     <div class="row">

      <div class="col-sm-12">

        <div class="service-item">

          <div class="service-info">

            <h4><?php echo esc_attr($title_style_cttebthree );?></h4>

            <p> <?php echo esc_attr($content_cttebthree);?></p>

            <p><?php echo esc_attr($content_cttebtwothree);?> </p>  

          </div>

        </div>

      </div>  

    </div><!-- row --> 

   </div><!-- tab pane -->

    <?php if($position_ccttebthree=='close'){?>

 </div>

 

 <?php }else{?>



 <?php }?>

  <?php  return ob_get_clean();

} 







// ///Content service style 04

add_shortcode('service_contentfour', 'service_contentfour_func');

function service_contentfour_func($atts, $content = null){

 extract(shortcode_atts(array(

    'id_content_tabfour'     => '',

    'title_style_cttebfour'     => '',

    'content_cttebfour'     => '',

    'content_cttebtwofour'     => '',

    'content_cttebthreefour'     => '',

    'listtitle_cttebone'     => '',

    'position_ccttebfour'     => '',



        ), $atts));

 



  ob_start(); 

  ?>

  <?php if($position_ccttebfour=='open'){?>

 <div class="tab-content service-content">

 <div role="tabpanel" class="tab-pane fade in active" id="<?php echo esc_attr($id_content_tabfour);?>">

 <?php }else{?>

 <div role="tabpanel" class="tab-pane fade" id="<?php echo esc_attr($id_content_tabfour);?>">

 <?php }?>

     <div class="row">

        <div class="col-sm-6">

          <div class="service-info">

            <h4><?php echo esc_attr( $title_style_cttebfour );?></h4>

            <p><?php echo esc_attr( $content_cttebfour );?></p>

            <p><?php echo esc_attr( $content_cttebtwofour );?></p>  

          </div>

        </div>  

        <div class="col-sm-6">

          <div class="service-info">

           <p><?php echo esc_attr( $content_cttebthreefour );?></p>  

            <ul>

                <?php $listtitle_cttebones = vc_param_group_parse_atts( $atts['listtitle_cttebone'] );



               foreach((array)$listtitle_cttebones as $key => $listtitle){ ?>

              <li><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo esc_attr($listtitle['classlist'] );?></li>

              <?php }?>

            </ul> 

          </div>

        </div>                                  

      </div><!-- row --> 

   </div><!-- tab pane -->

    <?php if($position_ccttebfour=='close'){?>

 </div>

 

 <?php }else{?>



 <?php }?>

  <?php  return ob_get_clean();

} 