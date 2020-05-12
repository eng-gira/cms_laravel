@extends('layouts.app')
@section('content')
    
    <h2> Account Settings </h2><br><br><br>
    <form action="/cms_laravel/cms_laravel/public/user/update_user_name" method="POST">
    @csrf
        Name: <input type="text" name="name" value="{{auth()->user()->name}}" 
            placeholder="{{auth()->user()->name}}" required>

        <button class="btn btn-primary"> Update Name </button>
    </form>
    <br>
    <hr>
    <br>
    <form action="/cms_laravel/cms_laravel/public/user/update_user_email" method="POST">
    @csrf
        Email: <input type="text" name="email" value="{{auth()->user()->email}}" 
            placeholder="{{auth()->user()->email}}" required>
        
        <button class="btn btn-primary"> Update Email </button>
    </form>

    @if(auth()->user()->mod)
        <br>
        <hr>
        <br>
        <p style="display:inline-block" href="/cms_laravel/cms_laravel/public/user/quit_moderation" 
            class="btn btn-danger" onclick="confirmQuitMod()">
            Quit Moderation
        </p>
    @endif

    <br>
    <hr>
    <br>
    <p style="display:inline-block" href="/cms_laravel/cms_laravel/public/user/delete_user" 
            class="btn btn-danger" onclick="confirm_delete_user()">
            Delete Account
    </p>


@endsection

<script>
    function confirmQuitMod()
    {
        let conf = confirm("Quit being a moderator?");

        if(conf==true)
        {
            location.replace("/cms_laravel/cms_laravel/public/user/quit_moderation");
        }  
    }

    function confirm_delete_user()
    {
        let conf = confirm("Delete Account?");

        if(conf==true)
        {
            location.replace("/cms_laravel/cms_laravel/public/user/delete_user");
        }  
    }
</script>