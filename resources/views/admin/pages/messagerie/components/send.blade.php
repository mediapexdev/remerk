@php
    use App\Models\Reponse;
    $messages = Reponse::where('type', 2)->get();
@endphp
@extends('admin.layout')

@section('title')
    <title>Messages envoyés | Remërk</title>
@endsection

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

@section('component-body-content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Messages envoyés
                    <sup>
                        <span class="badge badge-primary">
                            {{ $messages->count() }}
                        </span>
                    </sup>
                </span>
            </h3>
            <div class="card-toolbar">
                <div class="input-group">
                    <div class="form-outline">
                        <input type="search" id="myInput" class="form-control" placeholder="Rechercher içi" />
                    </div>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-hover table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-50px">#</th>
                            <th class="min-w-100px">Envoyé à</th>
                            <th class="min-w-250px">Contenu</th>
                            <th class="min-w-100px">Date</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody id="myTable">
                        @foreach ($messages as $key => $message)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $message->user()->first()->prenom }} {{ $message->user()->first()->nom }}</td>
                                <td>{{ Str::limit($message->reponse, 50) }}</td>
                                <td>{{ $message->created_at->diffForHumans() }}</td>
                                <td style="text-align: end">
                                    <div>
                                        <button class="btn btn-sm btn-light-primary fw-bold m-1" data-kt-drawer-show="true"
                                            data-kt-drawer-target="#kt_drawer_chat{{ $message->user()->first()->id }}"><i
                                                class="bi bi-chat-right-dots-fill fs-2 p-0">
                                            </i>


                                            <span class="sr-only">unread messages</span>
                                            <a href="https://wa.me/{{ $message->user()->first()->phone }}" target="blank">
                                                <button class="btn btn-sm btn-light-success fw-bold m-1">
                                                    <i class="bi bi-whatsapp fs-2 p-0"></i>
                                            </a>

                                            {{-- <a href="tel:{{ $user->phone }}"> <button class="btn btn-sm btn-light-warning fw-bold m-1">
                                        <i class="bi bi-headset fs-2 p-0"></i>
                                </a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
@endsection

@section('custom-js')
    @include('admin.components.dashboard.scripts')
@endsection
