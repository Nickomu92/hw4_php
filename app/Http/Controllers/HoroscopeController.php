<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключаем модуль (пакет) для работы со временем и датой
use Carbon\Carbon;

// Класс для представления сущности пользователя
class User
{
    // Поле для хранения даты рождения пользователя
    protected $date;

    public function __construct($date) 
    {
        $this->date = $date;
    }

    // Метод для получения года рождения пользователя
    public function getYear()
    {
        // Парсим дату рождения пользователя
        $date = date_parse($this->date);
        return $date['year'];
    }

    // Метод для получения месяца рождения пользователя
    public function getMonth()
    {
        // Парсим дату рождения пользователя
        $date = date_parse($this->date);
        return $date['month'];
    }

    // Метод для получения дня рождения пользователя
    public function getDay()
    {
        // Парсим дату рождения пользователя
        $date = date_parse($this->date);
        return $date['day'];
    }

    // Метод для получение информации по классическому календарю
    public function getClassicZodiac()
    {
        // Парсим дату рождения пользователя
        $date = date_parse($this->date);

        $day = $date['day'];
        $month = $date['month'];

        if(($day >= 21 && $day <= 31 && $month == 3) || ($day <= 20 && $month == 4))
            return 'Овен';
        
        else if(($day >= 21 && $day <= 30 && $month == 4) || ($day <= 21 && $month == 5))
            return 'Телец';

        else if(($day >= 22 && $day <= 31 && $month == 5) || ($day <= 21 && $month == 6))
            return 'Близнецы';

        else if(($day >= 23 && $day <= 30 && $month == 6) || ($day <= 22 && $month == 7))
            return 'Рак';

        else if(($day >= 23 && $day <= 31 && $month == 7) || ($day <= 21 && $month == 8))
            return 'Лев';
         
        else if(($day >= 22 && $day <= 31 && $month == 8) || ($day <= 23 && $month == 9))
            return 'Дева';

        else if(($day >= 24 && $day <= 30 && $month == 9) || ($day <= 23 && $month == 10))
            return 'Весы';

        else if(($day >= 24 && $day <= 31 && $month == 10) || ($day <= 22 && $month == 11))
            return 'Скорпион';

        else if(($day >= 23 && $day <= 30 && $month == 11) || ($day <= 22 && $month == 12))
            return 'Стрелец';
 
        else if(($day >= 23 && $day <= 31 && $month == 12) || ($day <= 20 && $month == 1))
            return 'Козерог';

        else if(($day >= 21 && $day <= 31 && $month == 1) || ($day <= 19 && $month == 2))
            return 'Водолей';

        else if(($day >= 20 && $day <= 29 && $month == 2) || ($day <= 20 && $month == 3))
            return 'Рыбы';
    }

    // Метод для получения возраста пользователя
    public function getAge()
    {
        // Парсим дату рождения пользователя
        $date = date_parse($this->date);
        $year = $date['year'];
        $month = $date['month'];
        $day = $date['day'];
        
        // Модуль Carbon для работы со временем и датой
        $date = Carbon::now();
        $date->year($year)->month($month)->day($day);
        $dateNow = Carbon::now();
        $resultYear = $dateNow->diffInYears($date);

        if($resultYear % 10 == 1)
            return $resultYear . ' год';

        else if($resultYear % 10 >= 2 && $resultYear % 10 <= 4)
            return $resultYear . ' года';

        else
            return $resultYear . ' лет';  

    }

    // Метод для получение информации по китайскому календарю
    public function getChineseZodiac()
    {
        // Парсим дату рождения пользователя
        $date = date_parse($this->date);

        // 12 - количество знаков зодиака
        $chineseZodiac = $date['year'] % 12;   

        switch(abs($chineseZodiac))
        {
            case 0:
                return 'Обезьяна';

            case 1:
                return 'Петух';
                
            case 2:
                return 'Собака';
        
            case 3:
                return 'Свинья';

            case 4:
                return 'Крыса';
            
            case 5:
                return 'Бык';
            
            case 6:
                return 'Тигр';

            case 7:
                return 'Кролик';
                
            case 8:
                return 'Дракон';
        
            case 9:
                return 'Змея';

            case 10:
                return 'Лошадь';
            
            case 11:
                return 'Коза';      
        } 
    }

    // Метод для получение информации календарю друидов
    public function getDruidicZodiac()
    {
        // Парсим дату рождения пользователя
        $date = date_parse($this->date);

        $day = $date['day'];
        $month = $date['month'];

        if(($day > 22 && $day <= 31 && $month == 12) || ($day <= 1 && $month == 1) || ($day >= 25 && $day <= 30 && $month == 6) || ($day <= 4 && $month == 7))
            return 'Яблоня';
        
        else if(($day >= 2 && $day <= 11 && $month == 1) || ($day >= 5 && $day <= 14 && $month == 7))
            return 'Пихта';
        
        else if(($day >= 12 && $day <= 24 && $month == 1) || ($day >= 15 && $day <= 25 && $month == 7))
            return 'Вяз';

        else if(($day >= 25 && $day <= 31 && $month == 1) || ($day <= 3 && $month == 2) || ($day >= 26 && $day <= 31 && $month == 7) || ($day <= 4 && $month == 8))
            return 'Кипарис';
            
        else if(($day >= 4 && $day <= 8 && $month == 2) || ($day >= 5 && $day <= 13 && $month == 8))
            return 'Тополь';

        else if(($day >= 9 && $day <= 18 && $month == 2) || ($day >= 14 && $day <= 23 && $month == 8))
            return 'Кедр';

        else if(($day >= 19 && $day <= 29 && $month == 2) || ($day >= 24 && $day <= 31 && $month == 8) || ($day <= 2 && $month == 9))
            return 'Сосна';

        else if(($day >= 1 && $day <= 10 && $month == 3) || ($day >= 3 && $day <= 12 && $month == 9))
            return 'Ива';

        else if(($day >= 11 && $day < 20 && $month == 3) || ($day >= 13 && $day < 23 && $month == 9))
            return 'Липа';

        else if(($day >= 22 && $day <= 31 && $month == 3) || ($day >= 24 && $day <= 31 && $month == 9) || ($day <= 3 && $month == 9))
            return 'Орешник';

        else if(($day >= 1 && $day <= 10 && $month == 4) || ($day >= 4 && $day <= 13 && $month == 10))
            return 'Рябина';

        else if(($day >= 11 && $day <= 20 && $month == 4) || ($day >= 14 && $day <= 23 && $month == 10))
            return 'Клен';

        else if(($day >= 21 && $day <= 31 && $month == 4) || ($day >= 24 && $day <= 31 && $month == 10) || ($day <= 2 && $month == 11))
            return 'Грецкий орех';

        else if(($day >= 1 && $day <= 14 && $month == 5) || ($day >= 3 && $day <= 11 && $month == 11))
            return 'Жасмин';

        else if(($day >= 15 && $day <= 24 && $month == 5) || ($day >= 12 && $day <= 21 && $month == 11))
            return 'Каштан';

        else if(($day >= 25 && $day <= 31 && $month == 5) || ($day <= 3 && $month == 6) || ($day >= 22 && $day <= 30 && $month == 11) || ($day <= 1 && $month == 12))
            return 'Ясень';

        else if(($day >= 4 && $day <= 13 && $month == 6) || ($day >= 2 && $day <= 11 && $month == 12))
            return 'Граб';

        else if(($day >= 14 && $day < 24 && $month == 6) || ($day >= 12 && $day < 21 && $month == 12))
            return 'Инжир';

        else if($day == 20 && $month == 3)
            return 'Дуб';

        else if($day == 24 && $month == 6)
            return 'Береза';

        else if($day == 23 && $month == 9)
            return 'Олива';

        else if($day >= 21 && $day <= 22 && $month == 9)
            return 'Бук';
    }

    // Метод для получение информации по зороатрийскому календарю
    public function getZoroastrianZodiac()
    {
        // Парсим дату рождения пользователя
        $date = date_parse($this->date);

        // 32 - количество знаков зодиака
        $zoroastrianZodiac = $date['year'] % 32;

        switch(abs($zoroastrianZodiac))
        {
            case 0:
                return 'Барсук';

            case 1:
                return 'Верблюд';
                
            case 2:
                return 'Еж';
        
            case 3:
                return 'Лань';

            case 4:
                return 'Слон';
            
            case 5:
                return 'Конь';
            
            case 6:
                return 'Гепард';

            case 7:
                return 'Павлин';
                
            case 8:
                return 'Лебедь';
        
            case 9:
                return 'Рысь';

            case 10:
                return 'Осел';
            
            case 11:
                return 'Белый Медведь';   
                
            case 12:
                return 'Орел';
    
            case 13:
                return 'Лиса';
                    
            case 14:
                return 'Дельфин';
            
            case 15:
                return 'Вепрь';
    
            case 16:
                return 'Сова';
                
            case 17:
                return 'Сокол';
                
            case 18:
                return 'Олень';
    
            case 19:
                return 'Баран';
                    
            case 20:
                return 'Мангуст';
            
            case 21:
                return 'Волк';
    
            case 22:
                return 'Аист';
                
            case 23:
                return 'Паук';      

            case 24:
                return 'Змея';
        
            case 25:
                return 'Бобер';
                        
            case 26:
                return 'Черепаха';
                
            case 27:
                return 'Сорока';
        
            case 28:
                return 'Белка';
                    
            case 29:
                return 'Ворон';
                    
            case 30:
                return 'Петух';
        
            case 31:
                return 'Тур';           
        } 
    }
}

// RESTful контроллер с созданными по умолчанию методами
class HoroscopeController extends Controller
{
    public function index()
    {
        // Модуль Carbon для работы со временем и датой
        $user = new User(Carbon::now());
        $info = 'Пример (сегодняшня дата)';
        return view('page', ['user' => $user, 'info' => $info]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = new User($request->date);
        return view('page', ['user' => $user]);
    }
 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
