@extends('layouts.main')
@section('title')
تعديل قسم {{ $section->name }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الأقسام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                تعديل قسم {{ $section->name }}</span>
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
                <form id="edit_form" action="{{ route('sections.update',$section->id) }}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="">
                        <label for="recipient-name" class="col-form-label">اسم القسم:</label>
                        <input class="form-control" name="name" value="{{ $section->name }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">ملاحظات:</label>
                        <textarea class="form-control" id="description" name="description">{{ $section->description }}</textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">تاكيد</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    <!-- row closed -->
</div>
@endsection
