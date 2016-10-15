var headerTop = 43;

jQuery(window).scroll(function(event) {
  var windowPos = jQuery(window).scrollTop();

  if (windowPos >= headerTop) {
    jQuery('#main-navbar').addClass('highlight');
  } else{
    jQuery('#main-navbar').removeClass('highlight');
  };
});

jQuery(document).ready(function($) {
  jQuery(".aditional-info strong").parents('p').css("margin-bottom", "0");
  jQuery('.box').matchHeight();
});

/*
$('#scroll-top').click(function(){
    $('#page-top').ScrollTo({
      duration: 1500,
      easing: 'linear',
  });
});
*/