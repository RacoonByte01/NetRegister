@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
    <br/>
@stop

{{-- Rename section content to content_body --}}
@section('content')

<a href={{route('user.create')}}>
	<x-adminlte-button label="New User" theme="primary" icon="fas fa-plus"/>
</a>
<hr />
<div class="card">
	<div class="card-header">
        <div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="maximize">
				<i class="fas fa-lg fa-expand"></i>
			</button>

			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-lg fa-minus"></i>
			</button>

			<button type="button" class="btn btn-tool" data-card-widget="remove">
				<i class="fas fa-lg fa-times"></i>
			</button>
		</div>
		<h3 class="card-title">Users view</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
	<table id="users" class="table table-bordered table-striped dataTable dtr-inline collapsed" style="width=100%">
		<thead>
			<tr>
				<th width="30%"><b>Name</b></th>
				<th><b>Comment</b></th>
				<th width="2%"><b><i class="fas fa-edit"></i></b></th>
				<th width="2%"><b><i class="fas fa-trash-alt"></i></b></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->comment}}</td>
					<td>
						
						<a href="{{route('user.edit', $user->id)}}">
							<button type="button" class="btn btn-block bg-gradient-warning btn-sm"><b><i class="fas fa-edit"></i></b></button>
						</a>
					</td>
					<td>
						<a href={{route('user.destroy', $user->id)}}>
							<button type="button" class="btn btn-block bg-gradient-danger btn-sm"><b><i class="fas fa-trash-alt"></i></b></button>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
@stop{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'My company') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
<script> 
	new DataTable('#users');
</script>

@if ($darkmode)
<script>
	let prefers = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
	let html = document.querySelector('html');
	 
	html.classList.add(prefers);
	html.setAttribute('data-bs-theme', 'dark');
</script>
@endif
@endpush

{{-- Add common CSS customizations --}}

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css" />
<style type="text/css">

    {{-- You can add AdminLTE customizations here --}}
    /*
    .card-header {
        border-bottom: none;
    }
    .card-title {
        font-weight: 600;
    }
    */

</style>
@endpush
