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
                        <h2>編輯團隊</h2>
                        
                        <ul class="nav nav-tabs pull-right in">

                            <li class="active">
                                <a data-toggle="tab" href="#hb_1"> <span class="hidden-mobile hidden-tablet"> 基本資料 </span> </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#hb_2"> <span class="hidden-mobile hidden-tablet"> 英文 </span> </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#hb_3"> <span class="hidden-mobile hidden-tablet"> 中文 </span> </a>
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
                            
                            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('about.team.edit', 1) }}"
                            data-bv-message="This value is not valid"
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                                
                                <div class="tab-content">
                                    
                                    <div class="tab-pane active" id="hb_1">

                                        <fieldset>

                                            <legend>基本資料</legend>

                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">圖片</label>
                                                <div class="col-lg-5">
                                                    <p>
                                                        <img id="photopreview" src="" width="auto" style="max-width:250px" />
                                                    </p>
                                                    <input type="file" class="btn btn-default imageupload" name="photo"
                                                        data-bv-file="true"
                                                        data-bv-file-extension="png,gif,jpg,jpeg"
                                                        data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif"
                                                        data-bv-file-message="圖檔格式不符">
                                                    <p class="help-block">
                                                        最佳解析度：280 x 376
                                                    </p>
                                                </div>
                                            </div>
                                            
                                        </fieldset>

                                    </div>

                                    <div class="tab-pane" id="hb_2">

                                        <fieldset>

                                            <legend>英文 語系</legend>
                                            
                                            <input type="hidden" name="videolangs[][videolangid]" value="">
                                            <input type="hidden" name="videolangs[][languageid]" value="">
                                            <input type="hidden" name="videolangs[][videoid]" value="">
                                            
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">職稱</label>
                                                <div class="col-lg-2">
                                                    <input type="text" class="form-control" name="videolangs[][title]" value=""
                                                    data-bv-notempty="true"
                                                    data-bv-notempty-message="請輸入職稱"
                                                    >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">姓名</label>
                                                <div class="col-lg-2">
                                                    <input type="text" class="form-control" name="videolangs[][title]" value=""
                                                    data-bv-notempty="true"
                                                    data-bv-notempty-message="請輸入姓名"
                                                    >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">內文</label>
                                                <div class="col-lg-5">
                                                    <textarea class="form-control" name="associationlangs[][content]" placeholder="內文" rows="4" data-bv-notempty="true" data-bv-notempty-message="請輸入內文"></textarea>
                                                </div>
                                            </div>  
                                            
                                        </fieldset>

                                    </div>

                                    <div class="tab-pane" id="hb_3">

                                        <fieldset>

                                            <legend>中文 語系</legend>
                                            
                                            <input type="hidden" name="videolangs[][videolangid]" value="">
                                            <input type="hidden" name="videolangs[][languageid]" value="">
                                            <input type="hidden" name="videolangs[][videoid]" value="">
                                            
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">職稱</label>
                                                <div class="col-lg-2">
                                                    <input type="text" class="form-control" name="videolangs[][title]" value=""
                                                    data-bv-notempty="true"
                                                    data-bv-notempty-message="請輸入職稱"
                                                    >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">姓名</label>
                                                <div class="col-lg-2">
                                                    <input type="text" class="form-control" name="videolangs[][title]" value=""
                                                    data-bv-notempty="true"
                                                    data-bv-notempty-message="請輸入姓名"
                                                    >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">內文</label>
                                                <div class="col-lg-5">
                                                    <textarea class="form-control" name="associationlangs[][content]" placeholder="內文" rows="4" data-bv-notempty="true" data-bv-notempty-message="請輸入內文"></textarea>
                                                </div>
                                            </div>
                                            
                                        </fieldset>

                                    </div>
                                    
                                </div>
                                
                                <div class="form-actions">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-default" href="{{ route('about.team') }}">
                                                Back
                                            </a>
                                            <button class="btn btn-primary" type="submit">
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