$(document).ready(function(){
$('input[type="radio"]').click(function(){
    var radio_value=$(this).val();
       $.ajax({
           url:"admindata.php",
           method:"post",
           data:{admindata:radio_value},
           success:function(result){
           $('#panel_body').html(result);
       }      
   });
});

$('input[type="radio"]').click(function(){
    var radio_value = $(this).val();
      $.ajax({
          url:"operatordata.php",
          method:"post",
          data:{operatordata:radio_value},
          success:function(result){
           $('#operator_body').html(result);   
      }
});
});

setTimeout(function(){$('#signinerror').slideUp("slow")},3000);
setTimeout(function(){$('#signuperror').slideUp("slow")},3000);

    $("#rad_1").click(function(){
        $("#panel_body").load('apitest.php');
    });
                 
  $('.edit').click(function(event){
      event.preventDefault();
      var tid = $(this).attr('id');
      $.ajax({
          
      });
    });              
});    