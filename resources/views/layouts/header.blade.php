<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Главная</a></li>
                @auth
                @endauth
                    <li><a href="{{ route('products.index') }}" class="nav-link px-2 link-dark">Товары</a></li>
                @guest
                    <li class="nav-link px-2"> Вы anonymous!</li>
                @else
                    @if(auth()->user()->email=="egorfortov@gmail.com")
                        <li class="nav-link px-2"> Вы администратор: можете удалить товары!</li>
                    @else
                        <li class="nav-link px-2"> Вы зарегистрированный пользователь!</li>
                    @endif
                @endguest

                <input id="clickMe" type="button" value="Очистить корзину товаров" onclick="clearCart();" class="btn btn-danger btn-sm" style="margin-right: 10px"/>
                <script>
                    function clearCart() {
                        localStorage.clear();
                        alert("Корзина товаров очищена!");
                    }

                    function showCart() {
                        let names = JSON.parse(localStorage.getItem('items'));
                        alert(JSON.stringify(names));
                    }

                    function sendOrder() {
                        alert("Заказ отправлен в магазин!")
                    }
                </script>
                <input id="aaa" type="button" value="Показать корзину товаров" onclick="showCart();" class="btn btn-info btn-sm" style="margin-right: 10px"/>
                <input id="aaa" type="button" value="Отправить заказ в магазин" onclick="sendOrder();" class="btn btn-primary btn-sm"/>

            </ul>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" class="rounded-circle" width="32" height="32">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    @guest
                        <li><a class="dropdown-item" href="{{ route('login') }}">Войти</a></li>
                    @else
                        <li><a class="dropdown-item" href="https://vk.com/egorfortov">Профиль</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Выйти</button>
                        </form>
                    @endguest

                </ul>
            </div>
        </div>
    </div>
</header>
