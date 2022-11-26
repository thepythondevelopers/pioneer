@extends('pioneer.layouts.layout')



@section('content')
    <!-- Start setting section -->
        <section class="inner-banner bg">
            <div class="container container-1440 innercontent_wrp">
                <h2>Terms and Condition</h2>
            </div>
        </section>
            <section class="about_us py-5">
                <div class="container container-1440">
                    <div class="mb-5">
                        <p>
                        These are our terms and conditions. They tell you what we do and how we do it. By using our site, you indicate that you accept these terms and conditions, and the referenced policies, and that you agree to abide by them.
                        </p>
                        <!-- <p> T&Cs last modified: October 03, 2022</p> -->
                    </div>  


                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach($term as $k=>$t)
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