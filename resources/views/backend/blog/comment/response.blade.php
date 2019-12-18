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
                        <h2>回應評論</h2>
                        
                        <ul class="nav nav-tabs pull-right in">
                            <?php $i = 1; ?>
                            <li class='active'><a data-toggle="tab" href="#hb_<?= $i++ ?>">資料</a></li>                         
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
                            
                            <form id="data-form" method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('blog.comment.response',$comment->Id ) }}"
                            data-bv-message="This value is not valid"
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <input type="hidden" name="uuid" value="{{ $comment->uuid }}">
                            @csrf
                                <div class="tab-content">
                                <?php $i = 1; ?>
                                    <div class="tab-pane active" id="hb_<?= $i++ ?>">
                                        <fieldset>
                                            <legend>資料</legend>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">評論日期</label>
                                                <div class="col-sm-9">
                                                   <?= $comment->date ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">評論姓名</label>
                                                <div class="col-sm-9">
                                                   <?= $comment->name ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">評論內容</label>
                                                <div class="col-sm-9">
                                                   <?= $comment->message ?>
                                                </div>
                                            </div>
                                            <br>
                                            <br>                                            
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">回應內容</label>
                                                <div class="col-lg-5">
                                                    <textarea class="form-control" rows="5" name="response">{{ $comment->response }}</textarea>
                                                </div>
                                            </div>                                             
                                        </fieldset>
                                    </div>                                  
                                </div>
                                
                                <div class="form-actions">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-default" href="{{ route('blog.comment',[$comment->bId]) }}">
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

<script>    
    $('#save').on('click',function(){       
        $('#data-form').submit();                
    });    
</script>
@endsection