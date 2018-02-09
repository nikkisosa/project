

 $('#name_pic_profile').change(function(e){
            var fileName1 = e.target.files[0].name;
            document.forms.Form_register.dispName.value = fileName1;           
            });
    function readURL_reg(input) {
   if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile_reg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);


            }
        }
        function showhide(id) {
        var e = document.getElementById(id);
        e.style.display = (e.style.display == 'block') ? 'none' : 'block';
     }
