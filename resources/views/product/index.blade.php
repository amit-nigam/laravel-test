@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">product listing </div>

                <div class="panel-body">
		<table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Qty</th>
                <th>price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $prod)
            <tr>
                <td>{{$prod->name}}</td>
                <td>{{$prod->qty}}</td>
                <td>{{$prod->price}}</td>
                <td>{{$prod->price * $prod->qty}}</td>
            </tr>
          @endforeach
        </tbody>
    </table>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
