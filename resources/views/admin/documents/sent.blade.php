@extends('dashboards.index')
@section('content')
    <!-- Button Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
               
            </div>
        </div>
    </div>
    <!-- Button End -->

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Outgoing Mails</h6>
                <div>
                    <a class="btn btn-sm btn-primary" href="{{ route('document.create') }}">Add Document</a>
                    <a class="btn btn-sm btn-primary" href="{{ url()->previous() }}"><i class="fa fa-arrow-left me-2"></i>Back</a>
                </div>

            </div>
            <div class="table-responsive">
                <table id="visitLogsTable" class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col" >#</th>
                            <th scope="col" >Document No</th>
                            <th scope="col" >Subject</th>
                            <th scope="col">Sent To</th>
                            {{-- <th scope="col" style="width: 16.66%;">Comment</th> --}}
                            <th scope="col" >Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sent_documents as $key => $sent)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><a href="{{ route('document.view', $sent) }}">
                                    {{ $sent->document->docuent_number }}
                                </a>
                            </td>
                                <td>{{$sent->document->title}}</td>
                                <td>
                                    {{$sent->recipient_details[0]->userDetail->designation}}, <br>
                                    @if ($sent->recipient_details[0]->userDetail->tenant->name)
                                         <span>{{$sent->recipient_details[0]->userDetail->tenant->name}}</span>
                                    @endif
                                </td>
                                <td>{{$sent->document->updated_at->format('M j, Y g:i A')}}</td>
                                {{-- <td>
                                    <a href="{{route('document.view_sent', $sent)}}" class="nav-item">View</a>
                                </td> --}}
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td></td>
                                <td>No Data Found</td>
                                <td>No Data Found</td>
                                <td>No Data Found</td>
                                <td>No Data Found</td>
                                </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            @if($sent_documents->count() > 0)
            <div class="mt-3">
                {{$sent_documents->links('pagination::bootstrap-5')}}
            </div>
            @endif
        </div>
    </div>
    <!-- Table End -->
@endsection