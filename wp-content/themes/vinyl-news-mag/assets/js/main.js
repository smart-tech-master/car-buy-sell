(function ($) {

  $(document).ready(function() {


    $(".open-menu").click(function() {
       $(".navbar-collapse").addClass("in");
     });

         $(".close-menu").click(function() {
       $(".navbar-collapse").removeClass("in");
     });

     $(".open-menu").keypress(function(e) {
    var key = e.which;
    if (key == 13) // the enter key code
    {
       $(".navbar-collapse").addClass("in");
      }
  });

         $(".close-menu").keypress(function(e) {
    var key = e.which;
    if (key == 13) // the enter key code
    {
       $(".navbar-collapse").removeClass("in");
    }
     });
  });


  $('.main-slider').slick({
    infinite: true,
    autoplay: true,
    arrows: true,
    slidesToShow: 1,
    pauseOnHover: false,
    centerMode: false,
  });

  $(window).load(function(){
    $('.preload').fadeOut();
 });


})(jQuery);


const  vinyl_news_mag_focusableElements =
    'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
const vinyl_news_mag_modal = document.querySelector('#navbar-collapse1'); 

const vinyl_news_mag_firstFocusableElement = vinyl_news_mag_modal.querySelectorAll(vinyl_news_mag_focusableElements)[0]; 
const vinyl_news_mag_focusableContent = vinyl_news_mag_modal.querySelectorAll(vinyl_news_mag_focusableElements);
const vinyl_news_mag_lastFocusableElement = vinyl_news_mag_focusableContent[vinyl_news_mag_focusableContent.length - 1];


document.addEventListener('keydown', function(e) {
  let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

  if (!isTabPressed) {
    return;
  }

  if (e.shiftKey) { // if shift key pressed for shift + tab combination
    if (document.activeElement === vinyl_news_mag_firstFocusableElement) {
      vinyl_news_mag_lastFocusableElement.focus(); // add focus for the last focusable element
      e.preventDefault();
    }
  } else { // if tab key is pressed
    if (document.activeElement === vinyl_news_mag_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
      vinyl_news_mag_firstFocusableElement.focus(); // add focus for the first focusable element
      e.preventDefault();
    }
  }
});

vinyl_news_mag_firstFocusableElement.focus();