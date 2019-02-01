<aside class="menu">
        <p class="menu-label">
          Products
        </p>
        <ul class="menu-list">
          <li><a class="added-products" href="/my-account">Added Products</a></li>
          <li><a class="add-product" href="/add-product">Add a Product</a></li>
        </ul>
        <p class="menu-label">
          Bids
        </p>
        <ul class="menu-list">
          <li><a class="view-bids" href="/my-account/view-bids">View all made bids</a></li>
        </ul>
        <p class="menu-label">
          Account
        </p>
        <ul class="menu-list">
          <li><a class="change-info" href="/change-account-information">Change Information</a></li>
          <li>                
            <a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form></li>
        </ul>
</aside>
<script>
//Handle isactive status
var addedProducts = document.querySelector(".added-products");
var addProducts = document.querySelector(".add-product");
var viewBids = document.querySelector(".view-bids");
var changeInformation = document.querySelector(".change-info");

var path = window.location.pathname;

if(path=="/change-account-information"){
    setActiveStatus(changeInformation);
}else if(path=="/add-product"){
    setActiveStatus(addProducts);
}else if(path=="/my-account"){
    setActiveStatus(addedProducts);
}else if(path=="/my-account/view-bids"){
    setActiveStatus(viewBids);
}

function setActiveStatus(element){
    element.classList.add("is-active");
}


</script>