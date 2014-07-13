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
  {video}
  <div class="row">
    <div class="medium-12 large-12 columns">
      <div class="my-public-video">
        <h1>{video_title}</h1>          
        <object class="video-object" width="100%" height="500" data="{embeded_link}" type="application/x-shockwave-flash">
          <param name="src" value="{embeded_link}" />
          <param name="allowFullScreen" value="true" />
        </object>
        <br/>
        <div class="full-width">
          {vote_buton}
        </div>
      </div>
    </div>
  </div>
  {/video}
</section>
