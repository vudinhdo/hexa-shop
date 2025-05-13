{{-- This file is used for menu items by any Backpack v6 theme --}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"--}}
{{--      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="--}}
{{--      crossorigin="anonymous" referrerpolicy="no-referrer"/>--}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
            class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Cards"  :link="backpack_url('card')" />
<x-backpack::menu-item title="Carts"  :link="backpack_url('cart')" />
<x-backpack::menu-item title="Categories"  :link="backpack_url('category')" />
<x-backpack::menu-item title="Orders"  :link="backpack_url('order')" />
<x-backpack::menu-item title="Products"  :link="backpack_url('product')" />
<x-backpack::menu-item title="Users"  :link="backpack_url('user')" />
