<div class="col-md-4 col-sm-6">
    <div class="card-container">
        <div class="card">
            <div class="front">
                <div class="cover">
                    <img src="{{Storage::url($item->item_image_path)}}"/>
                </div>
                <div class="user">
                    <img class="img-circle" src="{{Storage::url($item->item_image_path)}}"/>
                </div>
                <div class="content">
                    <div class="maini">
                        <h3 class="name">{{ $item->item_name }}</h3>
                        <p class="profession">Location: Lakeside</p>

                        <p class="text-center">"{{ $item->description }}"</p>
                    </div>
                    <!-- <div class="footer">
                        <div class="rating">
                            <i class="fa fa-mail-forward"></i> Auto Rotation
                        </div>
                    </div> -->
                </div>
            </div> <!-- end front panel -->
            <a href="" class="back">
                <div class="header">
                    <h5 class="motto">"{{ $item->description }}"</h5>
                </div>
                <div class="content">
                    <div class="main">
                        <h4 class="text-center">{{ $item->item_name }}</h4>
                        <!-- <p class="text-center">Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p> -->
                            <div class="container" style="width: 100%;">
                            <img src="{{Storage::url($item->item_image_path)}}" style="width: 32%;" />
                            <img src="{{Storage::url($item->item_image_path)}}" style="width: 32%;" />
                            <img src="{{Storage::url($item->item_image_path)}}" style="width: 32%;" />
                            </div>
                        <div class="stats-container">
                            <div class="stats">
                                <h4>{{ $item->number_of_rooms }}</h4>
                                <p>
                                    Bedrooms
                                </p>
                            </div>
                            <div class="stats">
                                <h4>{{ $item->number_of_washrooms }}</h4>
                                <p>
                                    Washrooms
                                </p>
                            </div>
                            <div class="stats">
                                <h4>{{ $item->number_of_balconies }}</h4>
                                <p>
                                    Balconies
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- <div class="footer">
                    <div class="social-links text-center">
                        <a href="https://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                        <a href="https://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                        <a href="https://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                    </div>
                </div> -->
            </a> <!-- end back panel -->
        </div> <!-- end card -->
    </div> <!-- end card-container -->
</div> <!-- end col-sm-3 -->