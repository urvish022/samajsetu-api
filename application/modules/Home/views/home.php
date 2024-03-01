<html lang="en">
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Samaj Setu Android Application">
    <meta name="keywords" content="samajsetu app, samaj setu, techwebsoft, 72 samaj, 72 samaj community app">
    <meta name="author" content="Urvish Patel">
  <!-- Page Title -->
  <title>Samaj Setu - 72 chuval kadva patidar community web & app</title>
  <!-- Google Fonts css-->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
  <!-- Bootstrap css -->
  <link href="<?=WEB_ASSETS?>css/bootstrap.min.css" rel="stylesheet" media="screen">
  <!-- Font Awesome icon css-->
  <link href="<?=WEB_ASSETS?>css/font-awesome.min.css" rel="stylesheet" media="screen">
  <!-- Linear icons css-->
  <link href="<?=WEB_ASSETS?>css/linearicons.css" rel="stylesheet" media="screen">
  <!-- Carousel css -->
  <link rel="stylesheet" href="<?=WEB_ASSETS?>css/owl.carousel.css">
  <!-- Slick nav css -->
  <link rel="stylesheet" href="<?=WEB_ASSETS?>css/slicknav.css">
  <!-- Animated css -->
  <link href="<?=WEB_ASSETS?>css/animate.css" rel="stylesheet">
  <!-- Magnific Popup CSS -->
  <link href="<?=WEB_ASSETS?>css/magnific-popup.css" rel="stylesheet">
  <!-- Theme Switcher css -->
  <!-- Main custom css -->
  <link href="<?=WEB_ASSETS?>css/custom-blue.css" rel="stylesheet" media="screen" id="color-switcher">
  <link rel="shortcut icon" href="<?=WEB_ASSETS?>images/favicon.png" /> 
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-target="#navigation" data-offset="5">
  
  <!-- Preloader starts -->
  <div class="preloader">
    <div class="sk-wave">
      <div class="sk-rect sk-rect1"></div>
      <div class="sk-rect sk-rect2"></div>
      <div class="sk-rect sk-rect3"></div>
      <div class="sk-rect sk-rect4"></div>
      <div class="sk-rect sk-rect5"></div>
    </div>
  </div>
  <!-- Preloader Ends -->

  <!-- Header Section Starts-->
  <header>
    <nav id="main-nav" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <!-- Logo starts -->
          <a class="navbar-brand" href="#" style="margin-top: -18px;!important">
            <img src="<?=WEB_ASSETS?>images/web_logo.png" height="80" width="200">
          </a>
          <!-- Logo Ends -->
          
          <!-- Responsive Menu button starts -->
          <div class="navbar-toggle">
          </div>
          <!-- Responsive Menu button Ends -->
        </div>
        <div id="responsive-menu"></div>
        <!-- Navigation starts -->
        <div class="navbar-collapse collapse" id="navigation">
          <ul class="nav navbar-nav navbar-right main-navigation" id="main-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#feature">Features</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="https://app.samajsetu.com/login">Login</a></li>
            <li><a href="https://app.samajsetu.com/register">Registration</a></li>
            <!-- <li><a href="#contact">Contact</a></li> -->
          </ul>
        </div>
        <!-- Navigation Ends -->
      </div>
    </nav>
  </header>
  <!-- Header Section Ends-->
  
  <!-- Banner Section Starts -->
  <section class="banner parallax" id="home">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-sm-7">
          <div class="header-content">
            <div class="typing-title">
              <p>Business Advertisement</p>
              <p>Matrimony Profile</p>
              <p>Family Details</p>
            </div>

            <h2>Welcome to Samaj Setu App<br />You can add your <span class="typed-title"></span></h2>
            <p>Samaj Setu is android app for 72 chuval kadva patidar samaj <br /> and it is community app. You can download from play store.</p>
            <div class="download-button">
              <a target="_blank" href="https://play.google.com/store/apps/details?id=com.techwebsoft.samajsetu"><img src="<?=WEB_ASSETS?>images/btn-google-play.png"></a>
            </div>
          </div>
        </div>
        
        <div class="col-md-5 col-sm-5">
          <!-- Header slider starts -->
          <div class="owl-carousel owl-theme header-slider" id="header-slider-carousel">
            <div class="item">
              <div class="slider-image">
                <img src="<?=WEB_ASSETS?>images/slider-1.png" height="450" width="215" />
              </div>
            </div>
            
            <div class="item">
              <div class="slider-image">
                <img src="<?=WEB_ASSETS?>images/slider-2.png" height="450" width="215" />
              </div>
            </div>
            
            <div class="item">
              <div class="slider-image">
                <img src="<?=WEB_ASSETS?>images/slider-3.png" height="450" width="215" />
              </div>
            </div>  

            <div class="item">
              <div class="slider-image">
                <img src="<?=WEB_ASSETS?>images/slider-4.png" height="450" width="215" />
              </div>
            </div>  

          </div>
          <!-- Header slider ends -->
        </div>
      </div>
    </div>  
  </section>
  <!-- Banner Section Ends -->
  
  <!-- Features Section starts -->
  <section class="feature" id="feature">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>Samaj Setu Application <span>features</span></h2>
          </div>
        </div>
      </div>
      
      <div class="row">
        <!-- Feature single starts -->
        <div class="col-md-3 col-sm-6">
          <div class="feature-single wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon-feature-single">
              <i class="lnr lnr-users"></i>
            </div>            
            <h3>Member Directrory</h3>
            <p>List of members with family details village vise.</p>
          </div>
        </div>
        <!-- Feature single ends -->
        
        <!-- Feature single starts -->
        <div class="col-md-3 col-sm-6">
          <div class="feature-single wow fadeInUp" data-wow-delay="0.3s">
            <div class="icon-feature-single">
              <i class="lnr lnr-picture"></i>
            </div>            
            <h3>Gallery</h3>
            <p>All Pictures of 72 samaj's event.</p>
          </div>
        </div>
        <!-- Feature single ends -->
        
        <!-- Feature single starts -->
        <div class="col-md-3 col-sm-6">
          <div class="feature-single wow fadeInUp" data-wow-delay="0.3s">
            <div class="icon-feature-single">
              <i class="lnr lnr-home"></i>
            </div>            
            <h3>Village History</h3>
            <p>App contains all village history with village photo and history.</p>
          </div>
        </div>
        <!-- Feature single ends -->
        
        <!-- Feature single starts -->
        <div class="col-md-3 col-sm-6">
          <div class="feature-single wow fadeInUp" data-wow-delay="0.4s">
            <div class="icon-feature-single">
              <i class="lnr lnr-heart"></i>
            </div>            
            <h3>Matrimony</h3>
            <p>User can upload matrimony profile with photo and details.</p>
          </div>
        </div>
        <!-- Feature single ends -->
      </div>

      <div class="row">
        <!-- Feature single starts -->
        <div class="col-md-3 col-sm-6">
          <div class="feature-single wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon-feature-single">
              <i class="lnr lnr-store"></i>
            </div>            
            <h3>Business Directrory</h3>
            <p>User can add own business advertisemnet with details.</p>
          </div>
        </div>
        <!-- Feature single ends -->
        
        <!-- Feature single starts -->
        <div class="col-md-3 col-sm-6">
          <div class="feature-single wow fadeInUp" data-wow-delay="0.3s">
            <div class="icon-feature-single">
              <i class="lnr lnr-user"></i>
            </div>            
            <h3>Memorial</h3>
            <p>User can upload memorial profile of parents and relatives.</p>
          </div>
        </div>
        <!-- Feature single ends -->
        
        <!-- Feature single starts -->
        <div class="col-md-3 col-sm-6">
          <div class="feature-single wow fadeInUp" data-wow-delay="0.4s">
            <div class="icon-feature-single">
              <i class="lnr lnr-diamond"></i>
            </div>            
            <h3>Helpful Post</h3>
            <p>User can daily recieve helpful news, carrer realted posts, events posts.</p>
          </div>
        </div>
        <!-- Feature single ends -->

        <!-- Feature single starts -->
        <div class="col-md-3 col-sm-6">
          <div class="feature-single wow fadeInUp" data-wow-delay="0.3s">
            <div class="icon-feature-single">
              <i class="lnr lnr-bullhorn"></i>
            </div>            
            <h3>Blood Notification</h3>
            <p>User can recieve blood notification which helps to others.</p>
          </div>
        </div>
        <!-- Feature single ends -->

      </div>
    </div>
  </section>
  <!-- Features Section Ends -->
  
  <!-- How it work section starts -->
  <section class="how-it-work" id="about">
    <div class="container-fluid">
      <div class="row no-gutters">
        <div class="col-md-6">
          <div class="how-work-image">
            <picture>
              <source srcset="<?=WEB_ASSETS?>images/feature-1.jpg" media="(max-width: 992px)">
              <source srcset="<?=WEB_ASSETS?>images/feature-1.jpg" media="(max-width: 1200px)">
              <source srcset="<?=WEB_ASSETS?>images/feature-1.jpg" media="(max-width: 1366px)">
              <img src="<?=WEB_ASSETS?>images/feature-1.jpg">
            </picture>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="how-work-content" style="padding: 0px 5% 2px!important;">
            <h2>Samaj Setu App About</h2>
            <p><b>"સમાજ સેતુ" થી સમાજ વિકાસ ની ભવ્ય વિશ્વસનીય પરંપરા</b></p>
            <p>એક દસકા અગાઉ વર્ષ 2008 માં જાકાશણા ખાતે યોજાયેલ આપણાં 72 સમાજ ની જનરલ મિટિંગમાં પેન્ફ્લેટ વિતરણ અને ત્યાં આપેલ જાહેર વક્તવ્ય થી SMS GupShup દ્વારા મળતી ફ્રી SMS</p>
            <p>ની સેવાથી આપણાં 72 સમાજ માં એ સમયે
            સમાજ વિકાસ,
            નોકરી - બીઝનેસ,
            રોજ એક લગ્ન સંબંધ નો બાયોડેટા,
            બેશણા  ની માહિતી
            અને બીજા અનેક ઉપયોગી
            સાદા મેસેજ થી શરુ થયેલી માહિતી ના માધ્યમ થી સમાજ વિકાસ ની ભવ્ય પરંપરા...</p>
            <p>પછી આપ સૌ ના સહકાર થી 20,ફેબ્રુઆરી 2018 માં શરુ થયેલ
            "સમાજ સેતુ" ના વોટસએપ ગ્રુપ દ્વારા સમાજ વિકાસ ની ડિજિટલ યાત્રા હવે...</p>
            <p><b>"સમાજ સેતુ" મોબાઈલ એપ્લિકેશન સુધી પહોંચી છે.</b></p>
            <p><b>SMS GupShup</b> અને <b>"સમાજ સેતુ"</b> વોટ્સએપ ગ્રૂપ ની સેવા ને સૌ એ ખૂબ વખાણી.
            જોબ અને લગ્ન સંબંધ ની માહિતી થી કેટલાય પરિવાર માં ખુશીઓ છવાઈ છે...એનો આનંદ જ અમને નવા કદમ ઉઠાવવા નું બળ આપે છે. હવે "સમાજ સેતુ" મોબાઈલ એપ્લિકેશન પણ દૂર દૂર અને વિદેશ વસતાં આપણાં પરિવારો વચ્ચે "સેતુ" બનશે એવો અમને દ્રઢ વિશ્વાસ છે.</p>
            <p><b>"સમાજ સેતુ"</b> મોબાઈલ એપ્લિકેશન અનેક નવીન અને વધુ સર્વાંગી ઉચ્ચ સેવા પ્રદાન કરશે.
              જાહેરાત ની આવક થી વિદ્યાર્થી કારકિર્દી માર્ગદર્શન સેમીનાર,વિદેશ જવા ઇચ્છુક વિદ્યાર્થી માર્ગદર્શન સેમિનાર અને સમૂહલગ્ન માં દાન આપવામાં આવશે.
              ફક્ત ઓનલાઇન પેટીએમ દ્વારા જ આર્થિક વ્યવહાર થશે એને સૌ રોજ જોઈ શકશે જ એવી ખાસ એપ્લિકેશન માં વ્યવસ્થા રાખી છે.
              આર્થિક પારદર્શકતા નું ખાસ ધ્યાન રાખવામાં આવ્યું છે."સમાજ સેતુ" ચોક્કસ "સંપર્ક સેતુ" પણ બનશે જ.
            સમાજ માં આત્મીયતા,ભાઈચારો અને સહકાર ની ઉમદા ભાવના સાથે "સૌ નો સાથ સૌ નો વિકાસ" થશે.</p>
            <p>આપણે સામાજિક,આર્થિક અને રાજકીય વિકાસ ના શિખરો સર કરીશું.
            આવો આપણે સૌ હકારાત્મક અભિગમ થી સાથે મળી વિકાસ ની ઊંચી ઉડાન ભરીએ.</p>            
          </div>
        </div>
      </div>
           
    </div>
  </section>
  <!-- How it work section Ends -->
  
  <!-- App Screenshot Section starts -->
  <section class="screenshot">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>Apps <span>Screenshots</span></h2>
          </div>
        </div>
      </div>
      
      <div class="row">
        <!-- App Screenshot carousel starts -->
        <div class="owl-carousel owl-theme screenshot-slider zoom-screenshot" id="screenshot-slider-carousel">
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-1.png">
                <img src="<?=WEB_ASSETS?>images/slider-1.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-2.png">
                <img src="<?=WEB_ASSETS?>images/slider-2.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-3.png">
                <img src="<?=WEB_ASSETS?>images/slider-3.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-4.png">
                <img src="<?=WEB_ASSETS?>images/slider-4.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-5.png">
                <img src="<?=WEB_ASSETS?>images/slider-5.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-1.png">
                <img src="<?=WEB_ASSETS?>images/slider-1.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-2.png">
                <img src="<?=WEB_ASSETS?>images/slider-2.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-3.png">
                <img src="<?=WEB_ASSETS?>images/slider-3.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-4.png">
                <img src="<?=WEB_ASSETS?>images/slider-4.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-5.png">
                <img src="<?=WEB_ASSETS?>images/slider-5.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-1.png">
                <img src="<?=WEB_ASSETS?>images/slider-1.png" alt="" />
              </a>
            </div>
          </div>
          
          <div class="item col-md-12">
            <div class="screenshot-single">
              <a href="<?=WEB_ASSETS?>images/slider-2.png">
                <img src="<?=WEB_ASSETS?>images/slider-2.png" alt="" />
              </a>
            </div>
          </div>
          
        </div>
        <!-- App Screenshot carousel ends -->
        
      </div>
    </div>
  </section>
  <!-- App Screenshot Section Ends -->
  
  <!-- Contact us Section starts -->
 <!--  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>Samaj Setu App <span>Feedback / Suggestion</span></h2>
          </div>
        </div>
      </div>
      
      
      <div class="contact-form">
        <form id="contactForm" action="#" method="post" data-toggle="validator" class="scroll-reveal">
          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required="">
              <div class="help-block with-errors"></div>
            </div>
            
            <div class="form-group col-md-6">
              <input type="email" name="email" id="email" class="form-control" placeholder="Your Email Address" data-error="Email address is invalid" required="">
              <div class="help-block with-errors"></div>
            </div>
            
            <div class="form-group col-md-12">
              <textarea rows="8" name="message" id="message" class="form-control" placeholder="Your Message" required=""></textarea>
              <div class="help-block with-errors"></div>
            </div>
            
            <div class="col-md-12 text-center">
              <div id="msgSubmit" class="h3 text-center hidden"></div>
              <button type="submit" name="submit" class="btn-custom btn-fill btn-contact" title="Submit Your Message!"><i class="fa fa-send"></i> Send</button>
            </div>
          </div>
        </form>
      </div>
      
      
   </div>
  </section> -->
  <!-- Contact us Section Ends -->
  
  <!-- Footer section starts -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="footer-social">
            <ul>
              <li><a target="_blank" href="https://www.facebook.com/Samaj-Setu-150906258926669/"><i class="fa fa-facebook"></i></a></li>
              <li><a target="_blank" href="https://www.youtube.com/user/ashvinbamrolia/featured"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
          
          <div class="footer-menu">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#feature">Features</a></li>
              <li><a href="#about">About</a></li>
              <!-- <li><a href="#contact">Contact</a></li> -->
            </ul>
          </div>
          
          <div class="copyright-text">
            <p>&copy; <?=date('Y');?> Developed By <a href="http://www.techwebsoft.com/" target="_blank">Techwebsoft</a></p>
          </div>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer section Ends -->
  
    <!-- Jquery Library File -->
  <script src="<?=WEB_ASSETS?>js/jquery-1.12.4.min.js"></script>
  <!-- Typed js file -->
  <script src="<?=WEB_ASSETS?>js/typed.js"></script>
  <!-- Parallax -->
  <script src="<?=WEB_ASSETS?>js/jquery.parallax-1.1.3.js"></script>
  <!-- SmoothScroll -->
  <!-- <script src="<?=WEB_ASSETS?>js/SmoothScroll.js"></script> -->
    <!-- Bootstrap js file -->
  <script src="<?=WEB_ASSETS?>js/bootstrap.min.js"></script>
  <!-- Bootstrap form validator -->
  <!-- <script src="<?=WEB_ASSETS?>js/validator.min.js"></script> -->
  <!-- Counterup js file -->
  <script src="<?=WEB_ASSETS?>js/waypoints.min.js"></script>
  <script src="<?=WEB_ASSETS?>js/jquery.counterup.min.js"></script>
  <!-- Owl Carousel js file -->
  <script src="<?=WEB_ASSETS?>js/owl.carousel.js"></script>
  <!-- Slick Nav js file -->
  <script src="<?=WEB_ASSETS?>js/jquery.slicknav.js"></script>
    <!-- Wow js file -->
  <script src="<?=WEB_ASSETS?>js/wow.js"></script>
  <!-- Magnific Popup core JS file -->
  <script src="<?=WEB_ASSETS?>js/jquery.magnific-popup.min.js"></script>
    <!-- Main Custom js file -->
  <script src="<?=WEB_ASSETS?>js/function.js"></script>
  <script src="<?=WEB_ASSETS?>js/demo.js"></script>
</body>

</html>