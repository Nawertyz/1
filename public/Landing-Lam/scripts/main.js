var core={init:function(){this.anchorLink(),this.featherIcon(),this.vidoPlayer(),this.headerNavMobile(),this.clientsCarousel(),this.mastheadScreen(),this.mastheadCarousel(),this.testimonialsCarousel(),this.formValidate()},featherIcon:function(){feather.replace()},headerNav:function(){$(window).scrollTop()>=10?$('[data-section="header"]').addClass("header__scroll"):$('[data-section="header"]').removeClass("header__scroll")},headerNavMobile:function(){$(".js-navbar-mobile-open").on("click",function(){$(".js-navbar-main").addClass("show")}),$(".js-navbar-mobile-close").on("click",function(){$(".js-navbar-main").removeClass("show")}),$(window).width()<992&&$(".js-anchor-link").on("click",function(){$(".js-navbar-main").removeClass("show")})},anchorLink:function(){$('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on("click",function(e){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var a=$(window).width(),s=$(this.hash);if((s=s.length?s:$("[name="+this.hash.slice(1)+"]")).length){if(event.preventDefault(),a>992)if("#about"==$(this).attr("href"))var t=-66;else if("#howItWork"==$(this).attr("href"))t=160;else if("#faq"==$(this).attr("href"))t=-132;else if("#pricing"==$(this).attr("href"))t=160;else t=110;else t=80;$("html, body").animate({scrollTop:s.offset().top-t},1e3,function(){var e=$(s);if(e.focus(),e.is(":focus"))return!1;e.attr("tabindex","-1"),e.focus()})}}})},formValidate:function(){$("#registerForm").validate({submitHandler:function(e){$("#successMessage").modal("show"),$("#registerForm")[0].reset(),setTimeout(function(){$("#successMessage").modal("hide")},2e3)}}),$("#contactForm").validate({submitHandler:function(e){$("#successMessage").modal("show"),$("#contactForm")[0].reset(),setTimeout(function(){$("#successMessage").modal("hide")},2e3)}})},mastheadScreen:function(){if(0!=$(".js-masthead-screen").length)new Swiper("#mastheadScreen",{speed:2e3,draggable:!0,allowTouchMove:!0,autoplay:{delay:4e3},loop:!0,pagination:{el:".masthead__screen--pagination",clickable:!0}})},mastheadCarousel:function(){if(0!=$(".js-masthead-carousel").length){var e=new Swiper("#mastheadCarousel",{effect:"cards",grabCursor:!0,navigation:{nextEl:".masthead__carousel--button-next",prevEl:".masthead__carousel--button-prev"},on:{init:function(){$(".js-swiper-visible").addClass("swiper-card")}}});e.on("reachBeginning",function(){$(".masthead__carousel--button-next").addClass("show"),$(".masthead__carousel--button-next").removeClass("hide"),$(".masthead__carousel--button-prev").addClass("hide"),$(".masthead__carousel--button-prev").removeClass("show")}),e.on("reachEnd",function(){$(".masthead__carousel--button-next").removeClass("show"),$(".masthead__carousel--button-next").addClass("hide"),$(".masthead__carousel--button-prev").removeClass("hide"),$(".masthead__carousel--button-prev").addClass("show")})}},clientsCarousel:function(){if(0!=$(".js-clients").length)new Swiper("#clientsCarousel",{speed:3e3,direction:"horizontal",zoom:!0,keyboard:{enabled:!0,onlyInViewport:!1},mousewheel:{invert:!0},autoplay:{delay:2e3},loop:!0,slidesPerView:2,freeMode:!0,breakpoints:{640:{slidesPerView:3,spaceBetween:0},768:{slidesPerView:4,spaceBetween:0},1024:{slidesPerView:4,spaceBetween:0},1199:{slidesPerView:5,spaceBetween:0}}})},testimonialsCarousel:function(){if(0!=$(".js-testimonials").length)new Swiper("#testimoniCarousel",{speed:2e3,draggable:!1,allowTouchMove:!1,autoplay:{delay:4e3},loop:!0,navigation:{nextEl:".testimonials__nav--next",prevEl:".testimonials__nav--prev"},pagination:{el:".testimonials__nav--pagination",clickable:!0}}),new Swiper("#testimoniCarouselAvatar",{speed:2e3,effect:"fade",draggable:!1,allowTouchMove:!1,autoplay:{delay:4e3},loop:!0,navigation:{nextEl:".testimonials__nav--next",prevEl:".testimonials__nav--prev"},pagination:{el:".testimonials__nav--pagination",clickable:!0}})},vidoPlayer:function(){var e=new Plyr(".js-video-player");$("#videoModal").on("hidden.bs.modal",function(a){e.stop()}),$("#videoModal").on("show.bs.modal",function(a){e.play()})}};jQuery(function(e){"use strict";core.init()}),$(window).resize(function(){"use strict";$(".js-navbar-main").removeClass("show")}),$(window).on("scroll",function(){core.headerNav();var e=$(document).scrollTop()+138;$(".js-anchor-link").each(function(){var a=$(this),s=$(a.attr("href"));s.position().top<=e&&s.position().top+s.height()>e?($(".js-anchor-link").removeClass("active"),a.addClass("active")):a.removeClass("active")})});