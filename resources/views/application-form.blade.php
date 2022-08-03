<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dialect B2B Application Form</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
               <h3  class="text-center">Dialect B2B Application Form</h3>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <h6 class="mb-3">Company Information</h6>
                    </div>
                    <div class="col-sm-3">
                        <div><strong>Company Name : </strong>{{ $data['company']->name }}</div>
                    </div>   
                    <div class="col-sm-3"> 
                        <div><strong>Address : </strong> {{ $data['company']->address }}</div>
                    </div>   
                    <div class="col-sm-3">
                        <div><strong>Zone : </strong> {{ $data['company']->zone }}</div>
                    </div>   
                    <div class="col-sm-3">
                        <div><strong>Street : </strong>{{ $data['company']->street }}</div>
                    </div>   
                    <div class="col-sm-3">    
                        <div><strong>Building : </strong> {{ $data['company']->building }}</div>
                    </div>   
                    <div class="col-sm-3">
                        <div><strong>Unit : </strong> {{ $data['company']->unit }}</div>
                    </div>   
                    <div class="col-sm-3">  
                        <div><strong>PO Box : </strong> {{ $data['company']->pobox }}</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <h6 class="mb-3">Conatct Information</h6>
                    </div>
                    <div class="col-sm-3">
                        <div><strong>Email :</strong> {{ $data['company']->email }}</div>
                    </div>
                    <div class="col-sm-3">    
                        <div><strong>Mobile :</strong> {{ $data['company']->phone }}</div>
                    </div>
                    <div class="col-sm-3">
                        <div><strong>Fax :</strong> {{ $data['company']->fax }}</div>
                    </div>
                    <div class="col-sm-3">    
                        <div><strong>Website :</strong> {{ $data['company']->domain }}</div>
                    </div>
                </div>   
                
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <h6 class="mb-3">Document</h6>
                    </div>
                    <div class="col-sm-3">
                        <div><strong>Document  :</strong> {{ $data['document']->document->name }}</div>
                    </div>
                    <div class="col-sm-3">    
                        <div> <strong>Document No. :</strong>{{ $data['document']->doc_number }} </div>
                    </div>
                    <div class="col-sm-3">
                        <div><strong>Expiry Date  :</strong>{{ $data['document']->expiry_date!='' ?  Carbon\Carbon::parse($data['document']->expiry_date)->format('d-m-Y') : '' }}</div>
                    </div>
                </div>   

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Landline / <br> Extension</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['users'] as $user)
                            <tr>
                                <th class="center">{{ $user->designation }}</th>
                                <td class="left strong">{{ $user->name }}</td>
                                <td class="left">{{ $user->role }}</td>
                                <td class="right">{{ $user->email }}</td>
                                <td class="center">{{ $user->mobile }}</td>
                                <td class="right">{{ $user->mobile }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="6" class="text-center">Declaration</th>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>We {{ $data['company']->name }}, hereby submit that we are operating in Qatar under 
                                          {{ $data['document']->document->name }} No. {{ $data['document']->doc_number }}</p>
                                          <p>We hereby undertake to confirm that the information provided in this
                                               application is correct and up-to-date.</p>
                                          <strong>For {{ $data['company']->name }}</strong>

                                          <p>Authorised Signatory</p>
                                          <p>Name :</p>
                                          <p>Designation :</p>
                                          <p>Company Seal :</p>           
                                </td>
                            </tr>
                        </thead>
                    </table>    
                </div>
                
  
            </div>
        </div>
    </div>
</body>
</html>