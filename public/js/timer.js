function timer(){
  
    var timerDiv = document.querySelectorAll('.card-timer');
   
    timerDiv.forEach(function(element) {

        var hours = parseInt(element.querySelector('.hour').innerHTML);
        var minutes = parseInt(element.querySelector('.minute').innerHTML);
        var seconds = parseInt(element.querySelector('.second').innerHTML);
        var duration = hours * 60 * 60 + minutes * 60 + seconds;
        var timer = duration,hours, minutes, seconds;
        setInterval(function(){
            hours = parseInt((timer /3600)%24, 10)
            minutes = parseInt((timer / 60)%60, 10)
            seconds = parseInt(timer % 60, 10);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            element.querySelector('.hour').innerHTML = hours;
            element.querySelector('.minute').innerHTML = minutes;
            element.querySelector('.second').innerHTML = seconds;


            --timer;
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