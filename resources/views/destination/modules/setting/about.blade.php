@extends('destination.layouts.layout')



@section('content')
    <!-- Start setting section -->
        <section class="inner-banner bg">
            <div class="container container-1440 innercontent_wrp">
                <h2>About us</h2>
            </div>
        </section>
            
            <section class="about_us py-5">
                <div class="container container-1440">
                    <div class="mb-5">
                        <p>
                            <b>
                        Pioneering people is set-up to give flexible workers access to above average minimum wage
                        jobs with companies they can trust, cutting out the middle man recruitment agencies.</b>
                        </p>                        
                    </div>  
                             
                    
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach($about as $k=>$t)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading{{$k}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$k}}" aria-expanded="false" aria-controls="flush-collapse{{$k}}">
                                {{$t->title}}
                            </button>
                            </h2>
                            <div id="flush-collapse{{$k}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$k}}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                {!! $t->content !!}
                            </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                </div>
            </section>
    <!-- End setting section -->
@stop


@section('scripts')
<script src="{{asset('custom/js/image-upload.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@stop