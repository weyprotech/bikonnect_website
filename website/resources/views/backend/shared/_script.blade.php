<!-- #PLUGINS -->
<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="{{ URL::asset('backend/js/libs/jquery-3.2.1.min.js') }}"><\/script>');
    }
</script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="{{ URL::asset('backend/js/libs/jquery-ui.min.js') }}"><\/script>');
    }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="{{ URL::asset('backend/js/app.config.js') }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ URL::asset('backend/js/bootstrap/bootstrap.min.js') }}"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="{{ URL::asset('backend/js/notification/SmartNotification.min.js') }}"></script>

<!-- JARVIS WIDGETS -->
<script src="{{ URL::asset('backend/js/smartwidgets/jarvis.widget.min.js') }}"></script>

<!-- JQUERY VALIDATE -->
<script src="{{ URL::asset('backend/js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/plugin/bootstrapvalidator/bootstrapValidator.min.js') }}"></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{ URL::asset('backend/js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="{{ URL::asset('backend/js/plugin/select2/select2.min.js') }}"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="{{ URL::asset('backend/js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

<!-- browser msie issue fix -->
<script src="{{ URL::asset('backend/js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>

<!-- FastClick: For mobile devices -->
<script src="{{ URL::asset('backend/js/plugin/fastclick/fastclick.min.js') }}"></script>

<script src="{{ URL::asset('backend/js/plugin/superbox/superbox.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/plugin/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>

<!--[if IE 8]>
    <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
<![endif]-->

<!-- MAIN APP JS FILE -->
<script src="{{ URL::asset('backend/js/app.min.js') }}"></script>

<script>
    $(function () {
        pageSetUp();
        drawBreadCrumb();
        
        $('input.imageupload').change(function(){
            var obj = $(this);
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(e){
                $("#" + obj.data('prev')).attr('src', e.target.result).show();
            }
        });
        
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        
        $('#form').bootstrapValidator({
            excluded: ":disabled"
        });
        $("div#preview").hover(
            function () {
                $(this).css("overflow", "visible").css("z-index", 9999);
            },
            function () {
                $(this).css("overflow", "hidden").css("z-index", 1);
            }
        );
    });
</script>