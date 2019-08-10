<footer class="flex column middle no-wrap col-lg-6">
    <ul class="flex col-lg-5 center footer-ul flex-wrap">
        <li class="flex column no-wrap">
                <p> <b>Quick links</b> </p>
                <a href="{{__('/category/shoes') }}">Buy shoes</a>
                <a href="{{__('/category/women') }}">Women collections</a>
                <a href="{{__('/category/men') }}">Men collection</a>
                <a href="{{route('user.orders')}}">Orders</a>
                @if(Auth::user())
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endif
        </li>
        <li class="flex column no-wrap">
                <p> <b>Legal</b> </p>
                <a href="/contents/terms#privacy">Privacy policy</a>
                <a href="/contents/terms#terms">terms of use</a>
                <a href="/contents/terms#disclaimers">Disclaimers</a>
                <a href="/contents/terms#return">Return Policy</a>
        </li>
        <li class="flex column no-wrap">
                <p> <b>Help & Contact</b> </p>
                <a href="{{ route('content.contact') }}">Contact us</a>
                <a href="/contents/terms#payment">Payments</a>
                <a href="{{ route('content.about') }}">About</a>
                <span class="flex nowrap">
                    <a targer="_blank" href="https://instagram.com/shopaholiqstores?igshid=dgarhnq45t6n"><i class="ion-social-instagram"></i></a>
                    <a targer="_blank" href="https://facebook.com/shopaholiqstores/"><i class="ion-social-facebool"></i></a>
                </span>
        </li>
    </ul>
    <div class="flex col-lg-6 center middle wrap copyright flex-wrap">
        <p>&copy; {{date('Y')}} {{$settings->name}} All rights Reserved. |</p>
        <p> Powered by LightsUp Energy</p>
    </div>
</footer>