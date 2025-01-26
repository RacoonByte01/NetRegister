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
		<h3 class="card-title">Give the user data</h3>
	</div>
	<!-- /.card-header -->
		<div class="card-body">
			<form id="insert-user" action={{route('user.insert')}} method="post">
				@csrf
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
					</div>
					<input name="name" type="text" class="form-control" placeholder="Username">
				</div>
				<div class="form-group">
					<textarea form="insert-user" name="comment" class="form-control" rows="3" placeholder="Comment..."></textarea>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<a href={{route('user.index')}}>
				<button type="button" class="btn btn-primary btn-danger"><i class="fas fa-chevron-left"></i> Back</button>
			</a>
			<button form="insert-user" class="btn btn-primary float-right">Send <i class="fas fa-chevron-right"></i></button>
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

@endpush

{{-- Add common CSS customizations --}}

@push('css')

@endpush
