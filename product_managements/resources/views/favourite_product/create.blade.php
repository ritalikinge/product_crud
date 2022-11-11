@extends('admin.default')
@section('title', 'Product Add')
<!-- Dashboard Ecommerce start -->
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Favourite Product</h4>
            
                    <form action="{{ route('favourite.store') }}" method="POST" class="forms-sample">
                        {{ csrf_field() }}
                        <input type="hidden" name="form_type" value="details">
            
                        <div class="form-group">
                            <label for="category_name">Select Product<span class="required">*</span></label>
                            <select class="form-control select2" name="product" id="product">
                                <option value="">Select Product</option>
                                @foreach ($aProducts as $val)
                                    <option value="{{ $val->id }}">{{ $val->product_name }}</option>
                                @endforeach
                            </select>
                            @error('product')
                                <span class="error">{{ $message }}</span>
                            @enderror
            
                            <a style="float:right;" title="Cancel" href="{{ route('favourite.list') }}"
                                class="btn btn-dark mb-1 mt-5"><span></span>Cancel</a>
                            <input style="float:right" type="submit" name="command" class="btn btn-primary mr-2 mt-5"
                                value="Save" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!--row--->
<link rel="stylesheet" href="<?php echo url(''); ?>/admin_assets/vendors/select2/select2.min.css">
<script src="<?php echo url(''); ?>/admin_assets/vendors/select2/select2.min.js"></script>

@endsection