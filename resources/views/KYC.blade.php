@extends('layouts.app', ['titlePage' => __('KYC')])
@section('content-body')
<h1>Upload document</h1><hr>
    <ol>
      <li>Scan the required documents</li>
      <li>Select the type of document that you are submitting.</li>
      <li>Upload the file for the chosen document.</li>
      <li><b>Warning:Submitting fake or altered documents will result in account suspension.</b></li>
    </ol>
    <p class="text-danger">Please note that file must be submitted in the format JPG,JPEG,PNG,BMP,GIF OR PDF, and the file size is limited to 2.5 MB.</p>

  <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
  <li class="nav-item">
  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#identity-proof" role="tab" aria-controls="home">Proof of Identity</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#address-proof" role="tab" aria-controls="profile">Proof of Address</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tax-proof" role="tab" aria-controls="profile">Tax id Proof</a>
  </li>
  </ul>

  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="identity-proof" role="tabpanel" aria-labelledby="home-tab">
    <h3 class="mt-2">Proof of Identity</h3>
    <p>In accordance with the industry standards and anti-money laundering regulations, OnlineSenosr requires all clients to provide their Personal information that must be confirmed by the supporting documents you send us.</p>
    <ul>
      <li>The document must be government issued.</li>
      <li>The name and date of birth must match with the information on your onlinesensor.com account.</li>
      <li>The expiry date must be displayed and the card cannot be expired.</li>
      <li>Tax documents or students IDs are not allowed</li>
    </ul>
    <p class="text-danger">Please select the type of photo ID that you are submitting.</p>
    <form method="" action="">
    <label class="pr-2"><input type="radio" name="proof" value=""> Driving License</label>
    <label class="pr-2"><input type="radio" name="proof" value=""> Passport</label>
    <label><input type="radio" name="proof" value=""> National Id</label>
    <div class="mt-2 mb-2">
      <input type="file" name="" class="form-control"/>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>

  <div class="tab-pane fade" id="address-proof" role="tabpanel" aria-labelledby="profile-tab">
  <h3 class="mt-2">Proof of Address</h3>
    <p>In accordance with the industry standards and anti-money laundering regulations, OnlineSenosr requires all clients to provide their Personal information that must be confirmed by the supporting documents you send us.</p>
    <ul>
      <li>Documents provided must be dated within 6 months of the uploaded date.</li>
      <li>Provide a re-occurring bill or statement(eg.monthly) and not a'one time' bill or statement</li>
      <li>Please Make sure your name and address on the document matches the one we have on file</li>
    </ul>
    <p class="text-danger">Please select the type of photo ID that you are submitting.</p>
    <form method="" action="">
    <label class="pr-2"><input type="radio" name="proof" value=""> Bank Statement</label>
    <label class="pr-2"><input type="radio" name="proof" value=""> Credit Card Statement</label>
    <label class="pr-2"><input type="radio" name="proof" value=""> Utility Bill</label>
    <label class="pr-2"><input type="radio" name="proof" value=""> Phone Bill</label>
    <div class="mt-2 mb-2">
      <input type="file" name="" class="form-control"/>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>

  <div class="tab-pane fade" id="tax-proof" role="tabpanel" aria-labelledby="contact-tab">
  <h3 class="mt-2">Tax ID Proof</h3>
    <p>In accordance with the industry standards and anti-money laundering regulations, OnlineSenosr requires all clients to provide their Personal information that must be confirmed by the supporting documents you send us.</p>
    <ul>
      <li>PAN Card applicable for Indians and Tax Identification Number for other country residents</li>
    </ul>
    <form method="" action="">
    <div class="mt-2 mb-2">
      <input type="file" name="" class="form-control"/>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
  </div>
@stop