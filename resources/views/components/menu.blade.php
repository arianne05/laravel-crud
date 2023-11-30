<ul class="flex flex-col md:flex-row px-4">
    @auth {{--added auth condition| if authenticated or logged in display logout only--}}
        <li><a href="/newstudent" class="block py-2 pr-4 pl-3">Add User</a></li>
        <form action="/logout" method="POST">
            @csrf
            <li><button class="block py-2 pr-4 pl-3">Logout</button></li>
        </form>
    @else
        <li><a href="login" class="block py-2 pr-4 pl-3">Login</a></li>
        <li><a href="register" class="block py-2 pr-4 pl-3">Register</a></li>
    @endauth
</ul>