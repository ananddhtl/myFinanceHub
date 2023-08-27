@include('frontend.include.header')
@php
$documentscategory = DB::table('document_categories')->select('*')->get();
@endphp
<?php
if (session()->has('sessionUserId')) {
    $userId = session()->get('sessionUserId');
    $user = \DB::table('clients')
        ->select('*')
        ->where('id', $userId)
        ->first();
}
?>
@if(session('message'))
<div class="sweetmessage">
    <p>{{ session('message') }}</p>
</div>
@endif
@if ($errors->any())
<div class="sweetmessage">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif
<div class="container path">
    <p><a href="">Home</a> > Documents Section</p>
</div>
<!---Path-->
<!---User Container-->
<div class="container profile-inline">
    @include('frontend.userprofile.include.sidebar')
    <div class="profile-containers">
        <div class="title-profile">
            <h2>Store Documents</h2>
        </div>
        <form action="{{url('/storeDocuments')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="profile-information">

                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">Document Category</label>

                    </div>
                    <input type="hidden" value="{{$user->id}}" name="client_id">
                    <select name="category_name">

                        @foreach($documentscategory as $item)

                        <option value="{{ $item->name }}">{{ $item->name }}</option>

                        @endforeach
                        <option value="other">Other</option>
                    </select>

                </div>
                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">File Name:</label>
                    </div>
                    <input type="text" name="filename" placeholder="Enter File Name">
                </div>
                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">Choose File:</label>
                        <h1 style="font-size:11px;"> Only PDF, DOCX,DOC, XLS, XLSX, JPG, JPEG, and PNG files are
                            allowed.</h1>
                    </div>
                    <input type="file" name="file" id="file">
                </div>
                <div class="button-update">
                    <button class="profile-button">Store</button>
                </div>

            </div>
        </form>

    </div>
</div>
@include('frontend.include.footer')