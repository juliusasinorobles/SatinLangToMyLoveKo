{content_header}

<section class="main-content">
  <div class="row">
    <div class="medium-12 large-12 columns">
      <div class="profile-nav">
      	<ul>
      	</ul>
      </div>
    </div>
  </div>
  <div class="row" >
    <div class="medium-12 large-12 columns">
      <div class="upload-video-form">
      	<h1 >Submit Video</h1>
        <div class="form-wrapper">
          <form class="upload-video-form" method="post" action="profile/">
            <div class="row">
              <div class="small-10 columns">
                  <input type="text" name="link" placeholder="www.youtube.com/watch?v=moSFlvxnbgk" class="video-field">
              </div>
              <div class="small-2 columns">
                <input type="submit" name="submit" value="Submit" class="button [tiny small large] submit-button button-field" />
                <!-- <a href="#" class="button ">Submit</a> -->
              </div>
            </div> 
            <div class="row">
              <div class="large-12 columns">
                <div class="form-results panel callout radius">
                  ...
                </div>
              </div>
            </div> 
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="medium-12 large-12 columns">
      <div class="my-video-list">
        <h1>My Videos</h1>
        <div class="form-wrapper">
          {videos}
        </div>
      </div>
    </div>
  </div>
</section>
