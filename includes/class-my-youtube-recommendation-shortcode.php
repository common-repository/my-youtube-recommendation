<?php

if ( ! class_exists ('My_Youtube_Recommendation_Shortcode') ) {

    class My_Youtube_Recommendation_Shortcode {

        public function __construct() {

            add_shortcode ('my_youtube', array ( $this, 'shortcode') );

        }

        // [my_youtube]
        public function shortcode( $args, $content=null ) {
            extract ( $args );

            $shortcode_unique_id = 'my_yt_rec_shortcode_' . wp_rand(1, 1000);

            $limit      = isset( $limit ) ? $limit : 1;
            $layout     = (isset( $layout ) && $layout == 'list')  ? $layout : 'grid';
            $language 	= get_locale();

            $content     = "<div id='$shortcode_unique_id'>" . __('Loading...', 'my-youtube-recommendation') . "</div>
                            <script>
                            MyYoutubeRecommendation.listCallbacks.push({
                                containerId: '$shortcode_unique_id',
                                layout: '$layout',
                                limit: $limit,
                                lang: '$language',
                                callback: MyYoutubeRecommendation.buildList,
                            });
                            </script>
                            ";

            return $content;

            
        }

    }
   
}