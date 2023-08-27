@include('frontend.include.header')

<div class="background">
    <div class="container">
        <div class="banner-image-container">
            <div class="banner-description" data-aos="fade-right" data-aos-duration="700">
                <h1>Your Gateway <br><span>To </span><br>Financial Control</h1>
                <p>Our client portal serves as your gateway to complete financial control. Take charge of your financial
                    data, update your profile, and securely upload documents with unparalleled ease.</p>

            </div>

            <div class="banner-image" data-aos="fade-left" data-aos-duration="700">
                <img src="{{asset('frontend/resources/images/banner.png')}}" alt="">
            </div>
        </div>

    </div>
</div>
<!---Banner Ends Here-->

<!---How To Register Starts Here-->
<div class="whole-background">

    <div class="container contain-background">
        <h1 data-aos="fade-down" data-aos-duration="700">Steps For Conversion </h1>
        <div class="steps-containers">
            <div class="stp-container" data-aos="fade-down" data-aos-duration="900">
                <h3>Step 1: Secure Registration</h3>
                <p>Create your account in minutes. Provide basic information to set up your profile and gain access to
                    your personalized client portal.</p>
            </div>
            <div class="stp-container m-10" data-aos="fade-down" data-aos-duration="1400">
                <h3>Step 2: Personalize Your Profile</h3>
                <p>Tailor your profile to reflect your financial identity. Update contact details, preferences, and
                    communication settings according to your convenience.</p>
            </div>
            <div class="stp-container m-20" data-aos="fade-down" data-aos-duration="1900">
                <h3>Step 3: Effortless Document Upload</h3>
                <p>Upload important documents securely to our portal. Whether it's tax records, sales data, or
                    confidential files, our platform ensures your data remains private and accessible only to you.</p>
            </div>
            <div class="stp-container m-30" data-aos="fade-down" data-aos-duration="2400">
                <h3>Step 4: Insights and Management</h3>
                <p>Access real-time financial insights and manage your information effortlessly. Monitor your financial
                    progress, make informed decisions, and collaborate seamlessly with our integrated tools.</p>
            </div>
        </div>
    </div>
</div>


<!---Our Services Ends Here-->

<!--Service hrs-->
<div class="background1">
    <div class="container">
        <div class="banner-image-container">
            <div class="banner-description" style="margin-top: 30px;" data-aos="fade-right" data-aos-duration="800">
                <h1><span> 24/7 <br> Support</span></h1>
                <p>We are in support 24 hrs a day, every day of the week ,including holidays.</p>
                <div class="login-button">
                    <button class="log-button">Contact Us</button>
                </div>
            </div>

            <div class="banner-image" data-aos="fade-left" data-aos-duration="800">
                <img src="{{asset('frontend/resources/images/24hours.png') }}" alt="" style="top:20px; right:20px ;">
            </div>
        </div>

    </div>
</div>


<div class="dotted-bg-background">
    <div class="dotted-background">
    </div>
    <div class="container our-services">
        <h1>Services we provide</h1>
        <div class="services-containers">
            <div class="serv-container" data-aos="fade-up" data-aos-duration="800">
                <div class="serv-images">
                    <img src="{{asset('frontend/resources/images/services.png') }}" alt="" style="height: 90px;">
                </div>
                <h3>Client Portal Access</h3>
                <p>Empower your clients with secure and convenient access to their personalized portal. Our
                    user-friendly platform ensures that each client has a unique login, enabling them to update their
                    profiles, manage contact details, and stay informed about their financial information at their
                    convenience.</p>
            </div>
            <div class="serv-container" data-aos="fade-up" data-aos-duration="900">
                <div class="serv-images">
                    <img src="{{asset('frontend/resources/images/services.png') }}" alt="" style="height: 90px;">
                </div>
                <h3>Confidential Document Upload</h3>
                <p>Our state-of-the-art system allows clients to securely upload confidential documents related to
                    taxes, sales, and financial matters. With advanced encryption and access controls, you can trust
                    that your sensitive information remains protected throughout the uploading process.</p>
            </div>
            <div class="serv-container" data-aos="fade-up" data-aos-duration="1000">
                <div class="serv-images">
                    <img src="{{asset('frontend/resources/images/services.png') }}" alt="" style="height: 90px;">
                </div>
                <h3>Data Privacy</h3>
                <p>We take your data privacy seriously. Our robust security measures include HTTPS encryption, secure
                    authentication, and role-based access control. Your information is stored in isolated environments,
                    ensuring that your data remains confidential and accessible only by authorized personnel.</p>
            </div>
            <div class="serv-container" data-aos="fade-up" data-aos-duration="1100">
                <div class="serv-images">
                    <img src="{{asset('frontend/resources/images/services.png') }}" alt="" style="height: 90px;">
                </div>
                <h3> Admin Oversight</h3>
                <p>Our platform provides administrators with a comprehensive dashboard to oversee all client accounts.
                    Admins can efficiently manage client information, monitor updates, and ensure compliance. However,
                    rest assured that your confidential data remains private and inaccessible to administrators.</p>
            </div>
            <div class="serv-container" data-aos="fade-up" data-aos-duration="1200">
                <div class="serv-images">
                    <img src="{{asset('frontend/resources/images/services.png') }}" alt="" style="height: 90px;">
                </div>
                <h3>Document Management</h3>
                <p>Our document management system simplifies the process of organizing and accessing your important
                    files. Easily keep track of document versions, retrieve historical data, and collaborate seamlessly
                    with your team. Our platform streamlines your document management workflow, saving you time and
                    effort.

                </p>
            </div>
            <div class="serv-container" data-aos="fade-up" data-aos-duration="1300">
                <div class="serv-images">
                    <img src="{{asset('frontend/resources/images/services.png') }}" alt="" style="height: 90px;">
                </div>
                <h3>Exceptional Support</h3>
                <p>We're dedicated to providing top-notch support. Whether you're a client looking to navigate the portal or an administrator with questions, our responsive support team is here to assist you. We're committed to ensuring that your experience with our platform is smooth and hassle-free.</p>
            </div>
        </div>
    </div>

</div>
@include('frontend.include.footer')