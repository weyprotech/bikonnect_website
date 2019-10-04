<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="{{ URL::asset('frontend/scripts/vendor.js') }}"></script>
<script src="{{ URL::asset('frontend/scripts/plugins.js') }}"></script>
<script src="{{ URL::asset('frontend/scripts/main.js') }}"></script>
<script src="{{ URL::asset('frontend/scripts/vivus.js') }}"></script>
<script src="{{ URL::asset('frontend/scripts/waypoints.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script>
    $(function() {
        var strength = new Vivus('strengthSVG', {
            start: 'manual',
            type: 'scenario-sync',
            duration: 10,
            forceRender: false,
            onReady: function (vivusObj) {
            var waypoint = new Waypoint({
                element: document.getElementById('strengthSVG'),
                handler: function(direction) {
                vivusObj.play();
                },
                offset: '70%' 
            })
            }
        }, function() {
            $('#strengthIMG').fadeIn(800);
        });        
    });

    $('.language_option').on('click',function(event){
        var language = $(this).data('language');
        Cookies.set('shop_laravel_language',language);
        // window.location=<?= $_SERVER['REMOTE_HOST'] ?>+"index.php/"+language;        
        location.reload();
    });
</script>