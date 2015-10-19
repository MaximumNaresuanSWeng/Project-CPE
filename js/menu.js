 tlMenu = new TimelineLite({paused:true});
        el =$(".menu-block");
        tlMenu.to(el, .8, {margin: 5 , padding:20,  width:'200px', height:260, borderRadius:4,  ease:Back.easeInOut})
        .to($('.bar'), 1, { rotation:365, ease:Power1.easeInOut }, '-=.8')
        .to($('.bar-i'), 1, { width:18 , margin:3, ease:Back.easeIn }, '-=1')
        .to($('.bar-i.bar-1'), 1, { rotation:'-45deg' , ease:Back.easeIn }, '-=1')
        .to($('.bar-i.bar-2'), 1, {autoAlpha:0 , ease:Back.easeIn }, '-=1')
        .to($('.bar-i.bar-3'), 1, {rotation:'45deg' , ease:Back.easeIn }, '-=1')
        .staggerTo(el.find('.page_item'), .4, {marginTop:0, autoAlpha:1, ease:Back.easeInOut }, .1, '-=.5')


$('.menu-block').on('mouseenter', function(){
            tlMenu.play();
            $(this).addClass('.menu-active');
        });
        $('.menu-active').on('click', function(){
            tlMenu.reverse();
            $(this).removeClass('.menu-active');
        });
        $('.menu-block').on('mouseleave', function(){
            tlMenu.reverse();
            $(this).removeClass('.menu-active');
        });
        $('.page-item').on('click', function(){
            tlMenu.reverse();
            $(this).removeClass('.menu-active');
        });

        $('.arrow-left').on('mouseenter', function(){
            TweenLite.to($('.line-2'), .4, {marginLeft:20 , ease:Power2.easeInOut});
        });

        $('.arrow-left').on('mouseleave', function(){

            TweenLite.to($('.line-2'), .4, {marginLeft:3 , ease:Power2.easeInOut});
        });
