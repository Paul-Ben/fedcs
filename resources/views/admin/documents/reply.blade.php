@extends('dashboards.index')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Send Document</h6>
                @if (session('errors'))
                    <span class="alert alert-danger" role="alert">{{ $errors->all() }}</span>
                @endif
                <div>
                    <a class="btn btn-sm btn-primary" href="{{ route('document.create') }}">Add Document</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('dashboard') }}"><i
                            class="fa fa-arrow-left me-2"></i>Back</a>
                </div>

            </div>
            <div class="container">
                <h1></h1>
                <form action="{{ route('document.senddoc', $document) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="recipient_email">Recipient Email</label>
                        <select class="form-control" name="recipient_id[]" id="recipients"required>
                            <option value=" ">Select recipients</option>
                            @foreach ($recipients as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" hidden>
                        <label for="subject">Subject</label>
                        <input type="text" value="{{ $document->id }}" class="form-control" id="subject"
                            name="document_id" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Send</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#recipients').select2({
                placeholder: "Select recipients",
                allowClear: true
            });
        });
    </script>
@endsection
