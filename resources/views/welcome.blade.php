@extends('layouts.app')

@section('content')

<div class="home-category-section columns">
    <div class="first large column"><img src="{{asset('assets/laptop_banner.jpg')}}"></div>
    <div class="second-top small column"><img src="{{asset('assets/mobile_banner.jpg')}}"></div>
    <div class="third-bottom small column"><img src="{{asset('assets/car_banner.jpg')}}"></div>
</div>

<div class="featured-section">
    <h1 class="subtitle">Featured</h1>
    <hr>
    <div class="columns">
        @foreach($featuredProducts as $product)
        <div class="product-column column is-one-third">
            <a class="product-link" href="/product/{{$product->id}}">
                <div class="product-card card">
                    <div class="card-image">
                        <img src="{{$product->image_url}}">
                    </div>
                    <div class="card-timer">
                        <span class="hour">24</span> :
                        <span class="minute">01</span> :
                        <span class="second">20</span>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <span class="name">{{$product->name}}</span>
                            <br>
                            <span class="price">Rs. {{$product->final_price}}</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>

<div class="new-section">
        <h1 class="subtitle">New Products</h1>
        <hr>
        <div class="columns">
            @foreach($newProducts as $product)
            <div class="product-column column is-one-third">
                <a class="product-link" href="/product/{{$product->id}}">
                    <div class="product-card card">
                        <div class="card-image">
                            <img src="{{$product->image_url}}">
                        </div>
                        <div class="card-timer">
                            
                            <span class="hour">24</span> :
                            <span class="minute">01</span> :
                            <span class="second">20</span>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <span class="name">{{$product->name}}</span>
                                <br>
                                <span class="price">Rs. {{$product->final_price}}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
    
        </div>
</div>

<script>
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
// window.onbeforeunload = saveTimeRemaning;
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

    console.log("DATA AT JS");
    console.log(cleanedData);

    var url = 'http://127.0.0.1:8000/product/update-time';


    $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: '/product/update-time', // This is the url we gave in the route
        data: {data:JSON.stringify(cleanedData)}, // a JSON object to send back
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){ // What to do if we succeed
            console.log(response); 
        }, 
        
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
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
</script>

@endsection