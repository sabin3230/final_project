@extends('layouts.app1')
@section('title')
    RoyalRide
@endsection
@section('content')
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(assets/img/slide/img1.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Welcome to <span>RoyalRide</span></h2>
            <p class="animate__animated animate__fadeInUp">RoyalRide is an Indian multinational motorcycle manufacturing company headquartered in Chennai Tamil Nadu, India. The company is the oldest global motorcycle brand in continuous production and operates manufacturing plants in Chennai in India.</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image: url(assets/img/slide/img2.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Servicing</h2>
            <p class="animate__animated animate__fadeInUp">Get the list of genuine RoyalRide Classic 350 spare parts and accessories in India, check price list of Side View Mirror, Wind Screen, Rider Foot Rest, Engine Guard, Alloy Wheel Rear, and other body parts of Classic 350.</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item" style="background-image: url(assets/img/slide/img3.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Travel</h2>
            <p class="animate__animated animate__fadeInUp">He campaign draws instances from real lives and bikes. People who have explored their adventurous traits on their Royal Enfield. </p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section>



<section id="featured-services" class="featured-services section-bg">
  <div class="container">

    <div class="row no-gutters">
      <div class="col-lg-4 col-md-6">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-laptop"></i></div>
          <h4 class="title">Servicing</h4>
          <p class="description">Royal Ride latest ‘Service on Wheel’ initiative has currently employed 800 motorcycles across India as mobile service centres</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-briefcase"></i></div>
          <h4 class="title">Sales</h4>
          <p class="description">The company had reported sales of 66,891 units in the same month last year. Domestic sales last month stood at 40,611 units, while the same was at 62,858 units in October 2020.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-calendar4-week"></i></div>
          <h4 class="title">Booking</h4>
          <p class="description">we can easily booked online motorcycle</p>
        </div>
      </div>
    </div>

  </div>
</section>

<section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h2>About Us</h2>
      <p>Royal Ride commences manufacturing at its second facility at Oragadam, Tamil Nadu. With increased capacity, the state-of-art factory will be the nucleus of the companys global ambitions in the future.</p>
    </div>

    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="assets/img/img4.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        <h3>THE ROYAL Ride STORY, SINCE 1901</h3>
        <p class="fst-italic">
          Royal Enfield is one of the most preferred motorcycle brands in the country. These bikes attract a lot of buyers for various reasons. 
        </p>
        <ul>
          <li><i class="bi bi-check-circled"></i> RoyalRide is a heritage British motorcycle brand that has survived over decades. It is the only British motorcycle brand to be fully manufactured in India. </li>
          <li><i class="bi bi-check-circled"></i>Owning a Royal Enfield gives you a sense of pride. It is unlike any other motorcycle in the country.</li>
          <li><i class="bi bi-check-circled"></i>Royal Enfield motorcycles are affordable machines that give a big bike feel. They are completely localized and hence are not expensive, given their engine capacities.</li>
        </ul>
        <p>
          Royal Enfield bikes have this deep engine thump that is music to the ears. This thump can be addictive and distinguishes a Royal Enfield from all other motorcycles. This is also one of the main reasons why people are attracted towards Royal Enfield motorcycles.
        </p>
      </div>
    </div>

  </div>
</section><!-- End About Us Section -->

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
  <div class="container">

    <div class="row no-gutters">

      <div class="col-lg-4 col-md-6 content-item">
        <span>01</span>
        <h4>THE BEGINNING</h4>
        <p>The Enfield Cycle Company made motorcycles, bicycles, lawnmowers and stationary engines under the name Royal Enfield out of its works based at Redditch, Worcestershire.</p>
      </div>

      <div class="col-lg-4 col-md-6 content-item">
        <span>02</span>
        <h4>THE EARLY YEARS</h4>
        <p>In 1909 Royal Enfield surprised the motorcycling world by introducing a small Motorcycle with a 2 ¼ HP V twin Motosacoche engine of Swiss origin</p>
      </div>

      <div class="col-lg-4 col-md-6 content-item">
        <span>03</span>
        <h4> BETWEEN THE WARS</h4>
        <p>As the factory developed in the 20’s the range of models also increased and in 1924 Royal Enfield was offering four versions of the 2 ¼ HP two-stroke motorcycle, two new JAP engines 350 cc motorcycles and two versions of the 8 HP Vickers engine sidecar combinations.</p>
      </div>

      <div class="col-lg-4 col-md-6 content-item">
        <span>04</span>
        <h4>THE INDIA CONNECTION</h4>
        <p>Royal Enfield motorcycles were being sold in India since 1949. In 1955, the Indian government started looking for a suitable motorcycle for its police forces and the army for patrolling duties on the country’s border. </p>
      </div>

      <div class="col-lg-4 col-md-6 content-item">
        <span>05</span>
        <h4>1964</h4>
        <p>The iconic Continental GT café racer is launched to great acclaim when a team of photojournalists ride it from John ‘o Groats to Lands End in under 24 hours, by way of 7 laps at the Silverstone circuit. </p>
      </div>

      <div class="col-lg-4 col-md-6 content-item">
        <span>06</span>
        <h4>1977</h4>
        <p>Royal Enfield India begins exporting the 350cc Bullet to the UK and Europe. Sales grow rapidly as the bikes develop a following amongst classic British motorcycle enthusiasts.</p>
      </div>

    </div>

  </div>
</section><!-- End Why Us Section -->



<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">

    <div class="section-title">
      <h2>Services</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box iconbox-blue">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" ></path>
            </svg>
            <i class="bx bxl-dribbble"></i>
          </div>
          <h4><a href="">Maintenance</a></h4>
          <p>Maintenace motorcycle by check up on time and clean all part of the motorcycle</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box iconbox-orange ">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" ></path>
            </svg>
            <i class="bx bx-file"></i>
          </div>
          <h4><a href="">Tires and Wheels</a></h4>
          <p>tires and wheels can change as customer customized as like and repair</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box iconbox-pink">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" ></path>
            </svg>
            <i class="bx bx-tachometer"></i>
          </div>
          <h4><a href="">Engine Service</a></h4>
          <p>Engine service make motorcycle fresh and boost power and make long period of time to keep frsh</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box iconbox-yellow">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" ></path>
            </svg>
            <i class="bx bx-layer"></i>
          </div>
          <h4><a href="">Break Services</a></h4>
          <p>Break servicing can be check up to keep protect from accident </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box iconbox-red">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" ></path>
            </svg>
            <i class="bx bx-slideshow"></i>
          </div>
          <h4><a href="">Exhaust System</a></h4>
          <p>Exhaust system can check the condition wheather it have good condition or not</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box iconbox-teal">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" ></path>
            </svg>
            <i class="bx bx-arch"></i>
          </div>
          <h4><a href="">Service</a></h4>
          <p>service can be provied for the customer and feel free about the problem on motorcycle</p>
        </div>
      </div>

    </div>

  </div>
</section>

<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="section-title">
      <h2>GALLERY</h2>
    </div>


    <div class="img-gallery">

        <img src="assets/img/gallery/img6.jpg" alt="">
        <img src="assets/img/gallery/img7.jpg" alt="">
        <img src="assets/img/gallery/img8.jpg" alt="">
        <img src="assets/img/gallery/img9.jpg" alt="">

    </div>

  </div>
</section>


<section id="vhicle_booking" class="team">
  <div class="container  px-1 py-5 mx-auto">

    <div class="section-title">
      <h2>Booking Vehicle</h2>
    </div>

    <div class="card">

         <form method="post" action="{{route("VehicleBooking.store")}}" role="form" class="form-card">
          @csrf
              <div class="row justify-content-between text-left">
                  <div class="form-group col-sm-6 flex-column d-flex mt-3"> 
                    <label class="form-control-label px-3">First name<span class="text-danger"> *</span></label> 
                    <input type="text" id="fname" name="first_name" placeholder="Enter your first name" >
                   </div>

                  <div class="form-group col-sm-6 flex-column d-flex mt-3"> 
                    <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label>   
                    <input type="text" id="lname" name="last_name" placeholder="Enter your last name" > 
                  </div>
              </div>

              <div class="row justify-content-between text-left mt-3">
                <div class="form-group col-12 flex-column d-flex"> 
                  <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label>
                   <input type="text" id="ans" name="email" placeholder="Enter your address" > 
                </div>
              </div>

              <div class="row justify-content-between text-left mt-3">
                <div class="form-group col-12 flex-column d-flex"> 
                  <label class="form-control-label px-3">Address<span class="text-danger"> *</span></label>
                   <input type="text" id="ans" name="address" placeholder="Enter your address" > 
                </div>
              </div>


              <div class="row justify-content-between text-left mt-3">
                  <div class="form-group col-sm-6 flex-column d-flex"> 
                    <label class="form-control-label px-3">Contact<span class="text-danger"> *</span></label> 
                    <input type="text" id="email" name="contact" placeholder="Enter your contact">
                  </div>

                  <div class="form-group col-sm-6 flex-column d-flex"> 
                    <label class="form-control-label px-3">Alternate Contact</label> 
                    <input type="text" id="mob" name="alt_contact" placeholder="Enter your Alternate address" >
                  </div>
              </div>
             
              <div class="row justify-content-between text-left mt-3">
                <div class="form-group col-12 flex-column d-flex">
                  <label for="model_name">Model Name</label>
                  <select name="vehicle_model_id" id="" class="form-control">
                    <option value="" disabled selected>---------</option>
                  
                    @foreach ($vehicleModels as $vehiclemodel)
                        <option value="{{$vehiclemodel->id}}">{{$vehiclemodel->model_name}} - {{$vehiclemodel->engine_capacity}}cc - {{$vehiclemodel->color}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="text-center"><button type="submit" class="btn btn-success" style="margin-top: 50px">Book Vehicle</button></div>
          </form>
        </div>    
      </div>

    </div>
  </div>
</section>


<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2>Contact</h2>
    </div>

    <div class="row">

      <div class="col-lg-5 d-flex align-items-stretch">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>Budhanilkantha, Kathmandu, Nepal</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>RoyalRide@gmail.com</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>+97 989898484</p>
          </div>

          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1829.9938102699082!2d85.35945249704271!3d27.772409379451407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1d5488b966e1%3A0x26e3e0146526e587!2sHotel%20Pabera!5e0!3m2!1sen!2snp!4v1641713659899!5m2!1sen!2snp" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
          
        </div>

      </div>

      <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
        <form action="{{route("contact.store")}}" method="post" role="form" class="contact-form">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="name">Your Name</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
              <label for="name">Your Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <label for="name">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" required>
          </div>
          <div class="form-group mt-3">
            <label for="name">Message</label>
            <textarea class="form-control" name="message" rows="10" required></textarea>
          </div>
        
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div>

    </div>

  </div>
</section>

@endsection