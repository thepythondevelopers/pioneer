@extends('destination.layouts.layout')



@section('content')

    

    <!-- Start Spending section -->
    <section class="spending-section  p-40">
        <div class="container container-1440">
            <div class="spending-inner shadow br-10 p-4">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="filter-sidebar shadow">
                            <div class="filter-box">
                                <h5 class="fw-600 text-center text-white">Filter</h5>
                                <div class="filter-row mt-xl-4 mt-3">
                                    <label class="fz-18 pe-2 fw-600">From</label>
                                    <div class="input-wrap">
                                        <input type="date" class="form-control">
                                        <span><img src="images/icons/calender2.png" alt="calender"></span>
                                    </div>
                                </div>
                                <div class="filter-row">
                                    <label class="fz-18 pe-2 fw-600">To</label>
                                    <div class="input-wrap">
                                        <input type="date" class="form-control">
                                        <span><img src="images/icons/calender2.png" alt="calender"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="earning-persons-list scrollbar mt-4">

                                <div class="earning-person active">

                                    <div class="earning-person-img">
                                        <img src="images/aplicant.png" alt="person">
                                    </div>
                                    <div class="earning-person-detail">
                                        <div class="person-name">
                                            Kevin Peterson
                                        </div>
                                        <div class="person-earn">
                                            $600
                                        </div>
                                    </div>

                                </div>
                                <div class="earning-person">

                                    <div class="earning-person-img">
                                        <img src="images/aplicant.png" alt="person">
                                    </div>
                                    <div class="earning-person-detail">
                                        <div class="person-name">
                                            Kevin Peterson
                                        </div>
                                        <div class="person-earn">
                                            $600
                                        </div>
                                    </div>

                                </div>
                                <div class="earning-person">

                                    <div class="earning-person-img">
                                        <img src="images/aplicant.png" alt="person">
                                    </div>
                                    <div class="earning-person-detail">
                                        <div class="person-name">
                                            Kevin Peterson
                                        </div>
                                        <div class="person-earn">
                                            $600
                                        </div>
                                    </div>

                                </div>
                                <div class="earning-person">

                                    <div class="earning-person-img">
                                        <img src="images/aplicant.png" alt="person">
                                    </div>
                                    <div class="earning-person-detail">
                                        <div class="person-name">
                                            Kevin Peterson
                                        </div>
                                        <div class="person-earn">
                                            $600
                                        </div>
                                    </div>

                                </div>
                                <div class="earning-person">

                                    <div class="earning-person-img">
                                        <img src="images/aplicant.png" alt="person">
                                    </div>
                                    <div class="earning-person-detail">
                                        <div class="person-name">
                                            Kevin Peterson
                                        </div>
                                        <div class="person-earn">
                                            $600
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="spending-table-wrapper table-responsive">
                            <table class="spending-table table">
                                <thead>
                                    <th width="60%" class="fz-18 text-white fw-600">Job title</th>
                                    <th width="20%" class="fz-18 text-white fw-600">fees</th>
                                    <th width="20%" class="fz-18 text-white fw-600">Billed</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1. Expert Service Provider
                                        </td>
                                        <td>
                                            $10
                                        </td>
                                        <td>
                                            $70
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1. Expert Service Provider
                                        </td>
                                        <td>
                                            $20
                                        </td>
                                        <td>
                                            $500
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="br-0">
                                            <b>Total Billed</b>
                                        </td>
                                        <td class="bl-0 br-0"></td>
                                        <td class="bl-0">
                                            $20
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="br-0">
                                            <b>Fees</b>
                                        </td>
                                        <td class="bl-0 br-0"></td>
                                        <td class="bl-0">
                                            $40
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end spending section -->

@stop