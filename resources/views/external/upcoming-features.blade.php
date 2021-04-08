@extends('layouts.external')

@section('content')
    <style>
        header.site-header.l8-site-header.site-header--menu-center.dynamic-sticky-bg.dark-mode-texts.px-9.site-header--absolute.site-header--sticky {
            background: #2e3951;
        }
    </style>
    <div class="container-fluid my-lg-25">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <p class="h1 text-default-color pb-8 text-center">{{ __('Upcoming features') }}</p>
                <table class="table table-striped rounded border text-center mb-15">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('external.Title') }}</th>
                        <th scope="col">{{ __('external.Description') }}</th>
                        <th scope="col">{{ __('external.Release date') }}</th>
                        <th scope="col">{{ __('external.Version') }}</th>
                        <th scope="col">{{ __('external.Status') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ __('upcoming-features.Downloading records_title') }}</th>
                        <td>{{ __('upcoming-features.Downloading records') }}</td>
                        <td>20/04/2021</td>
                        <td>v1.0</td>
                        <td>
                            <div class="badge badge-warning">{{ __('external.Coming soon') }}</div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">{{ __('upcoming-features.The possibility to create invoices_title') }}</th>
                        <td>{{ __('upcoming-features.The possibility to create invoices') }}</td>
                        <td>05/05/2021</td>
                        <td>v1.0</td>
                        <td>
                            <div class="badge badge-warning">{{ __('external.Coming soon') }}</div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">{{ __('upcoming-features.Chat Between staves and admins') }}</th>
                        <td>{{ __('upcoming-features.Staves and admins will be able to discuss with each other through rooms, admin can create rooms and add staves to them.') }}</td>
                        <td>20/05/2021</td>
                        <td>v1.0</td>
                        <td>
                            <div class="badge badge-warning">{{ __('external.Coming soon') }}</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                @include('external.cta2')
            </div>
        </div>
    </div>
@endsection
