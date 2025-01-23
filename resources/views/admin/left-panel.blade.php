
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/admin2') }}">
                    <!-- <img src="{{ asset('images/culturedlogo.jpg') }}" alt="Logo"> -->
                    <img src="{{ Storage::url(optional($data['shopdetails'])->logo) }}" width="250px" />
                </a>
                <a class="navbar-brand hidden" href="{{ url('./admin2') }}"><img src="{{ Storage::url(optional($data['shopdetails'])->logo) }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('/admin2') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Personal Customizations</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('/admin2/shopDetails') }}">Shop Details</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('/admin2/paymentDetails') }}">Payment Details</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('/admin2/about') }}">About</a></li>

                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('/admin2/legal') }}">Legal</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-users"></i>Customers</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fas fa-user"></i><a href="{{ url('/admin2/customers') }}">Registered Customers</a></li>
                            <li><i class="fas fa-user"></i><a href="{{ url('/admin2/newsletterusers') }}">Newsletter subscribers</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Transactions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('/admin2/transactions') }}">Transactions</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Items</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="menu-icon fa fa-th"></i><a href="{{ url('/admin2/forms-basic') }}">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ url('/admin2/forms-advanced') }}">Advanced Form</a></li> -->
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ url('/admin2/addItem') }}">Add Items</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ url('/admin2/addCategory') }}">Add Categories</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ url('/admin2/addFeatures') }}">Add Features</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-photo-video"></i>Media Center</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fas fa-images"></i><a href="{{ url('/admin2/addImagesPage') }}">Add Images</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>FAQs</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('/admin2/FAQs') }}">FAQs</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel