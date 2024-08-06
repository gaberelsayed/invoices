@extends('layouts.main')
@section('title')
تعديل منتج {{ $product->name }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                تعديل منتج {{ $product->name }}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <form id="edit_form" action="{{ route('products.update',$product->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">اسم المنتج :</label>
                                <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                            <select name="section_id" id="section_id" class="custom-select my-1 mr-sm-2" required>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" {{ ($section->id == $product->section_id)? 'selected':'' }}>{{ $section->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="des">ملاحظات :</label>
                                <textarea name="description" cols="20" rows="5" id='description'
                                    class="form-control">{{ $product->description }}</textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
    @endsection

