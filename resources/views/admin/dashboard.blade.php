@push('styles')
    <link href="{{ asset('css/treeview.css') }}" rel="stylesheet">
@endpush
<x-admin-layout title="Dashboard">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="Dashboard">
            {{-- <x-admin.breadcrumbs>
                    <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
            </x-admin.breadcrumbs> --}}
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
    </x-slot>

    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-xl">
                <div class="col-md-6 col-lg-6 col-xl-6">

                    <div class="row">
                        <div class="col-md-6">
                            <h3>Category List</h3>
                            <ul id="tree1">
                                @foreach ($categories as $category)
                                    <li>
                                        {{ $category->title }}
                                        @if (count($category->childs))
                                            @include('admin.manageChild',['childs' => $category->childs])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Add New Category</h3>


                            {!! Form::open(['route' => 'add.category']) !!}


                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                {!! Form::label('Title:') !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>


                            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                                {!! Form::label('Category:') !!}
                                {!! Form::select('parent_id', $allCategories, old('parent_id'), ['class' => 'form-control', 'placeholder' => 'Select Category']) !!}
                                <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-success">Add New</button>
                            </div>


                            {!! Form::close() !!}


                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

</x-admin-layout>
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/treeview.js') }}"></script>
@endpush
