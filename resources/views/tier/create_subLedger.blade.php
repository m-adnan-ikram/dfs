@extends('layout.app')

@section('content')
@include('layout.sidebar')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Add New Sub Ledger</h4>
                            <a href="{{ route('tier.sub_ledger') }}" class="btn btn-primary rounded">All Sub Ledger</a>
                        </div>
                    </div>
                    

                    <form class="row p-4" action="{{ route('store.sub_ledger') }}" method="POST">
                        @csrf
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tier1Select">Tier1</label>
                                <select class="form-control" name="tier1" id="tier1Select">
                                    <option selected readonly required>Select Tier1</option>
                                    @if ($tier1)
                                    @foreach ($tier1 as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    @else
                                    <option value="{{ $item->id }}">Not Found</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tier2Select">Tier2</label>
                                <select class="form-control" name="tier2" id="tier2Select">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Sub Ledger Name" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</div>
</section>
</div>



@include('layout.footer')


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        // Bind change event to Tier1 select element
        $('#tier1Select').change(function() {
            var selectedTier1Id = $(this).val();

            $.ajax({
                url: `http://localhost/php/dfs-web/public/getTier2Options/` + selectedTier1Id
                , type: 'GET'
                , success: function(data) {
                    $('#tier2Select').append('<option selected readonly value="">Select Tier2</option>');

                    $.each(data, function(index, item) {
                        $('#tier2Select').append('<option value="' + item.id + '">' + item.name + '</option>');
                    });
                }
                , error: function(xhr, status, error) {
                    console.error('Error fetching Tier2 options: ' + error);
                }
            });
        });
    });

</script>


@endsection
