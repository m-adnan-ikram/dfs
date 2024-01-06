 
@extends('layout.app')

@section('content')
@include('layout.sidebar')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>All Sub Ledger</h4>
                            <a href="{{ route('create.sub_ledger') }}" class="btn rounded text-white" style="background-color: #6777EF !important;">Add New</a>
                        </div>

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Tier1</th>
                                <th scope="col">Tier2</th>
                              </tr>
                            </thead>
                            <tbody>
                               
                                 @foreach ($data as $item)
                                 <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->account->name }}</td>
                                    <td>{{ $item->account_child->name }}</td>
                                </tr>
                                 @endforeach
                               
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@include('layout.footer')
@endsection