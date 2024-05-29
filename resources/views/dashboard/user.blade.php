@extends('dashboard.layout.master')
@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                            <h6 class="text-white text-capitalize ps-3">Authors table</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                add new
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            image</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            phone</th>

                                        <th class="text-secondary opacity-7">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{asset("uploads/".$item->avater)}}"
                                                            class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{$item->name}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{$item->phone}}</p>
                                            </td>
                                            <td class="align-middle">
                                               
                                                <a href="" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title=" user">
                                                    show
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route("storeUser")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="">id card image</label>
                                    <input type="file"  name="id_card" class="form-control border px-1"  >
                                    @if ($errors->has('id_card'))
                                    <span class="text-danger">{{ $errors->first('id_card') }}</span>
                                @endif
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="">passport image</label>
                                    <input type="file" name="passport" class="form-control border px-1"  >
                                    @if ($errors->has('passport'))
                                    <span class="text-danger">{{ $errors->first('passport') }}</span>
                                @endif
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="">user image</label>
                                    <input type="file" name="avater" class="form-control border px-1"  >
                                    @if ($errors->has('avater'))
                                    <span class="text-danger">{{ $errors->first('avater') }}</span>
                                @endif </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="">name</label>
                                    <input type="text" name="name" class="form-control border px-1" placeholder=" name"
                                        aria-label=" name">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif </div>

                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="">phone</label>
                                    <input type="text" name="phone" class="form-control border px-1" placeholder="777 777 777"
                                        aria-label="phone">
                                        @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif   </div>

                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="">date of birth</label> 
                                    <input type="date" name="date_of_birth" class="form-control border px-1" placeholder="01/01/1111" aria-label="date of birth">
                                    @if ($errors->has('date_of_birth'))
                                    <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                @endif </div>

                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="">email</label> <input type="email" name="email"
                                        class="form-control border px-1" placeholder="info@example.com" aria-label="email">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Save </button>

                                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
