{content_header}

<section class="main-content">
  <div class="row">
    <div class="medium-12 large-12 columns">
      <div class="form-wrapper">
        {contestant}
      <div class="row">
        <div class="large-6 columns">
          <label><strong>Profile Image</strong>
            <div class="profile-pic" style="margin: auto; margin-bottom: 20px;">
                <img src="resources/images/default-profile-pic.jpg" id="profile-pic-image"/>
                <form enctype="multipart/form-data" id="upload_photo" action="profile/upload" method="post">
                    <div class="change-trigger">
                    	<input type="file" class="file-input" id="input-file" name="input-file"/>
                    	<strong>Change</strong>
                    </div>
                </form>
            </div>
          </label>
          </div>
          
        <form method="post" action="profile/save" class="profiledit-form">
        <div class="row">
            <div class="large-6 columns">
              <label><strong>About yourself *</strong>
                <textarea name="about" placeholder="" maxlength="255" style="height: 250px; resize:none;">{about}</textarea>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-6 columns">
              <label><strong>Full Name *</strong>
                <input type="text" name="full_name" placeholder="" value="{full_name}"/>
              </label>
              </div>
            <div class="large-6 columns">
              <label><strong>Email Address *</strong>
                <input type="text" name="email" placeholder="" value="{email}"/>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-6 columns">
              <label><strong>Password</strong>
                <input type="password" name="password" placeholder="" />
              </label>
            </div>
            <div class="large-6 columns">
              <label><strong>Re-type Password</strong>
                <input type="password" name="repassword" placeholder="" />
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-6 columns">
              <label><strong>Gender *</strong>
                <select name="gender">
                  <option value="" selected></option>
                  <option value="male" {contestant_male}>Male</option>
                  <option value="female" {contestant_female}>Female</option>
                </select>
              </label>
            </div>
            <div class="large-6 columns">
              <label><strong>Birthdate *</strong>
                <input type="text" name="birthdate" value="{birthdate}" id="dp1">
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-4 columns">
               <input type="submit" name="submit" value="Submit" class="button [tiny small large] submit-button" />
               <a class="button [tiny small large] submit-button" href="profile/">Cancel</a>
            </div>
            <div class="large-8 columns">
              <div class="form-results panel callout radius">
                ...
              </div>
            </div>
          </div> 
        </form>
        {/contestant}  
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function(){
    $('#dp1').fdatepicker({
      format: 'mm-dd-yyyy'
    });
  });
</script>
