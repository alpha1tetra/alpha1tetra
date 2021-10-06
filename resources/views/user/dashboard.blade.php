<x-admin-layout title="Dashboard">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="Dashboard">
            {{-- <x-admin.breadcrumbs>
                    <x-admin.breadcrumbs-item href="{{ route('designer.dashboard') }}" value="Dashboard" />
            </x-admin.breadcrumbs> --}}
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
</x-slot>

<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            {{-- <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                </x-admin.dashboard-count-widget>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                </x-admin.dashboard-count-widget>
            </div> --}}
            {{-- <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total Order" description="Total order available in this system" :count="$orderCount['total']" href="{{ route('order.list') }}" />
                    <x-admin.dashboard-count-widget-item title="Total Approved Order" description="Total approved order available in this system" :count="$orderCount['approved']" href="{{ route('order.list') }}" />
                </x-admin.dashboard-count-widget>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                <x-admin.dashboard-count-widget-item title="Total Review Order" description="Total review order available in this system" :count="$orderCount['review']" href="{{ route('order.list') }}" />
                <x-admin.dashboard-count-widget-item title="Total Update Order" description="Total update order available in this system" :count="$orderCount['update']" href="{{ route('order.list') }}" />
                </x-admin.dashboard-count-widget>
            </div> --}}
        </div>
        
    </div>
</div>

</x-admin-layout>