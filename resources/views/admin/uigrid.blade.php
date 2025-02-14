<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/selectFX/css/cs-skin-elastic.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <!-- Left Panel -->
        @include ('admin.left-panel')
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header -->
            @include ('admin.right-panel-header')
        <!-- Header -->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">UI Elements</a></li>
                            <li class="active">Grids</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <h5 class="heading-title mb-1 text-secondary">Fixed Grid</h5>
                <div class="row">
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                    <div class="col">
                        <section class="card">
                            <div class="card-body text-secondary">.col</div>
                        </section>
                    </div>
                </div>



                <h5 class="heading-title mb-1 mt-4 text-secondary">Desktop Grid</h5>
                <div class="row">
                    <div class="col col-lg-12">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-12</div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-6</div>
                        </section>
                    </div>
                    <div class="col-lg-6 ">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-6</div>
                        </section>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-4">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-4</div>
                        </section>
                    </div>
                    <div class="col-lg-4">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-4</div>
                        </section>
                    </div>
                    <div class="col-lg-4">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-4</div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-3</div>
                        </section>
                    </div>
                    <div class="col-lg-3">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-3</div>
                        </section>
                    </div>
                    <div class="col-lg-3">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-3</div>
                        </section>
                    </div>
                    <div class="col-lg-3">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-3</div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-2</div>
                        </section>
                    </div>
                    <div class="col-lg-2">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-2</div>
                        </section>
                    </div>
                    <div class="col-lg-2">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-2</div>
                        </section>
                    </div>
                    <div class="col-lg-2">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-2</div>
                        </section>
                    </div>
                    <div class="col-lg-2">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-2</div>
                        </section>
                    </div>
                    <div class="col-lg-2">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-2</div>
                        </section>
                    </div>
                </div>


                <h4 class="heading-title mt-5 mb-3 text-secondary">Mobile, Tablet, and Desktop</h4>

                <div class="row">
                    <div class="col-2">
                        <section class="card">
                            <div class="card-body text-secondary">col-2</div>
                        </section>
                    </div>
                    <div class="col-2">
                        <section class="card">
                            <div class="card-body text-secondary">col-2</div>
                        </section>
                    </div>
                    <div class="col-lg-8">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-8</div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <section class="card">
                            <div class="card-body text-secondary">col-sm-3</div>
                        </section>
                    </div>
                    <div class="col-sm-3">
                        <section class="card">
                            <div class="card-body text-secondary">col-sm-3</div>
                        </section>
                    </div>
                    <div class="col-lg-6">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-6</div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <section class="card">
                            <div class="card-body text-secondary">col-md-4</div>
                        </section>
                    </div>
                    <div class="col-md-4">
                        <section class="card">
                            <div class="card-body text-secondary">col-md-4</div>
                        </section>
                    </div>
                    <div class="col-lg-4">
                        <section class="card">
                            <div class="card-body text-secondary">col-lg-4</div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <section class="card">
                            <div class="card-body text-secondary">col-sm-6</div>
                        </section>
                    </div>
                    <div class="col-sm-6">
                        <section class="card">
                            <div class="card-body text-secondary">col-sm-6</div>
                        </section>
                    </div>
                </div>


                <h5 class="heading-title mb-1 mt-4 text-secondary">Offset Grid</h5>

                <div class="row">
                    <div class="col-md-6 offset-md-6 col-sm-6 ml-auto">
                        <section class="card">
                            <div class="card-body text-secondary">col-md-6 offset-md-6 col-sm-6 </div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 offset-md-3 mr-auto ml-auto">
                        <section class="card">
                            <div class="card-body text-secondary">.col-md-6 .offset-md-3</div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <section class="card">
                            <div class="card-body text-secondary"> .col-md-4 </div>
                        </section>
                    </div>
                    <div class="col-md-4 ml-auto">
                        <section class="card">
                            <div class="card-body text-secondary">.col-md-4 .ml-auto</div>
                        </section>
                    </div>
                </div>
            </div>
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>


</body>

</html>
