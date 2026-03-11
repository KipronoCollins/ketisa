@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!--================ Start Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content text-center">
                        <p class="text-uppercase">
                            Kenya Technical Institutions Sport Association
                        </p>
                        <h2 class="text-uppercase mt-4 mb-5">
                            Promoting Talent, Unity & National Development Through Sports
                        </h2>
                        <div>
                            <a href="#" class="primary-btn2 mb-3 mb-sm-0">About KETISA</a>
                            <a href="#" class="primary-btn ml-sm-3 ml-0">Our Programs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->


<!--================ Start Feature Area =================-->
<section class="feature_area section_gap_top">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="main_title">
          <h2 class="mb-3">Our Mandate</h2>
          <p>
            Strengthening sports in technical institutions across Kenya
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="single_feature">
          <div class="icon"><span class="flaticon-student"></span></div>
          <div class="desc">
            <h4 class="mt-3 mb-2">Talent Development</h4>
            <p>
              Identifying and nurturing sports talent within the 14 member institutions and beyond.
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="single_feature">
          <div class="icon"><span class="flaticon-book"></span></div>
          <div class="desc">
            <h4 class="mt-3 mb-2">National Unity</h4>
            <p>
              Promoting mutual respect, citizenship, and national cohesion through organized sports and games.
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="single_feature">
          <div class="icon"><span class="flaticon-earth"></span></div>
          <div class="desc">
            <h4 class="mt-3 mb-2">Strategic Partnerships</h4>
            <p>
              Aligning with Ministry of Education, Youth Affairs & Sports and other government bodies.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================ End Feature Area =================-->


<!--================ Start Popular Courses Area =================-->
<div class="popular_courses">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="main_title">
          <h2 class="mb-3">Key Focus Areas</h2>
          <p>
            Supporting social, political and economic development through sports
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="owl-carousel active_course">

          <div class="single_course">
            <div class="course_head">
              <img class="img-fluid" src="img/courses/c1.jpg" alt="" />
            </div>
            <div class="course_content">
              <span class="price">2005</span>
              <span class="tag mb-4 d-inline-block">Policy</span>
              <h4 class="mb-3">
                <a href="#">Sessional Paper No.1 of 2005</a>
              </h4>
              <p>
                Recognizing sports as integral to education, training and national development.
              </p>
            </div>
          </div>

          <div class="single_course">
            <div class="course_head">
              <img class="img-fluid" src="img/courses/c2.jpg" alt="" />
            </div>
            <div class="course_content">
              <span class="price">14+</span>
              <span class="tag mb-4 d-inline-block">Institutions</span>
              <h4 class="mb-3">
                <a href="#">Member Institutions</a>
              </h4>
              <p>
                Strengthening participation across 14 technical institutions nationwide.
              </p>
            </div>
          </div>

          <div class="single_course">
            <div class="course_head">
              <img class="img-fluid" src="img/courses/c3.jpg" alt="" />
            </div>
            <div class="course_content">
              <span class="price">2030</span>
              <span class="tag mb-4 d-inline-block">Vision</span>
              <h4 class="mb-3">
                <a href="#">Strategic Plan</a>
              </h4>
              <p>
                Strategic positioning to meet short and long term objectives for sports excellence.
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!--================ End Popular Courses Area =================-->


<!--================ Start Registration Area =================-->
<div class="section_gap registration_area">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <div class="row clock_sec clockdiv" id="clockdiv">
          <div class="col-lg-12">
            <h1 class="mb-3">Join KETISA Programs</h1>
            <p>
              Be part of a transformative sports movement aligned with the Ministry of Education and national development goals.
            </p>
          </div>
          <div class="col clockinner1 clockinner">
            <h1 class="days">14</h1>
            <span class="smalltext">Institutions</span>
          </div>
          <div class="col clockinner clockinner1">
            <h1 class="hours">5+</h1>
            <span class="smalltext">Partner Ministries</span>
          </div>
          <div class="col clockinner clockinner1">
            <h1 class="minutes">1000+</h1>
            <span class="smalltext">Student Athletes</span>
          </div>
          <div class="col clockinner clockinner1">
            <h1 class="seconds">20+</h1>
            <span class="smalltext">Sport Disciplines</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1">
        <div class="register_form">
          <h3>Partner With Us</h3>
          <p>Support talent development in Kenya</p>
          <form class="form_area">
            <div class="row">
              <div class="col-lg-12 form_group">
                <input name="name" placeholder="Organization Name" required type="text" />
                <input name="phone" placeholder="Contact Number" required type="tel" />
                <input name="email" placeholder="Email Address" required type="email" />
              </div>
              <div class="col-lg-12 text-center">
                <button class="primary-btn">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================ End Registration Area =================-->


<!--================ Start Trainers Area =================-->
<section class="trainer_area section_gap_top">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="main_title">
          <h2 class="mb-3">Leadership & Coordination</h2>
          <p>
            Dedicated officials driving sports excellence in technical institutions
          </p>
        </div>
      </div>
    </div>
@endsection