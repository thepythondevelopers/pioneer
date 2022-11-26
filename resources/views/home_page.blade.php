@extends('customAuth.layouts.auth')

@section('content')
<style type="text/css">
	/* .test-link-list {
    max-width: 800px;
    margin: 0px auto;
    display: flex;
    align-items: center;
}
.test-link-list li {
    width: 50%;
    padding: 0px 10px;
    list-style: none;
}
.test-link-list li .test-link {
    padding: 10px 15px;
    display: flex;
    flex-wrap: wrap;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 20%);
    font-size: 25px;
    margin: 10px 0px;
    background: #2f3232;
    color: #fff;
    border-radius: 4px;
}
.test-link-list li .test-link:hover{
	background: var(--secondry-color);
}
section.test-sec {
    margin-top: 50vh;
} */



</style>
    <!-- <section class="test-sec">
    	<div class="container"> -->
            <section class="homeCards_wrp">
                <div class="homeCard_left">
                    <div class="homeCard">
                        <h4 class="mb-3">Destination</h4>
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore ate 
                        </p>
                        <a href="{{route('login_role','destination')}}" class="test-link">Enter</a>
                    </div>
                </div>
                <div class="homeCard_right">
                    <div class="homeCard">
                        <h4 class="mb-3">Pioneer</h4>
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore ate 
                        </p>
                         <a href="{{route('login_role','pioneer')}}" class="test-link">Enter</a>
                    </div>
                </div>
            </section>
    	<!-- </div>
    </section> -->
@stop