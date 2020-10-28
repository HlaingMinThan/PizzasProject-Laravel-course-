@extends("layout.layout")
@section('content')
    <div class="container">
       
        @if(Session("success"))
            <div class="alert alert-success">
                {{Session('success')}}
            </div>
         @endif
        <!-- Material form register -->
<div class="card mt-4">

    <h5 class="card-header indigo white-text text-center py-4">
        <strong>Pizza Order Edit Form</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center"  action="{{route('update',$pizza->id)}}" method="post">
            @csrf
            <!-- User name -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="username"  value="{{$pizza->username}}">
                <label for="materialRegisterFormEmail">User Name</label>
                @error('username')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <!-- Pizza name -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="pizza_name" value="{{$pizza->pizza_name}}">
                <label for="materialRegisterFormEmail">Pizza Name</label>
                @error('pizza_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="topping" value="{{$pizza->topping}}">
                <label for="materialRegisterFormEmail">Toppings</label>
                @error('topping')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="sauce" value="{{$pizza->sauce}}">
                <label for="materialRegisterFormEmail">Sauce</label>
                @error('sauce')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="price" value="{{$pizza->price}}">
                <label for="materialRegisterFormEmail">Price</label>
                @error('price')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

          

            <!-- Order button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" >Update</button>

            <!-- Social register -->
            <p>or sign up with:</p>

            <a type="button" class="btn-floating btn-fb btn-sm">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a type="button" class="btn-floating btn-tw btn-sm">
                <i class="fab fa-twitter"></i>
            </a>
            <a type="button" class="btn-floating btn-li btn-sm">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a type="button" class="btn-floating btn-git btn-sm">
                <i class="fab fa-github"></i>
            </a>

            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
    </div>
@endsection