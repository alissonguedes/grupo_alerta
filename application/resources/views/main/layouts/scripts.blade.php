<script>
 (function() {
  function maybePrefixUrlField() {
   if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
    this.value = "http://" + this.value;
   }
  }

  var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
  if (urlFields) {
   for (var j = 0; j < urlFields.length; j++) {
    urlFields[j].addEventListener('blur', maybePrefixUrlField);
   }
  }
 })();
</script>
<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:700%2C900%7CRoboto:400%7CBarlow:700" rel="stylesheet" property="stylesheet" media="all" type="text/css">

<script>
 if (typeof revslider_showDoubleJqueryError === "undefined") {
  function revslider_showDoubleJqueryError(sliderID) {
   var err = "<div class='rs_error_message_box'>";
   err += "<div class='rs_error_message_oops'>Oops...</div>";
   err += "<div class='rs_error_message_content'>";
   err += "You have some jquery.js library include that comes after the Slider Revolution files js inclusion.<br>";
   err += "To fix this, you can:<br>&nbsp;&nbsp;&nbsp; 1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on";
   err += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jQuery.js inclusion and remove it";
   err += "</div>";
   err += "</div>";
   var slider = document.getElementById(sliderID);
   slider.innerHTML = err;
   slider.style.display = "block";
  }
 }
</script>
<link rel="stylesheet" id="elementor-icons-dsvy-digicop-icon-css" href="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/dsvy-digicop-icon/flaticon8a54.css?ver=1.0.0') }}" media="all" />
<link rel="stylesheet" id="owl-carousel-css" href="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/owl-carousel/assets/owl.carousel.min4c7e.css?ver=5.6.2') }}" media="all" />
<link rel="stylesheet" id="owl-carousel-theme-css" href="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/owl-carousel/assets/owl.theme.default.min4c7e.css?ver=5.6.2') }}" media="all" />
<link rel="stylesheet" id="dsvy_digicop_icon-css" href="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/dsvy-digicop-icon/flaticon4c7e.css?ver=5.6.2') }}" media="all" />

<script src="{{ asset('assets/grupoalertaweb/wp-content/themes/digicop/libraries/owl-carousel/owl.carousel.min4c7e.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js"></script>
