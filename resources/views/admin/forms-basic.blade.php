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


    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/selectFX/css/cs-skin-elastic.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->
        @include ('admin.left-panel')
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
            @include ('admin.right-panel-header')
        <!-- Header-->

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
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Credit Card</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Pay Invoice</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group text-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                                </ul>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Payment amount</label>
                                                <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00">
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Name on card</label>
                                                    <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Card number</label>
                                                    <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                                            <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY" autocomplete="cc-exp">
                                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="x_card_code" class="control-label mb-1">Security code</label>
                                                        <div class="input-group">
                                                            <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="payment-button-amount">Pay $100.00</span>
                                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Company</strong><small> Form</small></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Company</label><input type="text" id="company" placeholder="Enter your company name" class="form-control"></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">VAT</label><input type="text" id="vat" placeholder="DE1234567890" class="form-control"></div>
                                        <div class="form-group"><label for="street" class=" form-control-label">Street</label><input type="text" id="street" placeholder="Enter street name" class="form-control"></div>
                                            <div class="row form-group">
                                                <div class="col-8">
                                                    <div class="form-group"><label for="city" class=" form-control-label">City</label><input type="text" id="city" placeholder="Enter your city" class="form-control"></div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group"><label for="postal-code" class=" form-control-label">Postal Code</label><input type="text" id="postal-code" placeholder="Postal Code" class="form-control"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label for="country" class=" form-control-label">Country</label><input type="text" id="country" placeholder="Country name" class="form-control"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Inline</strong> Form
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" class="form-inline">
                                                            <div class="form-group"><label for="exampleInputName2" class="pr-1  form-control-label">Name</label><input type="text" id="exampleInputName2" placeholder="Jane Doe" required="" class="form-control"></div>
                                                            <div class="form-group"><label for="exampleInputEmail2" class="px-1  form-control-label">Email</label><input type="email" id="exampleInputEmail2" placeholder="jane.doe@example.com" required="" class="form-control"></div>
                                                        </form>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Horizontal</strong> Form
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" class="form-horizontal">
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Email</label></div>
                                                                <div class="col-12 col-md-9"><input type="email" id="hf-email" name="hf-email" placeholder="Enter Email..." class="form-control"><span class="help-block">Please enter your email</span></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Password</label></div>
                                                                <div class="col-12 col-md-9"><input type="password" id="hf-password" name="hf-password" placeholder="Enter Password..." class="form-control"><span class="help-block">Please enter your password</span></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Normal</strong> Form
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" class="">
                                                            <div class="form-group"><label for="nf-email" class=" form-control-label">Email</label><input type="email" id="nf-email" name="nf-email" placeholder="Enter Email.." class="form-control"><span class="help-block">Please enter your email</span></div>
                                                            <div class="form-group"><label for="nf-password" class=" form-control-label">Password</label><input type="password" id="nf-password" name="nf-password" placeholder="Enter Password.." class="form-control"><span class="help-block">Please enter your password</span></div>
                                                        </form>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Input <strong>Grid</strong>
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" class="form-horizontal">
                                                            <div class="row form-group">
                                                                <div class="col col-sm-3"><input type="text" placeholder=".col-sm-3" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-sm-4"><input type="text" placeholder=".col-sm-4" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-sm-5"><input type="text" placeholder=".col-sm-5" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-sm-6"><input type="text" placeholder=".col-sm-6" class="form-control"></div>
                                                            </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-sm-7"><input type="text" placeholder=".col-sm-7" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-sm-8"><input type="text" placeholder=".col-sm-8" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-sm-9"><input type="text" placeholder=".col-sm-9" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-sm-10"><input type="text" placeholder=".col-sm-10" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-sm-11"><input type="text" placeholder=".col-sm-11" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-sm-12"><input type="text" placeholder=".col-sm-12" class="form-control"></div>
                                                                </div>
                                                        </form>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-user"></i> Login
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Input <strong>Sizes</strong>
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" class="form-horizontal">
                                                            <div class="row form-group">
                                                                <div class="col col-sm-5"><label for="input-small" class=" form-control-label">Small Input</label></div>
                                                                <div class="col col-sm-6"><input type="text" id="input-small" name="input-small" placeholder=".form-control-sm" class="input-sm form-control-sm form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Normal Input</label></div>
                                                                <div class="col col-sm-6"><input type="text" id="input-normal" name="input-normal" placeholder="Normal" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-sm-5"><label for="input-large" class=" form-control-label">Large Input</label></div>
                                                                <div class="col col-sm-6"><input type="text" id="input-large" name="input-large" placeholder=".form-control-lg" class="input-lg form-control-lg form-control"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Validation states</strong> Form
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <div class="has-success form-group"><label for="inputIsValid" class=" form-control-label">Input is valid</label><input type="text" id="inputIsValid" class="is-valid form-control-success form-control"></div>
                                                            <div class="has-warning form-group"><label for="inputIsInvalid" class=" form-control-label">Input is invalid</label><input type="text" id="inputIsInvalid" class="is-invalid form-control"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Validation states</strong> with optional icons<em>(deprecated)</em>
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <div class="has-success form-group"><label for="inputSuccess2i" class=" form-control-label">Input with success</label><input type="text" id="inputSuccess2i" class="form-control-success form-control"></div>
                                                        <div class="has-warning form-group"><label for="inputWarning2i" class=" form-control-label">Input with warning</label><input type="text" id="inputWarning2i" class="form-control-warning form-control"></div>
                                                        <div class="has-danger has-feedback form-group"><label for="inputError2i" class=" form-control-label">Input with error</label><input type="text" id="inputError2i" class="form-control-danger form-control"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Icon/Text</strong> Groups
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" class="form-horizontal">
                                                            <div class="row form-group">
                                                                <div class="col col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                        <input type="text" id="input1-group1" name="input1-group1" placeholder="Username" class="form-control">
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                            <input type="email" id="input2-group1" name="input2-group1" placeholder="Email" class="form-control">
                                                                            <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                                                                            <input type="text" id="input3-group1" name="input3-group1" placeholder=".." class="form-control">
                                                                            <div class="input-group-addon">.00</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i class="fa fa-dot-circle-o"></i> Submit
                                                            </button>
                                                            <button type="reset" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-ban"></i> Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong>Buttons</strong> Groups
                                                        </div>
                                                        <div class="card-body card-block">
                                                            <form action="" method="post" class="form-horizontal">
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-btn">
                                                                                <button class="btn btn-primary">
                                                                                    <i class="fa fa-search"></i> Search
                                                                                </button>
                                                                            </div>
                                                                            <input type="text" id="input1-group2" name="input1-group2" placeholder="Username" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                            <input type="email" id="input2-group2" name="input2-group2" placeholder="Email" class="form-control">
                                                                            <div class="input-group-btn"><button class="btn btn-primary">Submit</button></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-btn"><button class="btn btn-primary"><i class="fa fa-facebook"></i></button></div>
                                                                            <input type="text" id="input3-group2" name="input3-group2" placeholder="Search" class="form-control">
                                                                            <div class="input-group-btn"><button class="btn btn-primary"><i class="fa fa-twitter"></i></button></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i class="fa fa-dot-circle-o"></i> Submit
                                                            </button>
                                                            <button type="reset" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-ban"></i> Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong>Dropdowns</strong> Groups
                                                        </div>
                                                        <div class="card-body card-block">
                                                            <form class="form-horizontal">
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-btn">
                                                                                <div class="btn-group">
                                                                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">Dropdown</button>
                                                                                    <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                                                                        <button type="button" tabindex="0" class="dropdown-item">Action</button><button type="button" tabindex="0" class="dropdown-item">Another Action</button><button type="button" tabindex="0" class="dropdown-item">Something else here</button>
                                                                                        <div tabindex="-1" class="dropdown-divider"></div>
                                                                                        <button type="button" tabindex="0" class="dropdown-item">Separated link</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <input type="text" id="input1-group3" name="input1-group3" placeholder="Username" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                            <input type="email" id="input2-group3" name="input2-group3" placeholder="Email" class="form-control">
                                                                            <div class="input-group-btn">
                                                                                <div class="btn-group">
                                                                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">Dropdown</button>
                                                                                    <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                                                                        <button type="button" tabindex="0" class="dropdown-item">Action</button><button type="button" tabindex="0" class="dropdown-item">Another Action</button><button type="button" tabindex="0" class="dropdown-item">Something else here</button>
                                                                                        <div tabindex="-1" class="dropdown-divider"></div>
                                                                                        <button type="button" tabindex="0" class="dropdown-item">Separated link</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-btn">
                                                                                <div class="btn-group">
                                                                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">Action</button>
                                                                                    <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                                                                        <button type="button" tabindex="0" class="dropdown-item">Action</button><button type="button" tabindex="0" class="dropdown-item">Another Action</button><button type="button" tabindex="0" class="dropdown-item">Something else here</button>
                                                                                        <div tabindex="-1" class="dropdown-divider"></div>
                                                                                        <button type="button" tabindex="0" class="dropdown-item">Separated link</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <input type="text" id="input3-group3" name="input3-group3" placeholder=".." class="form-control">
                                                                            <div class="input-group-btn">
                                                                                <div class="btn-group">
                                                                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">Dropdown</button>
                                                                                    <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                                                                        <button type="button" tabindex="0" class="dropdown-item">Action</button><button type="button" tabindex="0" class="dropdown-item">Another Action</button><button type="button" tabindex="0" class="dropdown-item">Something else here</button>
                                                                                        <div tabindex="-1" class="dropdown-divider"></div>
                                                                                        <button type="button" tabindex="0" class="dropdown-item">Separated link</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i class="fa fa-dot-circle-o"></i> Submit
                                                            </button>
                                                            <button type="reset" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-ban"></i> Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            Use the grid for big devices!
                                                            <small>
                                                                <code>.col-lg-*</code><code>.col-md-*</code><code>.col-sm-*</code>
                                                            </small>
                                                        </div>
                                                        <div class="card-body card-block">
                                                            <form action="" method="post" class="form-horizontal">
                                                                <div class="row form-group">
                                                                    <div class="col col-md-8"><input type="text" placeholder=".col-md-8" class="form-control"></div>
                                                                    <div class="col col-md-4"><input type="text" placeholder=".col-md-4" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-7"><input type="text" placeholder=".col-md-7" class="form-control"></div>
                                                                    <div class="col col-md-5"><input type="text" placeholder=".col-md-5" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-6"><input type="text" placeholder=".col-md-6" class="form-control"></div>
                                                                    <div class="col col-md-6"><input type="text" placeholder=".col-md-6" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-5"><input type="text" placeholder=".col-md-5" class="form-control"></div>
                                                                    <div class="col col-md-7"><input type="text" placeholder=".col-md-7" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-4"><input type="text" placeholder=".col-md-4" class="form-control"></div>
                                                                    <div class="col col-md-8"><input type="text" placeholder=".col-md-8" class="form-control"></div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="card-footer"><button type="submit" class="btn btn-primary btn-sm">Action</button><button class="btn btn-danger btn-sm">Action</button><button class="btn btn-warning btn-sm">Action</button><button class="btn btn-info btn-sm">Action</button><button class="btn btn-success btn-sm">Action</button></div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            Input Grid for small devices!<small><code>.col-*</code></small>
                                                        </div>
                                                        <div class="card-body card-block">
                                                            <form action="" method="post" class="form-horizontal">
                                                                <div class="row form-group">
                                                                    <div class="col-4"><input type="text" placeholder=".col-4" class="form-control"></div>
                                                                    <div class="col-8"><input type="text" placeholder=".col-8" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-5"><input type="text" placeholder=".col-5" class="form-control"></div>
                                                                    <div class="col-7"><input type="text" placeholder=".col-7" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-6"><input type="text" placeholder=".col-6" class="form-control"></div>
                                                                    <div class="col-6"><input type="text" placeholder=".col-6" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-7"><input type="text" placeholder=".col-5" class="form-control"></div>
                                                                    <div class="col-5"><input type="text" placeholder=".col-5" class="form-control"></div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-8"><input type="text" placeholder=".col-8" class="form-control"></div>
                                                                    <div class="col-4"><input type="text" placeholder=".col-4" class="form-control"></div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="card-footer"><button type="submit" class="btn btn-primary btn-sm">Action</button><button class="btn btn-danger btn-sm">Action</button><button class="btn btn-warning btn-sm">Action</button><button class="btn btn-info btn-sm">Action</button><button class="btn btn-success btn-sm">Action</button></div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">Example Form</div>
                                                        <div class="card-body card-block">
                                                            <form action="" method="post" class="">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Username</div>
                                                                        <input type="text" id="username3" name="username3" class="form-control">
                                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Email</div>
                                                                        <input type="email" id="email3" name="email3" class="form-control">
                                                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Password</div>
                                                                        <input type="password" id="password3" name="password3" class="form-control">
                                                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions form-group">
                                                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">Example Form</div>
                                                        <div class="card-body card-block">
                                                            <form action="" method="post" class="">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input type="text" id="username2" name="username2" placeholder="Username" class="form-control">
                                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input type="email" id="email2" name="email2" placeholder="Email" class="form-control">
                                                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input type="password" id="password2" name="password2" placeholder="Password" class="form-control">
                                                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Submit</button></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">Example Form</div>
                                                        <div class="card-body card-block">
                                                            <form action="" method="post" class="">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                        <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                                        <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
                            <script src="{{ asset('admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>

                            <script src="{{ asset('admin/vendors/jquery-validation/dist/jquery.validate.min.js') }}"></script>
                            <script src="{{ asset('admin/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js') }}"></script>

                            <script src="{{ asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
                            <script src="{{ asset('admin/assets/js/main.js') }}"></script>
</body>
</html>
