<?php
if (session()->has('sessionUserId')) {
    $userId = session()->get('sessionUserId');
    $user = \DB::table('clients')
        ->select('*')
        ->where('id', $userId)
        
      
        ->first();
}
?>
<div class="nav-info">

    <div class="profie-pic-info-1" style="border-bottom: 1px solid var(--color5);">
        <div class="profile-pic">
            <img src="{{asset('frontend/resources/images/user-profile.png')}}" alt="">
        </div>
        @if(session()->get('sessionUserId') != "")
        <div class="information">
            <p>{{ @$user->fullname }}</p>

        </div>
        @else
        <?php
        // Redirect to the login page
        header('Location: /');
        exit();
        ?>
        @endif
    </div>

    <div class="nav-links">
        <ul>
            <a href="/userdashboard">
                <li>Dashboard</li>
            </a>
            <a href="/userprofile">
                <li>Update User Details</li>
            </a>
            <a href="/updateprofile">
                <li>Update Profile</li>
            </a>
            <a href="/userdocuments">
                <li> Store Documents </li>
            </a>
            <a href="/listuserdocuments">
                <li> List Documents </li>
            </a>

        </ul>
    </div>
</div>