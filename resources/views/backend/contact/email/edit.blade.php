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
                        <h2>編輯Email</h2>
                        
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
                            
                            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('contact.email_edit',$email['Id'] ) }}"
                            data-bv-message="This value is not valid"
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <input type="hidden" name="uuid" value="{{ $email['uuid'] }}">
                                
                                <div class="tab-content"><?php $i=1; ?>
                                    <div class="tab-pane active" id="hb_<?= $i++ ?>">
                                        <fieldset>
                                            <legend>基本資料</legend>
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Email</label>
                                                <div class="col-lg-5">                                                        
                                                    <input type="text" class="form-control" name="email"
                                                    data-bv-notempty="true"
                                                    data-bv-notempty-message="請輸入Email"
                                                    value="{{ $email['email'] }}"
                                                    >                                                        
                                                </div>
                                            </div>                                           
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-default" href="{{ route('contact.email_index') }}">
                                                Back
                                            </a>
                                            <button class="btn btn-primary" type="submit" id="save">
                                                <i class="fa fa-save"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>

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
                //['font', ['fontname', 'fontsize', 'color', 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subsript', 'clear']],
                //['para', ['style', 'ol', 'ul', 'paragraph', 'height']],
                // ['insert', ['picture']]
                //['misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help']]
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