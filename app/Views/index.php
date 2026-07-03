<!-- CONVOCATION ANNOUNCEMENT -->
<div class="convocation-bar">
    <marquee behavior="scroll" direction="left" scrollamount="5">

        <span class="announce-icon">📢</span>

        <strong>
            Online Application for Admissions
        </strong>

        <a href="https://cdoe.yvu.edu.in/admin" class="notice-link">
            🔗 Click here
        </a>

    </marquee>
</div>
    <div id="heroCarousel"
        class="carousel slide carousel-fade"
        data-bs-ride="carousel"
        data-bs-interval="3000">
      <div class="carousel-inner">

        <!-- SLIDE 1 -->
        <div class="carousel-item active">
          <img src="assets/images/banner.jpg"
              class="d-block hero-carousel-img"
              alt="Slide 1">

          
        </div>
      </div>

      <!-- CONTROLS -->
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>

    </div>


    <section class="container my-5">
      <div class="row g-4">
        <div class="col-12">
          <div class="p-4 rounded-4 shadow bg-light">

            <h4 class="fw-bold mb-3 text-primary">Updates</h4>

            <!-- TABS -->
            <ul class="nav nav-pills nav-fill bg-white rounded-3 p-2 mb-3 flex-wrap">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#notifications">
                  Notifications
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#latest">Latest</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#circulars">Circulars</button>
              </li>
            </ul>

            <!-- TAB CONTENT (CREATED DATE SHOWN INSIDE ITEMS VIA JS) -->
            <div class="tab-content">

              <div class="tab-pane fade show active" id="notifications">
                <div id="notificationList"></div>
                <button class="btn btn-outline-primary w-100 mt-3 d-none"
                  id="notificationBtn" onclick="toggleView('Notifications')">
                  View More
                </button>
              </div>

              <div class="tab-pane fade" id="forms">
                <div id="formsList"></div>
                <button class="btn btn-outline-primary w-100 mt-3 d-none"
                  id="formsBtn" onclick="toggleView('Forms')">
                  View More
                </button>
              </div>

              <div class="tab-pane fade" id="circulars">
                <div id="circularsList"></div>
                <button class="btn btn-outline-primary w-100 mt-3 d-none"
                  id="circularsBtn" onclick="toggleView('Circulars')">
                  View More
                </button>
              </div>

              <div class="tab-pane fade" id="latest">
                <div id="latestList"></div>
                <button class="btn btn-outline-primary w-100 mt-3 d-none"
                  id="latestBtn" onclick="toggleView('Latest Info')">
                  View More
                </button>
              </div>

              <div class="tab-pane fade" id="tenders">
                <div id="tendersList"></div>
                <button class="btn btn-outline-primary w-100 mt-3 d-none"
                  id="tendersBtn" onclick="toggleView('Tenders')">
                  View More
                </button>
              </div>

              <div class="tab-pane fade" id="events">
                <div id="eventsList"></div>
                <button class="btn btn-outline-primary w-100 mt-3 d-none"
                  id="eventsBtn" onclick="toggleView('Events')">
                  View More
                </button>
              </div>

              <div class="tab-pane fade" id="downloads">
                <div id="downloadsList"></div>
                <button class="btn btn-outline-primary w-100 mt-3 d-none"
                  id="downloadsBtn" onclick="toggleView('Downloads')">
                  View More
                </button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">

            <!-- Heading -->
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="fw-bold">University Leadership</h2>
                </div>
            </div>

            <!-- Profiles Row -->
            <div class="row justify-content-center g-4 text-center">

                <!-- Vice Chancellor -->
                <div class="col-md-3 col-sm-6">
                    <img src="assets/images/administration/vc.jpg"
                        class="img-fluid rounded-circle mb-3"
                        width="186" height="186" alt="">
                    <h6 class="fw-bold mb-1">Prof. Raja Shekhar Bellamkonda</h6>
                    <p class="mb-0">Vice Chancellor</p>
                </div>

                <!-- Registrar -->
                <div class="col-md-3 col-sm-6">
                    <img src="assets/images/administration/prof.padmaregistrar.png"
                        class="img-fluid rounded-circle mb-3"
                        width="186" height="186" alt="">
                    <h6 class="fw-bold mb-1">Prof. P. Padma</h6>
                    <p class="mb-1">Registrar (i/c)</p>
                    <!-- <a href="#" class="text-decoration-none fw-semibold">
                        Message <i class="fa fa-external-link"></i>
                    </a> -->
                </div>

                <!-- Director -->
                <div class="col-md-3 col-sm-6">
                    <img src="assets/images/directors/kkreddy.png"
                        class="img-fluid rounded-circle mb-3"
                        width="186" height="186" alt="">
                    <h6 class="fw-bold mb-1">Prof. K. Krishna Reddy</h6>
                    <p class="mb-1">Director</p>
                    <a href="director" class="text-decoration-none fw-semibold">
                        Message <i class="fa fa-external-link"></i>
                    </a>
                </div>

                <!-- Deputy Director -->
                <div class="col-md-3 col-sm-6">
                    <img src="assets/images/administration/msb-modified-min1.png"
                        class="img-fluid rounded-circle mb-3"
                        width="186" height="186" alt="">
                    <h6 class="fw-bold mb-1">Dr. M. Sreedhar Babu</h6>
                    <p class="mb-1">Deputy Director</p>
                    <a href="deputy-director" class="text-decoration-none fw-semibold">
                        Message <i class="fa fa-external-link"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
