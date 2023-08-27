@include('frontend.include.header')
<div class="container path">
    <p><a href="">Home</a> > User Profile</p>
</div>
<!---Path-->
<div class="mobile-nav-toggle-button container">
    <i class="fa-solid fa-bars" id="menu-icon"></i>

</div>
<!---User Container-->
<div class="container profile-inline">
    @include('frontend.userprofile.include.sidebar')
    <div class="profile-containers">
        <div class="title-profile">
            <h2>Dashboard</h2>
        </div>
        <div class="dasboard-section">
            <div class="das-sec">
                <div class="img-das">
                    <img src="{{asset('frontend/resources/images/dashboard/list-items.png')}}" alt="">
                </div>
                <div class="das-desc">
                    <p>Lorem  </p>
                    <p class="numberic" id="productsCount"> <span>4</span> Items</p>
                </div>
            </div>
            <div class="das-sec">
                <div class="img-das">
                    <img src="{{asset('frontend/resources/images/dashboard/dollar.png')}}" alt="">
                </div>
                <div class="das-desc">
                    <p>Lorem</p>
                    <p class="numberic" id="amountCount"> Rs. <span>4,000</span></p>
                </div>
            </div>
            <div class="das-sec">
                <div class="img-das">
                    <img src="{{asset('frontend/resources/images/dashboard/returned.png')}}" alt="">
                </div>
                <div class="das-desc">
                    <p>Lorem</p>
                    <p class="numberic" id="returnedid"> <span>4</span> Items</p>
                </div>
            </div>
        </div>
        <div class="table-profile small-whole-table-overflow">
            <table id="tables" class="table-small-overflow">
                <tr>
                    <th>Lorem Date</th>
                    <th>Lorem</th>
                    <th>Lorem</th>
                    <th>Lorem</th>
                </tr>
                <tr>
                    <td>2024 - 01 - 04</td>
                    <td>Maria Anders</td>
                    <td>Oxygen </td>
                    <td>1ltr</td>
                </tr>
                <tr>
                    <td>2024 - 01 - 04</td>
                    <td>Christina Berglund</td>
                    <td>Sweden</td>
                    <td>1ltr</td>
                </tr>
                <tr>
                    <td>2024 - 01 - 04</td>
                    <td>Francisco Chang</td>
                    <td>Mexico</td>
                    <td>1ltr</td>
                </tr>

            </table>
        </div>

    </div>
</div>
@include('frontend.include.footer')