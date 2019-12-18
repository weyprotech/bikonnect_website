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
                        <h2>編輯聯絡我們</h2>
                        
                        <ul class="nav nav-tabs pull-right in"><?php $i=1; ?>
                            @foreach($web_langList as $langKey => $langValue)
                                <li {{ $langKey == 0 ? 'class=active' : '' }}>
                                    <a data-toggle="tab" href="#hb_{{ $langValue->langId }}"> <span class="hidden-mobile hidden-tablet"> {{ $langValue->name }} </span> </a>
                                </li>
                            @endforeach                            
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
                            
                            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('contact.edit',$content->Id ) }}"
                            data-bv-message="This value is not valid"
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <input type="hidden" name="uuid" value="{{ $content['uuid'] }}">
                                
                                <div class="tab-content"><?php $i=1; ?>
                                    @foreach($web_langList as $langKey => $langValue)
                                        <div class="tab-pane {{ $langKey == 0 ? 'active' : '' }}" id="hb_{{ $langValue->langId }}">
                                            <fieldset>
                                                <legend>{{ $langValue->name }}</legend>
                                                @csrf
                                                <input type="hidden" name="contentlangs[{{ $langValue->langId }}][langId]" value="{{ $langValue->langId }}">
                                                
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">地址</label>
                                                    <div class="col-lg-5">
                                                        <textarea class="form-control" rows="5" name="contentlangs[{{ $langValue->langId }}][address]" data-bv-notempty="true" data-bv-notempty-message="請輸入地址">{!! $langdata[$langValue->langId]->address !!}</textarea>
                                                    </div>
                                                </div>  

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">地圖網址</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" type="text" name="contentlangs[{{ $langValue->langId }}][map]"  data-bv-notempty="true" data-bv-notempty-message="請輸入地圖網址" value="{!! $langdata[$langValue->langId]->map !!}">                                                        
                                                    </div>
                                                </div>  

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">email</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" type="text" name="contentlangs[{{ $langValue->langId }}][email]"  data-bv-notempty="true" data-bv-notempty-message="請輸入email" value="{!! $langdata[$langValue->langId]->email !!}">
                                                    </div>
                                                </div> 

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">電話</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" type="text" name="contentlangs[{{ $langValue->langId }}][phone]"  data-bv-notempty="true" data-bv-notempty-message="請輸入電話" value="{!! $langdata[$langValue->langId]->phone !!}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">傳真</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" type="text" name="contentlangs[{{ $langValue->langId }}][fax]"  data-bv-notempty="true" data-bv-notempty-message="請輸入傳真" value="{!! $langdata[$langValue->langId]->fax !!}">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endforeach                                    
                                </div>
                                
                                <div class="form-actions">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
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