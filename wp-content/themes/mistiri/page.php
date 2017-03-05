<?php 
	get_header();
 ?>
<div class="breadcrumb-section image-bg">
    <div class="overlay"></div>
    <div class="breadcrumb-content">
        <div class="container text-center">
        	
            <h1><span><?php the_title();?></span></h1>
            
        </div>
    </div><!-- breadcrumb content -->
</div><!-- breadcrumb section --> 
<div class="details-section section-padding">
    <div class="container">
	    <div class="row">
		    <div class="col-md-9">
		    	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		              <?php 
		            if(have_posts()):
		              while ( have_posts() ) : the_post();
		                the_content();
		              
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

		              endwhile; 
		            endif;
		          ?>
		          </div>
		    </div>
		    <div class="col-md-3">
		    	<?php if ( is_active_sidebar( 'footer_one' ) ) : 
	                    dynamic_sidebar('footer_one');
	                    endif;
	                ?>
		    </div>
	    </div>
    </div>
</div>
<?php 
get_footer();
?>