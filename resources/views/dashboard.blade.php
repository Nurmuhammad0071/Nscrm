<x-frontend>
    <div class="card mb-3">
        <div style="background: none; margin: 100px auto" class="card-header position-relative min-vh-25 mb-7">
            <div  class="m-5 bg-holder rounded-3 rounded-bottom-0" style="background-image:url(../../assets/img/generic/4.jpg);"></div>
            <!--/.bg-holder-->
            <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="../../assets/img/team/2.jpg" width="200" alt="" /></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1">{{ Auth::user()->name }}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h4>
                    <h5 class="fs-0 fw-normal">Senior Software Engineer at Technext Limited</h5>
                    <p class="text-500">New York, USA</p>
                    <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
                    <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
                    <div class="border-bottom border-dashed my-4 d-lg-none"></div>
                </div>
                <div class="col ps-2 ps-lg-3"><a class="d-flex align-items-center mb-2" href="#"><span class="fas fa-user-circle fs-3 me-2 text-700" data-fa-transform="grow-2"></span>
                        <div class="flex-1">
                            <h6 class="mb-0">See followers (330)</h6>
                        </div>
                    </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="../../assets/img/logos/g.png" alt="Generic placeholder image" width="30" />
                        <div class="flex-1">
                            <h6 class="mb-0">Google</h6>
                        </div>
                    </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="../../assets/img/logos/apple.png" alt="Generic placeholder image" width="30" />
                        <div class="flex-1">
                            <h6 class="mb-0">Apple</h6>
                        </div>
                    </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="../../assets/img/logos/hp.png" alt="Generic placeholder image" width="30" />
                        <div class="flex-1">
                            <h6 class="mb-0">Hewlett Packard</h6>
                        </div>
                    </a></div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-8 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Intro</h5>
                </div>
                <div class="card-body text-justify">
                    <p class="mb-0 text-1000">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking.</p>
                    <div class="collapse show" id="profile-intro">
                        <p class="mt-3 text-1000">I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. </p>
                        <p class="text-1000">It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face.</p>
                        <p class="text-1000 mb-0">There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</p>
                    </div>
                </div>
                <div class="card-footer bg-light p-0 border-top"><button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Show </span></span></button></div>
            </div>



        </div>
        <div class="col-lg-4 ps-lg-2">
            <div class="sticky-sidebar">
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Experience</h5>
                    </div>
                    <div class="card-body fs--1">
                        <div class="d-flex"><a href="#!"> <img class="img-fluid" src="../../assets/img/logos/g.png" alt="" width="56" /></a>
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0">Big Data Engineer<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h6>
                                <p class="mb-1"> <a href="#!">Google</a></p>
                                <p class="text-1000 mb-0">Apr 2012 - Present &bull; 6 yrs 9 mos</p>
                                <p class="text-1000 mb-0">California, USA</p>
                                <div class="border-bottom border-dashed my-3"></div>
                            </div>
                        </div>
                        <div class="d-flex"><a href="#!"> <img class="img-fluid" src="../../assets/img/logos/apple.png" alt="" width="56" /></a>
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0">Software Engineer<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h6>
                                <p class="mb-1"> <a href="#!">Apple</a></p>
                                <p class="text-1000 mb-0">Jan 2012 - Apr 2012 &bull; 4 mos</p>
                                <p class="text-1000 mb-0">California, USA</p>
                                <div class="border-bottom border-dashed my-3"></div>
                            </div>
                        </div>
                        <div class="d-flex"><a href="#!"> <img class="img-fluid" src="../../assets/img/logos/nike.png" alt="" width="56" /></a>
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0">Mobile App Developer<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h6>
                                <p class="mb-1"> <a href="#!">Nike</a></p>
                                <p class="text-1000 mb-0">Jan 2011 - Apr 2012 &bull; 1 yr 4 mos</p>
                                <p class="text-1000 mb-0">Beaverton, USA</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



</x-frontend>
