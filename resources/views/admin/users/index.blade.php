@extends('layouts.app')

@section('title') Users @endsection

@section('content')
	<div class="card card-default">
		<div class="card-header">
			Users
		</div>

		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<th>
						Image
					</th>

					<th>
						Name
					</th>

					<th>
						Permissions
					</th>

					<th>
						Delete
					</th>
				</thead>

				<tbody>
					@if($users->count() > 0)
						@foreach($users as $user)
							<tr>
								<td>
									<img src="{{ asset($user->profile->avatar) }}" alt="" width="60px" height="60px" style="border-radius: 50%;">
								</td>

								<td>
									{{ $user->name }}
								</td>

								<td>
									@if($user->admin)
										<a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-danger">Remove Permission
										</a>
									@else
										<a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-primary">Make Admin
										</a>
									@endif
								</td>

								<td>
									@if(Auth::id() !== $user->id)
										<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger">Remove User
										</a>
									@endif
								</td>
							</tr>
						@endforeach

					@else
						<tr>
							<th colspan="5" class="text-center">
								No Users yet !
							</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection