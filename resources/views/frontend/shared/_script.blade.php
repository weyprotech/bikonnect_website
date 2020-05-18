<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="{{ URL::asset('frontend/scripts/vendor.js') }}"></script>
<script src="{{ URL::asset('frontend/scripts/plugins.js') }}"></script>
<script src="{{ URL::asset('frontend/scripts/main.js') }}"></script>

@if(stripos(Route::currentRouteAction(),'MainController@index'))
<script src="{{ URL::asset('frontend/scripts/vivus.js') }}"></script>
<script src="{{ URL::asset('frontend/scripts/waypoints.js') }}"></script>
@endif

<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
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
</script>