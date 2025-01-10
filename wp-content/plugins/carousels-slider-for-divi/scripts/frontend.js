// This script is loaded both on the frontend page and in the Visual Builder.
// jQuery(document).ready(function($) {


(function($) {
  "use strict";
  // CONTENT CAROUSEL SLIDER

  if($(".divi8_content_carousel_item").length){
    $(".divi8_content_carousel_item").addClass("swiper-slide");
  }
  var str1='sliderBox_'
  var str2='.sliderBox_';
  $(".contentswiper").length && $(".contentswiper").each(function(index, value){
    var classAdd = str1 + index;
    var classCall = str2 + index;
    var next_slider = 'slider-next' + index;
    var prev_slider = 'slider-prev' + index;
    var scrllbar = 'scrolbr' + index;
    var pagibar = 'pagintion' + index;
    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);
    const divi8_content_carousel = $(this).data();
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var effect_name = divi8_content_carousel.effects;
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      effect: effect_name,
      coverflowEffect: {
        rotate: +divi8_content_carousel.coverflowRotation,
        stretch:  +divi8_content_carousel.coverflowstretch,
        depth:  +divi8_content_carousel.coverflowdepth,
        modifier: divi8_content_carousel.coverflowmodifier,
        slideShadows: "on" === divi8_content_carousel.coverflowshadow,
      },
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      autoplay: {
        enabled: 1 === divi8_content_carousel.autoplay,
        delay: parseInt(divi8_content_carousel.autoplayDelay),
      },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };
    var swiperInstance = new Swiper(classCall, swiperOptions);
    $(this).mouseenter(function () {
      swiperInstance.autoplay.stop();
    });

    $(this).mouseleave(function () {
      swiperInstance.autoplay.start();
    });
  });
  // IMAGE CAROUSEL SLIDER
  if($(".divi8_image_carousel_item").length){
    $(".divi8_image_carousel_item").addClass("swiper-slide");
  }
  var img_str1='imageBox_'
  var img_str2='.imageBox_';
  $(".imageswiper").length && $(".imageswiper").each(function(index, value){
    var classAdd = img_str1 + index;
    var classCall = img_str2 + index;
    var next_slider = 'img-slider-next' + index;
    var prev_slider = 'img-slider-prev' + index;
    var scrllbar = 'img-scrolbr' + index;
    var pagibar = 'img-pagintion' + index;

    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);
    const divi8_content_carousel = $(this).data();
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var effect_name = divi8_content_carousel.effects;
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      autoHeight: "on" === divi8_content_carousel.autoheight,
      effect: effect_name,
      coverflowEffect: {
        rotate: +divi8_content_carousel.coverflowRotation,
        stretch:  +divi8_content_carousel.coverflowstretch,
        depth:  +divi8_content_carousel.coverflowdepth,
        modifier: divi8_content_carousel.coverflowmodifier,
        slideShadows: "on" === divi8_content_carousel.coverflowshadow,
      },
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      autoplay: {
        enabled: 1 === divi8_content_carousel.autoplay,
        delay: parseInt(divi8_content_carousel.autoplayDelay),
      },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };

    var swiperInstance = new Swiper(classCall, swiperOptions);
    $(this).mouseenter(function () {
      swiperInstance.autoplay.stop();
    });

    $(this).mouseleave(function () {
      swiperInstance.autoplay.start();
    });

  });
  // LOGO CAROUSEL SLIDER
  if($(".divi8_logo_carousel_item").length){
    $(".divi8_logo_carousel_item").addClass("swiper-slide");
  }
  var logo_str1='logoBox_'
  var logo_str2='.logoBox_';
  $(".logoswiper").length && $(".logoswiper").each(function(index, value){
    var classAdd = logo_str1 + index;
    var classCall = logo_str2 + index;
    var next_slider = 'logo-slider-next' + index;
    var prev_slider = 'logo-slider-prev' + index;
    var scrllbar = 'logo-scrolbr' + index;
    var pagibar = 'logo-pagintion' + index;
    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);
    const divi8_content_carousel = $(this).data();
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      autoHeight: "on" === divi8_content_carousel.autoheight,
      effect: "slide",
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      freeMode: true,
      shortSwipes: false,
      longSwipes: false,
      autoplay: {
        enabled: 1 === divi8_content_carousel.autoplay,
        delay: parseInt(divi8_content_carousel.autoplayDelay),
      },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };
    var swiperInstance = new Swiper(classCall, swiperOptions);
    $(this).mouseenter(function () {
      swiperInstance.autoplay.stop();
    });

    $(this).mouseleave(function () {
      swiperInstance.autoplay.start();
    });
  });
  // TEAM CAROUSEL SLIDER
  if($(".divi8_team_carousel_item").length){
    $(".divi8_team_carousel_item").addClass("swiper-slide");
  }
  var team_str1='teamBox_'
  var team_str2='.teamBox_';
  $(".teamswiper").length && $(".teamswiper").each(function(index, value){
    var classAdd = team_str1 + index;
    var classCall = team_str2 + index;
    var next_slider = 'team-slider-next' + index;
    var prev_slider = 'team-slider-prev' + index;
    var scrllbar = 'team-scrolbr' + index;
    var pagibar = 'team-pagintion' + index;
    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);
    const divi8_content_carousel = $(this).data();
    var effect_name = divi8_content_carousel.effects;
    var slider_per_view = parseInt(divi8_content_carousel.slideperview);
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      autoHeight: "on" === divi8_content_carousel.autoheight,
      effect: effect_name,
      coverflowEffect: {
        rotate: +divi8_content_carousel.coverflowRotation,
        stretch:  +divi8_content_carousel.coverflowstretch,
        depth:  +divi8_content_carousel.coverflowdepth,
        modifier: divi8_content_carousel.coverflowmodifier,
        slideShadows: "on" === divi8_content_carousel.coverflowshadow,
      },
      cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
      },
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      autoplay: {
        enabled: 1 === divi8_content_carousel.autoplay,
        delay: parseInt(divi8_content_carousel.autoplayDelay),
      },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };
    new Swiper(classCall, swiperOptions);
    // $(this).mouseenter(function(){
    //     swiper.autoplay.stop();
    //   });

    //   $(this).mouseleave(function() {
    //     swiper.autoplay.start();
    //   });
  });
  // Testimonial CAROUSEL SLIDER
  if($(".divi8_testimonial_carousel_item").length){
    $(".divi8_testimonial_carousel_item").addClass("swiper-slide");
  }
  var team_str1='testimonialBox_'
  var team_str2='.testimonialBox_';
  $(".testimonialswiper").length && $(".testimonialswiper").each(function(index, value){
    var classAdd = team_str1 + index;
    var classCall = team_str2 + index;
    var next_slider = 'testimonial-slider-next' + index;
    var prev_slider = 'testimonial-slider-prev' + index;
    var scrllbar = 'testimonial-scrolbr' + index;
    var pagibar = 'testimonial-pagintion' + index;
    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);
    const divi8_content_carousel = $(this).data();
    var effect_name = divi8_content_carousel.effects;
    var slider_per_view = parseInt(divi8_content_carousel.slideperview);
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      autoHeight: "on" === divi8_content_carousel.autoheight,
      effect: effect_name,
      coverflowEffect: {
        rotate: +divi8_content_carousel.coverflowRotation,
        stretch:  +divi8_content_carousel.coverflowstretch,
        depth:  +divi8_content_carousel.coverflowdepth,
        modifier: divi8_content_carousel.coverflowmodifier,
        slideShadows: "on" === divi8_content_carousel.coverflowshadow,
      },
      cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
      },
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      autoplay: {
        enabled: 1 === divi8_content_carousel.autoplay,
        delay: parseInt(divi8_content_carousel.autoplayDelay),
      },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };
    new Swiper(classCall, swiperOptions);
    // $(this).mouseenter(function(){
    //     swiper.autoplay.stop();
    //   });

    //   $(this).mouseleave(function() {
    //     swiper.autoplay.start();
    //   });
  });
  // TESTIMONIAL CAROUSEL SLIDER  LITE
  var testi_str1='testiBox_'
  var testi_str2='.testiBox_';
  $(".testimonial-swiper").length && $(".testimonial-swiper").each(function(index, value){
    var classAdd = testi_str1 + index;
    var classCall = testi_str2 + index;
    var next_slider = 'testi-slider-next' + index;
    var prev_slider = 'testi-slider-prev' + index;
    var scrllbar = 'testi-scrolbr' + index;
    var pagibar = 'testi-pagintion' + index;

    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);

    const divi8_content_carousel = $(this).data();
    var slider_per_view = 1;
    if (divi8_content_carousel.effects === "coverflow"){
      var effect_name = "coverflow";
      slider_per_view = parseInt(divi8_content_carousel.slideperview);
    }else if(divi8_content_carousel.effects === "slider"){
      effect_name = divi8_content_carousel.effects;
      slider_per_view = parseInt(divi8_content_carousel.slideperview);
    }else{
      effect_name = divi8_content_carousel.effects;
    }
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      autoHeight: "on" === divi8_content_carousel.autoheight,
      effect: effect_name,
      coverflowEffect: {
        rotate: +divi8_content_carousel.coverflowRotation,
        stretch:  +divi8_content_carousel.coverflowstretch,
        depth:  +divi8_content_carousel.coverflowdepth,
        modifier: divi8_content_carousel.coverflowmodifier,
        slideShadows: "on" === divi8_content_carousel.coverflowshadow,
      },
      cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
      },
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      autoplay: {
        enabled: 1 === divi8_content_carousel.autoplay,
        delay: parseInt(divi8_content_carousel.autoplayDelay),
      },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };
    new Swiper(classCall, swiperOptions);
    // $(this).mouseenter(function(){
    //   swiper.autoplay.stop();
    // });
    // $(this).mouseleave(function() {
    //   swiper.autoplay.start();
    // });
  });

  // POST CAROUSEL
  var str1='sliderPost_'
  var str2='.sliderPost_';
  $(".postswiper").length && $(".postswiper").each(function(index, value){
    var classAdd = str1 + index;
    var classCall = str2 + index;
    var next_slider = 'slider-next' + index;
    var prev_slider = 'slider-prev' + index;
    var scrllbar = 'scrolbr' + index;
    var pagibar = 'pagintion' + index;
    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);
    const divi8_content_carousel = $(this).data();
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var effect_name = divi8_content_carousel.effects;
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      effect: effect_name,
      coverflowEffect: {
        rotate: +divi8_content_carousel.coverflowRotation,
        stretch:  +divi8_content_carousel.coverflowstretch,
        depth:  +divi8_content_carousel.coverflowdepth,
        modifier: divi8_content_carousel.coverflowmodifier,
        slideShadows: "on" === divi8_content_carousel.coverflowshadow,
      },
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      // autoplay: {
      //   enabled: 1 === divi8_content_carousel.autoplay,
      //   delay: parseInt(divi8_content_carousel.autoplayDelay),
      // },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };
    new Swiper(classCall, swiperOptions);
    // var swiper = new Swiper(classCall, swiperOptions);
    //  $(this).mouseenter(function(){
    //     swiper.autoplay.stop();
    //   });

    //   $(this).mouseleave(function() {
    //     swiper.autoplay.start();
    //   });
  });
  // PRODUCT CAROUSEL
  var str1='sliderProduct_'
  var str2='.sliderProduct_';
  $(".productswiper").length && $(".productswiper").each(function(index, value){
    var classAdd = str1 + index;
    var classCall = str2 + index;
    var next_slider = 'slider-next' + index;
    var prev_slider = 'slider-prev' + index;
    var scrllbar = 'scrolbr' + index;
    var pagibar = 'pagintion' + index;
    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);
    const divi8_content_carousel = $(this).data();
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var effect_name = divi8_content_carousel.effects;
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      effect: effect_name,
      coverflowEffect: {
        rotate: +divi8_content_carousel.coverflowRotation,
        stretch:  +divi8_content_carousel.coverflowstretch,
        depth:  +divi8_content_carousel.coverflowdepth,
        modifier: divi8_content_carousel.coverflowmodifier,
        slideShadows: "on" === divi8_content_carousel.coverflowshadow,
      },
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      autoplay: {
        enabled: 1 === divi8_content_carousel.autoplay,
        delay: parseInt(divi8_content_carousel.autoplayDelay),
      },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };
    new Swiper(classCall, swiperOptions);
    // var swiper = new Swiper(classCall, swiperOptions);
    //  $(this).mouseenter(function(){
    //     swiper.autoplay.stop();
    //   });

    //   $(this).mouseleave(function() {
    //     swiper.autoplay.start();
    //   });
  });
// INSTAGRAM CAROUSEL
  var str1='sliderInstagram_'
  var str2='.sliderInstagram_';
  $(".instagramswiper").length && $(".instagramswiper").each(function(index, value){
    var classAdd = str1 + index;
    var classCall = str2 + index;
    var next_slider = 'slider-next' + index;
    var prev_slider = 'slider-prev' + index;
    var scrllbar = 'scrolbr' + index;
    var pagibar = 'pagintion' + index;
    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);
    const divi8_content_carousel = $(this).data();
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var effect_name = divi8_content_carousel.effects;
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      effect: effect_name,
      coverflowEffect: {
        rotate: +divi8_content_carousel.coverflowRotation,
        stretch:  +divi8_content_carousel.coverflowstretch,
        depth:  +divi8_content_carousel.coverflowdepth,
        modifier: divi8_content_carousel.coverflowmodifier,
        slideShadows: "on" === divi8_content_carousel.coverflowshadow,
      },
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      autoplay: {
        enabled: 1 === divi8_content_carousel.autoplay,
        delay: parseInt(divi8_content_carousel.autoplayDelay),
      },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };
    new Swiper(classCall, swiperOptions);
    // var swiper = new Swiper(classCall, swiperOptions);
//  $(this).mouseenter(function(){
//     swiper.autoplay.stop();
//   });

//   $(this).mouseleave(function() {
//     swiper.autoplay.start();
//   });
  });
// GOOGLE REVIEW CAROUSEL
  var str1='sliderGReview_'
  var str2='.sliderGreview_';
  $(".googlereviewswiper").length && $(".googlereviewswiper").each(function(index, value){
    var classAdd = str1 + index;
    var classCall = str2 + index;
    var next_slider = 'slider-next' + index;
    var prev_slider = 'slider-prev' + index;
    var scrllbar = 'scrolbr' + index;
    var pagibar = 'pagintion' + index;
    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);
    const divi8_content_carousel = $(this).data();
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var effect_name = divi8_content_carousel.effects;
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      effect: effect_name,
      coverflowEffect: {
        rotate: +divi8_content_carousel.coverflowRotation,
        stretch:  +divi8_content_carousel.coverflowstretch,
        depth:  +divi8_content_carousel.coverflowdepth,
        modifier: divi8_content_carousel.coverflowmodifier,
        slideShadows: "on" === divi8_content_carousel.coverflowshadow,
      },
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      autoplay: {
        enabled: 1 === divi8_content_carousel.autoplay,
        delay: parseInt(divi8_content_carousel.autoplayDelay),
      },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };
    new Swiper(classCall, swiperOptions);
    // var swiper = new Swiper(classCall, swiperOptions);
//  $(this).mouseenter(function(){
//     swiper.autoplay.stop();
//   });

//   $(this).mouseleave(function() {
//     swiper.autoplay.start();
//   });
  });
// FACEBOOK FEED CAROUSEL
  var str1='sliderFB_'
  var str2='.sliderFB_';
  $(".fbswiper").length && $(".fbswiper").each(function(index, value){
    var classAdd = str1 + index;
    var classCall = str2 + index;
    var next_slider = 'slider-next' + index;
    var prev_slider = 'slider-prev' + index;
    var scrllbar = 'scrolbr' + index;
    var pagibar = 'pagintion' + index;
    $(this).addClass(classAdd);
    $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
    $(this).parent().find(".swiper-button-next").addClass(next_slider);
    $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
    $(this).parent().find(".swiper-pagination").addClass(pagibar);
    const divi8_content_carousel = $(this).data();
    const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
    var effect_name = divi8_content_carousel.effects;
    var swiperOptions = {
      slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      breakpoints: {
        1024: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[0]),
        },
        768: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[1]),
        },
        479: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
        200: {
          slidesPerView:
              carouselBreakpoint && parseInt(carouselBreakpoint[2]),
        },
      },
      direction: divi8_content_carousel.direction,
      loop: "on" === divi8_content_carousel.loop,
      spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
      effect: effect_name,
      coverflowEffect: {
        rotate: +divi8_content_carousel.coverflowRotation,
        stretch:  +divi8_content_carousel.coverflowstretch,
        depth:  +divi8_content_carousel.coverflowdepth,
        modifier: divi8_content_carousel.coverflowmodifier,
        slideShadows: "on" === divi8_content_carousel.coverflowshadow,
      },
      grabCursor: "on" === divi8_content_carousel.grabcursor,
      centeredSlides: 1 === divi8_content_carousel.centerslides,
      zoom: true,
      speed: parseInt(divi8_content_carousel.speed),
      autoplay: {
        enabled: 1 === divi8_content_carousel.autoplay,
        delay: parseInt(divi8_content_carousel.autoplayDelay),
      },
      observer:true,
      pagination: {
        el: '.' + pagibar,
        clickable: true,
        dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
        type: divi8_content_carousel.pagiType,
      },
      keyboard: {
        enabled: "on" === divi8_content_carousel.keyboard,
        onlyInViewport: false,
      },
      mousewheel: {
        enabled: "on" === divi8_content_carousel.mousewheel,
        invert: true,
      },
      disableOnInteraction: true,
      navigation: {
        nextEl: '.' + next_slider,
        prevEl: '.' + prev_slider,
      },
      scrollbar: {
        el: '.' + scrllbar,
      }
    };
    new Swiper(classCall, swiperOptions);
    // var swiper = new Swiper(classCall, swiperOptions);
//  $(this).mouseenter(function(){
//     swiper.autoplay.stop();
//   });

//   $(this).mouseleave(function() {
//     swiper.autoplay.start();
//   });
  });
// VIDEO CAROUSEL
if($(".divi8_video_carousel_item").length){
  $(".divi8_video_carousel_item").addClass("swiper-slide");
}
var str1='sliderVideo_'
var str2='.sliderVideo_';
$(".videoswiper").length && $(".videoswiper").each(function(index, value){
  var classAdd = str1 + index;
  var classCall = str2 + index;
  var next_slider = 'slider-next' + index;
  var prev_slider = 'slider-prev' + index;
  var scrllbar = 'scrolbr' + index;
  var pagibar = 'pagintion' + index;
  $(this).addClass(classAdd);
  $(this).parent().find(".swiper-button-prev").addClass(prev_slider);
  $(this).parent().find(".swiper-button-next").addClass(next_slider);
  $(this).parent().find(".swiper-scrollbar").addClass(scrllbar);
  $(this).parent().find(".swiper-pagination").addClass(pagibar);
  const divi8_content_carousel = $(this).data();
  const carouselBreakpoint = divi8_content_carousel.slideperview && divi8_content_carousel.slideperview.split("|");
  var swiperOptions = {
    slidesPerView: carouselBreakpoint && parseInt(carouselBreakpoint[0]),
    breakpoints: {
      1024: {
        slidesPerView:
            carouselBreakpoint && parseInt(carouselBreakpoint[0]),
      },
      768: {
        slidesPerView:
            carouselBreakpoint && parseInt(carouselBreakpoint[1]),
      },
      479: {
        slidesPerView:
            carouselBreakpoint && parseInt(carouselBreakpoint[2]),
      },
      200: {
        slidesPerView:
            carouselBreakpoint && parseInt(carouselBreakpoint[2]),
      },
    },
    direction: divi8_content_carousel.direction,
    loop: "on" === divi8_content_carousel.loop,
    spaceBetween:   parseInt(divi8_content_carousel.spacebetween),
    effect: 'slide',
    grabCursor: "on" === divi8_content_carousel.grabcursor,
    centeredSlides: 1 === divi8_content_carousel.centerslides,
    zoom: true,
    speed: parseInt(divi8_content_carousel.speed),
    autoplay: {
      enabled: 1 === divi8_content_carousel.autoplay,
      delay: parseInt(divi8_content_carousel.autoplayDelay),
    },
    observer:true,
    pagination: {
      el: '.' + pagibar,
      clickable: true,
      dynamicBullets: "on" === divi8_content_carousel.pagiDynamicbullets,
      type: divi8_content_carousel.pagiType,
    },
    keyboard: {
      enabled: "on" === divi8_content_carousel.keyboard,
      onlyInViewport: false,
    },
    mousewheel: {
      enabled: "on" === divi8_content_carousel.mousewheel,
      invert: true,
    },
    disableOnInteraction: true,
    navigation: {
      nextEl: '.' + next_slider,
      prevEl: '.' + prev_slider,
    },
    scrollbar: {
      el: '.' + scrllbar,
    }
  };
  new Swiper(classCall, swiperOptions);

});
// Add click event to each thumbnail
var thumbnails = document.querySelectorAll('.thumbnail');
thumbnails.forEach(function(thumbnail) {
  thumbnail.addEventListener('click', function() {
    var videoId = this.getAttribute('data-id');
    var videoTitle = this.getAttribute('data-title');
    openLightbox(videoId, videoTitle);
  });
});

// Open Lightbox function
function openLightbox(videoId, videoTitle) {
  var lightbox = document.getElementById('lightbox');
  var iframe = lightbox.querySelector('iframe');
  var videoTitleElement = document.getElementById('video-title');

  // Set the video title before opening the lightbox
  videoTitleElement.textContent = videoTitle;
  iframe.src = 'https://www.youtube.com/embed/' + videoId;
  lightbox.style.display = 'flex';
}

// Close Lightbox function
function closeLightbox() {
  var lightbox = document.getElementById('lightbox');
  var iframe = lightbox.querySelector('iframe');
  var videoTitleElement = document.getElementById('video-title');

  // Clear the video title when closing the lightbox
  videoTitleElement.textContent = '';

  iframe.src = '';
  lightbox.style.display = 'none';
}



})(jQuery);