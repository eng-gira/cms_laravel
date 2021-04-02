@extends('layouts.app')
@section('content')
    <div class="container">
        <h2> Account Settings </h2><br><br><br>
        <form action="/cms_laravel/cms_laravel/public/user/update_user_name" method="POST">
        @csrf
            Name: <input type="text" name="name" value="{{auth()->user()->name}}" 
                placeholder="{{auth()->user()->name}}" style="margin-left:20px;" required>

            <button class="btn btn-primary" style="margin-left:20px;"> Update Name </button>
        </form>
        <br>
        <hr>
        <br>
        <form action="/cms_laravel/cms_laravel/public/user/update_user_email" method="POST">
        @csrf
            Email: <input type="text" name="email" style="margin-left:20px;width:200;" value="{{auth()->user()->email}}" 
                placeholder="{{auth()->user()->email}}" width="150" required>
            
            <button class="btn btn-primary" style="margin-left:20px;"> Update Email </button>
        </form>
        <br>
        <hr>
        <br>
        <form action="/cms_laravel/cms_laravel/public/user/reset_user_pw" method="POST">
        @csrf
            Old Password: <input type="password" name="old_pw" style="margin-left:20px;margin-right:20px;" required>
            
            New Password: <input type="password" name="new_pw" style="margin-left:20px;margin-right:20px;" required>
            
            Confirm Password: <input type="password" name="confirm_new_pw" style="margin-left:20px;margin-right:20px;" required>
            <br>
            <br>
            <button class="btn btn-primary"> Update Password </button>
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
    </div>

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