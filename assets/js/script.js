jQuery(document).ready(function() {
    jQuery('.img-ptg-container .img-ptg-content-hover-item').hover(function() {
        var id = jQuery(this).attr('data-item');
        jQuery(this).parents('.img-ptg-container').find('.img-ptg-content').find('.img-ptg-content-item').removeClass('act');
        jQuery(this).parents('.img-ptg-container').find('.img-ptg-content').find('.img-ptg-content-item[data-item="'+id+'"]').addClass('act');
        jQuery(this).parents('.img-ptg-container').find('.img-ptg-content-hover').find('.img-ptg-content-hover-item').removeClass('act');
        jQuery(this).parents('.img-ptg-container').find('.img-ptg-content-hover').find('.img-ptg-content-hover-item[data-item="'+id+'"]').addClass('act');
    });
    jQuery(".img-ptg-content")
        .on('touchstart', function(e) {
            touch_x = e.changedTouches[event.changedTouches.length - 1].clientX;
        })
        .on("click touchend", function (e) {
            touch_x2 = e.changedTouches[event.changedTouches.length - 1].clientX;
            var touch_num = touch_x2 - touch_x;
            var id = Number(jQuery(this).find('.img-ptg-content-item.act').attr('data-item'));
            var min = 1;
            var max = Number(jQuery(this).find('.img-ptg-content-item:last-child').attr('data-item'));
            if(touch_num < (-50) && id != max) {
                var new_id = id + 1;
            }
            else if(touch_num > 50 && id != min) {
                var new_id = id - 1;
            }
            else {
                var new_id = id;
            }
            var margin = (new_id * 100) - 100;
            jQuery(this).css({'margin-left': '-'+margin+'%'})
            jQuery(this).find('.img-ptg-content-item').removeClass('act');
            jQuery(this).parents('.img-ptg-container').find('.img-ptg-content-hover').find('.img-ptg-content-hover-item').removeClass('act');
            jQuery(this).find('.img-ptg-content-item[data-item="'+new_id+'"]').addClass('act');
            jQuery(this).parents('.img-ptg-container').find('.img-ptg-content-hover').find('.img-ptg-content-hover-item[data-item="'+new_id+'"]').addClass('act');
        });
});