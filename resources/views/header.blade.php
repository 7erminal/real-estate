<!DOCTYPE html>
<html lang="en">
<head>
<!-- <title>Main Shop Page</title> -->
@yield('title')
<meta charset="utf-8" />
<meta name="csrf-token" content="{{csrf_token()}}" />
<link rel="apple-touch-icon" sizes="76x76" href="/assets/assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="/assets/assets/img/favicon.png">	

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Real Estate</title>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />

<link href="/assets/bootstrap3/css/bootstrap.css" rel="stylesheet" />
<link href="/assets/assets/css/gsdk.css" rel="stylesheet" />  
<link href="/assets/assets/css/demo.css" rel="stylesheet" /> 
<link href="/assets/assets/css/custom.css" rel="stylesheet" /> 
<link href='/assets/assets/css/rotating-card.css' rel='stylesheet' />

<!--     Font Awesome     -->
<link href="/assets/bootstrap3/css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
@viteReactRefresh
@vite('resources/js/app.jsx')
</head>