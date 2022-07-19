@extends('destination.layouts.layout')



@section('content')


    <!-- Start setting section -->
    <section class="setting-section p-40 ">
        <div class="container container-1440">
            <div class="sectting-inner shadow br-10 py-5 px-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="setting-tab nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">
                                <span><img src="images/icons/setting-user.png" alt="text"></span>Account
                            </button>

                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">
                                <span><img src="images/icons/setting-about.png" alt="text"></span>About Us
                            </button>

                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">
                                <span><img src="images/icons/setting-pwd.png" alt="text"></span>Change Password
                            </button>

                            <button class="nav-link" id="v-pills-term-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-term" type="button" role="tab"
                                aria-controls="v-pills-term" aria-selected="false">
                                <span><img src="images/icons/setting-term.png" alt="text"></span>Terms & Conditions
                            </button>

                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="modal" data-bs-target="#logout" type="button">
                                <span><img src="images/icons/exit-b.png" alt="text"></span>Logout
                            </button>
                        </div>
                    </div>

                    <div class="col-md-8">

                        <div class=" setting-tab_content steps-section shadow p-4 d-flex align-items-start br-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-picture-wrapper">
                                                <div class="profile-picture">
                                                    <h5 class="text-uppercase">Profile details</h5>
                                                    <div class="my-2 fz-16">DESTINATION LOGO</div>
                                                </div>
                                                <div class="profile-picture-img text-center shadow  br-10 mb-sm-4 mb-5 ">
                                                    <img src="images/Resgister-step/company.png" class=" br-10"
                                                        alt="destination-img">
                                                </div>                                         
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="uname"
                                                            placeholder="First Name" name="uname" required="">
                                                        <span class="input-icon">
                                                            <img src="images/icons/edit-icon.png" alt="icon">
                                                        </span>
                                                    </div>
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="lname"
                                                            placeholder="Last Name" name="fname" required="">
                                                        <span class="input-icon">
                                                            <img src="images/icons/edit-icon.png" alt="icon">
                                                        </span>
                                                    </div>
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                               
                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input type="number" class="form-control" id="mnumber"
                                                            placeholder="Mobile Number" name="mnumber" required="">
                                                        <span class="input-icon">
                                                            <img src="images/icons/phone.png" alt="icon">
                                                        </span>
                                                    </div>
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="cname"
                                                            placeholder="Company Name" name="cname" required="">
                                                        <span class="input-icon">
                                                            <img src="images/icons/calender2.png" alt="icon">
                                                        </span>
                                                    </div>
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                                <div class="form-group col-12 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="email"
                                                            placeholder="Email Id" name="email" required="">
                                                        <span class="input-icon">
                                                            <img src="images/icons/mail-icon.png" alt="icon">
                                                        </span>
                                                    </div>
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                                <div class="form-group icon-form col-md-12 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <textarea class="form-control textarea" placeholder="# 1590 , Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 1500s."></textarea>
                                                        <span class="input-icon">
                                                            <img src="images/icons/city.png" alt="icon">
                                                        </span>
                                                    </div>
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                            </div>
                                            <div class="certificates">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="profile-picture-wrapper">
                                                            <div class="profile-picture">
                                                                <div class="fz-18 fw-bold">Certificate 1</div>
                                                            </div>
                                                            <div
                                                                class="profile-picture-img text-center shadow  br-10 mb-sm-4 mb-3">
                                                                <img src="images/Resgister-step/certificate1.png"
                                                                    class=" br-10" alt="destination-img">
                                                            </div>
                                                          
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="profile-picture-wrapper">
                                                            <div class="profile-picture">
                                                                <div class="fz-18 fw-bold">Certificate 2</div>
                                                            </div>
                                                            <div
                                                                class="profile-picture-img text-center shadow  br-10 mb-sm-4 mb-3">
                                                                <img src="images/Resgister-step/certificate2.png"
                                                                    class=" br-10" alt="destination-img">
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="profile-picture-wrapper">
                                                            <div class="profile-picture">
                                                                <div class="fz-18 fw-bold">Certificate 3</div>
                                                            </div>
                                                            <div
                                                                class="profile-picture-img text-center shadow  br-10 mb-sm-4 mb-3">
                                                                <img src="images/Resgister-step/certificate1.png"
                                                                    class=" br-10" alt="destination-img">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="profile-picture-wrapper">
                                                            <div class="profile-picture">
                                                                <div class="fz-18 fw-bold">Certificate 4</div>
                                                            </div>
                                                            <div
                                                                class="profile-picture-img text-center shadow  br-10 mb-sm-4 mb-3">
                                                                <img src="images/Resgister-step/certificate2.png"
                                                                    class=" br-10" alt="destination-img">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cstm-btn-group my-4">
                                                    <a href="#" class="outline-btn btn popup-btn min200">Back</a>
                                                    <a href="#" class=" edit-btn btn popup-btn min200">Update  Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <h5 class="heading after-line grey-line text-uppercase">About Us</h5>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam expedita ad esse! Repellat a eligendi tempora id odio dolores voluptatem quibusdam officiis, molestiae, sint placeat itaque suscipit provident. Aliquid at similique saepe, tempore excepturi, voluptatum ullam, fugit dolores dignissimos quod assumenda? Numquam dolore quod magnam possimus similique neque! Rerum, pariatur? Iste quia excepturi error cumque officia rem nesciunt maiores aliquid libero reprehenderit ad voluptate molestias quis fugiat ducimus ex iusto, saepe dolores. Quisquam, similique maiores. Harum nisi soluta error et, dolores eveniet sapiente nesciunt dolorem aliquid doloribus aperiam a nobis amet, magni omnis fugiat id itaque. Beatae ad facere repellendus dolor consectetur est optio tempora hic quas ut dolorem consequuntur rerum nulla cumque porro, similique unde quidem esse ea sapiente neque officiis. Id unde sed maxime ut repellendus odio velit reiciendis quidem eum laudantium. Praesentium consequuntur cumque quae minus corporis, quaerat minima! Eius praesentium maxime est corporis harum? Consectetur quas numquam harum veritatis odio minima ipsum expedita! Laborum fugit reprehenderit sit perspiciatis ad eveniet velit minima culpa, porro fugiat ut laboriosam ab pariatur tenetur nam, commodi necessitatibus! Maiores dolorum veniam qui, cupiditate aut corporis nisi praesentium impedit facilis quia modi tenetur ut, earum ab corrupti reiciendis nihil sunt voluptatibus architecto recusandae amet enim et voluptatem! Eum, minima libero repellat atque possimus eligendi nobis reprehenderit, exercitationem accusamus eveniet in expedita qui ad sint cumque impedit odio quidem dolor numquam aliquid totam deleniti mollitia vel vitae? Labore perspiciatis totam ad cupiditate blanditiis ipsa suscipit ut veritatis obcaecati vel autem, esse minus sint placeat consequatur magnam pariatur vero repudiandae doloremque! Adipisci sed eos, at ipsum dolorum voluptate vel beatae neque quisquam inventore facilis delectus? Sit vero, quae accusamus nesciunt soluta illum neque eligendi nihil eos cumque veniam molestias dolores non labore tempore quo odio debitis minima praesentium beatae. Dignissimos ea illum quidem, suscipit inventore enim magnam mollitia delectus. Alias, porro aperiam sit modi eius distinctio quibusdam ex omnis sapiente animi voluptatem repellat rem quod quas eum natus soluta maiores eaque odit nostrum tempore voluptate blanditiis. Dolores pariatur animi non ex doloribus quam, cupiditate modi labore dolor veritatis saepe laborum vero reprehenderit necessitatibus cumque voluptatem praesentium omnis? Sequi incidunt perferendis, accusamus nobis consequuntur nemo facilis reprehenderit distinctio tempora aliquid saepe, earum delectus velit? Vel error temporibus hic vitae, veritatis omnis molestiae corporis odio, maxime accusamus reprehenderit rerum aperiam ipsam laborum pariatur ullam impedit ex? Quam, ad! Laudantium assumenda fugit doloribus rem unde dolores reprehenderit architecto perferendis, quo neque facilis obcaecati est at. Quidem obcaecati fuga numquam quam voluptatum deleniti nulla doloribus, qui assumenda necessitatibus, tempore iste, enim beatae magni hic ratione quis labore quae iusto eligendi pariatur itaque. Distinctio repellat sequi veritatis reprehenderit nostrum officia, rerum earum atque numquam nesciunt ex ea quos autem architecto minima deleniti illum placeat eaque in ad. A iure tenetur soluta aperiam incidunt corrupti quas laborum libero! Repellendus sunt rerum est et sint, deleniti minima tempore at accusamus minus saepe dolorem quisquam porro repudiandae consequatur magnam eligendi corrupti. Illo expedita aspernatur praesentium eligendi error neque quis, est culpa itaque aperiam nulla nostrum quaerat impedit pariatur nemo esse nesciunt necessitatibus perferendis, iure minima! Ex doloribus, quod incidunt magni quam architecto libero pariatur nisi? Porro minus at deleniti accusamus est quos tenetur perferendis, reiciendis quisquam ratione, nobis in corrupti suscipit placeat magnam et ipsam cumque similique dolores voluptates sint ea odit optio qui? Voluptatum sapiente unde, fugit tempore eos amet sequi dolorum deleniti veniam nihil, incidunt eligendi nulla repellendus impedit consequuntur cum consequatur labore ex omnis magnam! Voluptates eius eum quaerat molestiae, odit cumque, expedita eligendi minus repellendus natus asperiores necessitatibus vel minima ad a et debitis rem fugit quasi! Delectus cumque modi doloribus est velit aliquam suscipit quibusdam harum, itaque iusto nam illum natus perferendis dolore optio dolores eos neque earum placeat pariatur ducimus veniam? Quos nostrum officiis ipsum consectetur, ab reiciendis quaerat accusamus a dignissimos, recusandae obcaecati, maiores distinctio architecto fugit magni placeat est dolore natus nihil aspernatur modi beatae. Obcaecati maxime accusamus ullam nam pariatur! Cum quis sunt est tenetur, cupiditate dicta voluptates vitae, deleniti provident cumque aliquam, repellat unde magnam hic inventore vel quas fuga omnis quisquam ex harum temporibus tempora! Aperiam omnis, ipsa sit laboriosam dicta praesentium ducimus suscipit totam in minus optio tempore officia ad, impedit inventore blanditiis tempora amet, ex voluptatem. Nulla aperiam repudiandae voluptas impedit, ipsam sequi non ipsa. Atque ipsum iste veniam amet, quae beatae voluptate exercitationem, itaque necessitatibus dolores reiciendis quis tenetur, nam delectus aliquid facere possimus inventore aut. Ab, incidunt cum dolore inventore ut ex libero officiis totam iure esse fuga. Rerum corporis ipsa maiores dolorum. Quo quaerat ipsa illum animi tenetur? Nihil amet harum soluta aspernatur ratione fugit! Officiis doloremque, culpa cum repudiandae expedita saepe consectetur quasi labore architecto laudantium quos, doloribus, nesciunt minus aut cupiditate ducimus porro molestias a iste accusamus. Qui iure quo accusantium hic nisi soluta, neque error id deleniti saepe libero totam odit, nobis quasi mollitia beatae architecto eum alias accusamus exercitationem in possimus veritatis molestias! Temporibus accusantium non ad ab impedit consectetur debitis accusamus voluptas voluptatem dolor qui magni odit numquam dignissimos inventore iste voluptate deleniti, amet itaque fugiat repellendus incidunt distinctio ratione sequi! Praesentium illo, vero voluptatum at iste tenetur voluptates molestias! Labore fuga quia accusamus eaque at adipisci aut perspiciatis voluptatibus non voluptatem tenetur, velit dolorum commodi. Veritatis maiores quos error vel perferendis, expedita amet voluptates at debitis, inventore molestias. Optio dicta dolore explicabo repudiandae laudantium impedit quibusdam sequi, exercitationem nam beatae itaque, maiores incidunt, recusandae quisquam eos facere cum est placeat. Quisquam enim fugit repellendus accusantium pariatur eius sed quas laboriosam et nostrum. Esse consequuntur libero quidem harum possimus, voluptas ea beatae sapiente, doloremque fuga eaque! Alias reiciendis neque explicabo! Sequi, sint facere, itaque harum vitae corporis nemo corrupti ratione inventore minima fugit quod quam eligendi soluta id? Voluptatibus distinctio, incidunt beatae delectus deserunt aspernatur facilis similique consequuntur accusamus modi dolorem, numquam tempora nesciunt consectetur reprehenderit dolorum fugiat excepturi cumque odit velit fugit tempore voluptates. Non repudiandae voluptatum ullam sapiente impedit suscipit delectus veniam maxime accusamus nemo id, recusandae, corporis nisi.</p>
                                </div>


                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <h5>Change Password</h5>
                                     <form>
                                        <div class="row">
                                            <div class="form-group col-12  mb-3">
                                                <div class="input-icon-wrpper">
                                                    <input type="text" class="form-control" id="uname" placeholder="Old Password" name="uname" required="">
                                                    <span class="input-icon">
                                                        <img src="images/icons/setting-pwd.png" alt="icon">
                                                    </span>
                                                </div>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group col-12 mb-3">
                                                <div class="input-icon-wrpper">
                                                    <input type="text" class="form-control" id="uname" placeholder="New Password" name="uname" required="">
                                                    <span class="input-icon">
                                                        <img src="images/icons/setting-pwd.png" alt="icon">
                                                    </span>
                                                </div>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group col-12  mb-3">
                                                <div class="input-icon-wrpper">
                                                    <input type="text" class="form-control" id="uname" placeholder="Confirm Password" name="uname" required="">
                                                    <span class="input-icon">
                                                        <img src="images/icons/setting-pwd.png" alt="icon">
                                                    </span>
                                                </div>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                        </div>
                                        <div class="cstm-btn-group my-3">
                                            <a href="#" class="outline-btn btn popup-btn min200">Back</a>
                                            <a href="#" class=" edit-btn btn popup-btn min200">Submit</a>
                                        </div>
                                     </form>
                                
                                </div>


                                <div class="tab-pane fade" id="v-pills-term" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <h5 class="heading after-line grey-line text-uppercase">Terms & Conditions</h5>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam expedita ad esse! Repellat a eligendi tempora id odio dolores voluptatem quibusdam officiis, molestiae, sint placeat itaque suscipit provident. Aliquid at similique saepe, tempore excepturi, voluptatum ullam, fugit dolores dignissimos quod assumenda? Numquam dolore quod magnam possimus similique neque! Rerum, pariatur? Iste quia excepturi error cumque officia rem nesciunt maiores aliquid libero reprehenderit ad voluptate molestias quis fugiat ducimus ex iusto, saepe dolores. Quisquam, similique maiores. Harum nisi soluta error et, dolores eveniet sapiente nesciunt dolorem aliquid doloribus aperiam a nobis amet, magni omnis fugiat id itaque. Beatae ad facere repellendus dolor consectetur est optio tempora hic quas ut dolorem consequuntur rerum nulla cumque porro, similique unde quidem esse ea sapiente neque officiis. Id unde sed maxime ut repellendus odio velit reiciendis quidem eum laudantium. Praesentium consequuntur cumque quae minus corporis, quaerat minima! Eius praesentium maxime est corporis harum? Consectetur quas numquam harum veritatis odio minima ipsum expedita! Laborum fugit reprehenderit sit perspiciatis ad eveniet velit minima culpa, porro fugiat ut laboriosam ab pariatur tenetur nam, commodi necessitatibus! Maiores dolorum veniam qui, cupiditate aut corporis nisi praesentium impedit facilis quia modi tenetur ut, earum ab corrupti reiciendis nihil sunt voluptatibus architecto recusandae amet enim et voluptatem! Eum, minima libero repellat atque possimus eligendi nobis reprehenderit, exercitationem accusamus eveniet in expedita qui ad sint cumque impedit odio quidem dolor numquam aliquid totam deleniti mollitia vel vitae? Labore perspiciatis totam ad cupiditate blanditiis ipsa suscipit ut veritatis obcaecati vel autem, esse minus sint placeat consequatur magnam pariatur vero repudiandae doloremque! Adipisci sed eos, at ipsum dolorum voluptate vel beatae neque quisquam inventore facilis delectus? Sit vero, quae accusamus nesciunt soluta illum neque eligendi nihil eos cumque veniam molestias dolores non labore tempore quo odio debitis minima praesentium beatae. Dignissimos ea illum quidem, suscipit inventore enim magnam mollitia delectus. Alias, porro aperiam sit modi eius distinctio quibusdam ex omnis sapiente animi voluptatem repellat rem quod quas eum natus soluta maiores eaque odit nostrum tempore voluptate blanditiis. Dolores pariatur animi non ex doloribus quam, cupiditate modi labore dolor veritatis saepe laborum vero reprehenderit necessitatibus cumque voluptatem praesentium omnis? Sequi incidunt perferendis, accusamus nobis consequuntur nemo facilis reprehenderit distinctio tempora aliquid saepe, earum delectus velit? Vel error temporibus hic vitae, veritatis omnis molestiae corporis odio, maxime accusamus reprehenderit rerum aperiam ipsam laborum pariatur ullam impedit ex? Quam, ad! Laudantium assumenda fugit doloribus rem unde dolores reprehenderit architecto perferendis, quo neque facilis obcaecati est at. Quidem obcaecati fuga numquam quam voluptatum deleniti nulla doloribus, qui assumenda necessitatibus, tempore iste, enim beatae magni hic ratione quis labore quae iusto eligendi pariatur itaque. Distinctio repellat sequi veritatis reprehenderit nostrum officia, rerum earum atque numquam nesciunt ex ea quos autem architecto minima deleniti illum placeat eaque in ad. A iure tenetur soluta aperiam incidunt corrupti quas laborum libero! Repellendus sunt rerum est et sint, deleniti minima tempore at accusamus minus saepe dolorem quisquam porro repudiandae consequatur magnam eligendi corrupti. Illo expedita aspernatur praesentium eligendi error neque quis, est culpa itaque aperiam nulla nostrum quaerat impedit pariatur nemo esse nesciunt necessitatibus perferendis, iure minima! Ex doloribus, quod incidunt magni quam architecto libero pariatur nisi? Porro minus at deleniti accusamus est quos tenetur perferendis, reiciendis quisquam ratione, nobis in corrupti suscipit placeat magnam et ipsam cumque similique dolores voluptates sint ea odit optio qui? Voluptatum sapiente unde, fugit tempore eos amet sequi dolorum deleniti veniam nihil, incidunt eligendi nulla repellendus impedit consequuntur cum consequatur labore ex omnis magnam! Voluptates eius eum quaerat molestiae, odit cumque, expedita eligendi minus repellendus natus asperiores necessitatibus vel minima ad a et debitis rem fugit quasi! Delectus cumque modi doloribus est velit aliquam suscipit quibusdam harum, itaque iusto nam illum natus perferendis dolore optio dolores eos neque earum placeat pariatur ducimus veniam? Quos nostrum officiis ipsum consectetur, ab reiciendis quaerat accusamus a dignissimos, recusandae obcaecati, maiores distinctio architecto fugit magni placeat est dolore natus nihil aspernatur modi beatae. Obcaecati maxime accusamus ullam nam pariatur! Cum quis sunt est tenetur, cupiditate dicta voluptates vitae, deleniti provident cumque aliquam, repellat unde magnam hic inventore vel quas fuga omnis quisquam ex harum temporibus tempora! Aperiam omnis, ipsa sit laboriosam dicta praesentium ducimus suscipit totam in minus optio tempore officia ad, impedit inventore blanditiis tempora amet, ex voluptatem. Nulla aperiam repudiandae voluptas impedit, ipsam sequi non ipsa. Atque ipsum iste veniam amet, quae beatae voluptate exercitationem, itaque necessitatibus dolores reiciendis quis tenetur, nam delectus aliquid facere possimus inventore aut. Ab, incidunt cum dolore inventore ut ex libero officiis totam iure esse fuga. Rerum corporis ipsa maiores dolorum. Quo quaerat ipsa illum animi tenetur? Nihil amet harum soluta aspernatur ratione fugit! Officiis doloremque, culpa cum repudiandae expedita saepe consectetur quasi labore architecto laudantium quos, doloribus, nesciunt minus aut cupiditate ducimus porro molestias a iste accusamus. Qui iure quo accusantium hic nisi soluta, neque error id deleniti saepe libero totam odit, nobis quasi mollitia beatae architecto eum alias accusamus exercitationem in possimus veritatis molestias! Temporibus accusantium non ad ab impedit consectetur debitis accusamus voluptas voluptatem dolor qui magni odit numquam dignissimos inventore iste voluptate deleniti, amet itaque fugiat repellendus incidunt distinctio ratione sequi! Praesentium illo, vero voluptatum at iste tenetur voluptates molestias! Labore fuga quia accusamus eaque at adipisci aut perspiciatis voluptatibus non voluptatem tenetur, velit dolorum commodi. Veritatis maiores quos error vel perferendis, expedita amet voluptates at debitis, inventore molestias. Optio dicta dolore explicabo repudiandae laudantium impedit quibusdam sequi, exercitationem nam beatae itaque, maiores incidunt, recusandae quisquam eos facere cum est placeat. Quisquam enim fugit repellendus accusantium pariatur eius sed quas laboriosam et nostrum. Esse consequuntur libero quidem harum possimus, voluptas ea beatae sapiente, doloremque fuga eaque! Alias reiciendis neque explicabo! Sequi, sint facere, itaque harum vitae corporis nemo corrupti ratione inventore minima fugit quod quam eligendi soluta id? Voluptatibus distinctio, incidunt beatae delectus deserunt aspernatur facilis similique consequuntur accusamus modi dolorem, numquam tempora nesciunt consectetur reprehenderit dolorum fugiat excepturi cumque odit velit fugit tempore voluptates. Non repudiandae voluptatum ullam sapiente impedit suscipit delectus veniam maxime accusamus nemo id, recusandae, corporis nisi.</p>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- End setting section -->


@stop