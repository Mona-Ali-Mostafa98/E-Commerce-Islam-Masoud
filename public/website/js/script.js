
$(document).ready(function () {

  // loading

  $("body").css('overflow-y', 'auto');
  $('#loading').fadeOut(500);



  // user sub menu 

  $(".top-nav-user").click(function(){
    $(".top-nav-user .sub-menu").toggleClass("d-flex");
  });
  $(".top-nav-user").mouseover(function(){
    $(".top-nav-user .sub-menu").addClass("d-flex");
  });
  $(".top-nav-user").mouseleave(function(){
    $(".top-nav-user .sub-menu").removeClass("d-flex");
  });


  // notification sub menu 

  $(".top-nav-notification").click(function(){
    $(".top-nav-notification .sub-menu").toggleClass("d-flex");
  });
  $(".top-nav-notification").mouseover(function(){
    $(".top-nav-notification .sub-menu").addClass("d-flex");
  });
  $(".top-nav-notification").mouseleave(function(){
    $(".top-nav-notification .sub-menu").removeClass("d-flex");
  });

  
  // cart sub menu 

  $(".top-nav-cart").click(function(){
    $(".top-nav-cart .sub-menu").toggleClass("d-flex");
  });
  $(".top-nav-cart").mouseover(function(){
    $(".top-nav-cart .sub-menu").addClass("d-flex");
  });
  $(".top-nav-cart").mouseleave(function(){
    $(".top-nav-cart .sub-menu").removeClass("d-flex");
  });



  // ----- scroll top button ------

  var btn_top = $('#scroll-top');
  var btn_bottom = $('.scroll-bottom');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn_top.addClass('show');
    } else {
      btn_top.removeClass('show');
    }
  })

btn_top.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

btn_bottom.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:730}, '300');
});

});

// -------------------



var verify = $('#virify');
function goToNextInput(e) {
  var key = e.which,
    t = $(e.target),
    sib = t.prev('input');

  if (key != 9 && (key < 48 || key > 57)) {
    e.preventDefault();
    return false;
  }

  if (key === 9) {
    return true;
  }

  if (!sib || !sib.length) {
    sib = verify.find('input').eq(0);
  }
  sib.select().focus();
}
function onKeyDown(e) {
  var key = e.which;

  if (key === 9 || (key >= 48 && key <= 57)) {
    return true;
  }

  e.preventDefault();
  return false;
}
function onFocus(e) {
  $(e.target).select();
}
verify.on('keyup', 'input', goToNextInput);
verify.on('keydown', 'input', onKeyDown);
verify.on('click', 'input', onFocus);


















// upload profile pic
if ($(".form-addbuilder .profile-pic").length > 0) {
  const imgDiv = document.querySelector('.profile-pic');
  const img = document.querySelector('#photo');
  const file = document.querySelector('#file');
  const uploadBtn = document.querySelector('#uploadBtn');

  //if user hover on img div 

  imgDiv.addEventListener('mouseenter', function(){
      uploadBtn.style.display = "block";
  });

  //if we hover out from img div

  imgDiv.addEventListener('mouseleave', function(){
      uploadBtn.style.display = "none";
  });

  //when we choose a pic to upload

  file.addEventListener('change', function(){
  const choosedFile = this.files[0];
  if (choosedFile) {
      const reader = new FileReader(); 
      reader.addEventListener('load', function(){
          img.setAttribute('src', reader.result);
      });
      reader.readAsDataURL(choosedFile);
  }
  });
}


$('.quantity.plus').click(function(e) {
    let $input = $(this).next('input.qty');
    let val = parseInt($input.val());
    $input.val( val+1 ).change();

  });
  
  $('.quantity.minus').click(function(e) {
    let $input = $(this).prev('input.qty');
    var val = parseInt($input.val());
    if (val > 1) {
        $input.val( val-1 ).change();
    } 
  });

  $('.product .quantity.plus').mouseover(function(){
    $(this).parent(".product-quantity").addClass("active");
  })
  $(".product .product-quantity").mouseleave(function(){
    $(this).removeClass("active");
  })


// ----- star rate ------
$(function () {
    $("#rateYo").rateYo({
      rating: $("#rateYo").attr("rateYo"),
      starWidth: "20px",
      ratedFill: "#FFC107",
      readOnly: true
    });
    $(".product-rate").rateYo({
      rating: $(".product-rate").attr("rateYo"),
      starWidth: "15px",
      ratedFill: "#FFBF26",
      readOnly: true
    });
    $(".user-rate").rateYo({
      rating: $(".user-rate").attr("rateYo"),
      starWidth: "15px",
      ratedFill: "#FFC107",
      readOnly: true
    });
  
    $("#your-rate").rateYo({
      starWidth: "15px",
      ratedFill: "#FFC107",
      rating: 0,
      fullStar: true
    });



    $(".partners.owl-carousel").owlCarousel({
      nav: false,
      loop: true,
      autoplay: true,
      autoplaySpeed: 600,
      autoplayTimeout:1500,
      autoplayHoverPause: true,
      responsiveClass: true,
      margin: 20,
      rtl: true,
      responsive: {
          0: {
              items: 2
          },
          600: {
              items: 2
          },
          1000: {
              items: 3
          },
          1300: {
              items: 4
          }
      }
    });


    var changeSlide = 4; // mobile -1, desktop + 1
// Resize and refresh page. slider-two slideBy bug remove
var slide = changeSlide;
if ($(window).width() < 600) {
    var slide = changeSlide;
    slide--;
} else if ($(window).width() > 999) {
    var slide = changeSlide;
    slide++;
} else {
    var slide = changeSlide;
}

$('.one').owlCarousel({
  nav: false,
  items: 1,
rtl:true,
autoplay: 5000,
})
$('.two').owlCarousel({
  nav: false,
  margin: 10,
  responsive: {
      0: {
          items: changeSlide - 1,
          slideBy: changeSlide - 1
      },
      600: {
          items: changeSlide,
          slideBy: changeSlide
      },
      1000: {
          items: changeSlide + 1,
          slideBy: changeSlide + 1
      }
  }
})
var owl = $('.one');
owl.owlCarousel();
owl.on('translated.owl.carousel', function (event) {

  $('.slider-two .item').removeClass("active");
  var c = $(".slider .owl-item.active").index();
  $('.slider-two .item').eq(c).addClass("active");
  var d = Math.ceil((c + 1) / (slide)) - 1;
  $(".slider-two .owl-dots .owl-dot").eq(d).trigger('click');
})

$('.slider-two .item').click(function () {
  var b = $(".item").index(this);
  $(".slider .owl-dots .owl-dot").eq(b).trigger('click');
  $(".slider-two .item").removeClass("active");
  $(this).addClass("active");
});
var owl2 = $('.two');
owl2.owlCarousel();
  
})  

//  aos animation
AOS.init();







// price slider

var $slider = $("#slider");
var $fill = $(".bar .fill");

function setBar() {
	$fill.css("width", $slider.val() + "%");
}

$slider.on("input", setBar);

setBar();


