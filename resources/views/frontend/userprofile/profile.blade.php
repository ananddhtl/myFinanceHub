@include('frontend.include.header')
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
<div class="container path">
    <p><a href="">Home</a> > Update User Profile</p>
</div>
<!---Path-->
<!---User Container-->
<div class="container profile-inline">
    @include('frontend.userprofile.include.sidebar')
    <div class="profile-containers">
        <div class="title-profile">
            <h2>Update User Profile</h2>
        </div>
        <form action="{{ url('updateBasicInformation', ['id' => $user->id]) }}" method="POST">
            @csrf
            <div class="profile-information">
                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">Your Name:</label>
                    </div>
                    <input type="text" name="fullname" value="{{$user->fullname}}" placeholder="Enter Name">
                </div>
                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">Email Address:</label>
                    </div>
                    <input type="email" name="email" value="{{$user->email}}" placeholder="Your Email Address">
                </div>
                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">Phone No:</label>
                    </div>
                    <input type="text" name="mobile_number" value="{{$user->mobile_number}}"
                        placeholder="Your Email Address">
                </div>
                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">Address :</label>
                    </div>
                    <input type="text" name="address" value="{{$user->address}}" placeholder="Your Email Address">
                </div>

                <div class="button-update">
                    <button type="submit" class="profile-button">Update</button>
                </div>

            </div>
        </form>

    </div>
</div>
@include('frontend.include.footer')