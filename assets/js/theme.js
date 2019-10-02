// Custome theme code

if ($('.clean-gallery').length > 0) {
   baguetteBox.run('.clean-gallery', { animation: 'slideIn'});
}

if ($('.clean-product').length > 0) {
    $(window).on("load",function() {
        $('.sp-wrap').smoothproducts();
    });
}

// Wir schauen ob überhaupt ein Cookie gesetzt ist, falls nein wird DE Standartsprache
if (document.cookie.indexOf("language") <= -1) {
  document.cookie="language=0; max-age=86400; path=/";
  location.reload();
}

// Funktion für den DE Sprachswitch
function SpracheDE() {
document.cookie="language=0; max-age=86400; path=/";
location.reload();
}

// Funktion für den ENG Sprachswitch
function SpracheEN() {
document.cookie="language=1; max-age=86400; path=/";
location.reload();
}

//Funktion für den Darkmode
function Darkmode() {
  
}
