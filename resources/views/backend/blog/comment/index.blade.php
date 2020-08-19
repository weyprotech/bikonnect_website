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
                <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>部落格評論</h2>

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
                            <div class="widget-body-toolbar">

                                <div class="row">

                                    <div class="form-inline">

                                        <div class="col-sm-10">
                                            <a class="btn btn-success btn-labeled" type="button" href="{{ URL::route('blog.content') }}">返回部落格維護</a>
                                        </div>

                                    </div>
                                    
                                </div>

                            </div>

                            <div class="table-responsive">

                                <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                    <thead>			                
                                        <tr>
                                            <th class="text-center" width="10%">部落格標題</th>   
                                            <th>姓名</th>                                             
                                            <th>評論內容</th>
                                            <th>回應內容</th>
                                            <th width="5%" class="text-center">回應</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($commentList))
                                            @foreach($commentList as $commentKey => $commentValue)
                                                <tr>
                                                    <td class="text-center">{{ $commentValue->getblog->bloglang[0]->title }}</td>
                                                    <td>{{$commentValue->name}}</td>
                                                    <td>{{$commentValue->message}}</td>
                                                    <td>{{$commentValue->response}}</td>
                                                    <td class="text-center"><a href="{{ route('blog.comment.response', $commentValue->Id) }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a></td>                                                        
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            </div>

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