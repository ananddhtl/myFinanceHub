@include('frontend.include.header')
<div class="container" style="display: flex; justify-content: center; margin-top: 20px;margin-bottom: 20px;">


    <div class="login-input forget-password">
        <h2>OTP Code</h2>
        <p class="change-para">Please check your mail for the OTP Code</p>
        <form action="{{url('addOTPCode')}}" method="POST">
            @csrf
            <div class="inp-cont">
                <div class="label-container">
                    <label for="">Enter OTP Code :</label>
                </div>
                <div class="otp-container">

                    <input type="text" placeholder="*" id="0" name="otp_code_1" maxlength="1" class="otp">
                    <input type="text" placeholder="*" id="1" name="otp_code_2" maxlength="1" class="otp">
                    <input type="text" placeholder="*" id="2" name="otp_code_3" maxlength="1" class="otp">
                    <input type="text" placeholder="*" id="3" name="otp_code_4" maxlength="1" class="otp">

                </div>
            </div>
            <button type="submit" class="modal-button">Next <i class="fa-solid fa-arrow-right"></i></button>
        </form>
    </div>

</div>
@include('frontend.include.footer')