// Custome theme code

if ($('.clean-gallery').length > 0) {
   baguetteBox.run('.clean-gallery', { animation: 'slideIn'});
}

if ($('.clean-product').length > 0) {
    $(window).on("load",function() {
        $('.sp-wrap').smoothproducts();
    });
}

function SpracheDE() {
document.cookie="language=0; max-age=86400; path=/";
location.reload();
}

function SpracheEN() {
document.cookie="language=1; max-age=86400; path=/";
location.reload();
}
