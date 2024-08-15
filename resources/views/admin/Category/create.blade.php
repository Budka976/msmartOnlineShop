@extends('layouts.admin')

@section('content')
<h1>Create Page</h1>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-2 mb-0">All Categories</h6>

                            <a href="{{route('admin.categories.index')}}" class="btn bg-gradient-success btn-sm mb-0 me-3">
                                <&nbsp; Home
                            </a>
                            {{-- <a href="{{route('admin.categories.create')}}" class="btn bg-gradient-success btn-sm mb-0 me-3">
                                +&nbsp; New Category
                            </a> --}}
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <tbody>
                                    <form method="POST" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="categoryName">
                                            <label class="ms-3" for="categoryName">Category Name</label>
                                            <input class="form-control border mb-2 ms-3" type="text" name="name" id="" placeholder=" Category Name">
                                        </div>
                                        <div class="image">
                                            <label class="ms-3" for="image">Image</label>
                                            <input class="form-control border mb-2 ms-3" type="file" name="image" id="" placeholder=" Image">
                                        </div>
                                        <div class="slug">
                                            <label class="ms-3" for="slug">Slug</label>
                                            <input class="form-control border mb-2 ms-3" type="text" name="slug" id="" placeholder=" Slug">
                                        </div>
                                        <div class="status">
                                            <label class="ms-3" for="status">Status</label>
                                            <input class="form-control border mb-2 ms-3" type="checkbox" name="status" id="checkbox" value="0">
                                        </div>
                                        <div class="button">
                                            <button type="submit" class="btn btn-primary ms-3">+&nbsp;Upload</button>
                                        </div>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
