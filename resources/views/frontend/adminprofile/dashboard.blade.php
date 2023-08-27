@include('frontend.adminprofile.include.header')

<body>
    <!--Modal Align Tasks-->

    <!--Modal Align Tasks-->

    <div class="admin-container">

        @include('frontend.adminprofile.include.sidebar')
        <section class="main">
            <div class="main-top">
                <h1>Dashboard <i class="fas fa-tasks" style="margin-left: 5px;"></i></h1>

            </div>
            <div class="dashboard-container">
                <div class="dasboard-section">
                    <div class="das-sec">
                        <div class="img-das">
                            <img src="{{asset('frontend/resources/images/dashboard/list-items.png')}}" alt="">
                        </div>
                        <div class="das-desc">
                            <p>Total Products Purchased</p>
                            <p class="numberic" id="productsCount"> <span>4</span> Items</p>
                        </div>
                    </div>
                    <div class="das-sec">
                        <div class="img-das">
                            <img src="{{asset('frontend/resources/images/dashboard/dollar.png')}}" alt="">
                        </div>
                        <div class="das-desc">
                            <p>Total Amount Purchased</p>
                            <p class="numberic" id="amountCount"> Rs. <span>4,000</span></p>
                        </div>
                    </div>
                    <div class="das-sec">
                        <div class="img-das">
                            <img src="{{asset('frontend/resources/images/dashboard/returned.png')}}" alt="">
                        </div>
                        <div class="das-desc">
                            <p>Product Returned</p>
                            <p class="numberic" id="returnedid"> <span>4</span> Items</p>
                        </div>
                    </div>
                </div>
                <div class="table-profile small-whole-table-overflow">
                    <table id="tables" class="table-small-overflow">
                        <tr>
                            <th>Purchase Date</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>Quantity</th>
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