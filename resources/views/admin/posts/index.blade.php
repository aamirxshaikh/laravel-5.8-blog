@extends('layouts.app')

@section('title') Posts @endsection

@section('content')
	<div class="card card-default">
		<div class="card-header">
			Published posts
		</div>

		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<th>
						Image
					</th>

					<th>
						Title
					</th>

					<th>
						Edit
					</th>

					<th>
						Trash
					</th>
				</thead>

				<tbody>
					@if($posts->count() > 0)
						@foreach($posts as $post)
							<tr>
								<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px"></td>

								<td>{{ $post->title }}</td>

								<td>
									<a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info">Edit</a>
								</td>

								<td>
									<a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger">Trash</a>
								</td>
							</tr>
						@endforeach

					@else
						<tr>
							<th colspan="5" class="text-center">
								No published posts yet !
							</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection