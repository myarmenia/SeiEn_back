@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
<div class="pagetitle">
    <h1>Current Earthquakes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('current-earthquakes.index') }}">Current Earthquakes</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Current Earthquakes</h5>


                    <form class="row g-3" action="{{ route('current-earthquakes.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="col-12">
                            <label for="banner" class="form-label">Banner</label>
                            <input type="file" class="form-control" id="banner" name="banner">
                            @error('banner')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="banner_div "></div> --}}
                        @foreach (languages() as $lng)
                        <div class="col-12">
                            <label for="title_{{$lng->name}}" class="form-label">Title {{ Str::upper($lng->name)
                                }}</label>
                            <input type="text"
                                class='form-control @error("translations.$lng->id.title") _incorrectly @enderror'
                                id="title_{{$lng->name}}" name="translations[{{$lng->id}}][title]"
                                value='{{ old("translations.$lng->id.title")}}'>
                            @error("translations.$lng->id.title")
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @endforeach
                        <div class="col-4">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') _incorrectly @enderror" id="date"
                                name="date" dataformatas="en" value="{{ old('date')}}">
                            @error('date')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control @error('time') _incorrectly @enderror" id="time"
                                name="time" value="{{ old('time')}}">
                            @error('time')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="magnitude" class="form-label">Magnitude</label>
                            <input type="text" class="form-control @error('magnitude') _incorrectly @enderror"
                                id="magnitude" name="magnitude" value="{{ old('magnitude')}}">
                            @error('magnitude')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @foreach (languages() as $lng)
                        <div class="col-lg-12">
                            <label for="description_{{$lng->name}}" class="form-label">Description {{
                                Str::upper($lng->name) }}</label>
                            <textarea
                                class='ckeditor form-control @error("translations.$lng->id.description") _incorrectly @enderror'
                                name="translations[{{$lng->id}}][description]"
                                id="description_en">{{ old("translations.$lng->id.description")}}</textarea>
                            @error("translations.$lng->id.description")
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @endforeach
                        <div class="col-lg-12">
                            <label for="description_ru" class="form-label">Links </label>
                            <div class="links_div">

                                @if (is_array(old('links')) || is_object(old('links')))
                                @foreach (old('links') as $key => $item)
                                <div>
                                    <div class=" col-lg-6 mr-3 d-flex mt-2">
                                        <input type="url" class="form-control {{ $item == null ? '_incorrectly' : ''}}"
                                            name="links[]" value="{{$item ?? ''}}">
                                        <i class="icon ri-delete-bin-2-line delete_link" onclick="removeElemnet(this)"></i>
                                    </div>
                                    @if ($item == null)
                                    <div class="error_message">The link field is required. </div>
                                    @endif
                                </div>
                                @endforeach
                                @else
                                <div class=" col-lg-6 mr-3 d-flex">
                                    <input type="url" class="form-control @error('links.*') _incorrectly @enderror"
                                        name="links[]">
                                    <i class="icon ri-delete-bin-2-line delete_link" onclick="removeElemnet(this)"></i>
                                </div>
                                @endif
                            </div>

                            <div class="col-lg-12">
                                <label for="description_ru" class="form-label">Add Link</label>
                                <i class="icon  ml-3 ri-add-box-line" id="add_link"></i>
                            </div>

                            <div class="col-12">
                                <label for="items" class="form-label">Files</label>
                                <input type="file" class="form-control" id="items" name="items[]" multiple>
                                @error('items')
                                <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="items_div d-flex flex-wrap justify-content-between mt-3 "> </div>
                            <div class="text-start mt-3">
                                <button class="btn btn-primary">Submit</button>
                                {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                            </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js-scripts')
<script src="{{ asset('assets/back/js/current_earthquakes_create.js') }}"></script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection