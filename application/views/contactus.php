{content_header}

<section class="main-content">
    <div class="row">
<div class="medium-5 small-12 columns">
      <div class="row">
        <div class="large-12 list-item">
          <div class="row">            
            <div class="medium-8 small-8 columns">
              <div id="ourmap"></div>
            </div>
          </div>
          <div class="row">
          	<div class="medium-4 small-4 columns">
              
              <p>
                <strong>Email</strong><br/>
                admin@underdogidols.com
              </p>

              <p>
                <strong>Phone</strong><br/>
                877 963 7283
              </p>

              <p>
                <strong>Address</strong><br/>
                Gaithersburg<br/>
                Gaithersburg, Maryland 20878<br/>
                USA<br/>
              </p>

            </div>
          </div>          
    	</div>    
    	</div>
    </div>
      <div class="medium-7 small-12 columns">        
          <div class="row">
            <div class="medium-12 small-12 columns">
              <br/>
              <p>Fill up the form below and send us your thoughts about the website. Your feedaback is highly anticipated and will help us to improve our service provided by the website.</p>
              <div class="contact-us_form-wrapper">
                <form class="contact-us_form">
                  <div class="row">
                    <div class="large-12 columns">
                      <label>Full Name
                        <input type="text" placeholder="what's your name?" />
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="large-12 columns">
                      <label>Email Address
                        <input type="text" placeholder="you@email.com" />
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="large-12 columns">
                      <label>Message
                        <textarea placeholder="give us your thoughts"></textarea>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="large-12 columns">
                      <label>Code
                        <div class="captcha">
                          <input  class="captcha-key" type="hidden" />
                          <img class="captcha-code" src="" />
                          <i class="fa fa fa-refresh fa-2x captcha-refresh"></i>
                          <input  class="captcha-input" type="text" placeholder="are you human?" />
                        </div>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="large-12 columns">
                       <a href="#" class="button [tiny small large] submit-button">Submit</a>
                    </div>
                  </div>              
                </form>
              </div>

            </div>
          <div class="row">

        </div>
      </div>
      </div>   
    </div>
  </section>

  <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script>
    function initialize() {
        var map_canvas = document.getElementById('ourmap');
        var map_options = {
          center: new google.maps.LatLng(39.11035,-77.251107),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
  </script>