<script>
	(function() {function maybePrefixUrlField() {
if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
this.value = "http://" + this.value;
}
}

var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
if (urlFields) {
for (var j=0; j < urlFields.length; j++) {
urlFields[j].addEventListener('blur', maybePrefixUrlField);
}
}
})();
</script>
<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:700%2C900%7CRoboto:400%7CBarlow:700" rel="stylesheet" property="stylesheet" media="all" type="text/css">

<script>
	if(typeof revslider_showDoubleJqueryError === "undefined") {
  function revslider_showDoubleJqueryError(sliderID) {
    var err = "<div class='rs_error_message_box'>";
    err += "<div class='rs_error_message_oops'>Oops...</div>";
    err += "<div class='rs_error_message_content'>";
    err += "You have some jquery.js library include that comes after the Slider Revolution files js inclusion.<br>";
    err += "To fix this, you can:<br>&nbsp;&nbsp;&nbsp; 1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on";
    err += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jQuery.js inclusion and remove it";
    err += "</div>";
  err += "</div>";
    var slider = document.getElementById(sliderID); slider.innerHTML = err; slider.style.display = "block";
  }
}
</script>
<link rel="stylesheet" id="elementor-icons-dsvy-digicop-icon-css" href="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/dsvy-digicop-icon/flaticon8a54.css?ver=1.0.0') }}" media="all" />
<link rel="stylesheet" id="owl-carousel-css" href="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/owl-carousel/assets/owl.carousel.min4c7e.css?ver=5.6.2') }}" media="all" />
<link rel="stylesheet" id="owl-carousel-theme-css" href="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/owl-carousel/assets/owl.theme.default.min4c7e.css?ver=5.6.2') }}" media="all" />
<link rel="stylesheet" id="dsvy_digicop_icon-css" href="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/dsvy-digicop-icon/flaticon4c7e.css?ver=5.6.2') }}" media="all" />
<!--
<script id="contact-form-7-js-extra">
var wpcf7 = {"apiSettings":{"root":"https:\/\/digicop.designervily.com\/demo2\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"cached":"1"};
</script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/plugins/contact-form-7/includes/js/scripts9dff.js?ver=5.3.2') }}" id="contact-form-7-js"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-includes//js/wp-embed.min4c7e.js?ver=5.6.2') }}" id="wp-embed-js"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/owl-carousel/owl.carousel.min4c7e.js?ver=5.6.2') }}" id="owl-carousel-js') }}"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/waypoints/jquery.waypoints.min4c7e.js?ver=5.6.2') }}" id="waypoints-js') }}"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/numinate/numinate.min4c7e.js?ver=5.6.2') }}" id="numinate-js') }}"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/jquery-circle-progress/circle-progress.min4c7e.js?ver=5.6.2') }}" id="jquery-circle-progress-js"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/plugins/mailchimp-for-wp/assets/js/forms.mina288.js?ver=4.8.1') }}" id="mc4wp-forms-api-js"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/plugins/elementor/assets/js/frontend-modules.min952b.js?ver=3.0.16') }}" id="elementor-frontend-modules-js"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-includes//js/jquery/ui/core.min35d0.js?ver=1.12.1" id="jquery-ui-core-js') }}"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/plugins/elementor/assets/lib/dialog/dialog.mina288.js?ver=4.8.1') }}" id="elementor-dialog-js"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js?ver=4.0.2') }}" id="elementor-waypoints-js"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/plugins/elementor/assets/lib/swiper/swiper.min48f5.js?ver=5.3.6') }}" id="swiper-js"></script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/plugins/elementor/assets/lib/share-link/share-link.min952b.js?ver=3.0.16') }}" id="share-link-js"></script>
<script id="elementor-frontend-js-before">
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"version":"3.0.16","is_static":false,"legacyMode":{"elementWrappers":false},"urls":{"assets":"https:\/\/digicop.designervily.com\/demo2\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":12263,"title":"Digicop%20Demo%202%20%E2%80%93%20Security%20And%20CCTV%20WordPress%20Theme","excerpt":"","featuredImage":false}};
</script>
<script src="{{ asset('assets/grupoalertaweb/wp-content/plugins/elementor/assets/js/frontend.min952b.js?ver=3.0.16') }}" id="elementor-frontend-js"></script>
-->
