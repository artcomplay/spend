@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                    <div class="vertical-menu">
                        <ul class="menu-list" id="menu">
                            <li class="list-item"><a href="" id="c-1" onclick="showItems(event, this, 'c-1-d');">Затраты на сырье и материалы</a></li>

                            <div class="hide list-input-block" id="c-1-d">
                                <h5 for="text" class="title-cost">Добавить материал</h5>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Название материала</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Количество материала</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Единицы измерения</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Цена</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text">BYN</span>
                                    </div>
                                </div>

                                <a href="" onclick="addItem(event, this, 'c-1-d');" style="color: red;">Добавить</a>
                                
                            </div>




                            <li class="list-item"><a href="" id="c-2" onclick="showItems(event, this, 'c-2-d');">Затраты на энергоносители</a></li>
                            <div class="hide list-input-block" id="c-2-d">
                                <h5 for="text" class="title-cost">Добавить энергоноситель</h5>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Название энергоносителя</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Количество энергоносителя</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Единицы измерения</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Цена</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text">BYN</span>
                                    </div>
                                </div>

                                <a href="" onclick="addItem(event, this, 'c-2-d');" style="color: red;">Добавить</a>
                            </div>

                            <li class="list-item"><a href="" id="c-3" onclick="showItems(event, this, 'c-3-d');">Амортизационные отчисления</a></li>
                            <div class="hide list-input-block" id="c-3-d">
                                <h5 for="text" class="title-cost">Добавить предмет амортизации</h5>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Название ресурса</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Количество ресурса</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Единицы измерения</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Цена</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text">BYN</span>
                                    </div>
                                </div>

                                <a href="" onclick="addItem(event, this, 'c-3-d');" style="color: red;">Добавить</a>
                            </div>

                            <li class="list-item"><a href="" id="c-4" onclick="showItems(event, this, 'c-4-d');">Заработная плата основного персонала</a></li>
                            <div class="hide list-input-block" id="c-4-d">
                                <h5 for="text" class="title-cost">Добавить работника</h5>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Ф.И.О работника</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Затраченное время</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Единица времени</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Стоимость</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text">BYN</span>
                                    </div>
                                </div>

                                <a href="" onclick="addItem(event, this, 'c-4-d');" style="color: red;">Добавить</a>
                            </div>

                            <li class="list-item"><a href="" id="c-5" onclick="showItems(event, this, 'c-5-d');">Заработная плата управленческого и вспомогательного персонала</a></li>
                            <div class="hide list-input-block" id="c-5-d">
                                <h5 for="text" class="title-cost">Добавить работника</h5>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Ф.И.О работника</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Затраченное время</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Единица времени</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Стоимость</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text">BYN</span>
                                    </div>
                                </div>

                                <a href="" onclick="addItem(event, this, 'c-5-d');" style="color: red;">Добавить</a>
                            </div>

                            <li class="list-item"><a href="" id="c-6" onclick="showItems(event, this, 'c-6-d');">Отчисления от заработной платы</a></li>
                            <div class="hide list-input-block" id="c-6-d">
                                <h5 for="text" class="title-cost">Добавить отчисление</h5>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Вид отчисления</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Количество</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Единица измерения</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Стоимость</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text">BYN</span>
                                    </div>
                                </div>

                                <a href="" onclick="addItem(event, this, 'c-6-d');" style="color: red;">Добавить</a>
                            </div>

                            <li class="list-item"><a href="" id="c-7" onclick="showItems(event, this, 'c-7-d');">Расходы на сбыт и продажное обслуживание</a></li>
                            <div class="hide list-input-block" id="c-7-d">
                                <h5 for="text" class="title-cost">Добавить расход</h5>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Вид расхода</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Количество</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Единица измерения</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Стоимость</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text">BYN</span>
                                    </div>
                                </div>

                                <a href="" onclick="addItem(event, this, 'c-7-d');" style="color: red;">Добавить</a>
                            </div>

                            <li class="list-item"><a href="" id="c-8" onclick="showItems(event, this, 'c-8-d');">Транспортные расходы</a></li>
                            <div class="hide list-input-block" id="c-8-d">
                                <h5 for="text" class="title-cost">Добавить расход</h5>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Вид расхода</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Количество</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Единица измерения</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Стоимость</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text">BYN</span>
                                    </div>
                                </div>

                                <a href="" onclick="addItem(event, this, 'c-8-d');" style="color: red;">Добавить</a>
                            </div>

                            <li class="list-item"><a href="" id="c-9" onclick="showItems(event, this, 'c-9-d');">Прочие затраты</a></li>
                            <div class="hide list-input-block" id="c-9-d">
                                <h5 for="text" class="title-cost">Добавить расход</h5>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Вид расхода</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Количество</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Единица измерения</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Стоимость</span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text">BYN</span>
                                    </div>
                                </div>

                                <a href="" onclick="addItem(event, this, 'c-9-d');" style="color: red;">Добавить</a>
                            </div>

                            <li class="list-item"><a href="" id="c-10" onclick="showItems(event, this, 'c-10-d');">Полная себестоимость</a></li>
                            <div class="hide" id="c-10-d">
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
