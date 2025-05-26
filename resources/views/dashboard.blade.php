@extends('layouts.app')
@section('content')	
  <style>


    .main-content {
      /* margin-left: 250px; */
      padding: 20px;
    }

    .header {
      position: fixed;
      top: 0;
      left: 250px;
      right: 0;
      height: 60px;
      background-color: #fff;
      border-bottom: 1px solid #dee2e6;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      z-index: 1000;
    }

    .dashboard-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 80px;
    }

    .card-box {
      flex: 1 1 250px;
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>


  <!-- Header -->
  {{-- <div class="header">
    <h5 class="mb-0">Dashboard</h5>
    <span>Welcome, {{ Auth::user()->name }}</span>
  </div> --}}

  <!-- Main Content -->
  <div class="main-content">
    <h1 style=" text-align: center;
    background: gray;
    color: white">Welcome {{auth()->user()->name}}</h1>
    <div class="dashboard-cards">
      <div class="card-box">
        <div class="card-title">Total Users</div>
        <div class="fs-4 text-primary">152</div>
      </div>
      <div class="card-box">
        <div class="card-title">Courses</div>
        <div class="fs-4 text-success">23</div>
      </div>
      <div class="card-box">
        <div class="card-title">Teachers</div>
        <div class="fs-4 text-warning">12</div>
      </div>
      <div class="card-box">
        <div class="card-title">Blog Posts</div>
        <div class="fs-4 text-danger">34</div>
      </div>
    </div>
  </div>



@endsection