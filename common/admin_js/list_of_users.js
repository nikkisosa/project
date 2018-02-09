
  $(document).ready(function() {
    var jsonString;
    var baseUrl = $('#baseUrl').val();
    $('.btnDelete').click(function() {
      jsonString = this.id;
    });
    $('#deleteModalYes').click(function() {
        var json = JSON.parse(jsonString);
        var link = json.link;
        var id = json.id;
        $.post(link,{id:id},function(data) {
            location.reload();
        });
    });
    $('.btnShowInfo').click(function() {
      //var jsonString = $('#userInfo'+this.id).val();
      var jsonString = this.id;
      //console.log(jsonString);
      var json = JSON.parse(jsonString);

      if(json.type == "Administrator") {
        if(json.img != '') {
          $('#modalPicture').attr('src',baseUrl+json.img);
        }
        else {
          $('#modalPicture').attr('src',baseUrl+'profile/default.png');
        }
        $('#fullName').html(json.fname + " " + json.lname);
        $('#userType').html("Administrator");
        var infos = '<li class="list-group-item"><b>Mobile No. </b><p id = "mobileNo" class = "pull-right">'+json.mobile_no+'</p></li>';
        infos += '<li class="list-group-item"><b>Email</b><p id = "email" class = "pull-right">'+json.email+'</p></li>';
        $('#modalInfos').html(infos);
      }
      else if(json.type == "Student") {
        if(json.img != '') {
          $('#modalPicture').attr('src',baseUrl+json.img);
        }
        else {
          $('#modalPicture').attr('src',baseUrl+'profile/default.png');
        }
        $('#fullName').html(json.fname + " " + json.lname);
        $('#userType').html("Student");
        var infos = '<li class="list-group-item"><b>Mobile No. </b><p id = "mobileNo" class = "pull-right">'+json.mobile_no+'</p></li>';
        infos += '<li class="list-group-item"><b>Email</b><p id = "email" class = "pull-right">'+json.email+'</p></li>';
        $('#modalInfos').html(infos);
      }
      else if(json.type == "Parent") {
        if(json.img != '') {
          $('#modalPicture').attr('src',baseUrl+json.img);
        }
        else {
          $('#modalPicture').attr('src',baseUrl+'profile/default.png');
        }
        $('#fullName').html(json.fname + " " + json.lname);
        $('#userType').html("Parent");
        var infos = '<li class="list-group-item"><b>Mobile No. </b><p id = "mobileNo" class = "pull-right">'+json.mobile_no+'</p></li>';
        infos += '<li class="list-group-item"><b>Email</b><p id = "email" class = "pull-right">'+json.email+'</p></li>';
        $('#modalInfos').html(infos);
      }
      else if(json.type == "Teacher") {
        if(json.img != '') {
          $('#modalPicture').attr('src',baseUrl+json.img);
        }
        else {
          $('#modalPicture').attr('src',baseUrl+'profile/default.png');
        }
        $('#fullName').html(json.fname + " " + json.lname);
        $('#userType').html("Teacher");
        var infos = '<li class="list-group-item"><b>Mobile No. </b><p id = "mobileNo" class = "pull-right">'+json.mobile_no+'</p></li>';
        infos += '<li class="list-group-item"><b>Email</b><p id = "email" class = "pull-right">'+json.email+'</p></li>';
        $('#modalInfos').html(infos);
      }
      
    });
  });
    