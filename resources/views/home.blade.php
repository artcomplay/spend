@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                    <div class="vertical-menu" id="app">
                        <ul class="menu-list" id="menu">

                            <li class="list-item"><a href="" id="c-1" onclick="showItems(event, this, 'c-1-d');">Затраты на сырье и материалы</a></li>

                            <div class="hide list-input-block" id="c-1-d">
                                <a href="" data-target=".cost-materials" class="create-element" data-toggle="modal">+ Добавить материал</a>
                                <div class="c-1-d" class="print-item"></div>
                            </div>

                            <material-component></material-component>

                            <li class="list-item"><a href="" id="c-2"  onclick="showItems(event, this, 'c-2-d');">Затраты на энергоносители</a></li>

                            <div class="hide list-input-block" id="c-2-d">
                                <a href="" data-target=".cost-energy" class="create-element" data-toggle="modal">+ Добавить энергоноситель</a>
                                <div class="c-2-d" class="print-item"></div>
                            </div>

                            <energy-component></energy-component>


                            <li class="list-item"><a href="" id="c-3" onclick="showItems(event, this, 'c-3-d');">Амортизационные отчисления</a></li>
                            <div class="hide list-input-block" id="c-3-d">
                                <a href="" data-target=".cost-depreciation" class="create-element" data-toggle="modal">+ Добавить амортизационное отчисление</a>
                                <div class="c-3-d" class="print-item"></div>
                            </div>

                            <depreciation-component></depreciation-component>

                            <li class="list-item"><a href="" id="c-4" onclick="showItems(event, this, 'c-4-d');">Заработная плата основного персонала</a></li>
                            <div class="hide list-input-block" id="c-4-d">
                                <a href="" data-target=".cost-mainworker" class="create-element" data-toggle="modal">+ Добавить работника</a>
                                <div class="c-4-d" class="print-item"></div>
                            </div>

                            <mainworker-component></mainworker-component>

            
                            <li class="list-item"><a href="" id="c-5" onclick="showItems(event, this, 'c-5-d');">Заработная плата управленческого и вспомогательного персонала</a></li>
                            <div class="hide list-input-block" id="c-5-d">
                                <a href="" data-target=".cost-management" class="create-element" data-toggle="modal">+ Добавить работника</a>
                                <div class="c-5-d" class="print-item"></div>
                            </div>

                            <management-component></management-component>

                            <li class="list-item"><a href="" id="c-6" onclick="showItems(event, this, 'c-6-d');">Отчисления от заработной платы</a></li>
                            <div class="hide list-input-block" id="c-6-d">
                                <a href="" data-target=".cost-deduction" class="create-element" data-toggle="modal">+ Добавить отчисление</a>
                                <div class="c-6-d" class="print-item"></div>
                            </div>

                            <deduction-component></deduction-component>


                            <li class="list-item"><a href="" id="c-7" onclick="showItems(event, this, 'c-7-d');">Расходы на сбыт и продажное обслуживание</a></li>
                            <div class="hide list-input-block" id="c-7-d">
                                <a href="" data-target=".cost-sales" class="create-element" data-toggle="modal">+ Добавить расход</a>
                                <div class="c-7-d" class="print-item"></div>
                            </div>

                            <sales-component></sales-component>

                            <li class="list-item"><a href="" id="c-8" onclick="showItems(event, this, 'c-8-d');">Транспортные расходы</a></li>
                            <div class="hide list-input-block" id="c-8-d">
                                <a href="" data-target=".cost-transport" class="create-element" data-toggle="modal">+ Добавить расход</a>
                                <div class="c-8-d" class="print-item"></div>
                            </div>

                            <transport-component></transport-component>

                            <li class="list-item"><a href="" id="c-9" onclick="showItems(event, this, 'c-9-d');">Прочие затраты</a></li>
                            <div class="hide list-input-block" id="c-9-d">
                                <a href="" data-target=".cost-other" class="create-element" data-toggle="modal">+ Добавить расход</a>
                                <div class="c-9-d" class="print-item"></div>
                            </div>

                            <other-component></other-component>

                            <li class="list-item"><a href="" id="c-11" onclick="showItems(event, this, 'c-11-d');">Операции с итоговой стоимостью</a></li>
                            <div class="hide list-input-block" id="c-11-d">
                                <a href="" data-target=".cost-total" class="create-element" data-toggle="modal">+ Добавить операцию</a>
                                <div class="c-11-d" class="print-item"></div>
                            </div>

                            <total-component></total-component>

                            <li class="list-item"><a href="" id="c-10" onclick="showItems(event, this, 'c-10-d');">Полная себестоимость</a></li>
                            <div class="hide" id="c-10-d">
                                <table class="table table-sm" id="printTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Название</th>
                                            <th scope="col">Количество</th>
                                            <th scope="col">Ед. изм.</th>
                                            <th scope="col">Цена</th>
                                            <th scope="col">Операция</th>
                                            <th scope="col">Переменная</th>
                                            <th scope="col">Итог</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr id="1-t-t"><td scope="col" colspan="1" class="head-item-table">Затраты на сырье и материалы</td><td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeQuangity(1);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td><td scope="col" colspan="1" class="head-item-table"></td>  <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeSelect(1);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange=autoChangeVariable(1); /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td></tr>
                                        <tr id="c-1-d-t-m"></tr>
                                        <tr id="2-t-t"><td scope="col" colspan="1" class="head-item-table">Затраты на энергоносители</td><td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeQuangity(2);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td><td scope="col" colspan="1" class="head-item-table"></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeSelect(2);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange=autoChangeVariable(2); /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td></tr>
                                        <tr id="c-2-d-t-m"></tr>
                                        <tr id="3-t-t"><td scope="col" colspan="1" class="head-item-table">Амортизационные отчисления</td><td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeQuangity(3);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td><td scope="col" colspan="1" class="head-item-table"></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeSelect(3);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange=autoChangeVariable(3); /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td></tr>
                                        <tr id="c-3-d-t-m"></tr>
                                        <tr id="4-t-t"><td scope="col" colspan="1" class="head-item-table">Заработная плата основного персонала</td><td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeQuangity(4);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td><td scope="col" colspan="1" class="head-item-table"></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeSelect(4);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange=autoChangeVariable(4); /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td></tr>
                                        <tr id="c-4-d-t-m"></tr>
                                        <tr id="5-t-t"><td scope="col" colspan="1" class="head-item-table">Заработная плата управленческого и вспомогательного персонала</td><td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeQuangity(5);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td><td scope="col" colspan="1" class="head-item-table"></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeSelect(5);"/><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange=autoChangeVariable(5); /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td></tr>
                                        <tr id="c-5-d-t-m"></tr>
                                        <tr id="6-t-t"><td scope="col" colspan="1" class="head-item-table">Отчисления от заработной платы</td><td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeQuangity(6);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td><td scope="col" colspan="1" class="head-item-table"></td><td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeSelect(6);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange=autoChangeVariable(6); /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td></tr>
                                        <tr id="c-6-d-t-m"></tr>
                                        <tr id="7-t-t"><td scope="col" colspan="1" class="head-item-table">Расходы на сбыт и продажное обслуживание</td><td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeQuangity(7);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td><td scope="col" colspan="1" class="head-item-table"></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeSelect(7);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange=autoChangeVariable(7); /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td></tr>
                                        <tr id="c-7-d-t-m"></tr>
                                        <tr id="8-t-t"><td scope="col" colspan="1" class="head-item-table">Транспортные расходы</td><td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeQuangity(8);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td><td scope="col" colspan="1" class="head-item-table"></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeSelect(8);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange=autoChangeVariable(8); /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td></tr>
                                        <tr id="c-8-d-t-m"></tr>
                                        <tr id="9-t-t"><td scope="col" colspan="1" class="head-item-table">Прочие затраты</td><td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeQuangity(9);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td><td scope="col" colspan="1" class="head-item-table"></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange="autoChangeSelect(9);" /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"><input type="checkbox" onchange=autoChangeVariable(9); /><label class="check-a-p" title="Автоподстановка" for=""> А/п</label></td> <td scope="col" colspan="1" class="head-item-table"></td></tr>
                                        <tr id="c-9-d-t-m"></tr>
                                        <tr id="11-t-t"><td scope="col" colspan="7" class="head-item-table">Операции с итоговой стоимостью</td></td></tr>
                                        <tr id="c-11-d-t-m"><td colspan="2" class="operation-style">Название операции</td><td colspan="2" class="operation-style">Предыдущее итоговое значение</td><td colspan="1" class="operation-style">Символ операции</td><td colspan="1" class="operation-style">Переменная</td><td colspan="1" class="operation-style">Итог</td></tr>
                                        <tr id="c-12-d-t-m"><td scope="col" colspan="1" class="total-item-cost">Полная себестоимость</td><td scope="col" colspan="5" class="total-item-cost"></td><td class="total-item-cost" colspan="1" id="total-price"></td></tr>
                                    </tbody>
                                </table>

                                <div class="edit-table">
                                    <a href="" onclick="createTableForCopy(event);">Сформировать таблицу</a>
                                </div>

                                <!-- <a href="" class="print-table" onclick="printData(event);">Печать</a> -->
                            </div>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
