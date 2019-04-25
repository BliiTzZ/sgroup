$(document).ready(function(){

    if($('.carousel').is(':visible')) {
            //Carousel presentation
        let carousel = $('#carousel-presentation');
        carousel.carousel({
            fullWidth: true,
            duration: 500,
            onCycleTo : function($current_item, dragged) {
            stopAutoplay();
            startAutoplay(carousel);
            }
        });

        var autoplay_id;
        function startAutoplay($carousel) {
            autoplay_id = setInterval(function() {
                $('#carousel-presentation').carousel('next');
            }, 7000); // every 7 seconds
        }

        function stopAutoplay() {
            if(autoplay_id) {
            clearInterval(autoplay_id);
            }
        }

        // move next carousel
        $('.moveNextCarousel').click(function(e){
            e.preventDefault();
            $('#carousel-presentation').carousel('next');
            $('.container-text-content').fadeOut();
            e.stopPropagation();
        });

        // move prev carousel
        $('.movePrevCarousel').click(function(e){
            e.preventDefault();
            $('#carousel-presentation').carousel('prev');
            $('.container-text-content').fadeOut();
            e.stopPropagation();
        });

    // Carousel réalisations
    let carouselRea = $('.carousel-realisation');
        carouselRea.carousel({
            duration: 500,
            onCycleTo : function($current_item, dragged) {
            stopAutoplayRea();
            startAutoplayRea(carouselRea);
            }
        });

        var autoplay_idRea;
        function startAutoplayRea($carousel) {
            autoplay_idRea = setInterval(function() {
                $('.carousel-realisation').carousel('next');
            }, 7000); // every 7 seconds
        }

        function stopAutoplayRea() {
            if(autoplay_idRea) {
            clearInterval(autoplay_idRea);
            }
        }

        // move next carousel
        $('.moveNextCarousel-rea').click(function(e){
            e.preventDefault();
            $('.carousel-realisation').carousel('next');
            e.stopPropagation();
        });

        // move prev carousel
        $('.movePrevCarousel-rea').click(function(e){
            e.preventDefault();
            $('.carousel-realisation').carousel('prev');
            e.stopPropagation();
        });



        //Carousel specialist
        let carouselSpe = $('#carousel-specialist');
        carouselSpe.carousel({
            fullWidth: false,
            duration: 500,
            numVisible: 5,
            indicators: true,
            dist : 0,
            padding : 30,
        });

        // move next carousel
        $('.moveNextCarousel-spe').click(function(e){
            e.preventDefault();
            $('#carousel-specialist').carousel('next');
            e.stopPropagation();
        });

        // move prev carousel
        $('.movePrevCarousel-spe').click(function(e){
            e.preventDefault();
            $('#carousel-specialist').carousel('prev');
            e.stopPropagation();
        });


        //Carousel temoignage
        let carouselTem = $('#carousel-temoignage');
            carouselTem.carousel({
                fullWidth: true,
                duration: 500,
            });

            // move next carousel
            $('.moveNextCarousel-tem').click(function(e){
                e.preventDefault();
                $('#carousel-temoignage').carousel('next');
                e.stopPropagation();
            });

            // move prev carousel
            $('.movePrevCarousel-tem').click(function(e){
                e.preventDefault();
                $('#carousel-temoignage').carousel('prev');
                e.stopPropagation();
            });


            //Carousel partenaire
        let carouselPar = $('#carousel-partenaire');
        carouselPar.carousel({
            fullWidth: false,
            duration: 500,
            numVisible: 5,
            dist : 0,
        });

        // move next carousel
        $('.moveNextCarousel-par').click(function(e){
            e.preventDefault();
            $('#carousel-partenaire').carousel('next');
            e.stopPropagation();
        });

        // move prev carousel
        $('.movePrevCarousel-par').click(function(e){
            e.preventDefault();
            $('#carousel-partenaire').carousel('prev');
            e.stopPropagation();
        });
    }
        // end Carousel partenaire

        // Agenda Gallery

        $('#image-gallery').lightSlider({
            gallery:true,
            item:1,
            thumbItem:9,
            slideMargin: 0,
            speed:500,
            loop:true,
            onSliderLoad: function() {
                $('#image-gallery').removeClass('cS-hidden');
            }
        });
});