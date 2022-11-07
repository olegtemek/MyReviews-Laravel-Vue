@extends('admin.layouts.main')


@section('title')
Review edit
@endsection

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-primary">
          <div class="card-header">
          <h3 class="card-title">Edit review</h3>
          </div>
          
          
          <form action="{{route('admin.review.update', $review->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="name">Name</label>
                    @if($errors->has('name'))
                      <div class="error text-danger">{{ $errors->first('name') }}</div>
                    @endif
                    <input type="text" class="form-control" id="name" value="{{$review->name}}" placeholder="Enter name" name="name">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="name_ru">Name Ru</label>
                    @if($errors->has('name_ru'))
                      <div class="error text-danger">{{ $errors->first('name_ru') }}</div>
                    @endif
                    <input type="text" class="form-control" id="name_ru" value="{{$review->name_ru}}" placeholder="Enter name_ru" name="name_ru">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="video">Video URL</label>
                    @if($errors->has('video'))
                      <div class="error text-danger">{{ $errors->first('video') }}</div>
                    @endif
                    <input type="text" class="form-control" id="video" value="{{$review->video}}" placeholder="Enter video url" name="video">
                  </div>
                </div>
    
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="description">Description</label>
                    @if($errors->has('description'))
                      <div class="error text-danger">{{ $errors->first('description') }}</div>
                    @endif
                    <textarea name="description" class="form-control" id="description">{{$review->description}}</textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="description_ru">Description Ru</label>
                    @if($errors->has('description_ru'))
                      <div class="error text-danger">{{ $errors->first('description_ru') }}</div>
                    @endif
                    <textarea name="description_ru" class="form-control" id="description_ru">{{$review->description_ru}}</textarea>
                  </div>
                </div>
  
               
                <div class="col-sm-4">
                  <div class="form-group">
                    @error('image')
                      <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row col-sm">
                      <label style="display: block; width:100%">Image</label>
                      <input type="text" id="image" name="image" value="{{ $review->image }}">
                      <a href="" class="popup_selector btn btn-success" data-inputid="image"><i class="fas fa-file"></i></a>
                    </div>
                  </div>
                </div>
  
  
                <div class="col-sm-4">
                  <div class="form-group">
                    @error('sound')
                      <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row col-sm">
                      <label style="display: block; width:100%">Sound</label>
                      <input type="text" id="sound" name="sound" value="{{ $review->sound }}">
                      <a href="" class="popup_selector btn btn-success" data-inputid="sound"><i class="fas fa-file"></i></a>
                    </div>
                  </div>
                </div>
  
              </div>
          <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
          </div>
      </div>
    </div>
  </div>
</section>

@endsection
