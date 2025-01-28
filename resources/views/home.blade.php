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
    <div class="row">
        <div class="col">
            <x-adminlte-small-box title={{$users}} text="Users Registered" icon="fas fa-user"
            theme="red" url="{{route('user.index')}}" url-text="View details"/>
        </div>
        <div class="col">
            <x-adminlte-small-box title={{$devices}} color-scheme="dark" text="Devices Registered" icon="fas fa-microchip"
            theme="yellow" url="{{route('device.index')}}" url-text="View details"/></div>
        <div class="col">
            <x-adminlte-small-box title={{$macs}} text="Macs Registered" icon="fas fa-network-wired"
            theme="green" url="{{route('mac.index')}}" url-text="View details"/></div>
        <div class="col">
            <x-adminlte-small-box title={{$ips}} text="Ips Registered" icon="fas fa-broadcast-tower"
            theme="info" url="{{route('ip.index')}}" url-text="View details"/>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Dashboard</h1>
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
        </div>
        <div class="card-body">
            <p>Bienvenido al dashboard</p>
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
<script>

    $(document).ready(function() {
        // Add your common script logic here...
    });

</script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
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
