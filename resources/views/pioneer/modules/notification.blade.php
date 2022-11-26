@extends('pioneer.layouts.layout')



@section('content')
<div class="cstm-content-wrap">
    <!-- start Notification section -->
    <section class="notification-section p-40">
        <div class="container container-1440">
            <div class="notification-inner shadow py-4 px-lg-5 px-4">
                <h5 class="fw-600 mb-3">Notifications</h5>
                <div class="notification-list-container">
                    @foreach($notification as $key=>$notifi)
                    <div class="notification-list-wrapper">
                        <div class="date-tag">{{group_date($key)}}</div>
                        <div class="notification-list mt-3">
                            @foreach($notifi as $k=>$n)
                            <div class="notification-card">
                                <div class="notification-img profile">
                                    <img src="{{isset($n->sendByUser->logo) ? asset($n->sendByUser->logo) : asset('icon_black.png') }}" alt="person">
                                </div>
                                {!! pioneer_notification($n) !!}
                               
                                <small class="date">{{date('h:i A',strtotime($n->created_at))}}</small>
                            </div>
                            @endforeach
                            <!-- <div class="notification-card">
                                <div class="notification-img ">
                                    <img src="images/icons/doller.png" alt="person">
                                </div>
                                <p class="pe-3">Cleint steve has requested $100</p>
                                <small class="date">10:35 AM</small>
                            </div>
                        
                            <div class="notification-card">
                                <div class="notification-img">
                                    <img src="images/icons/exit-b.png" alt="person">
                                </div>
                                <p class="pe-3">Joahn has applied on your job having title “ Require Security Officer”...</p>
                                <small class="date">10:35 AM</small>
                            </div>

                            <div class="notification-card">
                                <div class="notification-img profile" class="br-50">
                                    <img src="images/aplicant.png" class="br-50" alt="person">
                                </div>
                                <p class="pe-3">You have hired Kevin Peterson</p>
                                <small class="date">10:35 AM</small>
                            </div>
                
                            <div class="notification-card">
                                <div class="notification-img">
                                    <img src="images/icons/doller.png" alt="person">
                                </div>
                                <p class="pe-3">Cleint steve has requested $100</p>
                                <small class="date">10:35 AM</small>
                            </div>
                        
                            <div class="notification-card">
                                <div class="notification-img">
                                    <img src="images/icons/exit-b.png" alt="person">
                                </div>
                                <p class="pe-3">Joahn has applied on your job having title “ Require Security Officer”...</p>
                                <small class="date">10:35 AM</small>
                            </div> -->
                        </div>
                    </div>
                    @endforeach
                    
                </div>

            </div>
        </div>
    </section>
    <!-- End Notification section -->
</div>
@stop