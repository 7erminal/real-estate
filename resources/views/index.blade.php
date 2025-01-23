<body>
@include('header')
<div id="navbar-full">
    @include('navbar')
    <div class='blurred-container'>
        <div class="motto">
            <div>Urban</div>
            <div class="border no-right-border">Le</div><div class="border">af</div>
            <div>Properties</div>
        </div>
        <div class="img-src" style="background-image: url('/images/GettyImages-1151832961.jpg')"></div>
        <div class='img-src blur' style="background-image: url('/images/GettyImages-1151832961.jpg')"></div>
    </div>
</div>
<div class="main">
    @include('aboutSection')
    @include('recentListings')
    @include('videoSummary')
    @include('achievements')
    @include('footer')
</div>
</body>