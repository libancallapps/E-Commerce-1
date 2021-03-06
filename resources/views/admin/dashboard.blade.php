
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="public/css/mycss1.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <title> Admin's Dashboard </title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body> 

        @include('layouts.header')


        <hr><hr><hr>
        <div align='center'>
            <h1 > Admin {{Auth()->user()->name }}'s Dashbord </h1>
            <h3> Users' Table </h3>
        </div>

        <table class='col-10' align='center'>
            <tr>
                <th> Id </th> 
                <th> First Name </th> 
                <th> Last Name </th>
                <th> Email </th>            
                <th> Phone </th> 
                <th> Address </th>
                <th> Member Since </th>
                <th> Status </th>
                <th> View Orders </th>
                <th> Change Password </th>
                <th> Delete User </th>
                <th> Ban User </th>
            </tr>
            @foreach($customers as $customer)
            <tr>
                <td> {{ $customer->id }} </td>
                <td> {{ $customer->fname }} </td>
                <td> {{ $customer->lname }} </td>
                <td> {{ $customer->email }} </td>
                <td> {{ $customer->phone }} </td>
                <td> {{ $customer->address }} </td>
                <td> {{ $customer->created_at->diffForHumans() }} </td>
                <?php
                $customer->ban ? $status = 'banned' : $status = 'normal';
                ?>
                <td> {{ $status }} </td>
                <td> <button class="btn btn-success" type="submit">View Orders</button> </td>
                <td> <button class="btn btn-dark" type="submit">Edit Customer</button>  </td>
                <td> <button class="btn btn-danger" type="submit">Delete User </button> </td>
                <td> <button class="btn btn-danger" type="submit">Ban User</button> </td>
            </tr>
            @endforeach


        </table>

        <hr>
        <div align='center'>
            <h3> Products' Table</h3>
        </div>    

        <table class='col-10' align='center'>
            <tr>
                <th> Id </th> 
                <th> Name </th> 
                <th> Description </th>
                <th> Qty </th>            
                <th> Price </th>
                <th> Photo </th>
                <th> Product Created </th>
                <th> Status </th>
                <th> Product View </th>
                <th> Edit Product    </th>
                <th> Delete Product </th>

            </tr>
            @foreach($products as $product)
            <tr>
                <td> {{ $product->id }} </td>
                <td> {{ $product->name }} </td>
                <td> {{ $product->description }} </td>
                <td> {{ $product->qty }} </td>
                <td> {{ $product->price . " $"}} </td>
                <td> <img class="pic-1" height="100" width="100" src={{$product->photo}} > </td>
                <td> {{ $product->created_at->diffForHumans() }} </td>
                <?php
                $product->visible ? $visibility = 'visible' : $visibility = 'hidden';
                ?>
                
                <td> {{ $visibility }} </td>
                <td> <a href="{{ route('product.show', $product->id)}}" class="btn btn-dark">View Page</a></td>
                <td>  <a href="{{ route('product.edit', $product->id)}}" class="btn btn-dark">Edit Product</a>  </td>
                <td>  <form action="{{ route('product.destroy', $product->id)}}" method="post"> 
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach



    </body>
</html>      
