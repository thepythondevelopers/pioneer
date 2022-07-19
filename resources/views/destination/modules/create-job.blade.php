@extends('destination.layouts.layout')



@section('content')
  <!-- Start Create Job Form -->
    <section class="create-job-section p-60">
        <div class="container container-1440">
            <div class="heading-wrapper mb-md-0 mb-4">
                <h4 class="heading after-line">Create Job</h4>
            </div>
            <div class="create-job-wrapper">
                <form class="icon-form right-icon" action="home.html">
                    <div class="row">
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <input type="text" class="form-control" id="jtitle" placeholder="Job Title" name="jtitle" required="">
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/notebook.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group  col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <select name="jType" id="jtype" class="form-control">
                                    <option value="volvo">Job Type</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                  </select>
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/arrow-down.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <textarea  class="form-control textarea"  placeholder="Job Description" required=""></textarea>
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/notebook.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <textarea  class="form-control textarea"  placeholder="Exact Location Address " required=""></textarea>
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/notebook.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <input type="date" class="form-control" id="sdate" placeholder="Start Date" name="sdate" required="">
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/calender.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <input type="date" class="form-control" id="edate" placeholder="End Date" name="edate" required="">
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/calender.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <select name="Location" id="Location" class="form-control">
                                    <option value="volvo">Location</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                  </select>
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/arrow-down.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>  
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <select name="hrate" id="hrate" class="form-control">
                                    <option value="volvo">Hourly Rate</option>
                                    <option value="saab">15$</option>
                                    <option value="mercedes">15$</option>
                                    <option value="audi">15$</option>
                                  </select>
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/arrow-down.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div> 
                        <div class="form-group  col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <input type="date" class="form-control" id="stime" placeholder="Shift Start Time" name="stime" required="">
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/shift-time.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <input type="date" class="form-control" id="etime" placeholder="Shift End Time" name="etime" required="">
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/shift-time.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <select name="jduration" id="jduration" class="form-control">
                                    <option value="volvo">Job Duration</option>
                                    <option value="saab">15hr</option>
                                    <option value="mercedes">15hr</option>
                                    <option value="audi">15hr</option>
                                  </select>
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/arrow-down.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <input type="text" class="form-control" id="cpname" placeholder="Contact Person Name" name="cpname" required="">
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/notebook.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <input type="email" class="form-control" id="cpemial" placeholder="Contact Person Email Id" name="cpemial" required="">
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/mail-bw.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <input type="number" class="form-control" id="cpnumber" placeholder="Contact Person Phone Number" name="cpnumber" required="">
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/phone-bw.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div> 
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <input type="time" class="form-control" id="mtime" placeholder="Meeting Time" name="mtime" required="">
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/clock-bw.png')}}" alt="icon">
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div> 
                        <div class="btn-wrapper text-right">
                            <button type="submit" class="btn btn-lg edit-btn">Submit</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Create job Form -->
@stop    


