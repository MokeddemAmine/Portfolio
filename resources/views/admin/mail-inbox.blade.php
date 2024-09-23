@extends('admin.layouts.app')
@section('title','dashboard mail')
    
@section('content')

                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1 class="text-primary text-capitalize">mail</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.index')}}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Mail</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-statistics mail-contant rounded">
                                    <div class="card-body p-0">
                                        <div class="row no-gutters">
                                            <div class="col-md-8  col-xxl-4 border-md-t">
                                                <div class="mail-content  border-right border-n h-100">
                                                    <div class="mail-msg scrollbar scroll_dark">
                                                        @if ($messages && count($messages))
                                                            @foreach ($messages as $msg)
                                                                <div class="mail-msg-item" @if($msg->read == 0) style="background-color:#eee !important;" @endif>
                                                                    <a href="javascript:void(0)" class="message"  data-id="{{$msg->id}}">
                                                                        <div class="media align-items-center">
                                                                            
                                                                            <div class="w-100">
                                                                                <div class="mail-msg-item-titel justify-content-between">
                                                                                    <p>{{$msg->first_name}} {{$msg->last_name}}</p>
                                                                                    <p class="d-none d-xl-block">
                                                                                        @if ($msg->created_at->format('Y/m') == date('Y/m') && ((date('d') - $msg->created_at->format('d')) == 1) )
                                                                                            Yesterday
                                                                                        @elseif($msg->created_at->format('Y/m') == date('Y/m') && ((date('d') - $msg->created_at->format('d')) > 1))
                                                                                            {{$msg->created_at->format('Y/m/d')}}
                                                                                        @endif 
                                                                                        {{$msg->created_at->format('H:m')}}
                                                                                    </p>
                                                                                </div>
                                                                                <h5 class="mb-0 my-2">{{$msg->subject}}</h5>
                                                                                <p>{!!Str::limit($msg->message,60)!!}</p>
                                                                                <p class="d-xl-none">{{$msg->created_at->format('H:m')}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 border-t border-xxl-t">
                                                @if (isset($message))
                                                    <div class="mail-chat py-5 px-5">
                                                        <div class="media align-items-center">
                                                            <div>
                                                                <h4 class="mb-0" id="msg_name">{{$message->first_name}} {{$message->last_name}}</h4>
                                                                <p id="msg_ago"></p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4 d-flex justify-content-between">
                                                            <div>
                                                                <h3 id="msg_subject">{{$message->subject}}</h3>
                                                            </div>
                                                        </div>
                                                        <div id="msg_message">
                                                            {!! nl2br(e($message->message)) !!}
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="mail-chat py-5 px-5">
                                                        <div class="media align-items-center">
                                                            <div>
                                                                <h4 class="mb-0" id="msg_name"></h4>
                                                                <p id="msg_ago"></p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4 d-flex justify-content-between">
                                                            <div>
                                                                <h3 id="msg_subject"></h3>
                                                            </div>
                                                        </div>
                                                        <div id="msg_message">
                                                            
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->

                    
@endsection
@section('special-script')
    <script>
        $(document).ready(function(){
            $('.message').click(function(){
                let that = $(this);
                $.ajax({
                    type:'POST',
                    url:'{{route('admin.dashboard.get_message')}}',
                    data:{
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        message:that.data('id'),
                    },
                    success:function(data){
                        that.parent().css('background-color','white');
                        $('#msg_name').text(data.message.first_name +' '+ data.message.last_name)
                        // calculate the date 
                        let time_ago = timeAgo(data.message.created_at);
                        $('#msg_ago').text(time_ago);
                        $('#msg_subject').text(data.message.subject);
                        let message = convertNewlinesToBr(data.message.message);
                        $('#msg_message').html(message);
                        
                    },
                    error:function(xhr,status,err){
                        console.log(err);
                    }
                });
            })
            function timeAgo (input_date){

                let input_date2 = new Date(input_date);
                const current_date = new Date();
                const diffrent_time = current_date - input_date2;
                const diffInSeconds = Math.floor(diffrent_time / 1000);
                const diffInMinutes = Math.floor(diffInSeconds / 60);
                const diffInHours = Math.floor(diffInMinutes / 60);
                const diffInDays = Math.floor(diffInHours / 24);
                const diffMonths = Math.floor(diffInDays / 30);
                const diffYears = Math.floor(diffMonths / 12);
                
                var time_ago = null;
                if(diffYears){
                    time_ago = diffYears+' Years ago';
                }else if(diffMonths){
                    time_ago = diffMonths+' months ago';
                }else if(diffInDays){
                    time_ago = diffInDays+' days ago';
                }else if(diffInHours){
                    time_ago = diffInHours+' hours ago';
                }else{
                    time_ago = diffInMinutes+' min ago';
                }
                return time_ago;
            }

            function convertNewlinesToBr(text) {
                return text.replace(/(\r\n|\n|\r)/g, '<br/>');
            }
        })
    </script>
@endsection