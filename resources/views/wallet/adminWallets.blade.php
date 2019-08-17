@extends('layouts.app', ['titlePage' => __('Wallets')])
@section('content-body')
    <h1>Wallets</h1><hr>
    <ul class="nav nav-tabs tabs-design" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#administration_charges" role="tab" aria-controls="home">Administration Charges Wallet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#facilitation" role="tab" aria-controls="profile">Facilitation Wallet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contribution" role="tab" aria-controls="contact">Contribution Wallet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#epin" role="tab" aria-controls="contact">Epin Wallet</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="administration_charges" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>INR</h2>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>

        <div class="tab-pane fade show" id="facilitation" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>INR</h2>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>

        <div class="tab-pane fade show" id="contribution" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>INR</h2>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>

        <div class="tab-pane fade show" id="epin" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>INR</h2>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection