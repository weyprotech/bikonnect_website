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
                        <h2>編輯產品</h2>
                        
                        <ul class="nav nav-tabs pull-right in">
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
                            
                            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('product.edit',$content->Id) }}"
                            data-bv-message="This value is not valid"
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <input type="hidden" name="uuid" value="{{ $content->uuid }}">
                                
                                <div class="tab-content">
                                    @foreach($web_langList as $langKey => $langValue)
                                        <div class="tab-pane {{ $langKey == 0 ? 'active' : '' }}" id="hb_{{ $langValue->langId }}">
                                            <fieldset>

                                                <legend>{{ $langValue->name }}</legend>
                                                @csrf
                                                <input type="hidden" name="productlangs[{{ $langValue->langId }}][langId]" value="{{ $langValue->langId }}">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">產品名稱</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="productlangs[{{ $langValue->langId }}][title]" value="{{ $langdata[$langValue->langId]->title }}"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入產品名稱"
                                                        >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">meta_title</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="productlangs[{{ $langValue->langId }}][meta_title]" value="{{ $langdata[$langValue->langId]->meta_title }}"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入meta_title"
                                                        >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">meta_description</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="productlangs[{{ $langValue->langId }}][meta_description]" value="{{ $langdata[$langValue->langId]->meta_description }}"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入meta_description"
                                                        >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">meta_keywords</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="productlangs[{{ $langValue->langId }}][meta_keywords]" value="{{ $langdata[$langValue->langId]->meta_keywords }}"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入meta_keywords"
                                                        >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">標題_1</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="productlangs[{{ $langValue->langId }}][title_1]" value="{{ $langdata[$langValue->langId]->title_1 }}"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入標題"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">圖片_1</label>
                                                    <div class="col-lg-5">
                                                        <p>
                                                            <img id="preview_{{$langValue->langId}}_1" src="{{ $langdata[$langValue->langId]->img_1 }}" width="auto" style="max-width:250px" />
                                                        </p>
                                                        <input type="file" class="btn btn-default imageupload" name="productlangs[{{ $langValue->langId }}][img_1]"
                                                            data-prev="preview_{{$langValue->langId}}_1"
                                                            data-bv-file="true"
                                                            data-bv-file-extension="png,gif,jpg,jpeg"
                                                            data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif"
                                                            data-bv-file-message="圖檔格式不符">
                                                        <p class="help-block">
                                                            最佳解析度：1057 x 771
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">內文_1</label>
                                                    <div class="col-lg-5">
                                                        <textarea class="form-control" name="productlangs[{{ $langValue->langId }}][content_1]" placeholder="內文" rows="8" data-bv-notempty="true" data-bv-notempty-message="請輸入內文">{{ $langdata[$langValue->langId]->content_1 }}</textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">標題_2</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="productlangs[{{ $langValue->langId }}][title_2]" value="{{ $langdata[$langValue->langId]->title_2 }}"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入標題"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">圖片_2</label>
                                                    <div class="col-lg-5">
                                                        <p>
                                                            <img id="preview_{{$langValue->langId}}_2" src="{{ $langdata[$langValue->langId]->img_2 }}" width="auto" style="max-width:250px" />
                                                        </p>
                                                        <input type="file" class="btn btn-default imageupload" name="productlangs[{{ $langValue->langId }}][img_2]"
                                                            data-prev="preview_{{$langValue->langId}}_2"
                                                            data-bv-file="true"
                                                            data-bv-file-extension="png,gif,jpg,jpeg"
                                                            data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif"
                                                            data-bv-file-message="圖檔格式不符">
                                                        <p class="help-block">
                                                            最佳解析度：1040 x 700
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">內文_2</label>
                                                    <div class="col-lg-5">
                                                        <textarea class="form-control" name="productlangs[{{ $langValue->langId }}][content_2]" placeholder="內文" rows="8" data-bv-notempty="true" data-bv-notempty-message="請輸入內文">{{ $langdata[$langValue->langId]->content_2 }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">標題_3</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="productlangs[{{ $langValue->langId }}][title_3]" value="{{ $langdata[$langValue->langId]->title_3 }}"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入標題"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">圖片_3</label>
                                                    <div class="col-lg-5">
                                                        <p>
                                                            <img id="preview_{{$langValue->langId}}_3" src="{{ $langdata[$langValue->langId]->img_3 }}" width="auto" style="max-width:250px" />
                                                        </p>
                                                        <input type="file" class="btn btn-default imageupload" name="productlangs[{{ $langValue->langId }}][img_3]"
                                                            data-prev="preview_{{$langValue->langId}}_3"
                                                            data-bv-file="true"
                                                            data-bv-file-extension="png,gif,jpg,jpeg"
                                                            data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif"
                                                            data-bv-file-message="圖檔格式不符">
                                                        <p class="help-block">
                                                            最佳解析度：748 x 724
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">內文_3</label>
                                                    <div class="col-sm-9">
                                                        <div class="content-edit">{{ $langdata[$langValue->langId]->content_3 }}</div>
                                                        <input type="hidden" id="content" name="productlangs[{{ $langValue->langId }}][content_3]">
                                                    </div>
                                                    <!-- <div class="col-lg-5">
                                                        <textarea class="form-control" name="productlangs[{{ $langValue->langId }}][content_3]" placeholder="內文" rows="8" data-bv-notempty="true" data-bv-notempty-message="請輸入內文">{{ $langdata[$langValue->langId]->content_3 }}</textarea>
                                                    </div> -->
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">標題_4</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="productlangs[{{ $langValue->langId }}][title_4]" value="{{ $langdata[$langValue->langId]->title_4 }}"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入標題"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">圖片_4</label>
                                                    <div class="col-lg-5">
                                                        <p>
                                                            <img id="preview_{{$langValue->langId}}_4" src="{{ $langdata[$langValue->langId]->img_4 }}" width="auto" style="max-width:250px" />
                                                        </p>
                                                        <input type="file" class="btn btn-default imageupload" name="productlangs[{{ $langValue->langId }}][img_4]"
                                                            data-prev="preview_{{$langValue->langId}}_4"
                                                            data-bv-file="true"
                                                            data-bv-file-extension="png,gif,jpg,jpeg"
                                                            data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif"
                                                            data-bv-file-message="圖檔格式不符">
                                                        <p class="help-block">
                                                            最佳解析度：752 x 402
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">內文_4</label>
                                                    <div class="col-lg-5">
                                                        <textarea class="form-control" name="productlangs[{{ $langValue->langId }}][content_4]" placeholder="內文" rows="8" data-bv-notempty="true" data-bv-notempty-message="請輸入內文">{{ $langdata[$langValue->langId]->content_4 }}</textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="form-actions">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-default" href="{{ route('about.history') }}">
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

@endsection