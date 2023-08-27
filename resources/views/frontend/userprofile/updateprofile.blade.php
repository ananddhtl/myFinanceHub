<?php
if (session()->has('sessionUserId')) {
    $userId = session()->get('sessionUserId');
    $user = \DB::table('clients')
        ->select('*')
        ->where('id', $userId)
        
        
        ->first();
}
?>

@include('frontend.include.header')
@if(session('message'))
<div class="sweetmessage">

    <p>{{ session('message') }}</p>
</div>
@endif
<div class="container path">
    <p><a href="">Home</a> > Update Password</p>
</div>
<!---Path-->
<!---User Container-->
<div class="container profile-inline">
    @include('frontend.userprofile.include.sidebar')
    <div class="profile-containers">
        <div class="title-profile">
            <h2>Update Password</h2>
        </div>
        <form action="{{url('changeUserDashboardPassword/'  . $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="profile-information">

                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">Current Password:</label>
                    </div>
                    <input type="password" value="{{$user->password}}" name="currentpassword" placeholder="***********">
                </div>
                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">New Password:</label>
                    </div>
                    <input type="password" name="newpassword" placeholder="***********">
                </div>
                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">Confirm New Password:</label>
                    </div>
                    <input type="password" name="confirmnewpassword" placeholder="***********">
                </div>

                <div class="profile-container" style="width: 100%;">
                    <div class="profile-label">
                        <label for="">Update Profile Picture:</label>
                    </div>
                    <input type="file" name="service_image" style="border: transparent; margin-left: -10px; cursor: pointer;">
                </div>
                <div class="profile-img">
                    <img src="{{asset('frontend/resources/images/profile.jpeg')}}" alt="">
                </div>
                <div class="button-update">
                    <button class="profile-button">Update</button>
                </div>

            </div>
        </form>

    </div>
</div>
@include('frontend.include.footer')