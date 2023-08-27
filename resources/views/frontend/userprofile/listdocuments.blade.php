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
<div class="container path">
    <p><a href="">Home</a> > Documents Section</p>
</div>
<!---Path-->
<!---User Container-->
<div class="container profile-inline">
    @include('frontend.userprofile.include.sidebar')
    <div class="profile-containers">
        <div class="title-profile">
            <h2>List of Documents</h2>
        </div>
        <div class="profile-information">
            <form method="GET" action="{{url('/listuserdocuments')}}">
                @csrf
                <div style="width:200%;" class="profile-container">
                    <div class="profile-label">
                        <label for="">File Name:</label>
                    </div>
                    <input  type="text" name="original_name" placeholder="File Name">
                </div>
                <div class="profile-container">
                    <div class="profile-label">
                        <label for="">Date Between:</label>
                    </div>
                    <div class="date">
                        <input id="todayDate" type="date">&nbsp;&nbsp;&nbsp;
                        <input id="todayDate1" type="date">
                    </div>
                </div>


                <!-- <div class="profile-container">
                    <div class="profile-label">
                        <label for="">Show :</label>
                    </div>
                    <select class="show-record">
                        <option value="0">Show Records Of :</option>
                        <option value="1">10 Records</option>
                        <option value="2">20 Records</option>
                        <option value="3">40 Records</option>
                        <option value="4">All Records</option>
                    </select>
                </div> -->

                <div class="button-update">
                    <button class="profile-button">Search</button>
                </div>
            </form>
            <div class="records-table-show" style="width: 100%;">


                <div class="overflow-tables" style="width: 100%!important; overflow-x:auto!important;">
                    <table id="tables" style="width: 1600px;">
                        <tbody>
                            <tr>
                                <th>s no.</th>
                                <th>Document Name</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            @foreach($list as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    <table class="inside-td-data" style="border-collapse: collapse;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{$item->original_name}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="inside-td-data" style="border-collapse: collapse;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{$item->mime_type}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                                <td><a href="{{ url('/download', ['id' => $item->id]) }}"><button
                                            class="edit">Download</button></a><button class="delete">Delete</button>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    <a href="#">«</a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">»</a>
                </div>
            </div>

        </div>

    </div>
</div>
<script>
setTodayDate();

function setTodayDate() {
    var today = new Date();
    var day = String(today.getDate()).padStart(2, '0');
    var month = String(today.getMonth() + 1).padStart(2, '0');
    var year = today.getFullYear();
    var formattedDate = year + '-' + month + '-' + day;
    document.getElementById('todayDate').value = formattedDate;
    document.getElementById('todayDate1').value = formattedDate;
}
</script>
@include('frontend.include.footer')