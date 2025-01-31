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
		<h3 class="card-title">Give the ip data</h3>
	</div>
	<!-- /.card-header -->
		<div class="card-body">
			<form id="insert-ip" action={{route('ip.insert')}} method="post">
				@csrf
				@php
					$options = array();
					foreach ($macs as $mac){
						$options[$mac->id] = $mac->addres.' -> '.$mac->device->id.'. '.$mac->device->name.'. '.$mac->icon->name;
					}
					$selected = array();
					$selected = [''];
				@endphp
				<x-adminlte-select2 name="mac" data-placeholder="Select the mac...">
					<x-slot name="prependSlot">
						<div class="input-group-text">
							<i class="fas fa-map-marker-alt"></i>
						</div>
					</x-slot>
					<option/>
					<x-adminlte-options :options="$options" :selected="$selected"/>
				</x-adminlte-select2>
				<x-adminlte-input name="addres" placeholder="Ip addres" >
					<x-slot name="prependSlot">
						<div class="input-group-text">
							<i class="fas fa-broadcast-tower"></i>
						</div>
					</x-slot>
				</x-adminlte-input>
			</form>
		</div>
		<div class="card-footer">
			<a href={{route('ip.index')}}>
				<button type="button" class="btn btn-primary btn-danger"><i class="fas fa-chevron-left"></i> Back</button>
			</a>
			<button form="insert-ip" class="btn btn-primary float-right">Send <i class="fas fa-chevron-right"></i></button>
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
