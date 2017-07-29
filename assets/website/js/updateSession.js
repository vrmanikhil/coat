var interval = setInterval( function(){
      $.ajax({url: "http://locahost.coat/homeFunctions/updateCurrentTimestamp", success: function(result){
        console.log(result);
      }});
  },10000);