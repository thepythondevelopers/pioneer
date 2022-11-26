@extends('destination.layouts.layout')



@section('content')

<!-- <section class="inner-banner bg">
            <div class="container container-1440 innercontent_wrp">
                <h2>Invoices</h2>
            </div>
        </section>  -->

    <!-- Start Spending section -->
    <!-- <section class="spending-section  p-40">
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
                                        <input type="date" class="form-control" onfocus="this.showPicker()">
                                        <span><img src="images/icons/calender2.png" alt="calender"></span>
                                    </div>
                                </div>
                                <div class="filter-row">
                                    <label class="fz-18 pe-2 fw-600">To</label>
                                    <div class="input-wrap">
                                        <input type="date" class="form-control" onfocus="this.showPicker()">
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
    </section> -->
    <!-- end spending section -->


    <section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Invoices</h2>
    </div>
 </section>
    <section class="spending-section  p-40">
        <div class="container container-1440">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                <div class="dropdown dark-btn">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                        Project Title
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Link 1</a></li>
                        <li><a class="dropdown-item" href="#">Link 2</a></li>
                        <li><a class="dropdown-item" href="#">Link 3</a></li>
                    </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                <div class="dropdown dark-btn">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                        State
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Paid</a></li>
                        <li><a class="dropdown-item" href="#">unpaid</a></li>
                    </ul>
                    </div>
                </div>
                <!-- <div class="col-sm-4">
                <div class="dropdown dark-btn">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                        
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Link 1</a></li>
                        <li><a class="dropdown-item" href="#">Link 2</a></li>
                        <li><a class="dropdown-item" href="#">Link 3</a></li>
                    </ul>
                    </div>
                </div>
            </div> -->
            <div class="invoice_tab flex-row mt-3 mb-2">
                <div class="invoice_tabItem flex-60">
                    Describtion
                </div>
                <div class="invoice_tabItem flex-25">
                    Amount
                </div>
                <div class="invoice_tabItem flex-15 text-right">
                    Status
                </div>
            </div>

            <div class="invoice_cardWrapper">
                <div class="invoice-card">
                    <div class=" flex-row">
                    <div class="flex-60">
                        <div class="invoiceToken">
                             Invoice #12345
                        </div>
                        <div class="invoiceJob">
                        Developer mobile
                        </div>
                        <div class="invoiceName">
                        Chris Forbes
                        </div>
                    </div>
                    <div class="flex-25">
                        <div class="invoiceAmount">
                            $120
                        </div>
                    </div>
                    <div class="flex-15">
                        <div class="invoicebtn-Wrapper">
                           <a href="#" class="invoice-btn">Pay</a>
                           <a href="#" class="invoice-btn">Export</a>
                        </div>
                    </div>
                 </div>
                 <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- start item -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="flex-row">
                                <div class="flex-60 white-box">
                                    <div class="invoiceJob mb-2">
                                        Description
                                    </div>
                                    <div class="invoiceName mb-1">
                                        1. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        2. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        3. Expert Service Provider
                                    </div>
                                </div>
                                <div class="flex-20 white-box">
                                    <div class="invoiceJob mb-2">
                                        Fees
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-15 flex-grow white-box">
                                    <div class="invoiceJob mb-2">
                                        Billed
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-60 white-box mt-2">
                                    <div class="invoiceJob">Total</div>
                                </div>
                                <div class="flex-20 white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                                <div class="flex-15  flex-grow white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- end item -->
                </div>
                </div>

                <div class="invoice-card">
                    <div class=" flex-row">
                    <div class="flex-60">
                        <div class="invoiceToken">
                             Invoice #12345
                        </div>
                        <div class="invoiceJob">
                        Developer mobile
                        </div>
                        <div class="invoiceName">
                        Chris Forbes
                        </div>
                    </div>
                    <div class="flex-25">
                        <div class="invoiceAmount">
                            $120
                        </div>
                    </div>
                    <div class="flex-15">
                        <div class="invoicebtn-Wrapper">
                           <a href="#" class="invoice-btn">Pay</a>
                           <a href="#" class="invoice-btn">Export</a>
                        </div>
                    </div>
                 </div>
                 <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- start item -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingtwo">
                        <button class="accordion-button collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsetwo" aria-expanded="false" aria-controls="flush-collapsetwo">
                        </button>
                    </h2>
                    <div id="flush-collapsetwo" class="accordion-collapse collapse" aria-labelledby="flush-headingtwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="flex-row">
                                <div class="flex-60 white-box">
                                    <div class="invoiceJob mb-2">
                                        Description
                                    </div>
                                    <div class="invoiceName mb-1">
                                        1. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        2. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        3. Expert Service Provider
                                    </div>
                                </div>
                                <div class="flex-20 white-box">
                                    <div class="invoiceJob mb-2">
                                        Fees
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-15 flex-grow white-box">
                                    <div class="invoiceJob mb-2">
                                        Billed
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-60 white-box mt-2">
                                    <div class="invoiceJob">Total</div>
                                </div>
                                <div class="flex-20 white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                                <div class="flex-15  flex-grow white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- end item -->
                </div>
                </div>

                <div class="invoice-card">
                    <div class=" flex-row">
                    <div class="flex-60">
                        <div class="invoiceToken">
                             Invoice #12345
                        </div>
                        <div class="invoiceJob">
                        Developer mobile
                        </div>
                        <div class="invoiceName">
                        Chris Forbes
                        </div>
                    </div>
                    <div class="flex-25">
                        <div class="invoiceAmount">
                            $120
                        </div>
                    </div>
                    <div class="flex-15">
                        <div class="invoicebtn-Wrapper">
                           <a href="#" class="invoice-btn">Pay</a>
                           <a href="#" class="invoice-btn">Export</a>
                        </div>
                    </div>
                 </div>
                 <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- start item -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingthree">
                        <button class="accordion-button collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsethree" aria-expanded="false" aria-controls="flush-collapsethree">
                        </button>
                    </h2>
                    <div id="flush-collapsethree" class="accordion-collapse collapse" aria-labelledby="flush-headingthree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="flex-row">
                                <div class="flex-60 white-box">
                                    <div class="invoiceJob mb-2">
                                        Description
                                    </div>
                                    <div class="invoiceName mb-1">
                                        1. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        2. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        3. Expert Service Provider
                                    </div>
                                </div>
                                <div class="flex-20 white-box">
                                    <div class="invoiceJob mb-2">
                                        Fees
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-15 flex-grow white-box">
                                    <div class="invoiceJob mb-2">
                                        Billed
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-60 white-box mt-2">
                                    <div class="invoiceJob">Total</div>
                                </div>
                                <div class="flex-20 white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                                <div class="flex-15  flex-grow white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- end item -->
                </div>
                </div>

                <div class="invoice-card">
                    <div class=" flex-row">
                    <div class="flex-60">
                        <div class="invoiceToken">
                             Invoice #12345
                        </div>
                        <div class="invoiceJob">
                        Developer mobile
                        </div>
                        <div class="invoiceName">
                        Chris Forbes
                        </div>
                    </div>
                    <div class="flex-25">
                        <div class="invoiceAmount">
                            $120
                        </div>
                    </div>
                    <div class="flex-15">
                        <div class="invoicebtn-Wrapper">
                           <a href="#" class="invoice-btn">Pay</a>
                           <a href="#" class="invoice-btn">Export</a>
                        </div>
                    </div>
                 </div>
                 <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- start item -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingfive">
                        <button class="accordion-button collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                        </button>
                    </h2>
                    <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="flex-row">
                                <div class="flex-60 white-box">
                                    <div class="invoiceJob mb-2">
                                        Description
                                    </div>
                                    <div class="invoiceName mb-1">
                                        1. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        2. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        3. Expert Service Provider
                                    </div>
                                </div>
                                <div class="flex-20 white-box">
                                    <div class="invoiceJob mb-2">
                                        Fees
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-15 flex-grow white-box">
                                    <div class="invoiceJob mb-2">
                                        Billed
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-60 white-box mt-2">
                                    <div class="invoiceJob">Total</div>
                                </div>
                                <div class="flex-20 white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                                <div class="flex-15  flex-grow white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- end item -->
                </div>
                </div>

                <div class="invoice-card">
                    <div class=" flex-row">
                    <div class="flex-60">
                        <div class="invoiceToken">
                             Invoice #12345
                        </div>
                        <div class="invoiceJob">
                        Developer mobile
                        </div>
                        <div class="invoiceName">
                        Chris Forbes
                        </div>
                    </div>
                    <div class="flex-25">
                        <div class="invoiceAmount">
                            $120
                        </div>
                    </div>
                    <div class="flex-15">
                        <div class="invoicebtn-Wrapper">
                           <a href="#" class="invoice-btn">Pay</a>
                           <a href="#" class="invoice-btn">Export</a>
                        </div>
                    </div>
                 </div>
                 <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- start item -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingfive">
                        <button class="accordion-button collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
                        </button>
                    </h2>
                    <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="flex-row">
                                <div class="flex-60 white-box">
                                    <div class="invoiceJob mb-2">
                                        Description
                                    </div>
                                    <div class="invoiceName mb-1">
                                        1. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        2. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        3. Expert Service Provider
                                    </div>
                                </div>
                                <div class="flex-20 white-box">
                                    <div class="invoiceJob mb-2">
                                        Fees
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-15 flex-grow white-box">
                                    <div class="invoiceJob mb-2">
                                        Billed
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-60 white-box mt-2">
                                    <div class="invoiceJob">Total</div>
                                </div>
                                <div class="flex-20 white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                                <div class="flex-15  flex-grow white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- end item -->
                </div>
                </div>

                <div class="invoice-card">
                    <div class=" flex-row">
                    <div class="flex-60">
                        <div class="invoiceToken">
                             Invoice #12345
                        </div>
                        <div class="invoiceJob">
                        Developer mobile
                        </div>
                        <div class="invoiceName">
                        Chris Forbes
                        </div>
                    </div>
                    <div class="flex-25">
                        <div class="invoiceAmount">
                            $120
                        </div>
                    </div>
                    <div class="flex-15">
                        <div class="invoicebtn-Wrapper">
                            <div class="paid-btn text-right">
                                <span class="paid-btn-text"><img src="http://18.209.69.216/pioneer/images/paidicon.png" class="me-2"><h5 class="mb-0">Paid</h5></span>
                                <span class="invoicedate">on 12 Sep 2022</span>
                            </div>
                           <a href="#" class="invoice-btn">Export</a>
                        </div>
                    </div>
                 </div>
                 <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- start item -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingsix">
                        <button class="accordion-button collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
                        </button>
                    </h2>
                    <div id="flush-collapsesix" class="accordion-collapse collapse" aria-labelledby="flush-headingsix" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="flex-row">
                                <div class="flex-60 white-box">
                                    <div class="invoiceJob mb-2">
                                        Description
                                    </div>
                                    <div class="invoiceName mb-1">
                                        1. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        2. Expert Service Provider
                                    </div>
                                    <div class="invoiceName mb-1">
                                        3. Expert Service Provider
                                    </div>
                                </div>
                                <div class="flex-20 white-box">
                                    <div class="invoiceJob mb-2">
                                        Fees
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-15 flex-grow white-box">
                                    <div class="invoiceJob mb-2">
                                        Billed
                                    </div>
                                    <div class="invoiceName mb-1">
                                        $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                    <div class="invoiceName mb-1">
                                       $30
                                    </div>
                                </div>
                                <div class="flex-60 white-box mt-2">
                                    <div class="invoiceJob">Total</div>
                                </div>
                                <div class="flex-20 white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                                <div class="flex-15  flex-grow white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- end item -->
                </div>
                </div>
                
            </div>
           
        </div>
    </section>

@stop