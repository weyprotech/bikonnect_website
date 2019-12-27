@extends('backend.shared._layout')

@section('title', 'Bikonnect')

@section('content')
<div id="content">

    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-pencil-square-o"></i> </span>
                        <h2>觀看信件</h2>
                        
                        <ul class="nav nav-tabs pull-right in"><?php $i=1; ?>
                            <li class='active'>
                                <a data-toggle="tab" href="#hb_<?= $i++ ?>"> <span class="hidden-mobile hidden-tablet">基本資料</span> </a>
                            </li>
                        </ul>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->
                        <!-- widget content -->
                        <div class="widget-body">
                            <div class="tab-content"><?php $i=1; ?>
                                <div class="tab-pane active" id="hb_<?= $i++ ?>">
                                    <fieldset>
                                        <legend>信件資料</legend>                                    
                                        
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-2 control-label">名子</label>
                                            <div class="col-lg-5">
                                                <input class="form-control" type="text" value="{{ $mail->name }}">                                                           
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-2 control-label">電話</label>
                                            <div class="col-lg-5">
                                                <input class="form-control" type="text" value="{{ $mail->phone }}">
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-2 control-label">email</label>
                                            <div class="col-lg-5">
                                                <input class="form-control" type="text" value="{{ $mail->email }}">                   
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-2 control-label">內文</label>
                                            <div class="col-lg-5">
                                                <textarea class="form-control" placeholder="內文" rows="8">{{ $mail->content }}</textarea>                                                                                                                    
                                            </div>
                                        </div>                                                                                             
                                    </fieldset>
                                </div>                                  
                            </div>
                                
                            <div class="form-actions">                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="btn btn-default" href="{{ route('contact.contact_mail') }}">
                                            Back
                                        </a>
                                    </div>
                                </div>
                            </div>                            

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

        </div>
        <!-- end row -->

    </section>
    <!-- end widget grid -->

</div>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function(){ 
    $('div.content-edit').each(function (index, element) {
        $(element).summernote({
            height: 500,
            lang: 'zh-TW',
            toolbar: [
                ['misc', ['codeview']],
                ['para', ['ul']],
                ['font', ['fontname', 'fontsize', 'color', 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subsript', 'clear']],
                ['para', ['style', 'ol', 'ul', 'paragraph', 'height']],
                // ['insert', ['picture']],
                ['misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help']]
            ],
            callbacks: {
                onImageUpload: function (files) {
                    for (var i = 0; i < files.length; i++) {
                        sendFile(files[i], $(this));
                    }
                }
            }
        });
    });
});    
</script>
@endsection