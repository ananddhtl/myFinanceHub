@include('frontend.adminprofile.include.header')

<body>
    <!--Modal Align Tasks-->

    <!--Modal Align Tasks-->

    <div class="admin-container">

        @include('frontend.adminprofile.include.sidebar')
        <section class="main">
            <div class="main-top">
                <h1>List User Documents <i class="fa-solid fa-user-plus"></i></h1>

            </div>
            <div class="dashboard-container">
                <div class="search-inputs">
                    <div class="profile-container search-container">
                        <div class="profile-label">
                            <label for="">Search:</label>
                        </div>
                        <input type="text" placeholder="Search Through Name...">
                    </div>
                    <div class="profile-container date-container">
                        <div class="profile-label">
                            <label for="">Date:</label>
                        </div>
                        <div class="date">
                            <input type="date">
                            <p style="padding-top: 15px;">To</p>
                            <input type="date">
                        </div>
                    </div>
                </div>
                <div class="search-button" style="border-bottom: 1px solid var(--color5); padding-bottom: 10px;">
                    <button class="profile-button">Search</button>
                </div>
                <div class="table-profile" style="padding: 0px; margin-top: 10px;">
                    <table id="tables">
                        <tbody>
                            <tr class="table-heading-dashboard ">
                                <th> Date</th>
                                <th>Client Name</th>
                                <th>Address</th>
                                <th>File Name</th>
                                <th>File Type</th>
                                <th>Action</th>
                            </tr>
                            @foreach($list as $item)
                            <tr>
                                <td>2024 - 01 - 04</td>
                                <td>{{$item->fullname}}</td>
                                <td>{{$item->address}}</td>
                                <td> {{$item->original_name}}</td>
                                <td>{{$item->mime_type}} </td>
                                <td>
                                    <a href="{{ url('/download', ['id' => $item->id]) }}"><button class="accepted-user" style="width: 100%;">Downlaod</button></a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </div>
</body>
<script>
$(document).ready(function() {
    $('.admin-dashboard-nav ul').on('click', 'li.parent', function(event) {
        event.stopPropagation();
        // $(this).find('.fa-chevron-down').toggleClass('rotate-180');
        $(this).find('.drop-down-items').toggleClass('show');
    });

    $(document).click(function() {
        $('.admin-dashboard-nav ul li.parent .fa-chevron-down').removeClass('rotate-180');
        $('.admin-dashboard-nav ul li.parent .drop-down-items').removeClass('show');
    });
});

let currentValue = 0;
const minValue = 0;

function updateInputField() {
    const inputField = document.getElementById("numberInput");
    inputField.value = currentValue;
}

function incrementValue() {
    currentValue++;
    updateInputField();
}

function decrementValue() {
    if (currentValue > minValue) {
        currentValue--;
        updateInputField();
    }
}
</script>

<script>
/*Align Tasks Modal Script*/
const aligntaskModalBtn = document.getElementById('aligntaskModalBtn');
const aligntaskModal = document.getElementById('aligntask-modal');
const aligntaskCloseModal = document.querySelector('.aligntask-close');

aligntaskModalBtn.addEventListener('click', () => {
    aligntaskModal.style.display = 'block';
});

aligntaskCloseModal.addEventListener('click', () => {
    aligntaskModal.style.display = 'none';
});
</script>
<script>
const checkboxes = document.querySelectorAll('.hidden-checkbox');

checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('click', function() {
        checkboxes.forEach(function(otherCheckbox) {
            if (otherCheckbox !== checkbox) {
                otherCheckbox.checked = false;
            }
        });
    });
});
</script>

</html>