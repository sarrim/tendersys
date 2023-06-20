<header class="container-fluid">
<div class="header1 container">
    <div class="logoDiv">
    <div class="logo">
        <a href="{{ url('/') }}">
        <img src="{{ asset('assets/website/image/Click2buy-03.png') }}" alt="" style="height: 70px;">
        </a>
    </div>
            @if(!Auth::user())
            <div>
                <a href="{{ url('login') }}">
                <img class="login_icon" src="{{ asset('assets/website/image/login_icon.png') }}" width="30">
                </a>
            </div>
            @else
            <div>
                <a href="{{ url('my-orders') }}" title="My Orders">
                    <i class="fa fa-shopping-bag" style="cursor: pointer; color: black;"></i>
                </a>
            </div>
            <div>
                <a href="{{ url('logout') }}" title="Logout">
                    <i class="fa fa-sign-out" style="cursor: pointer; color: black;"></i>
                </a>
            </div>
            @endif
            <div>
                @if(!Auth::user())
                    <a href="{{ url('login') }}">
                @else
                    <a href="{{ url('view-cart') }}">
                @endif
                <img class="login_icon" src="{{ asset('assets/website/image/cart.png') }}" width="30">
                </a>
            </div>
    <!--<div>-->
    <!--    <i class="fa fa-share" onclick="myFunction()" style="padding-right: 10px;cursor: pointer;"></i>-->
    <!--</div>-->
    </div>
    <div class="mobile100">
    <form class="search-form" action="{{ url('/') }}" method="get">
        <input type="search" name="keyword" id="searchbox" placeholder="search here">
        <!--<label for="searchbox" class="fas fa-search"></label>-->
        
    </form>

    </div>
    <div class="icons">
        <a href="{{ url('vendor/login') }}">
        <button class="btn btn-primary advBtn"> Post an ad</button>
        </a>
    </div>
    @if(Auth::user())
    <div class="icons">
        <a href="{{ url('profile') }}" style="font-size: 21px;text-decoration: auto;">
            <i class="fa fa-plus" style="cursor: pointer; color: black; font-size: 25px;"></i> &nbsp; &nbsp; {{ Auth::user()->available_amount }}
        </a>
    </div>
    @endif

</div>
<!--<div class="header2">-->
<!--    <div class="navbar">-->
<!--        <a href="#">Home </a>-->
<!--        <a href="#">Featured </a>-->
<!--        <a href="#">Arrival </a>-->
<!--        <a href="#">Reviews </a>-->
<!--        <a href="#">Contact </a>-->
<!--    </div>-->
<!--</div>-->
</header>
<div class="select-dropdown container">
            <select name="category" id="category" onchange="redirect()" data-placeholder="Choose&hellip;">
                <option value="Everything">Everything </option>
                @foreach ($categories as $category )
                    <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                @endforeach
            </select>
        </div>
<div class="headerImg"></div>

