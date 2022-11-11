@extends('admin.default')
@section('title', 'Favourite Product List')
<!-- Dashboard Ecommerce start -->
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="demo-spacing-0">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="alert-body">{{ $message }}</div>
                            </div>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="demo-spacing-0">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-body">{{ $message }}</div>
                            </div>
                        </div>
                    @endif
                    <h4 class="card-title">User Favourite Products</h4>
                    <a style="float:right;" title="Add Module" href="{{ route('favourite.create') }}"
                        class="btn btn-primary mb-1"><span></span>Add Favourite Product </a>
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (sizeof($All_Products))
                                    @php $i=0; @endphp
                                    @foreach ($All_Products as $val)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $val->product_name }}</td>
                                            <td class="t-center"> <a target="_blank"
                                                    href="{{ asset('uploads/images/' . $val->image) }}"><img
                                                        style="width:60px;"
                                                        src="{{ asset('uploads/images/' . $val->image) }}"></a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" style="text-align:center; color:red;"> Data not found </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
