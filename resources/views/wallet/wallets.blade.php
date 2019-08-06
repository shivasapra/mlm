@extends('layouts.app', ['titlePage' => __('Wallets')])
@section('content-body')
<h1>Wallets</h1><hr>

<ul class="nav nav-tabs tabs-design" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#activation" role="tab" aria-controls="home">Activation Wallet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#transfer" role="tab" aria-controls="profile">Transfer Wallet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#withdrawal" role="tab" aria-controls="contact">Withdrawal Wallet</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="activation" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
        </div>
    </div>

    <div class="tab-pane fade show active" id="transfer" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
        </div>
    </div>

    <div class="tab-pane fade show active" id="withdrawal" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
        </div>
    </div>
</div>
@stop
