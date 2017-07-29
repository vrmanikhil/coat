var interval = setInterval( function(){
      $.ajax({url: "http://localhost.coat/homeFunctions/updateCurrentTimestamp", success: function(result){
        console.log(result);
      }});
  },10000);