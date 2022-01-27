<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Note Base</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand brand-text" href="{{ url('/') }}">
                    <img style="width: 170px; padding: 5px 5px;" src="{{ asset('img/logo17.svg') }}" alt="Artcomplay" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script> 
</html>

<script>

    function showItems(e, element, blockID){
        e.preventDefault();
        let table = $('.' + blockID + '-t');
        if(table.length == 0){
            $.ajax({
                url: "{{ route('show_elements') }}",
                type: 'GET',
                data: {
                    category_id: blockID,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    let materialName = 'Наименование материала'; let energyName = 'Наименование энергоносителя'; let resursName = 'Наименование ресурса'; let fullName = 'Ф.И.О работника'; let costName = 'Наименование отчисления'; let spendName = 'Наименование расхода';

                    let qMat = 'Количество материала'; let qEn = 'Количество энергоносителя'; let qRes = 'Количество ресурса'; let qWor = 'Затраченное время'; let qSim = 'Количество';

                    let meas = 'Единица измерения'; let eTime = 'Единица времени';

                    let stoi = 'Стоимость'; let pr = 'Цена';

                    let name, quantity, measurement,  price, dataTarget;

                    if(blockID == 'c-1-d'){
                        name = materialName; quantity = qMat; measurement = meas; price = pr; dataTarget = '.cost-materials-edit';
                    }else if(blockID == 'c-2-d'){
                        name = energyName; quantity = qEn; measurement = meas; price = pr; dataTarget = '.cost-energy-edit';
                    }else if(blockID == 'c-3-d'){
                        name = resursName; quantity = qRes; measurement = meas; price = pr; dataTarget = '.cost-depreciation-edit';
                    }else if(blockID == 'c-4-d'){
                        name = fullName; quantity = qWor; measurement = eTime; price = stoi; dataTarget = '.cost-mainworker-edit';
                    }else if(blockID == 'c-5-d'){
                        name = fullName; quantity = qWor; measurement = eTime; price = stoi; dataTarget = '.cost-management-edit';
                    }else if(blockID == 'c-6-d'){
                        name = costName; quantity = qSim; measurement = meas; price = stoi; dataTarget = '.cost-deduction-edit';
                    }else if(blockID == 'c-7-d'){
                        name = spendName; quantity = qSim; measurement = meas; price = stoi; dataTarget = '.cost-sales-edit';
                    }else if(blockID == 'c-8-d'){
                        name = spendName; quantity = qSim; measurement = meas; price = stoi; dataTarget = '.cost-transport-edit';
                    }else if(blockID == 'c-9-d'){
                        name = spendName; quantity = qSim; measurement = meas; price = stoi; dataTarget = '.cost-other-edit';
                    }
                
                    let s = "'"; 
                    $('.' + blockID).append('<table class="table table-sm"><thead><tr><th scope="col">#</th><th scope="col">' + name + '</th><th scope="col">' + quantity + '</th><th scope="col">' + measurement + '</th><th scope="col">' + price + '</th><th scope="col">Действия</th></tr></thead><tbody class="' + blockID + '-t"></tbody></table>');
                    for(let i = 0; i < data.length; i++){
                        $('.' + data[i].category_id + '-t').append('<tr id="' + data[i].id + '-tr"><th scope="row"><input onclick="appendElementTotalTable(this, ' + s + data[i].id + s + ', ' + s + blockID + s + ', ' + data[i].element_price + ');" type="checkbox" id="' + data[i].id + '-ch"></th><td class="td-item">' + data[i].element_name + '</td><td class="td-item" id="' + data[i].id + '-qo">' + data[i].element_quantity + '</td><td class="td-item">' + data[i].element_unit_measurement + '</td><td  class="td-item" id="' + data[i].id + '-price" data="price">' + data[i].element_price + '</td><td class="td-item"><i title="Редактировать элемент" data-target="' + dataTarget + '" onclick="showEditElement(event, this,  ' + data[i].id + ', ' + s + data[i].element_name + s + ', ' + data[i].element_quantity + ', ' + s + data[i].element_unit_measurement + s + ', ' + data[i].element_price + ', ' + s + blockID + s + ')" class="fa fa-pencil-square-o edit-element" aria-hidden="true" data-toggle="modal" data-target=".bd-edit-modal-lg"></i><i title="Удалить элемент" onclick="removeElement(event, this, ' + data[i].id + ')" class="fa fa-times remove-element" aria-hidden="true"></i></td></tr>');
                    }
                }
            })
        }

        var display = $('#' + element.id + '-d').css('display');
        if(display == 'none'){
            $('#' + element.id + '-d').show();
        }else if(display == 'block'){
            $('#' + element.id + '-d').hide();
        }


        
    }

    function addItem(e, element, blockID){
        e.preventDefault();
        var inputBlock = $('#' + blockID + '-f').find('input');
        let elementName = inputBlock[0].value;
        let elementQuantity = inputBlock[1].value;
        let elementUnitMeasurement = inputBlock[2].value;
        let elementPrice = inputBlock[3].value;
        if(blockID == 'c-1-d'){
            dataTarget = '.cost-materials-edit';
        }else if(blockID == 'c-2-d'){
            dataTarget = '.cost-energy-edit';
        }else if(blockID == 'c-3-d'){
            dataTarget = '.cost-depreciation-edit';
        }else if(blockID == 'c-4-d'){
            dataTarget = '.cost-mainworker-edit';
        }else if(blockID == 'c-5-d'){
            dataTarget = '.cost-management-edit';
        }else if(blockID == 'c-6-d'){
            dataTarget = '.cost-deduction-edit';
        }else if(blockID == 'c-7-d'){
            dataTarget = '.cost-sales-edit';
        }else if(blockID == 'c-8-d'){
            dataTarget = '.cost-transport-edit';
        }else if(blockID == 'c-9-d'){
            dataTarget = '.cost-other-edit';
        }
        $.ajax({
            url: "{{ route('create_element') }}",
            type: 'POST',
            data: {
                category_id: blockID,
                element_name: elementName,
                element_quantity: elementQuantity,
                element_unit_measurement: elementUnitMeasurement,
                element_price: elementPrice
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                let s = "'"; 
                $('.' + blockID + '-t').append('<tr id="' + data.id + '-tr"><th scope="row"><input onclick="appendElementTotalTable(this, ' + s + data.id + s + ', ' + s + blockID + s + ', ' + elementPrice + ');" type="checkbox" id="' + data.id + '-ch"></th><td class="td-item">' + data.element_name + '</td><td class="td-item" id="' + data.id + '-qo">' + data.element_quantity + '</td><td class="td-item">' + data.element_unit_measurement + '</td><td  class="td-item" id="' + data.id + '-price" data="price">' + data.element_price + '</td><td class="td-item"><i title="Редактировать элемент" data-target="' + dataTarget + '" onclick="showEditElement(event, this,  ' + data.id + ', ' + s + elementName + s + ', ' + elementQuantity + ', ' + s + elementUnitMeasurement + s + ', ' + elementPrice + ', ' + s + blockID + s + ')" class="fa fa-pencil-square-o edit-element" aria-hidden="true" data-toggle="modal" data-target=".bd-edit-modal-lg"></i><i title="Удалить элемент" onclick="removeElement(event, this, ' + data.id + ')" class="fa fa-times remove-element" aria-hidden="true"></i></td></tr>');
            }
        })
    }

    function appendElementTotalTable(element, elementID, blockID, elementPrice){
        let checkedStatus = $('#' + elementID + '-ch').prop('checked');
        let el = $('#' + elementID + '-tr').find('td').clone();
        let totalElement = $('#' + elementID + '-tr-2');
        if(totalElement.length == 0 && checkedStatus == true){
            $('#' + blockID + '-t-m').after('<tr colspan="5" id="' + elementID + '-tr-2"></tr>');
            for(let i = 0; i < (el.length - 1); i++){
                if(i != 1){
                    $('#' + elementID + '-tr-2').append(el[i]);
                }else if(i == 1){
                    $('#' + elementID + '-tr-2').append('<td class="td-item"><input id="' + elementID + '-qu" onchange="changeQuantity(event, this, ' + elementID + ', ' + el[i].innerText + ');" value="' + el[i].innerText + '" type="number" class="var-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>');
                }
            }
            $('#' + elementID + '-tr-2').append('<td><select id="' + elementID + '-s" onchange="changeSelect(event, this, ' + elementID + ');" class="form-select form-select-sm" aria-label=".form-select-sm example"><option selected>=</option><option value="1">X</option><option value="2">/</option><option value="3">%</option><option value="4">+</option><option value="5">-</option></select></td>');
            $('#' + elementID + '-tr-2').append('<td><input id="' + elementID + '-var" onchange="changeVar(event, this, ' + elementID + ');" type="number" class="var-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>');
            $('#' + elementID + '-tr-2').append('<td class="td-item total-price" id="' + elementID + '-tpr">' + elementPrice + '</td>');
        }else if(totalElement.length > 0 && checkedStatus == false){
            $('#' + elementID + '-tr-2').remove();
        }
        editTotal();
    }


    function removeElement(e, element, elementID){
        e.preventDefault();
        $.ajax({
            url: "{{ route('remove_element') }}",
            type: 'POST',
            data: {
                element_id: elementID
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                $('#' + elementID + '-tr').remove();
                $('#' + elementID + '-tr-2').remove();
            }
        })
        editTotal();
    }

    function showEditElement(e, element, elementID, elementName, elementQuantity, elementMeasurment, elementPrice, blockID){
        e.preventDefault();
        let input = $('#' + blockID + '-e').find('input');
        input[0].value = elementName;
        input[1].value = elementQuantity;
        input[2].value = elementMeasurment;
        input[3].value = elementPrice;
        input[4].value = elementID;
    }

    function editElement(e, element, blockID){
        e.preventDefault();
        var inputBlock = $('#' + blockID + '-e').find('input');
        let elementName = inputBlock[0].value;
        let elementQuantity = inputBlock[1].value;
        let elementUnitMeasurement = inputBlock[2].value;
        let elementPrice = inputBlock[3].value;
        let elementID = inputBlock[4].value;
        if(blockID == 'c-1-d'){
            dataTarget = '.cost-materials-edit';
        }else if(blockID == 'c-2-d'){
            dataTarget = '.cost-energy-edit';
        }else if(blockID == 'c-3-d'){
            dataTarget = '.cost-depreciation-edit';
        }else if(blockID == 'c-4-d'){
            dataTarget = '.cost-mainworker-edit';
        }else if(blockID == 'c-5-d'){
            dataTarget = '.cost-management-edit';
        }else if(blockID == 'c-6-d'){
            dataTarget = '.cost-deduction-edit';
        }else if(blockID == 'c-7-d'){
            dataTarget = '.cost-sales-edit';
        }else if(blockID == 'c-8-d'){
            dataTarget = '.cost-transport-edit';
        }else if(blockID == 'c-9-d'){
            dataTarget = '.cost-other-edit';
        }
        $.ajax({
            url: "{{ route('edit_element') }}",
            type: 'POST',
            data: {
                element_id: elementID,
                element_name: elementName,
                element_quantity: elementQuantity,
                element_unit_measurement: elementUnitMeasurement,
                element_price: elementPrice
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                let s = "'";
                let checkedStatus = $('#' + data.element_id + '-ch').prop('checked');
                
                $('#' + data.element_id + '-tr').replaceWith('<tr id="' + data.element_id + '-tr"><th scope="row"><input onclick="appendElementTotalTable(this, ' + s + data.element_id + s + ', ' + s + blockID + s + ', ' + elementPrice + ');" type="checkbox" id="' + data.element_id + '-ch"></th><td class="td-item">' + data.element_name + '</td><td class="td-item" id="' + elementID + '-qo">' + data.element_quantity + '</td><td class="td-item">' + data.element_unit_measurement + '</td><td  class="td-item" id="' + elementID + '-price" data="price">' + data.element_price + '</td><td class="td-item"><i title="Редактировать элемент" data-target="' + dataTarget + '" onclick="showEditElement(event, this,  ' + data.element_id + ', ' + s + elementName + s + ', ' + elementQuantity + ', ' + s + elementUnitMeasurement + s + ', ' + elementPrice + ', ' + s + blockID + s + ')" class="fa fa-pencil-square-o edit-element" aria-hidden="true" data-toggle="modal" data-target=".bd-edit-modal-lg"></i><i title="Удалить элемент" onclick="removeElement(event, this, ' + data.element_id + ')" class="fa fa-times remove-element" aria-hidden="true"></i></td></tr>');
                let el = $('#' + elementID + '-tr').find('td').clone();
                let totalElement = $('#' + elementID + '-tr-2');
                if(checkedStatus == true){
                    $('#' + data.element_id + '-tr-2').remove();

                    $('#' + blockID + '-t-m').after('<tr colspan="5" id="' + data.element_id + '-tr-2"></tr>');

                    for(let i = 0; i < (el.length - 1); i++){
                        if(i != 1){
                            $('#' + data.element_id + '-tr-2').append(el[i]);
                        }else if(i == 1){
                            $('#' + data.element_id + '-tr-2').append('<td class="td-item"><input id="' + data.element_id + '-qu" onchange="changeQuantity(event, this, ' + data.element_id + ', ' + el[i].innerText + ');" value="' + el[i].innerText + '" type="number" class="var-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>');
                        }
                    }

                    $('#' + elementID + '-tr-2').append('<td><select id="' + data.element_id + '-s" onchange="changeSelect(event, this, ' + data.element_id + ');" class="form-select form-select-sm" aria-label=".form-select-sm example"><option selected>=</option><option value="1">X</option><option value="2">/</option><option value="3">%</option><option value="4">+</option><option value="5">-</option></select></td>');
                    $('#' + elementID + '-tr-2').append('<td><input id="' + data.element_id + '-var" onchange="changeVar(event, this, ' + data.element_id + ');" type="number" class="var-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>');
                    $('#' + elementID + '-tr-2').append('<td class="td-item total-price" id="' + data.element_id + '-tpr">' + elementPrice + '</td>');
                    $('#' + data.element_id + '-ch').prop('checked', true);
                    editTotal();
                }
                
            }
        })
    }


    function changeSelect(e, element, elementID){
        let valSelect;
        if(element.value == 1 || element.value == 2){
            valSelect = 1;
        }else if(element.value == 3){
            valSelect = 100;
        }else if(element.value == '='){
            valSelect = null;
        }else if(element.value == 4 || element.value == 5){
            valSelect = 0;
        }
        $('#' + elementID + '-var').val(valSelect);
        editTotal();
    }

    function changeVar(e, element, elementID){
        let variableInput = element.value;
        let operation = $('#' + elementID + '-s').val();
        let price = $('#' + elementID + '-tr-2').children('#' + elementID + '-price').html();
        let totalPrice;

        if(operation == '='){         
            totalPrice = price;
            $('#' + elementID + '-var').val(null);
        }else if(operation == 1){     
            totalPrice = (parseFloat(price) * parseFloat(variableInput));
        }else if(operation == 2){     
            totalPrice = (parseFloat(price) / parseFloat(variableInput));
        }else if(operation == 3){     
            totalPrice = ((parseFloat(price) / 100) * parseFloat(variableInput));
        }else if(operation == 4){     
            totalPrice = (parseFloat(price) + parseFloat(variableInput));
        }else if(operation == 5){     
            totalPrice = (parseFloat(price) - parseFloat(variableInput));
        }

        $('#' + elementID + '-tpr').html(parseFloat(totalPrice).toFixed(2));
        editTotal();

    }

    function changeQuantity(event, element, elementID){
        let oldPrice = $('#' + elementID + '-tr').children('#' + elementID + '-price').html();
        let oldQuantity = $('#' + elementID + '-tr').children('#' + elementID + '-qo').html();
        let nowQuantity = parseFloat(element.value);
        let newPrice = ((parseFloat(oldPrice) / parseFloat(oldQuantity)) * nowQuantity);
        console.log('Old Price = ' + oldPrice);
        console.log('Old Quantity = ' + oldQuantity);
        console.log('Old Quantity = ' + nowQuantity);
        console.log('New Price = ' + newPrice);

        $('#' + elementID + '-tr-2').children('#' + elementID + '-price').html(newPrice.toFixed(2));
        $('#' + elementID + '-tpr').html(newPrice.toFixed(2));
        $('#' + elementID + '-s').val('=');
        $('#' + elementID + '-var').val(null);
        editTotal();
        
    }

    function editTotal(){
        let totals = $('.total-price');
        let totalPrice = 0;
        for(let i = 0; i < totals.length; i++){
            totalPrice += parseFloat(totals[i].innerText);
        }
        $('#total-price').html(totalPrice.toFixed(2));
    }

    function printData(e){
        e.preventDefault();
        var divToPrint = document.getElementById("printTable");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

</script>
