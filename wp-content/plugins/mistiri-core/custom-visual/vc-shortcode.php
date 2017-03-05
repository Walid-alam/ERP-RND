<?php 
$pre_text = 'TR ';
//Title
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Title and banner", 'mistiri'),
   "base" => "title_banner",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
           array(
               'type' => 'attach_image',
               'heading' => esc_html__( 'Image banner', 'js_composer' ),
               'param_name' => 'banner_bg',
               "value"       => "",
               "description" => esc_html__("Upload image for title", 'mistiri')
            ),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => 'Title ',
                'param_name' => 'title_page',
            ),
             array(
                'type' => 'textfield',
                'value' => '',
                'heading' => 'Subtitle ',
                'param_name' => 'subtitle_page',
            ),
              array(
                  'type' => 'dropdown',
                  'value' => '',
                  'heading' => 'Choose style title ',
                  'param_name' => 'style_title',
                  'value' => array(
                    esc_html__( '', 'js_contribution' )       => '',
                    esc_html__( 'Title center', 'js_composer' )       => 'center',
                    esc_html__( 'Title banner', 'js_composer' )       => 'title_banner',
                    ),
                  ),
        )));

}


if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Project portfolio full width", 'mistiri'),
   "base" => "portfolio_projectone",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
           array(
               'type' => 'textfield',
               'heading' => esc_html__( 'ID Project category', 'js_composer' ),
               'param_name' => 'id_projectcat',
               "value"       => "",
               "description" => esc_html__("Enter id project category", 'mistiri')
            ),
            
        )));

}
//Project portfolio not full width
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Project portfolio not full width", 'mistiri'),
   "base" => "portfolio_projecttwo",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
           array(
               'type' => 'textfield',
               'heading' => esc_html__( 'ID Project category', 'js_composer' ),
               'param_name' => 'id_projectcattwo',
               "value"       => "",
               "description" => esc_html__("Enter id project category", 'mistiri')
            ),
            
        )));

}

//Project portfolio three row
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Project portfolio three row", 'mistiri'),
   "base" => "portfolio_projectthree",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
           array(
               'type' => 'textfield',
               'heading' => esc_html__( 'ID Project category', 'js_composer' ),
               'param_name' => 'id_projectcatthree',
               "value"       => "",
               "description" => esc_html__("Enter id project category", 'mistiri')
            ),
            
        )));

}

//Service
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Service", 'mistiri'),
   "base" => "service_mistiri",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
           array(
               'type' => 'attach_image',
               'heading' => esc_html__( 'Image service', 'js_composer' ),
               'param_name' => 'img_service',
               "value"       => "",
               "description" => esc_html__("Upload image for service", 'mistiri')
            ),
           array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title service', 'js_composer' ),
               'param_name' => 'title_service',
               "value"       => "",
               "description" => esc_html__("Title service", 'mistiri')
            ),
                array(
                  'type' => 'dropdown',
                  'value' => '',
                  'heading' => 'Choose position ',
                  'param_name' => 'style_service',
                  'value' => array(
                    esc_html__( '', 'js_contribution' )       => '',
                    esc_html__( 'Left', 'js_composer' )       => 'left',
                    esc_html__( 'Middle', 'js_composer' )       => 'middle',
                    esc_html__( 'Right', 'js_composer' )       => 'right',
                    ),
                  ),
            
        )));

}

//Service tab
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Service tab", 'mistiri'),
   "base" => "service_tab",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'ID tab', 'js_composer' ),
               'param_name' => 'idtab_service',
               "value"       => "",
               "description" => esc_html__("Enter ID tab service", 'mistiri')
            ),
           array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title tab service', 'js_composer' ),
               'param_name' => 'titletab_service',
               "value"       => "",
               "description" => esc_html__("Title tab service", 'mistiri')
            ),
            array(
              'type' => 'dropdown',
              'value' => '',
              'heading' => 'Choose position ',
              'param_name' => 'styletab_service',
              'value' => array(
                esc_html__( '', 'js_contribution' )       => '',
                esc_html__( 'Open', 'js_composer' )       => 'open',
                esc_html__( 'Center', 'js_composer' )       => 'center',
                esc_html__( 'Close', 'js_composer' )       => 'close',
                ),
              ),
            
        )));

}

//Testimonial

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Testimonial", 'mistiri'),
   "base" => "testimonial",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
            array(
               'type' => 'textarea',
               'heading' => esc_html__( 'Content testimonial left', 'js_composer' ),
               'param_name' => 'content_tes_left',
               "value"       => "",
               "description" => esc_html__("Enter content testimonial left", 'mistiri')
            ),
                array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Name testimonial left', 'js_composer' ),
               'param_name' => 'name_tes_left',
               "value"       => "",
               "description" => esc_html__("Enter name testimonial left", 'mistiri')
            ),
              array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Job left', 'js_composer' ),
               'param_name' => 'info_job_left',
               "value"       => "",
               "description" => esc_html__("Job", 'mistiri')
            ),

              //Right

               array(
               'type' => 'textarea',
               'heading' => esc_html__( 'Content testimonial right', 'js_composer' ),
               'param_name' => 'content_tes_right',
               "value"       => "",
               "description" => esc_html__("Enter content testimonial right", 'mistiri')
            ),
                array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Name testimonial right', 'js_composer' ),
               'param_name' => 'name_tes_right',
               "value"       => "",
               "description" => esc_html__("Enter name testimonial right", 'mistiri')
            ),
              array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Job right', 'js_composer' ),
               'param_name' => 'info_job_right',
               "value"       => "",
               "description" => esc_html__("Job", 'mistiri')
            ),

               array(
              'type' => 'dropdown',
              'value' => '',
              'heading' => 'Choose position testimonial ',
              'param_name' => 'position_test',
              'value' => array(
                esc_html__( '', 'js_contribution' )       => '',
                esc_html__( 'Open', 'js_composer' )       => 'open',
                esc_html__( 'Center', 'js_composer' )       => 'center',
                esc_html__( 'Close', 'js_composer' )       => 'close',
                ),
              ),
            
        )));

}


//Tab featured

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Tab featured", 'mistiri'),
   "base" => "tab_featured",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
              array(
               'type' => 'attach_image',
               'heading' => esc_html__( 'Image icon ', 'js_composer' ),
               'param_name' => 'icon_featured',
               "value"       => "",
               "description" => esc_html__("Upload image icon", 'mistiri')
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title tab featured', 'js_composer' ),
               'param_name' => 'title_featured',
               "value"       => "",
               "description" => esc_html__("Enter title tab featured", 'mistiri')
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'ID tab featured', 'js_composer' ),
               'param_name' => 'id_featured',
               "value"       => "",
               "description" => esc_html__("Enter ID tab featured", 'mistiri')
            ),
               array(
              'type' => 'dropdown',
              'value' => '',
              'heading' => 'Choose position featured',
              'param_name' => 'position_tabfeat',
              'value' => array(
                esc_html__( '', 'js_contribution' )       => '',
                esc_html__( 'Open', 'js_composer' )       => 'open',
                esc_html__( 'Center', 'js_composer' )       => 'center',
                esc_html__( 'Close', 'js_composer' )       => 'close',
                ),
              ),
            
        )));
}


//ContentTab featured

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Content Tab featured", 'mistiri'),
   "base" => "contenttab_featured",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
              array(
               'type' => 'attach_image',
               'heading' => esc_html__( 'Image content ', 'js_composer' ),
               'param_name' => 'imagecontent_featured',
               "value"       => "",
               "description" => esc_html__("Upload image content", 'mistiri')
            ),
              array(
               'type' => 'textfield',
               'heading' => esc_html__( 'ID tab content featured', 'js_composer' ),
               'param_name' => 'idcontent_featured',
               "value"       => "",
               "description" => esc_html__("Enter ID content tab featured ", 'mistiri')
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Content tab featured', 'js_composer' ),
               'param_name' => 'content_featured',
               "value"       => "",
               "description" => esc_html__("Enter content tab featured", 'mistiri')
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'List title', 'js_composer' ),
               'param_name' => 'list_featured',
               "value"       => "",
               "description" => esc_html__("Enter list title featured", 'mistiri')
            ),
               array(
              'type' => 'dropdown',
              'value' => '',
              'heading' => 'Choose position content featured',
              'param_name' => 'position_contentfeat',
              'value' => array(
                esc_html__( '', 'js_contribution' )       => '',
                esc_html__( 'Open', 'js_composer' )       => 'open',
                esc_html__( 'Center', 'js_composer' )       => 'center',
                esc_html__( 'Close', 'js_composer' )       => 'close',
                ),
              ),
            
        )));
}


//logo slider


if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Logo slider", 'mistiri'),
   "base" => "logo_slides",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
              array(
               'type' => 'attach_images',
               'heading' => esc_html__( 'Image logo slide ', 'js_composer' ),
               'param_name' => 'imagelogo_slides',
               "value"       => "",
               "description" => esc_html__("Upload image logo", 'mistiri')
            ),
            
        )));
}

//Purchase

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Purchase", 'mistiri'),
   "base" => "purchase",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title', 'js_composer' ),
               'param_name' => 'title_purchase',
               "value"       => "",
               "description" => esc_html__("Enter title purchase", 'mistiri')
            ),
               array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Subtitle', 'js_composer' ),
               'param_name' => 'subtitle_purchase',
               "value"       => "",
               "description" => esc_html__("Enter subitle purchase", 'mistiri')
            ),
                 array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Link Purchase', 'js_composer' ),
               'param_name' => 'link_purchase',
               "value"       => "",
               "description" => esc_html__("Enter link purchase", 'mistiri')
            ),
        )));
}

//PROCESS

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Process", 'mistiri'),
   "base" => "process",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title process', 'js_composer' ),
               'param_name' => 'title_process',
               "value"       => "",
               "description" => esc_html__("Enter title process", 'mistiri')
            ),
               array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Subtitle process', 'js_composer' ),
               'param_name' => 'subtitle_process',
               "value"       => "",
               "description" => esc_html__("Enter subitle process", 'mistiri')
            ),

               array(
              'type' => 'param_group',
              'value' => '',
              'param_name' => 'process_number',
              // Note params is mapped inside param-group:
              'params' => array(
                 array(
                     'type' => 'attach_image',
                     'heading' => esc_html__( 'Image number', 'js_composer' ),
                     'param_name' => 'img_number',
                     "value"       => "",
                     "description" => esc_html__("Upload image number", 'mistiri')
                  ),
                   array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'ID tab ',
                      'param_name' => 'idtab_process',
                  ),
                    array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'ID content ',
                      'param_name' => 'idcontent_process',
                  ),
                     array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Title ',
                      'param_name' => 'titlede_process',
                  ),
                  array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Content ',
                      'param_name' => 'content_process',
                  ),

                  array(
                     'type' => 'attach_image',
                     'heading' => esc_html__( 'Image icon background', 'js_composer' ),
                     'param_name' => 'icon_bg',
                     "value"       => "",
                     "description" => esc_html__("Upload image icon backgound", 'mistiri')
                  ),
                  
              
                ),
     
              ),
                  array(
                     'type' => 'attach_image',
                     'heading' => esc_html__( 'Image ', 'js_composer' ),
                     'param_name' => 'img_process',
                     "value"       => "",
                     "description" => esc_html__("Upload image process", 'mistiri')
                  ),
        )));
}


//History

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."History", 'mistiri'),
   "base" => "history",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title History', 'js_composer' ),
               'param_name' => 'title_history',
               "value"       => "",
               "description" => esc_html__("Enter title history", 'mistiri')
            ),

             array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Subtitle History', 'js_composer' ),
               'param_name' => 'subtitle_history',
               "value"       => "",
               "description" => esc_html__("Enter subtitle history", 'mistiri')
            ),

              array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Timline top title one', 'js_composer' ),
               'param_name' => 'timline_toptitleone',
               "value"       => "",
               "description" => esc_html__("Enter Timline top one", 'mistiri')
            ),
               array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Timline top subtitle one', 'js_composer' ),
               'param_name' => 'timline_topsubtitleone',
               "value"       => "",
               "description" => esc_html__("Enter Subtimline top one", 'mistiri')
            ),
               array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Timline top title two', 'js_composer' ),
               'param_name' => 'timline_toptwo',
               "value"       => "",
               "description" => esc_html__("Enter Timline top title two", 'mistiri')
            ),
               array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Timline top subtitle two', 'js_composer' ),
               'param_name' => 'timline_subtoptwo',
               "value"       => "",
               "description" => esc_html__("Enter Timline top subtitle two", 'mistiri')
            ),
                array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Timline top title three', 'js_composer' ),
               'param_name' => 'timline_topthree',
               "value"       => "",
               "description" => esc_html__("Enter Timline top title three", 'mistiri')
            ),
                 array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Timline top subtitle three', 'js_composer' ),
               'param_name' => 'timline_subtopthree',
               "value"       => "",
               "description" => esc_html__("Enter Timline top subtitle three", 'mistiri')
            ),

             array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Posted date one', 'js_composer' ),
               'param_name' => 'posted_dateone',
               "value"       => "",
               "description" => esc_html__("Enter Posted date one", 'mistiri')
            ),
              array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Posted date two', 'js_composer' ),
               'param_name' => 'posted_datetwo',
               "value"       => "",
               "description" => esc_html__("Enter Posted date two", 'mistiri')
            ),
               array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Posted date three', 'js_composer' ),
               'param_name' => 'posted_datethree',
               "value"       => "",
               "description" => esc_html__("Enter Posted date three", 'mistiri')
            ),
              
                array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Timline bottom title one', 'js_composer' ),
               'param_name' => 'timline_bottomone',
               "value"       => "",
               "description" => esc_html__("Enter Timline bottom title one", 'mistiri')
            ),
                  array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Timline bottom subtitle one', 'js_composer' ),
               'param_name' => 'timline_subbottomone',
               "value"       => "",
               "description" => esc_html__("Enter Timline bottom subtitle one", 'mistiri')
            ),

             array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Timline bottom title two', 'js_composer' ),
               'param_name' => 'timline_bottomtwo',
               "value"       => "",
               "description" => esc_html__("Enter Timline bottom title two", 'mistiri')
            ),
              array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Timline bottom subtitle two', 'js_composer' ),
               'param_name' => 'timline_subbottomtwo',
               "value"       => "",
               "description" => esc_html__("Enter Timline bottom subtitle two", 'mistiri')
            ),
       )));
}


//Our team

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Our team", 'mistiri'),
   "base" => "our_team",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title Our team', 'js_composer' ),
               'param_name' => 'tit_ourteam',
               "value"       => "",
               "description" => esc_html__("Enter title our team", 'mistiri')
            ),
             array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title Our team', 'js_composer' ),
               'param_name' => 'subtit_ourteam',
               "value"       => "",
               "description" => esc_html__("Enter title our team", 'mistiri')
            ),
               array(
              'type' => 'param_group',
              'value' => '',
              'param_name' => 'detail_team',
              // Note params is mapped inside param-group:
              'params' => array(
                 array(
                     'type' => 'attach_image',
                     'heading' => esc_html__( 'Image team', 'js_composer' ),
                     'param_name' => 'img_team',
                     "value"       => "",
                     "description" => esc_html__("Upload image team", 'mistiri')
                  ),
                   array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Link facebook ',
                      'param_name' => 'link_fb_team',
                  ),
                    array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Link tweeter ',
                      'param_name' => 'link_wt_team',
                  ),
                  array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Link linkedin',
                      'param_name' => 'linkedin_team',
                  ),

                 array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Link envelope',
                      'param_name' => 'envelope_team',
                  ),
                  array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Name',
                      'param_name' => 'name_team',
                  ),
                   array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Office',
                      'param_name' => 'office_team',
                  ),
                  
              
                ),
     
              ),
  )));
}


//OUR SKILLS

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Our skills", 'mistiri'),
   "base" => "our_skill",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title small skills', 'js_composer' ),
               'param_name' => 'tit_smallskill',
               "value"       => "",
               "description" => esc_html__("Enter title small skills", 'mistiri')
            ),
             array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title big skills', 'js_composer' ),
               'param_name' => 'tit_bigskill',
               "value"       => "",
               "description" => esc_html__("Enter title big skills", 'mistiri')
            ),

              array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Content skills', 'js_composer' ),
               'param_name' => 'content_skill',
               "value"       => "",
               "description" => esc_html__("Enter content skills", 'mistiri')
            ),
                array(
              'type' => 'param_group',
              'value' => '',
              'param_name' => 'detail_skills',
              // Note params is mapped inside param-group:
              'params' => array(
                 array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Title skills ',
                      'param_name' => 'title_skills',
                  ),
                   array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Value skills',
                      'param_name' => 'value_skills',
                      "description" => esc_html__("Enter value 0 to 100", 'mistiri')
                  ),
                  
                  
              
                ),
     
              ),

       )));
}

//Map

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Map", 'mistiri'),
   "base" => "map_contact",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
     array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Long Map', 'js_composer' ),
               'param_name' => 'long_map',
               "value"       => "",
               "description" => esc_html__("Enter Long map", 'mistiri')
            ),
           array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Lat Map', 'js_composer' ),
               'param_name' => 'lat_map',
               "value"       => "",
               "description" => esc_html__("Enter Lat map", 'mistiri')
            ),

       )));
}

//Banner home

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Banner home", 'mistiri'),
   "base" => "banner_home",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
     array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title', 'js_composer' ),
               'param_name' => 'title_bann',
               "value"       => "",
               "description" => esc_html__("Enter title in banner", 'mistiri')
            ),
           array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Subtitle', 'js_composer' ),
               'param_name' => 'subtit_bann',
               "value"       => "",
               "description" => esc_html__("Enter Subtitle in banner", 'mistiri')
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Link readmore', 'js_composer' ),
               'param_name' => 'link_readmore',
               "value"       => "",
               "description" => esc_html__("Enter link url for readmore", 'mistiri')
            ),
             array(
             'type' => 'attach_image',
             'heading' => esc_html__( 'Bannner ', 'js_composer' ),
             'param_name' => 'img_bannerhome',
             "value"       => "",
             "description" => esc_html__("Upload banner home", 'mistiri')
          ),

       )));
}


//Service with text bottom

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Service with text bottom", 'mistiri'),
   "base" => "service_text",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
             'type' => 'attach_image',
             'heading' => esc_html__( 'Image background 1 ', 'js_composer' ),
             'param_name' => 'img_bgservice',
             "value"       => "",
             "description" => esc_html__("Upload background service 1", 'mistiri')
          ),
          array(
             'type' => 'attach_image',
             'heading' => esc_html__( 'Icon for service 1 ', 'js_composer' ),
             'param_name' => 'img_iconservice',
             "value"       => "",
             "description" => esc_html__("Upload icon 1 service", 'mistiri')
          ),
              array(

               'type' => 'textfield',
               'heading' => esc_html__( 'Title service 1', 'js_composer' ),
               'param_name' => 'title_ser',
               "value"       => "",
               "description" => esc_html__("Enter title 1 for service", 'mistiri')
            ),
           array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Subtitle 1', 'js_composer' ),
               'param_name' => 'subtit_ser',
               "value"       => "",
               "description" => esc_html__("Enter Subtitle 1 for service", 'mistiri')
            ),

             array(
             'type' => 'attach_image',
             'heading' => esc_html__( 'Image background 2 ', 'js_composer' ),
             'param_name' => 'img_bgservice2',
             "value"       => "",
             "description" => esc_html__("Upload background service 1", 'mistiri')
          ),
          array(
             'type' => 'attach_image',
             'heading' => esc_html__( 'Icon for service 2 ', 'js_composer' ),
             'param_name' => 'img_iconservice2',
             "value"       => "",
             "description" => esc_html__("Upload icon 2 service", 'mistiri')
          ),
              array(

               'type' => 'textfield',
               'heading' => esc_html__( 'Title service 2', 'js_composer' ),
               'param_name' => 'title_ser2',
               "value"       => "",
               "description" => esc_html__("Enter title 2 for service", 'mistiri')
            ),
           array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Subtitle 2', 'js_composer' ),
               'param_name' => 'subtit_ser2',
               "value"       => "",
               "description" => esc_html__("Enter Subtitle 2 for service", 'mistiri')
            ),
           
         
             array(
             'type' => 'attach_image',
             'heading' => esc_html__( 'Image background 3 ', 'js_composer' ),
             'param_name' => 'img_bgservice3',
             "value"       => "",
             "description" => esc_html__("Upload background service 3", 'mistiri')
          ),
          array(
             'type' => 'attach_image',
             'heading' => esc_html__( 'Icon for service 3 ', 'js_composer' ),
             'param_name' => 'img_iconservice3',
             "value"       => "",
             "description" => esc_html__("Upload icon 3 service", 'mistiri')
          ),
              array(

               'type' => 'textfield',
               'heading' => esc_html__( 'Title service 3', 'js_composer' ),
               'param_name' => 'title_ser3',
               "value"       => "",
               "description" => esc_html__("Enter title 3 for service", 'mistiri')
            ),
           array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Subtitle 3', 'js_composer' ),
               'param_name' => 'subtit_ser3',
               "value"       => "",
               "description" => esc_html__("Enter Subtitle 3 for service", 'mistiri')
            ),


               array(

               'type' => 'textfield',
               'heading' => esc_html__( 'Text in bottom service', 'js_composer' ),
               'param_name' => 'text_bottom',
               "value"       => "",
               "description" => esc_html__("Text in bottom service icon and background", 'mistiri')
            ),
         
           

       )));
}

//The Projects


if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."The Projects", 'mistiri'),
   "base" => "the_project",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
          array(

               'type' => 'textfield',
               'heading' => esc_html__( 'Title the project', 'js_composer' ),
               'param_name' => 'title_projects',
               "value"       => "",
               "description" => esc_html__("Enter title for project", 'mistiri')
            ),
          array(

               'type' => 'textfield',
               'heading' => esc_html__( 'Subtitle the project', 'js_composer' ),
               'param_name' => 'subtitle_projects',
               "value"       => "",
               "description" => esc_html__("Enter title for project", 'mistiri')
            ),
           array(

               'type' => 'textfield',
               'heading' => esc_html__( 'ID project single', 'js_composer' ),
               'param_name' => 'id_projectsingle',
               "value"       => "",
               "description" => esc_html__("Enter ID project single", 'mistiri')
            ),
          

       )));
}

//BLOG & NEWS
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Blog", 'mistiri'),
   "base" => "mistiri_blognew",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
          array(

               'type' => 'textfield',
               'heading' => esc_html__( 'ID post', 'js_composer' ),
               'param_name' => 'id_post',
               "value"       => "",
               "description" => esc_html__("Enter ID for blog", 'mistiri')
            ),
        
          

       )));
}

//Content service style 01

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Content service style 01", 'mistiri'),
   "base" => "service_contentone",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
         array(

               'type' => 'textfield',
               'heading' => esc_html__( 'ID content tab', 'js_composer' ),
               'param_name' => 'id_content_tab',
               "value"       => "",
               "description" => esc_html__("ID content tab", 'mistiri')
            ),
     array(
             'type' => 'attach_image',
             'heading' => esc_html__( 'Image ', 'js_composer' ),
             'param_name' => 'img_cttebone',
             "value"       => "",
             "description" => esc_html__("Upload image", 'mistiri')
          ),
          array(

               'type' => 'textfield',
               'heading' => esc_html__( 'Title', 'js_composer' ),
               'param_name' => 'title_style_cttebone',
               "value"       => "",
               "description" => esc_html__("Title", 'mistiri')
            ),
           array(

               'type' => 'textarea',
               'heading' => esc_html__( 'Content', 'js_composer' ),
               'param_name' => 'content_cttebone',
               "value"       => "",
               "description" => esc_html__("Enter content ", 'mistiri')
            ),

               array(
              'type' => 'param_group',
              'value' => '',
              'param_name' => 'list_cttebone',
              // Note params is mapped inside param-group:
              'params' => array(
                  array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Class ',
                      'param_name' => 'class_list',
                  ),
                  array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Class Icon Fontweasone ',
                      'param_name' => 'icon_list',
                  ),
                   array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Name ',
                      'param_name' => 'name_list',
                  ),
                    array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'Link ',
                      'param_name' => 'link_list',
                  ),
                  
              
                ),
     
              ),

         array(
              'type' => 'dropdown',
              'value' => '',
              'heading' => 'Choose position content tab',
              'param_name' => 'position_ccttebone',
              'value' => array(
                esc_html__( '', 'js_contribution' )       => '',
                esc_html__( 'Open', 'js_composer' )       => 'open',
                esc_html__( 'Center', 'js_composer' )       => 'center',
                esc_html__( 'Close', 'js_composer' )       => 'close',
                ),
              ),
          

       )));
}

//Content service style 02

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Content service style 02", 'mistiri'),
   "base" => "service_contenttwo",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
         array(

               'type' => 'textfield',
               'heading' => esc_html__( 'ID content tab style 2', 'js_composer' ),
               'param_name' => 'id_content_tabtwo',
               "value"       => "",
               "description" => esc_html__("ID content style 2", 'mistiri')
            ),
    
          array(

               'type' => 'textfield',
               'heading' => esc_html__( 'Title', 'js_composer' ),
               'param_name' => 'title_style_cttebtwo',
               "value"       => "",
               "description" => esc_html__("Title", 'mistiri')
            ),
           array(

               'type' => 'textarea',
               'heading' => esc_html__( 'Content 1', 'js_composer' ),
               'param_name' => 'content_cttebtwo',
               "value"       => "",
               "description" => esc_html__("Enter content 1 ", 'mistiri')
            ),
            array(

               'type' => 'textarea',
               'heading' => esc_html__( 'Content 2', 'js_composer' ),
               'param_name' => 'content_cttebtwotwo',
               "value"       => "",
               "description" => esc_html__("Enter content 2", 'mistiri')
            ),


           array(
             'type' => 'attach_image',
             'heading' => esc_html__( 'Image ', 'js_composer' ),
             'param_name' => 'img_cttebtwo',
             "value"       => "",
             "description" => esc_html__("Upload image", 'mistiri')
          ),

         array(
              'type' => 'dropdown',
              'value' => '',
              'heading' => 'Choose position content tab',
              'param_name' => 'position_ccttebtwo',
              'value' => array(
                esc_html__( '', 'js_contribution' )       => '',
                esc_html__( 'Open', 'js_composer' )       => 'open',
                esc_html__( 'Center', 'js_composer' )       => 'center',
                esc_html__( 'Close', 'js_composer' )       => 'close',
                ),
              ),
          

       )));
}


//Content service style 03

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Content service style 03", 'mistiri'),
   "base" => "service_contentthree",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
         array(

               'type' => 'textfield',
               'heading' => esc_html__( 'ID content tab style 3', 'js_composer' ),
               'param_name' => 'id_content_tabthree',
               "value"       => "",
               "description" => esc_html__("ID content style 3", 'mistiri')
            ),
    
          array(

               'type' => 'textfield',
               'heading' => esc_html__( 'Title', 'js_composer' ),
               'param_name' => 'title_style_cttebthree',
               "value"       => "",
               "description" => esc_html__("Title", 'mistiri')
            ),
           array(

               'type' => 'textarea',
               'heading' => esc_html__( 'Content 1', 'js_composer' ),
               'param_name' => 'content_cttebthree',
               "value"       => "",
               "description" => esc_html__("Enter content 1 ", 'mistiri')
            ),
            array(

               'type' => 'textarea',
               'heading' => esc_html__( 'Content 2', 'js_composer' ),
               'param_name' => 'content_cttebtwothree',
               "value"       => "",
               "description" => esc_html__("Enter content 2", 'mistiri')
            ),



         array(
              'type' => 'dropdown',
              'value' => '',
              'heading' => 'Choose position content tab',
              'param_name' => 'position_ccttebthree',
              'value' => array(
                esc_html__( '', 'js_contribution' )       => '',
                esc_html__( 'Open', 'js_composer' )       => 'open',
                esc_html__( 'Center', 'js_composer' )       => 'center',
                esc_html__( 'Close', 'js_composer' )       => 'close',
                ),
              ),
          

       )));
}


//Content service style 04

if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__($pre_text."Content service style 04", 'mistiri'),
   "base" => "service_contentfour",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
         array(

               'type' => 'textfield',
               'heading' => esc_html__( 'ID content tab style 4', 'js_composer' ),
               'param_name' => 'id_content_tabfour',
               "value"       => "",
               "description" => esc_html__("ID content style 4", 'mistiri')
            ),
    
          array(

               'type' => 'textfield',
               'heading' => esc_html__( 'Title', 'js_composer' ),
               'param_name' => 'title_style_cttebfour',
               "value"       => "",
               "description" => esc_html__("Title", 'mistiri')
            ),
           array(

               'type' => 'textarea',
               'heading' => esc_html__( 'Content 1', 'js_composer' ),
               'param_name' => 'content_cttebfour',
               "value"       => "",
               "description" => esc_html__("Enter content 1 ", 'mistiri')
            ),
            array(

               'type' => 'textarea',
               'heading' => esc_html__( 'Content 2', 'js_composer' ),
               'param_name' => 'content_cttebtwofour',
               "value"       => "",
               "description" => esc_html__("Enter content 2", 'mistiri')
            ),
               array(

               'type' => 'textarea',
               'heading' => esc_html__( 'Content 3', 'js_composer' ),
               'param_name' => 'content_cttebthreefour',
               "value"       => "",
               "description" => esc_html__("Enter content 3", 'mistiri')
            ),

                  array(
              'type' => 'param_group',
              'value' => '',
              'param_name' => 'listtitle_cttebone',
              // Note params is mapped inside param-group:
              'params' => array(
                  array(
                      'type' => 'textfield',
                      'value' => '',
                      'heading' => 'List title ',
                      'param_name' => 'classlist',
                  ),
                  
              
                ),
     
              ),



         array(
              'type' => 'dropdown',
              'value' => '',
              'heading' => 'Choose position content tab',
              'param_name' => 'position_ccttebfour',
              'value' => array(
                esc_html__( '', 'js_contribution' )       => '',
                esc_html__( 'Open', 'js_composer' )       => 'open',
                esc_html__( 'Center', 'js_composer' )       => 'center',
                esc_html__( 'Close', 'js_composer' )       => 'close',
                ),
              ),
          

       )));
}