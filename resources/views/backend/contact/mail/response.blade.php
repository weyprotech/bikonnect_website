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
                        <h2>回覆聯絡我們</h2>
                        
                        <ul class="nav nav-tabs pull-right in">
                            <li class="active">
                                <a data-toggle="tab" href="#hb_1"> <span class="hidden-mobile hidden-tablet">回覆內容</span> </a>
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
                            
                            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('contact.response_mail',$contact->Id ) }}"
                            data-bv-message="This value is not valid"
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                                
                                <div class="tab-content">

                                    <div class="tab-pane active" id="hb_1">
                                        <fieldset>
                                            <legend>信件資料</legend>                                    
                                            
                                            <div class="form-group col-lg-12">
                                                <label class="col-lg-2 control-label">名子</label>
                                                <div class="col-lg-5">
                                                    <input class="form-control" type="text" value="{{ $contact->name }}">                                                           
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label class="col-lg-2 control-label">電話</label>
                                                <div class="col-lg-5">
                                                    <input class="form-control" type="text" value="{{ $contact->phone }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label class="col-lg-2 control-label">email</label>
                                                <div class="col-lg-5">
                                                    <input class="form-control" type="text" value="{{ $contact->email }}">                   
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label class="col-lg-2 control-label">內文</label>
                                                <div class="col-lg-5">
                                                    <textarea class="form-control" placeholder="內文" rows="8">{{ $contact->content }}</textarea>                                                                                                                    
                                                </div>
                                            </div>                                                                                             
                                        </fieldset>
                                        <fieldset>
                                            <legend>回應內容</legend>
                                            @csrf
                                            <div class="form-group">                                                
                                                <div class="col-lg-7">
                                                    <textarea class="form-control" rows="5" name="content" data-bv-notempty="true" data-bv-notempty-message="請輸入回應內容">{!! $contact->response !!}</textarea>
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