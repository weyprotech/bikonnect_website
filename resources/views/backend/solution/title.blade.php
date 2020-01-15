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
                            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('solution.title') }}"
                            data-bv-message="This value is not valid"
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <input type="hidden" name="uuid" value="{{ $title->uuid }}">                                
                                <div class="tab-content">
                                    @foreach($web_langList as $langKey => $langValue)                                    
                                        <div class="tab-pane {{ $langKey == 0 ? 'active' : '' }}" id="hb_{{ $langValue->langId }}">
                                            <fieldset>
                                                <legend>{{ $langValue->name }}</legend>
                                                @csrf
                                                <input type="hidden" name="titlelangs[{{ $langValue->langId }}][langId]" value="{{ $langValue->langId }}">
                                                <input type="hidden" name="titlelangs[{{ $langValue->langId }}][tId]" value="{{ $langValue->tId }}">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">主題</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="titlelangs[{{ $langValue->langId }}][title]" value="{{ $langdata[$langValue->langId]->title }}"
                                                        data-bv-notempty="true"
                                                        data-bv-notempty-message="請輸入主題">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">DM</label>
                                                    <div class="col-lg-5">
                                                        <input type="file" class="btn btn-default imageupload" name="titlelangs[{{ $langValue->langId }}][dm_file]"
                                                            data-bv-file="true"
                                                            data-bv-file-extension="png,gif,jpg,jpeg,pdf"
                                                            data-bv-file-type="image/png,image/jpg,image/jpeg,image/gif,application/pdf"
                                                            data-bv-file-message="DM格式不符">
                                                        <?php $dm = array();
                                                        if(!empty($langdata[$langValue->langId]->dm_file)){
                                                            $dm = explode('/',$langdata[$langValue->langId]->dm_file);                                                    
                                                        } ?>
                                                        <p class="help-block">
                                                            原本檔案：<?= !empty($dm) ? end($dm) : '' ?>
                                                        </p>
                                                    </div>                                                   
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="form-actions">                                    
                                    <div class="row">
                                        <div class="col-md-12">
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