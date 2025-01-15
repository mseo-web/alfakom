@extends('layouts.front')
@section('title','Вопросы')
@section('content')

<section>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <h1>Вопросы</h1>
        </div>

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <div class="text-primary">Что такое Request и для чего используется</div>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div>
                            Request в Laravel представляет собой объект, который инкапсулирует HTTP-запрос, поступающий в ваше приложение. Этот объект содержит данные запроса, такие как параметры, заголовки, файлы и другую информацию, переданную клиентом. Request используется для доступа к этим данным в контроллерах, посредниках (middleware) и других частях вашего приложения.
                        </div>
                        <h5>
                            Основные использования Request 
                        </h5>
                        <div>
                            Получение данных запроса: Request позволяет вам получать значения параметров из строки запроса, данных формы, заголовков и других частей HTTP-запроса.
                        </div>
                        <code>
                            namespace App\Http\Controllers;<br/>

                            use Illuminate\Http\Request;<br/><br/>

                            class UserController extends Controller<br/>
                            {<br/>
                                &nbsp;public function store(Request $request)<br/>
                                &nbsp;{<br/>
                                    &nbsp;&nbsp;$name = $request->input('name');<br/>
                                    &nbsp;&nbsp;$email = $request->input('email');<br/>
                                    &nbsp;&nbsp;// Логика сохранения данных<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <div>
                            Валидация данных: Request используется для валидации данных формы перед их обработкой или сохранением.
                        </div>
                        <code>
                            namespace App\Http\Controllers;<br/>

                            use Illuminate\Http\Request;<br/><br/>

                            class UserController extends Controller<br/>
                            {<br/>
                                &nbsp;public function store(Request $request)<br/>
                                &nbsp;{<br/>
                                    &nbsp;&nbsp;$request->validate([<br/>
                                        &nbsp;&nbsp;&nbsp;'name' => 'required|max:255',<br/>
                                        &nbsp;&nbsp;&nbsp;'email' => 'required|email|unique:users,email',<br/>
                                    &nbsp;&nbsp;]);<br/>
                                    &nbsp;&nbsp;// Данные валидны, можно продолжать обработку<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <div>
                            Работа с файлами: Request позволяет работать с загруженными файлами.
                        </div>
                        <code>
                            namespace App\Http\Controllers;<br/>

                            use Illuminate\Http\Request;<br/><br/>

                            class ProfileController extends Controller<br/>
                            {<br/>
                                &nbsp;public function update(Request $request)<br/>
                                &nbsp;{<br/>
                                    &nbsp;&nbsp;if ($request->hasFile('avatar')) {<br/>
                                        &nbsp;&nbsp;&nbsp;$file = $request->file('avatar');<br/>
                                        &nbsp;&nbsp;&nbsp;$path = $file->store('avatars');<br/>
                                        &nbsp;&nbsp;&nbsp;// Сохранить путь к файлу в базе данных<br/>
                                    &nbsp;&nbsp;}<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <div>
                            Доступ к информации о запросе: Request предоставляет методы для доступа к различным частям HTTP-запроса, таким как метод, URI, заголовки и другая информация.
                        </div>
                        <code>
                            namespace App\Http\Controllers;<br/>

                            use Illuminate\Http\Request;<br/><br/>

                            class LogController extends Controller<br/>
                            {<br/>
                                &nbsp;public function index(Request $request)<br/>
                                &nbsp;{<br/>
                                    &nbsp;&nbsp;$method = $request->method();<br/>
                                    &nbsp;&nbsp;$uri = $request->path();<br/>
                                    &nbsp;&nbsp;$headers = $request->headers->all();<br/>
                                    &nbsp;&nbsp;// Логика обработки информации о запросе<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <h5>
                            Зачем используется Request
                        </h5>
                        <div>
                            Инкапсуляция данных: Request инкапсулирует все данные запроса в один объект, что упрощает доступ к этим данным и их обработку.<br/><br/>

                            Удобство: Request предоставляет удобные методы для получения значений параметров, работы с файлами и другой информации.<br/><br/>

                            Безопасность: Использование Request позволяет легко валидировать входные данные, обеспечивая безопасность вашего приложения.<br/><br/>

                            Организация кода: Использование Request делает код контроллеров и других частей приложения более организованным и чистым.<br/><br/>

                            Request - это мощный инструмент, который помогает сделать работу с HTTP-запросами в Laravel более удобной и безопасной.<br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                        <div class="text-primary">Что такое Observers, как их можно использовать, как подключать, в чем разница</div>
                    </button>
                </h2>
                <div id="flush-collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            Observers в Laravel - это классы, которые позволяют вам сгруппировать все события Eloquent-модели в один класс. С их помощью можно управлять моделью на разных этапах ее жизненного цикла.
                        </div>
                        <h4>
                            Использование Observers
                        </h4>
                        <div> 
                            <h5>
                                Создание Observer: Чтобы создать Observer, воспользуйтесь командой Artisan:
                            </h5>
                            <code>php artisan make:observer UserObserver --model=User</code>
                            <p>Это создаст новый файл Observer в каталоге app/Observers</p>
                        </div>
                        <div> 
                            <h5>
                                Определение событий в Observer: Внутри вашего Observer вы можете определить методы для событий, на которые хотите подписаться. Например:
                            </h5>
                            <code>
                                namespace App\Observers;<br/>

                                use App\Models\User;<br/>

                                class UserObserver<br/>
                                {<br/>
                                    &nbsp;public function creating(User $user)<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;// Логика перед созданием пользователя<br/>
                                    &nbsp;}<br/>

                                    &nbsp;public function created(User $user)<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;// Логика после создания пользователя<br/>
                                        &nbsp;}<br/>

                                    &nbsp;// Другие события: updating, updated, deleting, deleted и т.д.<br/>
                                }<br/>
                            </code>
                        </div>
                        <div> 
                            <h5>
                                Подключение Observer к модели: Теперь вам нужно сообщить Eloquent о вашем Observer. Обычно это делается в методе boot вашего AppServiceProvider:
                            </h5>
                            <code>
                                namespace App\Providers;<br/>

                                use Illuminate\Support\ServiceProvider;<br/>
                                use App\Models\User;<br/>
                                use App\Observers\UserObserver;<br/>

                                class AppServiceProvider extends ServiceProvider<br/>
                                {<br/>
                                    &nbsp;public function boot()<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;User::observe(UserObserver::class);<br/>
                                    &nbsp;}<br/>
                                }<br/>
                            </code>
                        </div>
                        <div>
                            <h5>
                                Разница между использованием коллбэков в модели и Observers:
                            </h5>
                            Чистота кода: Observers помогают поддерживать модели чище, вынося логику обработки событий в отдельный класс.<br/><br/>

                            Повторное использование: Один Observer может быть использован несколькими моделями, что упрощает повторное использование кода.<br/><br/>

                            Организация: Все обработчики событий для модели находятся в одном месте, что делает их легче управляемыми и организованными.<br/><br/>

                            С Observers вы получаете мощный инструмент для управления событиями в ваших Eloquent-моделях, что упрощает их обслуживание и улучшает структуру кода.
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                    <div class="text-primary">Что такое Accessors, Mutators, зачем используются</div>
                </button>
                </h2>
                <div id="flush-collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            <div>
                                Accessors и Mutators в Laravel используются для преобразования атрибутов модели при их получении и установке. Это позволяет вам добавить логику для обработки атрибутов модели в одно место, делая код более чистым и удобным.
                            </div>
                            <h5>
                                Accessors (Аксессоры)
                            </h5>
                            <p>
                                Аксессоры позволяют определить, как значение атрибута модели должно быть получено. Они преобразовывают атрибут, когда вы получаете его значение.<br/><br/>

                                Пример использования:
                            </p>
                            <code>
                                namespace App\Models;<br/>

                                use Illuminate\Database\Eloquent\Model;<br/>

                                class User extends Model<br/>
                                {<br/>
                                    &nbsp;public function getFullNameAttribute()<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;return "{$this->first_name} {$this->last_name}";<br/>
                                    &nbsp;}<br/>
                                }<br/>
                            </code>
                            <p>
                                Теперь вы можете получить значение full_name как обычный атрибут:
                            </p>
                            <code>
                                $user = User::find(1);<br/>
                                echo $user->full_name; // выводит "John Doe"
                            </code>
                            <h5>
                                Mutators (Мутаторы)
                            </h5>
                            <div>
                                Мутаторы позволяют определить, как значение атрибута модели должно быть установлено. Они преобразовывают значение перед его сохранением в базу данных.<br/><br/>

                                Пример использования:
                            </div>
                            <code>
                                namespace App\Models;<br/>

                                use Illuminate\Database\Eloquent\Model;<br/>

                                class User extends Model<br/>
                                {<br/>
                                    &nbsp;public function setPasswordAttribute($value)<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;$this->attributes['password'] = bcrypt($value);<br/>
                                    &nbsp;}<br/>
                                }<br/>
                            </code>
                            <div>
                                Теперь, когда вы устанавливаете значение password, оно будет автоматически зашифровано:
                            </div>
                            <code>
                                $user = new User();<br/>
                                $user->password = 'secret'; // пароль сохранится зашифрованным
                            </code>
                            <h5>
                                Зачем используются Accessors и Mutators
                            </h5>
                            <div>
                                Инкапсуляция логики: Они позволяют вам инкапсулировать логику обработки атрибутов прямо в модели, что делает ваш код более организованным и удобным для сопровождения.<br/><br/>

                                Автоматизация преобразований: С их помощью можно автоматизировать преобразования данных, такие как шифрование паролей или форматирование данных.<br/><br/>

                                Чистота кода: Обработка данных в одном месте делает код чище и легче для понимания.<br/><br/>

                                Accessors и Mutators - это мощные инструменты, которые помогают сделать работу с моделями в Laravel более удобной и безопасной.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                    <div class="text-primary">Что такое Scopes, объяснить что это такое, привести пример использования</div>
                </button>
                </h2>
                <div id="flush-collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            Scopes в Laravel - это механизмы, позволяющие организовать повторно используемые фрагменты запросов к базе данных. Они помогают сделать код более читаемым, организованным и легким для поддержки, вынеся общие условия запроса в отдельные методы.
                        </div>
                        <h5>
                            Локальные Scopes (локальные области)
                        </h5>
                        <div>
                            Локальные scopes позволяют вам определить общие условия запроса как методы модели, которые можно повторно использовать в разных частях вашего кода.<br/><br/>

                            Пример использования:<br/>
                            Допустим, у вас есть модель User, и вы хотите создать scope, который вернет только активных пользователей.<br/><br/>

                            Создание локального scope:<br/>
                        </div>
                        <code>
                            namespace App\Models;<br/>

                            use Illuminate\Database\Eloquent\Builder;<br/>
                            use Illuminate\Database\Eloquent\Model;<br/><br/>

                            class User extends Model<br/>
                            {<br/>
                                &nbsp;public function scopeActive(Builder $query)<br/>
                                &nbsp;{<br/>
                                    &nbsp;&nbsp;return $query->where('active', 1);<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <div>
                            Использование локального scope: Теперь вы можете использовать метод active в запросах к модели User:
                        </div>
                        <code>
                            $activeUsers = User::active()->get();
                        </code>
                        <h5>
                            Глобальные Scopes (глобальные области)
                        </h5>
                        <div>
                            Глобальные scopes применяются автоматически ко всем запросам для определенной модели.<br/><br/>

                            Пример использования:<br/>
                            Допустим, вы хотите применить глобальный scope, который автоматически исключает удаленные (soft-deleted) записи из всех запросов к модели Post.<br/><br/>

                            Создание глобального scope:<br/>
                        </div>
                        <code>
                            namespace App\Scopes;<br/><br/>

                            use Illuminate\Database\Eloquent\Builder;<br/>
                            use Illuminate\Database\Eloquent\Model;<br/>
                            use Illuminate\Database\Eloquent\Scope;<br/><br/>

                            class NonDeletedScope implements Scope<br/>
                            {<br/>
                                &nbsp;public function apply(Builder $builder, Model $model)<br/>
                                &nbsp;{<br/>
                                    &nbsp;&nbsp;return $builder->whereNull('deleted_at');<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <div>
                            Применение глобального scope к модели:
                        </div>
                        <code>
                            namespace App\Models;<br/>

                            use App\Scopes\NonDeletedScope;<br/>
                            use Illuminate\Database\Eloquent\Model;<br/><br/>

                            class Post extends Model<br/>
                            {<br/>
                                &nbsp;protected static function boot()<br/>
                                &nbsp;{<br/>
                                    &nbsp;&nbsp;parent::boot();<br/>
                                    &nbsp;static::addGlobalScope(new NonDeletedScope);<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <h5>
                            Зачем используются Scopes
                        </h5>
                        <div>
                            Повторное использование: Scopes позволяют повторно использовать одинаковые условия запроса в разных частях приложения.<br/><br/>

                            Организация кода: С их помощью можно сделать код более организованным и легким для чтения.<br/><br/>

                            Удобство: Они позволяют сократить количество дублирующего кода и сделать запросы более выразительными.<br/><br/>

                            Scopes - мощный инструмент, который помогает сделать работу с запросами в Laravel более удобной и эффективной.
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                    <div class="text-primary">Рассказать о свойствах модели, таких как: $fillable, $casts, $appends</div>
                </button>
                </h2>
                <div id="flush-collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            В Laravel есть несколько свойств модели, которые помогают управлять данными и их преобразованием. Давайте разберем три из них: $fillable, $casts и $appends.
                        </div>
                        <h5>
                            $fillable
                        </h5>
                        <div>
                            Свойство $fillable позволяет вам указать, какие атрибуты модели могут быть массово назначены. Это полезно для защиты от уязвимостей, связанных с массовым заполнением данных.<br/><br/>

                            Пример использования:<br/>
                        </div>
                        <code>
                            namespace App\Models;<br/>

                            use Illuminate\Database\Eloquent\Model;<br/><br/>

                            class User extends Model<br/>
                            {<br/>
                                &nbsp;protected $fillable = ['name', 'email', 'password'];<br/>
                            }<br/>
                        </code>
                        <div>
                            Теперь вы можете массово назначить значения для этих атрибутов:
                        </div>
                        <code>
                            User::create([<br/>
                                &nbsp;'name' => 'John Doe',<br/>
                                &nbsp;'email' => 'john@example.com',<br/>
                                &nbsp;'password' => bcrypt('secret'),<br/>
                            ]);<br/>
                        </code>
                        <h5>
                            $casts
                        </h5>
                        <div>
                            Свойство $casts используется для преобразования атрибутов модели в нужный тип данных при доступе к ним. Это позволяет вам автоматически преобразовывать значения при работе с ними.<br/><br/>

                            Пример использования:<br/>
                        </div>
                        <code>
                            namespace App\Models;<br/>

                            use Illuminate\Database\Eloquent\Model;<br/><br/>

                            class User extends Model<br/>
                            {<br/>
                                &nbsp;protected $casts = [<br/>
                                    &nbsp;&nbsp;'email_verified_at' => 'datetime',<br/>
                                    &nbsp;&nbsp;'is_admin' => 'boolean',<br/>
                                &nbsp;];<br/>
                            }<br/>
                        </code>
                        <div>
                            Теперь email_verified_at будет автоматически преобразован в экземпляр Carbon, а is_admin будет преобразован в булево значение.
                        </div>
                        <h5>
                            $appends
                        </h5>
                        <div>
                            Свойство $appends позволяет добавить дополнительные атрибуты к массиву или JSON-представлению вашей модели. Эти атрибуты не хранятся в базе данных, но могут быть рассчитаны на лету.<br/><br/>

                            Пример использования:<br/>
                            Допустим, у вас есть аксессор для полного имени пользователя:
                        </div>
                        <code>
                            namespace App\Models;<br/>

                            use Illuminate\Database\Eloquent\Model;<br/><br/>

                            class User extends Model<br/>
                            {<br/>
                                &nbsp;protected $appends = ['full_name'];<br/>

                                &nbsp;public function getFullNameAttribute()<br/>
                                &nbsp;{
                                    &nbsp;&nbsp;return "{$this->first_name} {$this->last_name}";<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <div>
                            Теперь при преобразовании модели в массив или JSON, атрибут full_name будет добавлен:
                        </div>
                        <code>
                            $user = User::find(1);<br/>
                            echo $user->toJson(); // будет включать 'full_name'<br/>
                        </code>
                        <h5>
                            Зачем используются эти свойства
                        </h5>
                        <div>
                            $fillable: Защищает вашу модель от массового назначения несанкционированных атрибутов и улучшает безопасность.<br/><br/>

                            $casts: Автоматически преобразует атрибуты в нужный тип данных, что делает работу с ними более удобной и надежной.<br/><br/>

                            $appends: Позволяет добавлять вычисляемые атрибуты к массиву или JSON-представлению модели без необходимости сохранять их в базе данных.<br/><br/>

                            Эти свойства помогают сделать ваш код чище, безопаснее и более удобным для работы с данными. Надеюсь, это объяснение было полезным для вас!
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                    <div class="text-primary">Рассказать про Relations - какие бывают, какие могут быть применены в рамках тестового задания</div>
                </button>
                </h2>
                <div id="flush-collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            В Laravel есть несколько типов отношений (Relations) между моделями, которые позволяют вам устанавливать связи между различными сущностями в базе данных. Давайте рассмотрим основные типы отношений:
                        </div>
                        <h5>
                            Один-к-одному (One-to-One)
                        </h5>
                        <div>
                            Отношение один-к-одному подразумевает, что каждая запись одной модели связана с одной записью другой модели. Например, у каждого пользователя может быть один профиль.
                        </div>
                        <h5>
                            Один-ко-многим (One-to-Many)
                        </h5>
                        <div>
                            Отношение один-ко-многим подразумевает, что каждая запись одной модели может быть связана с несколькими записями другой модели. Например, один пост может иметь много комментариев.
                        </div>
                        <h5>
                            Многие-ко-многим (Many-to-Many) 
                        </h5>
                        <div>
                            Отношение многие-ко-многим подразумевает, что каждая запись одной модели может быть связана с несколькими записями другой модели и наоборот. Например, пользователи могут подписываться на несколько ролей, и роли могут назначаться нескольким пользователям.
                        </div>
                        <h5>
                            Полиморфные отношения (Polymorphic Relations)
                        </h5>
                        <div>
                            Полиморфные отношения позволяют модели принадлежать нескольким другим моделям с помощью одного единственного отношения. Это удобно для отношений, таких как "комментарии", "теги" или "изображения", которые могут принадлежать нескольким различным моделям.
                        </div>
                        <h5>
                            Полиморфные отношения многие-ко-многим (Many-to-Many Polymorphic Relations)
                        </h5>
                        <div>
                            Это отношение позволяет связать несколько моделей через полиморфную таблицу. Например, модель Tag может быть прикреплена к различным моделям, таким как Post и Video.
                        </div>
                        <div>
                            Каждый тип отношений имеет свои уникальные возможности и применение. Понимание этих типов поможет вам лучше организовать данные и связи между моделями в вашем приложении.
                        </div>
                        <div>
                            В рамках тестового задания применены: belongsToMany, belongsTo, hasMany.
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                    <div class="text-primary">Рассказать/показать что такое resource Controller, что у него внутри, зачем нужен, как ограничить методы (например, оставить только вывод списка)</div>
                </button>
                </h2>
                <div id="flush-collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            Resource Controller в Laravel - это тип контроллера, который позволяет автоматически создавать методы для стандартных CRUD (создание, чтение, обновление, удаление) операций. Он упрощает управление ресурсами в приложении, предоставляя набор предопределенных методов.
                        </div>
                        <h5>
                            Создание Resource Controller
                        </h5>
                        <div>
                            Чтобы создать resource controller, используйте команду Artisan:
                        </div>
                        <code>
                            php artisan make:controller UserController --resource
                        </code>
                        <div>
                            Это создаст контроллер с набором методов для обработки CRUD операций.
                        </div>
                        <div>
                            <p>
                            Вот как выглядит стандартный ресурсный контроллер:
                            </p>
                            <code>
                                namespace App\Http\Controllers;<br/>

                                use Illuminate\Http\Request;<br/>
                                use App\Models\User;<br/>

                                class UserController extends Controller<br/>
                                {<br/>
                                    &nbsp;public function index()<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;// Вывод списка ресурсов<br/>
                                        &nbsp;&nbsp;$users = User::all();<br/><br/>
                                        &nbsp;return view('users.index', compact('users'));<br/>
                                    &nbsp;}<br/><br/>

                                    &nbsp;public function create()<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;// Форма создания ресурса<br/>
                                        &nbsp;&nbsp;return view('users.create');<br/>
                                    &nbsp;}<br/><br/>

                                    &nbsp;public function store(Request $request)<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;// Сохранение нового ресурса<br/>
                                        &nbsp;&nbsp;$request->validate([<br/>
                                        &nbsp;&nbsp;&nbsp;'name' => 'required',<br/>
                                        &nbsp;&nbsp;&nbsp;'email' => 'required|email',<br/>
                                        &nbsp;&nbsp;]);<br/><br/>

                                        &nbsp;&nbsp;User::create($request->all());<br/>
                                        &nbsp;&nbsp;return redirect()->route('users.index');<br/>
                                    &nbsp;}<br/><br/>

                                    &nbsp;public function show(User $user)<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;// Отображение отдельного ресурса<br/>
                                        &nbsp;&nbsp;return view('users.show', compact('user'));<br/>
                                    &nbsp; }<br/><br/>

                                    &nbsp;public function edit(User $user)<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;// Форма редактирования ресурса<br/>
                                        &nbsp;&nbsp;return view('users.edit', compact('user'));<br/>
                                    &nbsp;}<br/><br/>

                                    &nbsp;public function update(Request $request, User $user)<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;// Обновление ресурса<br/>
                                        &nbsp;&nbsp;$request->validate([<br/>
                                        &nbsp;&nbsp;&nbsp;'name' => 'required',<br/>
                                        &nbsp;&nbsp;&nbsp;'email' => 'required|email',<br/>
                                        &nbsp;&nbsp;]);<br/><br/>

                                        &nbsp;&nbsp;$user->update($request->all());<br/>
                                        &nbsp;&nbsp;return redirect()->route('users.index');<br/>
                                    &nbsp;}<br/><br/>

                                    &nbsp;public function destroy(User $user)<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;// Удаление ресурса<br/>
                                        &nbsp;&nbsp;$user->delete();<br/>
                                        &nbsp;&nbsp;return redirect()->route('users.index');<br/>
                                    &nbsp;}<br/>
                                }<br/>
                            </code>
                            <h5>
                                Зачем нужен Resource Controller
                            </h5>
                            <div>
                                Resource Controller упрощает создание стандартных CRUD операций, предоставляя предопределенные методы и повышая согласованность кода. Он помогает избежать дублирования кода и улучшает читаемость и поддержку приложения.
                            </div>
                            <h5>
                                Ограничение методов Resource Controller
                            </h5>
                            <div>
                                Если вам нужно оставить только определенные методы, например, только для вывода списка (index), вы можете сделать это следующим образом:<br/><br/>

                                Определите нужные методы вручную: В контроллере оставьте только те методы, которые вам нужны:<br/>
                            </div>
                            <code>
                                namespace App\Http\Controllers;<br/>

                                use Illuminate\Http\Request;<br/>
                                use App\Models\User;<br/><br/>

                                class UserController extends Controller<br/>
                                {<br/>
                                    &nbsp;public function index()<br/>
                                    &nbsp;{<br/>
                                        &nbsp;&nbsp;$users = User::all();<br/>
                                        &nbsp;&nbsp;return view('users.index', compact('users'));<br/>
                                    &nbsp;}<br/>
                                }<br/>
                            </code>
                            <div>
                                Ограничьте маршруты в файле web.php: В маршрутах укажите только нужные вам методы:
                            </div>
                            <code>
                                use App\Http\Controllers\UserController;<br/><br/>

                                Route::resource('users', UserController::class)->only(['index']);<br/>
                            </code>
                            <div>
                                Таким образом, вы оставите только метод index, который отвечает за вывод списка пользователей. Resource Controller позволяет эффективно управлять вашими ресурсами, делая код более чистым и организованным.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
                    <div class="text-primary">API Resource/Collection - рассказать что это, зачем нужно</div>
                </button>
                </h2>
                <div id="flush-collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            API Resource и Resource Collection в Laravel - это мощные инструменты для преобразования моделей и коллекций моделей в JSON-формат, который часто используется в API. Они помогают упростить и улучшить управление данными, которые возвращаются клиенту.
                        </div>
                        <h5>
                            API Resource
                        </h5>
                        <div>
                            API Resource позволяет вам определить, как отдельная модель должна быть преобразована в JSON. Это помогает контролировать, какие атрибуты и в каком формате будут возвращаться клиенту.<br/><br/>

                            Пример использования:<br/>
                            Создание Resource:<br/>
                        </div>
                        <code>
                            php artisan make:resource UserResource
                        </code>
                        <div>
                            Определение Resource:
                        </div>
                        <code>
                            namespace App\Http\Resources;<br/>

                            use Illuminate\Http\Resources\Json\JsonResource;<br/><br/>

                            class UserResource extends JsonResource<br/>
                            {<br/>
                                &nbsp;public function toArray($request)<br/>
                                &nbsp;{<br/>
                                    &nbsp;&nbsp;return [<br/>
                                    &nbsp;&nbsp;&nbsp;'id' => $this->id,<br/>
                                    &nbsp;&nbsp;&nbsp;'name' => $this->name,<br/>
                                    &nbsp;&nbsp;&nbsp;'email' => $this->email,<br/>
                                    &nbsp;&nbsp;&nbsp;'created_at' => $this->created_at->toDateTimeString(),<br/>
                                    &nbsp;&nbsp;&nbsp;'updated_at' => $this->updated_at->toDateTimeString(),<br/>
                                    &nbsp;&nbsp;];<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <div>
                            Использование Resource в контроллере:
                        </div>
                        <code>
                            namespace App\Http\Controllers;<br/>

                            use App\Http\Resources\UserResource;<br/>
                            use App\Models\User;<br/><br/>

                            class UserController extends Controller<br/>
                            {<br/>
                                &nbsp;public function show($id)<br/>
                                &nbsp;{<br/>
                                    &nbsp;&nbsp;$user = User::findOrFail($id);<br/>
                                    &nbsp;&nbsp;return new UserResource($user);<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <h5>
                            Resource Collection
                        </h5>
                        <div>
                            Resource Collection используется для преобразования коллекции моделей в JSON. Это полезно, когда вам нужно вернуть список ресурсов.<br/><br/>

                            Пример использования:<br/>
                            Создание Resource Collection: В Laravel Resource Collection создается автоматически при создании Resource. Вы можете использовать коллекцию без создания отдельного класса.<br/><br/>

                            Использование Resource Collection в контроллере:<br/>
                        </div>
                        <code>
                            namespace App\Http\Controllers;<br/>

                            use App\Http\Resources\UserResource;<br/>
                            use App\Models\User;<br/>
                            use Illuminate\Http\Resources\Json\AnonymousResourceCollection;<br/><br/>

                            class UserController extends Controller<br/>
                            {<br/>
                                &nbsp;public function index()<br/>
                                &nbsp;{<br/>
                                    &nbsp;&nbsp;$users = User::all();<br/>
                                    &nbsp;&nbsp;return UserResource::collection($users);<br/>
                                &nbsp;}<br/>
                            }<br/>
                        </code>
                        <h5>
                            Зачем нужны API Resource и Resource Collection
                        </h5>
                        <div>
                            Контроль над данными: Они позволяют контролировать, какие данные и в каком формате возвращаются клиенту, что улучшает безопасность и структуру вашего API.<br/><br/>

                            Упрощение кода: Использование ресурсов упрощает ваш контроллер, делая код более чистым и легким для поддержки.<br/><br/>

                            Повторное использование: Один и тот же ресурс можно использовать в различных частях вашего приложения, что способствует повторному использованию кода и уменьшению дублирования.<br/><br/>

                            API Resource и Resource Collection делают работу с API в Laravel более удобной и организованной.<br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
    

@endsection
