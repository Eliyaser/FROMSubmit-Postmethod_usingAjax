$("#form").click(function(){
  alert("The paragraph was clicked.")

  var favorite = [];
  $.each($("input[name='color']:checked"), function(){            
     favorite.push($(this).val());
    });
  var obj = {
      name: $('#uname1').val(),
      email: $('#email').val(),
      gender: $('#radio').val(),
      Education: $('#edu').val(),
      fax_color: favorite,
      address: $('#address').val()

  }
  // console.log(obj);
  $.ajax({
      url: "register.php",
      type: "POST",
      data: {'data':obj},
      success: function(result) {
          console.log(result)
      }
  });
});