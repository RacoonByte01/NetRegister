@extends('adminlte::page')
@section('plugins.Select2', true)

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
		<h3 class="card-title">Give the device data</h3>
	</div>
	<!-- /.card-header -->
		<div class="card-body">
			<form id="update-device" action={{route('device.update', $device->id)}} method="post">
				@csrf
				@php
					$options = array();
					foreach ($icons as $icon){
						$options[$icon->id] = $icon->name;
					}
					$selected = [$device->icon->id];
				@endphp
				<x-adminlte-select2 name="icon" data-placeholder="Select an option...">
					<x-slot name="prependSlot">
						<div class="input-group-text">
							<i class="fas fa-icons"></i>
						</div>
					</x-slot>
					<x-adminlte-options :options="$options" :selected="$selected"/>
				</x-adminlte-select2>

				@php
					$config = [
						"placeholder" => "Select multiple users...",
					];
					$selected = array();
					foreach($device->users() as $user){
						array_push($selected, $user->id);
					}
					$options = array();
					foreach ($users as $user){
					    $options[$user->id] = $user->name;
					}
				@endphp
				<x-adminlte-select2 id="sel2Category" name="users[]" 
					label-class="text-danger" :config="$config" multiple>
						<x-slot name="prependSlot">
							<div class="input-group-text">
								<i class="fas fa-users"></i>
							</div>
						</x-slot>
						<x-adminlte-options :options="$options" :selected="$selected"/>
				</x-adminlte-select2>

				<x-adminlte-input name="name" placeholder="Device name" value="{{$device->name}}">
					<x-slot name="prependSlot">
						<div class="input-group-text">
							<i class="fas fa-terminal"></i>
						</div>
					</x-slot>
				</x-adminlte-input>
				<x-adminlte-textarea name="comment" placeholder="Comment..." rows=3 form="update-device">
					{{$device->comment}}
				</x-adminlte-textarea>
			</form>
		</div>
		<div class="card-footer">
			<a href={{route('device.index')}}>
				<button type="button" class="btn btn-primary btn-danger"><i class="fas fa-chevron-left"></i> Back</button>
			</a>
			<button form="update-device" class="btn btn-primary float-right">Send <i class="fas fa-chevron-right"></i></button>
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
@if ($darkmode)
	<style>
		.select2-selection {
			background-color: #343a40 !important;
			border: solid #6c757d 1px !important;
		}
		.select2-dropdown{
			border: solid #6c757d 1px !important;
		}
		.select2-selection__rendered{
			color: #9ca5ad !important;
		}
	</style>   
@endif
@endpush
