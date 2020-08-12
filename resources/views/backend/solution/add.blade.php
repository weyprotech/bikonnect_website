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
                        <h2>主題區維護</h2>
                        
                        <ul class="nav nav-tabs pull-right in">
                            <li class='active'>
                                <a data-toggle="tab" href="#hb_0"> <span class="hidden-mobile hidden-tablet">連結設定</span> </a>
                            </li>
                            @foreach($web_langList as $langKey => $langValue)
                                <li>
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
                            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('solution.add') }}"
                            data-bv-message="This value is not valid"
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">                          
                                <div class="tab-content">
                                    <div class="tab-pane active" id="hb_0">
                                        <fieldset>
                                            <legend>產品連結</legend>
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">產品連結</label>
                                                <div class="col-lg-5">
                                                    <input type="text" id="url" class="form-control" name="url" value="" data-bv-notempty="true" data-bv-notempty-message="請輸入產品連結" pattern="[A-Za-z0-9_]+" data-bv-regexp-message="只能輸入英文、數字、底線" />
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    @foreach($web_langList as $langKey => $langValue)                                    
                                        <div class="tab-pane" id="hb_{{ $langValue->langId }}">
                                            <fieldset>
                                                <legend>{{ $langValue->name }}</legend>
                                                <input type="hidden" name="contentlangs[{{ $langValue->langId }}][langId]" value="{{ $langValue->langId }}">

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">主題</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="contentlangs[{{ $langValue->langId }}][title]"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入主題">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">meta_title</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="contentlangs[{{ $langValue->langId }}][meta_title]"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入meta_title"
                                                        >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">meta_description</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="contentlangs[{{ $langValue->langId }}][meta_description]"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入meta_description"
                                                        >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">meta_keywords</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="contentlangs[{{ $langValue->langId }}][meta_keywords]"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入meta_keywords"
                                                        >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Youtube</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="contentlangs[{{ $langValue->langId }}][video_youtube]"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入Youtube">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">DM</label>
                                                    <div class="col-lg-5">
                                                        <input type="file" class="btn btn-default imageupload" name="contentlangs[{{ $langValue->langId }}][dm_file]"
                                                            data-bv-file="true"
                                                            data-bv-file-extension="png,gif,jpg,jpeg,pdf"
                                                            data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif,application/pdf"
                                                            data-bv-file-message="DM格式不符">
                                                    </div>                                                   
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">內文</label>
                                                    <div class="col-lg-5">
                                                        <textarea class="form-control" name="contentlangs[{{ $langValue->langId }}][video_content]" placeholder="內文" rows="4" data-bv-notempty="true" data-bv-notempty-message="請輸入內文" value=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">圖文區標題-1</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="contentlangs[{{ $langValue->langId }}][content_title_1]"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入圖文區標題-1"
                                                        >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">圖文區圖片-1</label>
                                                    <div class="col-lg-5">
                                                        <p>
                                                            <img id="preview_{{ $langValue->langId }}_img1" width="auto" style="max-width:250px" />
                                                        </p>
                                                        <input type="file" class="btn btn-default imageupload" name="contentlangs[{{ $langValue->langId }}][content_img_1]"
                                                            data-prev="preview_{{ $langValue->langId }}_img1"
                                                            data-bv-file="true"
                                                            data-bv-file-extension="png,gif,jpg,jpeg"
                                                            data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif"
                                                            data-bv-file-message="圖檔格式不符">
                                                        <p class="help-block">
                                                            圖片大小：638 x 425
                                                        </p>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">圖文區內文-1</label>
                                                    <div class="col-sm-9">
                                                        <div class="content-edit"></div>
                                                        <input type="hidden" id="content" name="contentlangs[{{ $langValue->langId }}][content_content_1]">
                                                    </div>
                                                </div>   
                                                
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">圖文區標題-2</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="contentlangs[{{ $langValue->langId }}][content_title_2]"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入圖文區標題-2"
                                                        >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">圖文區圖片-2</label>
                                                    <div class="col-lg-5">
                                                        <p>
                                                            <img id="preview_{{ $langValue->langId }}_img2" width="auto" style="max-width:250px" />
                                                        </p>
                                                        <input type="file" class="btn btn-default imageupload" name="contentlangs[{{ $langValue->langId }}][content_img_2]"
                                                            data-prev="preview_{{ $langValue->langId }}_img2"
                                                            data-bv-file="true"
                                                            data-bv-file-extension="png,gif,jpg,jpeg"
                                                            data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif"
                                                            data-bv-file-message="圖檔格式不符">
                                                        <p class="help-block">
                                                            圖片大小：638 x 425
                                                        </p>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">圖文區內文-2</label>
                                                    <div class="col-sm-9">
                                                        <div class="content-edit"></div>
                                                        <input type="hidden" id="content" name="contentlangs[{{ $langValue->langId }}][content_content_2]">
                                                    </div>
                                                </div> 

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Service title</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="contentlangs[{{ $langValue->langId }}][service_title]"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入標題">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">架構圖</label>
                                                    <div class="col-lg-5">
                                                        <p>
                                                            <img id="preview_{{$langValue->langId}}_service_img" width="auto" style="max-width:250px" />
                                                        </p>
                                                        <input type="file" class="btn btn-default imageupload" name="contentlangs[{{ $langValue->langId }}][service_img]"
                                                            data-prev="preview_{{$langValue->langId}}_service_img"
                                                            data-bv-file="true"
                                                            data-bv-file-extension="png,gif,jpg,jpeg"
                                                            data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif"
                                                            data-bv-file-message="圖檔格式不符">
                                                        <p class="help-block">
                                                            圖片大小：230 x 230
                                                        </p>
                                                    </div>                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">特點標題1</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="contentlangs[{{ $langValue->langId }}][aspect_title_1]"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入特點標題1">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">特點標題2</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="contentlangs[{{ $langValue->langId }}][aspect_title_2]"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入特點標題2">
                                                    </div>
                                                </div>
                                            </fieldset>                                            
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="form-actions">                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-default" href="{{ route('solution.index') }}">
                                                Back
                                            </a>
                                            <button id="save" class="btn btn-primary" type="submit">
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