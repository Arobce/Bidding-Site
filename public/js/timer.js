function timer(){
  
    var timer = document.querySelectorAll('.card-timer');
   
    timer.forEach(function(element) {
      
        setInterval(function(){
            var secondElement = element.querySelector('.second');
            
            var minuteElement = element.querySelector('.minute');

            var hourElement = element.querySelector('.hour');
        

            secondElement.innerHTML--;
            
            if(secondElement.innerHTML<10){
            
                secondElement.innerHTML = 0+secondElement.innerHTML;
            

                if(secondElement.innerHTML=='0-1'){

                    secondElement.innerHTML = 60;

                    secondElement.innerHTML--;

                    minuteElement.innerHTML--;

                    if(minuteElement.innerHTML<10){
                        
                        minuteElement.innerHTML = 0+minuteElement.innerHTML;

                        minuteElement.innerHTML--;
                        
                        if(minuteElement.innerHTML=='-1'){
                
                            minuteElement.innerHTML = 60;
                            
                            minuteElement.innerHTML--;

                            hourElement.innerHTML--;

                        }
                    }
                }
            

            }
        },1000);
        
    });
};
timer();

function saveTimeRemaning(){
    
    var productColumns = document.querySelectorAll('.product-column');
    
    var data = [];

    productColumns.forEach(function(element){
        
        var second = element.querySelector('.second').innerHTML;
            
        var minute = element.querySelector('.minute').innerHTML;

        var hour = element.querySelector('.hour').innerHTML;

        var time = hour+':'+minute+':'+second;

        var url = element.querySelector('.product-link').getAttribute("href");

        var id = url.substring(url.lastIndexOf('/')+1,url.length);

        data.push({
            "id":id,
            "time":time
        });

        

    }); 

    var cleanedData = arrUnique(data);


    var url = 'http://127.0.0.1:8000/product/update-time';


    $.ajax({
        method: 'POST', 
        url: '/product/update-time', 
        data: {data:JSON.stringify(cleanedData)}, 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){ 
            console.log(response); 
        }, 
        
        error: function(jqXHR, textStatus, errorThrown) { 
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });

}

    function arrUnique(arr) {
        var cleaned = [];
        arr.forEach(function(itm) {
            var unique = true;
            cleaned.forEach(function(itm2) {
                if (_.isEqual(itm, itm2)) unique = false;
            });
            if (unique)  cleaned.push(itm);
        });
        return cleaned;
    }


window.onbeforeunload = saveTimeRemaning;