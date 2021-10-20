    <!-- Использование модуля Form -->
    {{ Form::model($user, ['url' => route('horoscope.store'), 'class' => 'container-fluid m-2']) }}
        {{ Form::label('date', 'Укажите дату Вашего рождения: ', ['class' => 'h4 m-3 text-primary'])}}
        {{ Form::date('date', \Carbon\Carbon::now()) }}  
        {{ Form::submit('Получить данные', ['class' => 'btn btn-success m-l-2']) }}
    {{ Form::close() }}

@if(isset($user))
    
    @if(isset($info))
        <div class="container-fluid text-center h4 text-danger">
            {{$info}}
        </div>
    @endif

    <div class="container-fluid">
        <div class="alert alert-primary" role="alert">
            Ваша дата рождения: {{ $user->getDay() . '/' . $user->getMonth() . '/' . $user->getYear() }} г.
        </div>

        <div class="alert alert-secondary" role="alert">
            Возраст (полных лет): {{$user->getAge() }}
        </div>

        <div class="alert alert-success" role="alert">
            Знак зодиака: {{ $user->getClassicZodiac() }}
        </div>

        <div class="alert alert-danger" role="alert">
            По восточному гороскопу: {{ $user->getChineseZodiac() }}
        </div>

        <div class="alert alert-warning" role="alert">
            По зороастрийский гороскопу: {{ $user->getZoroastrianZodiac() }}
        </div>

        <div class="alert alert-dark" role="alert">
            По календарю друидов: {{ $user->getDruidicZodiac() }}
        </div>
    </div>  
@endif