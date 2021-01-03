<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('frontend/images/logo_dapur_kenangan.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a class="nav-link active" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Product</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Service
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">                      
                        <a class="nav-link" href="{{ route('checkout') }}">   
                            <i class=" fa fa-shopping-cart"></i> 
                            @php
                                $transaction = \App\Transaction::where('transaction_status', 0)->first();
                                
                                if (empty($transaction)) {
                                    $i = \App\Transaction::where('transaction_status', 0)->first();
                                }else {
                                    $notif = \App\TransactionDetail::where('transactions_id', $transaction->id)->count();                                  
                                }
                            @endphp 
                            @if (!empty($notif))    
                            <span class="badge badge-success ml-2">                           
                            {{ $notif }}
                            </span> 
                            @endif
                        </a>                  
                </li>
            </ul>
            
            @guest
                <!-- Mobile Button -->
                <form action="" class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button" 
                    onclick="event.preventDefault(); location.href='{{ route('login') }}';">
                        Get Started
                    </button>
                </form>

                <!-- Dekstop Button -->
                <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" 
                    onclick="event.preventDefault(); location.href='{{ route('login') }}';">
                        Get Started
                    </button>
                </form>
            @endguest

            @auth
                <!-- Mobile Button -->
                <form action="{{ route('logout') }}" class="form-inline d-sm-block d-md-none" method="post">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0" type="submit" >
                        Logout
                    </button>
                </form>

                <!-- Dekstop Button -->
                <form action="{{ route('logout') }}" class="form-inline my-2 my-lg-0 d-none d-md-block" method="post">
                    @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</div>

