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
                        <h2>編輯特點</h2>
                        
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
                            
                            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('solution.aspect.edit', $content->Id) }}"
                            data-bv-message="This value is not valid"
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <input type="hidden" name="uuid" value="{{ $content->uuid }}">
                                
                                <div class="tab-content">
                                    <?php $i = 1; ?>
                                    <div class="tab-pane active" id="hb_<?= $i++ ?>">
                                        <fieldset>
                                            <legend>基本資料</legend>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">分類</label>
                                                <div class="col-sm-9">
                                                    @foreach($categoryList as $categoryKey => $categoryValue)
                                                        <label class="radio radio-inline">
                                                            <input type="radio" class="radiobox" name="category" value="{{ $categoryValue->Id }}" {{$categoryValue->Id == $content->category ? 'checked' : '' }}>
                                                            <span>{{ $categoryValue->lang[1]->title }}</span>
                                                        </label>
                                                    @endforeach                                                   
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    @foreach($web_langList as $langKey => $langValue)                                    
                                        <div class="tab-pane" id="hb_<?= $i++ ?>">
                                            <fieldset>
                                                <legend>{{ $langValue->name }}</legend>
                                                @csrf                                            
                                                <input type="hidden" name="aspectlangs[{{ $langValue->langId }}][langId]" value="{{ $langValue->langId }}">
                                                <input type="hidden" name="aspectlangs[{{ $langValue->langId }}][aId]" value="{{ $langValue->aId }}">                                               

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">標題</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="aspectlangs[{{ $langValue->langId }}][title]" value="{{ $langdata[$langValue->langId]->title }}"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入標題"
                                                        >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">內文</label>
                                                    <div class="col-lg-5">
                                                        <textarea class="form-control" name="aspectlangs[{{ $langValue->langId }}][content]" placeholder="內文" rows="4" data-bv-notempty="true" data-bv-notempty-message="請輸入內文">{{ $langdata[$langValue->langId]->content }}</textarea>
                                                    </div>
                                                </div>                                                  
                                            </fieldset>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="form-actions">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-default" href="{{ route('solution.aspect',$content->sId) }}">
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