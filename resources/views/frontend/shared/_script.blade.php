<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="{{ URL::asset('frontend/scripts/vendor.js') }}"></script>
<script src="{{ URL::asset('frontend/scripts/plugins.js') }}"></script>
<script src="{{ URL::asset('frontend/scripts/main.js') }}"></script>

@if(stripos(Route::currentRouteAction(),'MainController@index'))
<script src="{{ URL::asset('frontend/scripts/vivus.js') }}"></script>
<script src="{{ URL::asset('frontend/scripts/waypoints.js') }}"></script>
@endif
<script src="{{ URL::asset('frontend/scripts/featherlight.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
    new WOW().init();
    $('.language_option').on('click', function(event) {
        var language = $(this).data('language');
        Cookies.set('shop_laravel_language', language);
        window.location = '{{ URL::route("main.index") }}' + '/' + language;
    });
    $(function() {
        $("#contact-form").validate({
            rules: {
                name: {
                    required: true
                },
                phone: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                content: {
                    required: true
                }
            },
            messages: {
                name: "Required!",
                phone: "Required!",
                email: {
                    required: "Required!",
                    email: "Your email must be in the format of name@domain.com"
                },
                content: "Required!"
            },
            highlight: function(element) {
                $(element).closest('.controls').addClass('error');
            },
            unhighlight: function(element) {
                $(element).closest('.controls').removeClass('error');
            },
            errorElement: 'div',
            errorClass: 'error_text',
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });

        @if(stripos(Route::currentRouteAction(), 'MainController@index'))
        var strength = new Vivus('strengthSVG', {
            start: 'manual',
            type: 'scenario-sync',
            duration: 10,
            forceRender: false,
            onReady: function(vivusObj) {
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
        @endif
    });
    var wow = new WOW({
      boxClass: 'wow', // animated element css class (default is wow)
      animateClass: 'animated', // animation css class (default is animated)
      offset: 0, // distance to the element when triggering the animation (default is 0)
      mobile: true, // trigger animations on mobile devices (default is true)
      live: true, // act on asynchronously loaded content (default is true)
      callback: function (box) {
        // the callback is fired every time an animation is started
        // the argument that is passed in is the DOM node being animated
      },
      scrollContainer: null, // optional scroll container selector, otherwise use window,
      resetAnimation: true, // reset animation on end (default is true)
    });
    wow.init();
</script>