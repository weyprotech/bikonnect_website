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
                        <h2>編輯內文</h2>
                        
                        <ul class="nav nav-tabs pull-right in">
                            <?php $i = 1; ?>
                            <li class='active'><a data-toggle="tab" href="#hb_<?= $i++ ?>">基本資料</a></li>
                            @foreach($web_langList as $langKey => $langValue)
                                <li>
                                    <a data-toggle="tab" href="#hb_<?= $i++ ?>"> <span class="hidden-mobile hidden-tablet"> {{ $langValue->name }} </span> </a>
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
                            
                            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('blog.content.edit',$blog->Id ) }}"
                            data-bv-message="This value is not valid"
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <input type="hidden" name="uuid" value="{{ $blog->uuid }}">
                                
                                <div class="tab-content">
                                <?php $i = 1; ?>
                                    <div class="tab-pane active" id="hb_<?= $i++ ?>">
                                        <fieldset>
                                            <legend>基本資料</legend>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">顯示</label>
                                                <div class="col-sm-9">
                                                    <label class="radio radio-inline">
                                                        <input type="radio" class="radiobox" name="is_visible" value="1" {{ $blog->is_visible == 1 ? 'checked' : ''}}>
                                                        <span>是</span>
                                                    </label>

                                                    <label class="radio radio-inline">
                                                        <input type="radio" class="radiobox" name="is_visible" value="0" {{ $blog->is_visible == 0 ? 'checked' : ''}}>
                                                        <span>否</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">置頂</label>
                                                <div class="col-sm-9">
                                                    <label class="radio radio-inline">
                                                        <input type="radio" class="radiobox is_top" name="is_top" value="1" {{ $blog->is_top == 1 ? 'checked' : ''}}>
                                                        <span>是</span>
                                                    </label>

                                                    <label class="radio radio-inline">
                                                        <input type="radio" class="radiobox is_top" name="is_top" value="0" {{ $blog->is_top == 0 ? 'checked' : ''}}>
                                                        <span>否</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="date">日期</label>

                                                <div class="col-sm-2">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control datepicker" id="date" name="date" value="{{ $blog->date }}" data-dateformat="yy-mm-dd" data-bv-notempty="true" data-bv-notempty-message="請輸入日期">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">部落格類別</label>
                                                <div class="col-lg-2">
                                                    <select class="form-control" name="categoryId">
                                                    @if(isset($blogCategoryList))
                                                        @foreach($blogCategoryList as $blogCategoryKey => $blogCategoryValue)
                                                            <option value="{{ $blogCategoryValue->Id }}" {{ $blogCategoryValue->Id == $blog->categoryId ? 'selected' : '' }}>{{ $blogCategoryValue->blogcategorylang[0]->title }}</option>
                                                        @endforeach
                                                    @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">圖片</label>
                                                <div class="col-lg-2">
                                                    <p>
                                                        <img id="preview" src="{{$blog->img}}" width="auto" style="max-width:250px" />
                                                    </p>
                                                    <input type="file" class="btn btn-default imageupload" name="img"
                                                        data-prev="preview"
                                                        data-bv-file="true"
                                                        data-bv-file-extension="png,gif,jpg,jpeg"
                                                        data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif"
                                                        data-bv-file-message="圖檔格式不符">
                                                    <p class="help-block">
                                                        圖片大小：1920*1280
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="url">部落格連結</label>

                                                <div class="col-lg-2">
                                                    <input type="text" class="form-control" id="Url" name="Url" value="{{ $blog->Url }}" data-bv-notempty="true" data-bv-notempty-message="請輸入連結">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    @foreach($web_langList as $langKey => $langValue)
                                        <div class="tab-pane" id="hb_<?= $i++ ?>">
                                            <fieldset>
                                                <legend>{{ $langValue->name }}</legend>                                                
                                                @csrf
                                                <input type="hidden" name="bloglangs[{{ $langValue->langId }}][langId]" value="{{ $langValue->langId }}">
                                                <input type="hidden" name="bloglangs[{{ $langValue->langId }}][bId]" value="{{ $langdata[$langValue->langId]->bId }}">
                                                
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">標題</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="bloglangs[{{ $langValue->langId }}][title]" value="{{ $langdata[$langValue->langId]->title }}" data-bv-notempty="true" data-bv-notempty-message="請輸入標題">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">簡介</label>
                                                    <div class="col-lg-5">
                                                        <textarea class="form-control" rows="5" name="bloglangs[{{ $langValue->langId }}][description]">{{ $langdata[$langValue->langId]->description }}</textarea>
                                                    </div>
                                                </div> 
                                                
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">內文</label>
                                                    <div class="col-sm-9">
                                                        <div class="content-edit">{!! $langdata[$langValue->langId]->content !!}</div>
                                                        <input type="hidden" id="content" name="bloglangs[{{ $langValue->langId }}][content]">
                                                    </div>
                                                </div>                                                  
                                            </fieldset>
                                        </div>
                                    @endforeach                                      
                                </div>
                                
                                <div class="form-actions">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-default" href="{{ route('blog.content') }}">
                                                Back
                                            </a>
                                            <button class="btn btn-primary" type="button" id="save">
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
<script type="text/javascript" src="{{ URL::asset('/backend/js/plugin/clockpicker/clockpicker.min.js') }}"></script>

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
                ['insert', ['picture']],
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
    
    $('#save').on('click',function(){
        var check = '';

        $('div.content-edit').each(function () {
            var content = $(this).summernote('code').replace(/[\u00A0-\u9999<>\&]/gim, function (i) {
                return '&#' + i.charCodeAt(0) + ';';
            });

            $(this).siblings(':hidden').val(content);
        });
        
        if($("[name='is_top']:checked").val() == 1){
            if({{$topCount}} >= 2){
                swal({
                    type:'warning',
                    title:'置頂數量已達2則'
                });
            }else{
                $('#dform').submit();
            }
        }else{
            $('#dform').submit();            
        }
    });

    function sendFile(file,editor){
        var data = new FormData();
        data.append('bId', '{{ $blog->Id }}');

        if(editor) {
            data.append("file", file);
            data.append('_token','{{ csrf_token() }}');
            return $.ajax({
                url: "{{ URL::route('blog.content.upload_summernote') }}",
                type: "POST",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (url) {
                    editor.summernote('editor.insertImage', url);
                }
            });
        }else{
            // Create a formdata object and add the files
            var type = ['image/png', 'image/jpg', 'image/gif', 'image/jpeg'];
            $.each(file, function (key, file) {
                if (jQuery.inArray(file.type, type) != '-1') {
                    data.append('image[]', file);
                }
            });

            return $.ajax({
                url: '{{ URL::route('blog.content.upload_summernote') }}',
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response['status']) {
                        $('#image-show').html(response['image']).SuperBox();
                    } else {
                        swal({
                            type:'error',
                            title:response['error']
                        });
                    }
                }
            });
        }        
    }
</script>
@endsection