@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                    <div class="vertical-menu" id="app">
                        <ul class="menu-list" id="menu">

                            <li class="list-item"><a href="" id="c-1" onclick="showItems(event, this, 'c-1-d');">Затраты на сырье и материалы</a></li>

                            <div class="hide list-input-block" id="c-1-d">
                                <a href="" data-target=".cost-materials" class="create-element" data-toggle="modal">+ Добавить материал</a>
                                <div class="c-1-d"></div>
                            </div>

                            <material-component></material-component>

                            <li class="list-item"><a href="" id="c-2"  onclick="showItems(event, this, 'c-2-d');">Затраты на энергоносители</a></li>

                            <div class="hide list-input-block" id="c-2-d">
                                <a href="" data-target=".cost-energy" class="create-element" data-toggle="modal">+ Добавить энергоноситель</a>
                                <div class="c-2-d"></div>
                            </div>

                            <energy-component></energy-component>


                            <li class="list-item"><a href="" id="c-3" onclick="showItems(event, this, 'c-3-d');">Амортизационные отчисления</a></li>
                            <div class="hide list-input-block" id="c-3-d">
                                <a href="" data-target=".cost-depreciation" class="create-element" data-toggle="modal">+ Добавить амортизационное отчисление</a>
                                <div class="c-3-d"></div>
                            </div>

                            <depreciation-component></depreciation-component>

                            <li class="list-item"><a href="" id="c-4" onclick="showItems(event, this, 'c-4-d');">Заработная плата основного персонала</a></li>
                            <div class="hide list-input-block" id="c-4-d">
                                <a href="" data-target=".cost-mainworker" class="create-element" data-toggle="modal">+ Добавить работника</a>
                                <div class="c-4-d"></div>
                            </div>

                            <mainworker-component></mainworker-component>

            
                            <li class="list-item"><a href="" id="c-5" onclick="showItems(event, this, 'c-5-d');">Заработная плата управленческого и вспомогательного персонала</a></li>
                            <div class="hide list-input-block" id="c-5-d">
                                <a href="" data-target=".cost-management" class="create-element" data-toggle="modal">+ Добавить работника</a>
                                <div class="c-5-d"></div>
                            </div>

                            <management-component></management-component>

                            <li class="list-item"><a href="" id="c-6" onclick="showItems(event, this, 'c-6-d');">Отчисления от заработной платы</a></li>
                            <div class="hide list-input-block" id="c-6-d">
                                <a href="" data-target=".cost-deduction" class="create-element" data-toggle="modal">+ Добавить отчисление</a>
                                <div class="c-6-d"></div>
                            </div>

                            <deduction-component></deduction-component>


                            <li class="list-item"><a href="" id="c-7" onclick="showItems(event, this, 'c-7-d');">Расходы на сбыт и продажное обслуживание</a></li>
                            <div class="hide list-input-block" id="c-7-d">
                                <a href="" data-target=".cost-sales" class="create-element" data-toggle="modal">+ Добавить расход</a>
                                <div class="c-7-d"></div>
                            </div>

                            <sales-component></sales-component>

                            <li class="list-item"><a href="" id="c-8" onclick="showItems(event, this, 'c-8-d');">Транспортные расходы</a></li>
                            <div class="hide list-input-block" id="c-8-d">
                                <a href="" data-target=".cost-transport" class="create-element" data-toggle="modal">+ Добавить расход</a>
                                <div class="c-8-d"></div>
                            </div>

                            <transport-component></transport-component>

                            <li class="list-item"><a href="" id="c-9" onclick="showItems(event, this, 'c-9-d');">Прочие затраты</a></li>
                            <div class="hide list-input-block" id="c-9-d">
                                <a href="" data-target=".cost-other" class="create-element" data-toggle="modal">+ Добавить расход</a>
                                <div class="c-9-d"></div>
                            </div>

                            <other-component></other-component>

                            <li class="list-item"><a href="" id="c-10" onclick="showItems(event, this, 'c-10-d');">Полная себестоимость</a></li>
                            <div class="hide" id="c-10-d">
                                <table class="table table-sm">
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
                                        <tr><td scope="col" colspan="7" class="head-item-table">Затраты на сырье и материалы</td></tr>
                                        <tr id="c-1-d-t-m"></tr>
                                        <tr><td scope="col" colspan="7" class="head-item-table">Затраты на энергоносители</td></tr>
                                        <tr id="c-2-d-t-m"></tr>
                                        <tr><td scope="col" colspan="7" class="head-item-table">Амортизационные отчисления</td></tr>
                                        <tr id="c-3-d-t-m"></tr>
                                        <tr><td scope="col" colspan="7" class="head-item-table">Заработная плата основного персонала</td></tr>
                                        <tr id="c-4-d-t-m"></tr>
                                        <tr><td scope="col" colspan="7" class="head-item-table">Заработная плата управленческого и вспомогательного персонала</td></tr>
                                        <tr id="c-5-d-t-m"></tr>
                                        <tr><td scope="col" colspan="7" class="head-item-table">Отчисления от заработной платы</td></tr>
                                        <tr id="c-6-d-t-m"></tr>
                                        <tr><td scope="col" colspan="7" class="head-item-table">Расходы на сбыт и продажное обслуживание</td></tr>
                                        <tr id="c-7-d-t-m"></tr>
                                        <tr><td scope="col" colspan="7" class="head-item-table">Транспортные расходы</td></tr>
                                        <tr id="c-8-d-t-m"></tr>
                                        <tr><td scope="col" colspan="7" class="head-item-table">Прочие затраты</td></tr>
                                        <tr id="c-9-d-t-m"></tr>
                                    </tbody>
                                </table>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Полная себестоимость</span>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
