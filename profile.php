<?php include 'includes/header.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL ?>style/profile.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<section class="home">
  <div class="text">Profile</div>
  <div class="profile-container">
    <div class="container-1">
      <div class="profile-photo-container">
        <img src="<?php echo BASE_URL ?>uploads/<?php echo $userData['profile_pic'] ?>" class="profile-photo"
          id="profilePreview">
        <div class="upload-container">
          <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="profileImage" class="form-label">Select Profile</label>
              <input class="form-control" type="file" id="profileImage" accept="image/*"
                onchange="previewProfileImage('profileImage')">
            </div>
          </form>
        </div>
      </div>
      <div class="gender">
        <h5>Gender:</h5>
        <label>
          <input type="radio" name="gender" value="male" class="gender-radio-male"> Male
        </label>
        <label>
          <input type="radio" name="gender" value="female" class="gender-radio-female"> Female
        </label>
      </div>
    </div>
    <div class="container-2">
      <div class="row g-3">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $userData['name'] ?>">
        </div>
      </div>
      <div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="address" placeholder="Address"
            value="<?php echo $userData['address'] ?>">
        </div>
        <div class="container-3" style="display: block; height: 70%;">
          <div class="mb-3">
            <label for="hobbies" class="form-label">Hobbies:</label>
            <select class="form-control" id="hobbies" name="hobbies[]" multiple="multiple">
              <option value="sleeping" <?php echo (isset($userData['hobbies']['sleeping']) ? 'selected' : ''); ?>>
                Sleeping</option>
              <option value="eating" <?php echo (isset($userData['hobbies']['eating']) ? 'selected' : ''); ?>>Eating
              </option>
            </select>
          </div>
          <div class="mb-3">
            <label for="aboutme" class="form-label">About Me:</label>
            <!-- <select class="form-control" id="aboutme" name="aboutme[]" multiple="multiple">
              <option value="I am good person" <?php  // echo (isset($userData['about_me']['I am good person']) ? 'selected' : ''); ?>>I am a good person</option>
              <option value="I love anime" <?php // echo (isset($userData['about_me']['I love anime']) ? 'selected' : ''); ?>>I love anime</option>
            </select> -->
            <textarea name="aboutme" id="aboutme" class="form-control" cols="30"
              rows="5"><?php echo $userData['about_me'] ?></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="container-4">
      <div class="mb-3">
        <label for="galleryImages" class="form-label">Gallery - Select Multiple</label>
        <input class="form-control" type="file" id="galleryImages" onchange="previewProfileImage('galleryImages')"
          multiple accept="image/png">
      </div>
      <div class="photos" style="display:flex;">
        <div class="card m-2" style="width: 150px; height: 150px">
          <?php if ($userData['gallery_pic_1'] != "") { ?>
            <img src="<?php echo BASE_URL ?>uploads/<?php echo $userData['gallery_pic_1'] ?>" class="card-img-top"
              alt="..." id="profile-pic-1">
          <?php } else { ?>
            <img src="<?php echo BASE_URL ?>src/placeholder.png" class="card-img-top" alt="..." id="profile-pic-1">
          <?php } ?>
        </div>
        <div class="card m-2" style="width: 150px; height: 150px">
          <?php if ($userData['gallery_pic_2'] != "") { ?>
            <img src="<?php echo BASE_URL ?>uploads/<?php echo $userData['gallery_pic_2'] ?>" class="card-img-top"
              alt="..." id="profile-pic-2">
          <?php } else { ?>
            <img src="<?php echo BASE_URL ?>src/placeholder.png" class="card-img-top" alt="..." id="profile-pic-1">
          <?php } ?>
        </div>
        <div>

        </div>
      </div>
      <div class="submit-btn">
        <button class="btn" id="submit-btn-gallery-images" disabled="true">Submit</button>
      </div>
    </div>
  </div>
  <div class="submit-btn">
    <button class="btn" id="submit-btn">Submit</button>
  </div>

</section>




<script>
  var input = document.getElementById("profileImage");
  var galleryImages = document.getElementById("galleryImages");
  var preview = document.getElementById("profilePreview");
  var profile_pic_1 = document.getElementById("profile-pic-1");
  var profile_pic_2 = document.getElementById("profile-pic-2");
  var gallery_button = document.getElementById("submit-btn-gallery-images");
  var profilePic;
  var gallery_pic_1;
  var gallery_pic_2;
  var index = 1;
  var formData = new FormData();
  var ProfileFormData = new FormData();
  function previewProfileImage(type) {

    if (type == "profileImage") {
      if (input.files && input.files[0]) {
        ProfileFormData.append("profilePic", input.files[0])
        var reader = new FileReader();
        reader.onload = function (e) {
          preview.src = e.target.result;
          profilePic = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    if (type == "galleryImages") {
      if (galleryImages.files && galleryImages.files[0] && galleryImages.files[1] && galleryImages.files.length === 2) {
        var reader = new FileReader();
        reader.onload = function (e) {
          profile_pic_1.src = e.target.result;
          gallery_pic_1 = e.target.result;
        };
        reader.readAsDataURL(galleryImages.files[0]);
        var reader = new FileReader();
        reader.onload = function (e) {
          profile_pic_2.src = e.target.result;
          gallery_pic_2 = e.target.result;
        };
        reader.readAsDataURL(galleryImages.files[1]);
        gallery_button.removeAttribute("disabled");
      } else {
        alert("Can only upload 2 images");
        console.log("Can only upload 2 images")
      }
      formData.append('gallery_pic_1', galleryImages.files[0]);
      formData.append('gallery_pic_2', galleryImages.files[1]);
    }

  }

  $(document).ready(function () {
    $('#hobbies').select2();
    // $('#aboutme').select2();

    $("#submit-btn").on('click', function () {
      let fgender, mgender;
      let name = $("#name").val();
      let address = $("#address").val();
      let hobbies = ($('#hobbies').val());
      let aboutme = ($('#aboutme').val());
      let hobbiesObject = {};
      for (let i = 0; i < hobbies.length; i++) {
        hobbiesObject[hobbies[i]] = hobbies[i];
      }
      // let aboutmeObject = {};
      // for (let i = 0; i < aboutme.length; i++) {
      //   aboutmeObject[aboutme[i]] = aboutme[i];
      // }
      if ($(".gender-radio-female").prop("checked")) {
        fgender = $(".gender-radio-female").val();
      }
      if ($(".gender-radio-male").prop("checked")) {
        mgender = $(".gender-radio-male").val();
      }

      let data = {
        name: name,
        address: address,
        hobbies: hobbiesObject,
        aboutme: aboutme,
        fgender: fgender,
        mgender: mgender,
        profilePic
      };

      ProfileFormData.append("name", name);
      ProfileFormData.append("address", address);
      ProfileFormData.append("hobbies", JSON.stringify(hobbiesObject));
      ProfileFormData.append("aboutme", aboutme);
      ProfileFormData.append("fgender", fgender);
      ProfileFormData.append("mgender", mgender);

      $.ajax({
        type: "POST",
        url: "<?php echo BASE_URL ?>save_profile_data.php",
        data: ProfileFormData,
        processData: false,
        contentType: false,
        success: function (response) {
          response = JSON.parse(response);
          if (response.status == 200) {
            alert("Data Updated Successfully");
          } else if (response.status == 400) {
            alert(response.message);
          }
        },
        error: function (jqXHR) {
          if (jqXHR.status > 200) {
            try {
              var errorResponse = JSON.parse(jqXHR.responseText);
              if (errorResponse.message) {
                alert(errorResponse.message);
              } else {
                alert("An error occurred, but no specific message was provided.");
              }
            } catch (e) {
              alert("Error parsing the error response.");
            }
          } else {
            alert("An unexpected error occurred. Please try again later.");
          }
        }
      });

    });

    $("#submit-btn-gallery-images").on('click', function () {
      $.ajax({
        type: "POST",
        url: "<?php echo BASE_URL ?>save_gallery_data.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          response = JSON.parse(response);
          if (response.status == 200) {
            alert("Data Updated Successfully");
          } else if (response.status == 400) {
            alert(response.message);
          }
        }
      });
    });

  });
</script>

<?php include 'includes/footer.php'; ?>