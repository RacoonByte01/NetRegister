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
        <div class="col-md-3">
            <x-adminlte-small-box title={{$users}} text="Users Registered" icon="fas fa-user"
            theme="red" url="{{route('user.index')}}" url-text="View details"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-small-box title={{$devices}} color-scheme="dark" text="Devices Registered" icon="fas fa-microchip"
            theme="yellow" url="{{route('device.index')}}" url-text="View details"/></div>
        <div class="col-md-3">
            <x-adminlte-small-box title={{$macs}} text="Macs Registered" icon="fas fa-network-wired"
            theme="green" url="{{route('mac.index')}}" url-text="View details"/></div>
        <div class="col-md-3">
            <x-adminlte-small-box title={{$ips}} text="Ips Registered" icon="fas fa-broadcast-tower"
            theme="info" url="{{route('ip.index')}}" url-text="View details"/>
        </div>
    </div>
	<div class=row>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					<h1 class="card-title">Users / Devices</h1>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-lg fa-minus"></i>
						</button>

						<button type="button" class="btn btn-tool" data-card-widget="remove">
							<i class="fas fa-lg fa-times"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<canvas id="users-devices-jschar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 421px;" width="421" height="250" class="chartjs-render-monitor"/>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h1 class="card-title">Types / Devices</h1>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-lg fa-minus"></i>
						</button>

						<button type="button" class="btn btn-tool" data-card-widget="remove">
							<i class="fas fa-lg fa-times"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<canvas id="devices-type-jschar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 421px;" width="421" height="250" class="chartjs-render-monitor"/>
				</div>
			</div>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	const ctx = document.getElementById('users-devices-jschar');
	data = @json($users_devices);
	new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: Object.keys(data),
			datasets: [{
				label: '# devices',
				data: Object.values(data),
			}]
		},
		options: {
			plugins: {
				legend: {
					position: 'right',
					labels: {
						usePointStyle: true,
						textAlign: 'left',
						pointStyle: 'rectRounded',
					},
				}
			}
		}
	});
</script>
<script>
	const devices_type_jschar = document.getElementById('devices-type-jschar');
	data = @json($type_devices);
	console.log(data)
	new Chart(devices_type_jschar, {
		type: 'bar',
		data: {
			labels: Object.keys(data),
			datasets: [{
				label: '# devices',
				data: Object.values(data),
				borderRadius: 5,
				borderWidth: 2,
				//borderSkipped: false,
			}],
		},
		options: {
			plugins: {
				legend: {
					position: 'disable',
				}
			}
		}
	});
</script>
@endpush

{{-- Add common CSS customizations --}}
@push('css')
<style type="text/css">
</style>
@endpush
