@props([
    'i' => $data->perPage() * ($data->currentPage()- 1),
])

{{-- {{ dd($data->perPage(), $data->currentPage()) }} --}}
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ __('cms.Users_Management') }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> {{ __('cms.create_new_user') }}</a>
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
   <tr>
       <th>No</th>
       <th>{{ __('cms.name') }}</th>
       <th>Email</th>
       <th>Roles</th>
       <th width="280px">{{ __('actions.action') }}</th>
   </tr>
   @foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $roleName)
               <label class="badge bg-success">{{ $roleName }}</label>
            @endforeach
          @endif
        </td>
        <td>
             <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa-solid fa-list"></i> {{ __('actions.show') }}</a>
             <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa-solid fa-pen-to-square"></i>{{ __('actions.edit') }}</a>
              <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> {{ __('actions.delete') }}</button>
              </form>
        </td>
    </tr>
 @endforeach
</table>

{!! $data->links('pagination::bootstrap-5') !!}

@endsection
