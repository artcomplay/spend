<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                console.log(data);
                let s = "'";
                let table = $('.' + blockID + '-t');
                if(table.length == 0){
                    $('.' + blockID).append('<table class="table table-sm"><thead><tr><th scope="col">#</th><th scope="col">Название материала</th><th scope="col">Количество материала</th><th scope="col">Единицы измерения</th><th scope="col">Цена</th></tr></thead><tbody class="' + blockID + '-t"></tbody></table>');
                    for(let i = 0; i < data.length; i++){
                        $('.' + data[i].category_id + '-t').append('<tr id="' + data[i].id + '-tr"><th scope="row"><input onclick="appendElementTotalTable(this, ' + s + data[i].id + s + ', ' + s + blockID + s + ');" type="checkbox" id="' + data[i].id + '-ch"></th><td class="td-item">' + data[i].element_name + '</td><td class="td-item">' + data[i].element_quantity + '</td><td class="td-item">' + data[i].element_unit_measurement + '</td><td  class="td-item" data="price">' + data[i].element_price + '</td></tr>');
                    }
                }
            }
        })
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
        $.ajax({
            url: "{{ route('create_element') }}",
            type: 'POST',
            data: {
                category_id: blockID,
                element_name:elementName,
                element_quantity:elementQuantity,
                element_unit_measurement:elementUnitMeasurement,
                element_price:elementPrice
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                console.log(data);
            }
        })
    }

    function appendElementTotalTable(element, elementID, blockID){
        let checkedStatus = $('#' + elementID + '-ch').prop('checked');
        let el = $('#' + elementID + '-tr').find('td').clone();
        let totalElement = $('#' + elementID + '-tr-2');
        console.log(totalElement.length);
        if(totalElement.length == 0 && checkedStatus == true){
            $('#' + blockID + '-t-m').after('<tr colspan="5" id="' + elementID + '-tr-2"></tr>');
            for(let i = 0; i < el.length; i++){
                $('#' + elementID + '-tr-2').append(el[i]);
            }
        }else if(totalElement.length > 0 && checkedStatus == false){
            $('#' + elementID + '-tr-2').remove();
        }
    }

</script>
