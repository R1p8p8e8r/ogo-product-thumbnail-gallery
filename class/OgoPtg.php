<?php

class OgoPtg {

    private static $initiated;

    public static function init()
    {
        if ( ! self::$initiated ) {
            self::initHooks();
        }
    }

    private static function initHooks()
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'loadStyleScript'] );
        self::$initiated = true;
    }

    static function loadStyleScript()
    {
        wp_enqueue_style('ogo-ptg-style', plugins_url('../assets/css/style.css', __FILE__), array(), '2.0.0');
        wp_enqueue_script('ogo-ptg-script', plugins_url('../assets/js/script.js', __FILE__), array('jquery'), '2.0.0', true);
    }

    static function add_img_container() {
        ?>
        <div class="img-ptg-container">
        <?php
    }

    static function add_hover_img() {
        $product = wc_get_product();
        $attachment_ids = $product->get_gallery_image_ids();
        $title = $product->get_title();
        $arr = [];
        if($attachment_ids){
            $post_thumbnail_id = $product->get_image_id();
            if($post_thumbnail_id) {
                $arr[] = wp_get_attachment_image_src($post_thumbnail_id, 'woocommerce_thumbnail', false);
            }
            foreach($attachment_ids as $k => $v) {
                $arr[] = wp_get_attachment_image_src($v, 'woocommerce_thumbnail', false);
            }
        }
        if($arr) {
            ?>
            <div class="img-ptg-content-swap">
                <div class="img-ptg-content">
                    <?php
                    $i = 1;
                    foreach($arr as $k => $v) {
                        ?>
                        <div class="img-ptg-content-item <?php if($i == 1) { echo 'act'; } ?>" data-item="<?php echo $i; ?>">
                            <img src="<?php echo $v[0]; ?>" width="<?php echo $v[1]; ?>" height="<?php echo $v[2]; ?>" alt="<?php echo $title; ?>" class="img-ptg-img">
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
            </div>
            <div class="img-ptg-content-hover">
                <?php
                $i = 1;
                foreach($arr as $k => $v) {
                    ?>
                    <div class="img-ptg-content-hover-item <?php if($i == 1) { echo 'act'; } ?>" data-item="<?php echo $i; ?>"></div>
                    <?php
                    $i++;
                }
                ?>
            </div>
            <?php } ?>
        </div><!-- end .img-ptg-container -->
        <?php
    }
}