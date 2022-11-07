@extends('admin.layouts.main')


@section('title')
Reviews
@endsection

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 mb-4">
        <a href="{{route('admin.review.create')}}" class="btn btn-success">Create new review</a>
      </div>
      <div class="card col-sm-12" style="min-height:100%;">
        <div class="card-header">
        <h3 class="card-title">All Reviews</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">#id</th>
                <th>Reviews name</th>
                <th>Edit/Delete</th>
              </tr>
            </thead>
          <tbody>
            @foreach ($reviews as $review)
            <tr>
              <td>{{$review->id}}</td>
              <td>{{$review->name}}</td>
              
              <td>
                <a href="{{route('admin.review.edit', $review->id)}}" class="btn btn-primary">Edit</a>
                <form style="display:inline" action="{{route('admin.review.destroy', $review->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
        
        </div>
    </div>
  </div>
</section>

@endsection