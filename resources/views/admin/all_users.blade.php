@extends('layouts.app')
@section('content')
    <?php $all_users = $data['all_users'];?>

    @if(count($all_users)>0)
        @foreach($all_users as $user)
            @if(auth()->user()->id == $user->id)
                @continue
            @endif
            <p style="display:inline-block">ID: {{$user->id}}</p>
            <p style="display:inline-block">Name: {{$user->name}}</p>
            <p style="display:inline-block">Mod: {{$user->mod}}</p>
            <p style="float:right;margin-left:10px" class="btn btn-danger"
                        onclick="confirmUserDel({{$user->id}}, '{{$user->name}}')">
                            Delete User
            </p>
            <p style="float:right;" class="btn btn-primary"
                        onclick="confirmHireMod({{$user->id}}, '{{$user->name}}')">
                            Hire as moderator
            </p>
            <br>
            <br>
            <hr>
        @endforeach
    @endif
@endsection
<script>
    function confirmUserDel(user_id, user_name)
    {
        let conf = confirm("Delete user " + user_name);

        if(conf==true)
        {
            location.replace("/admin/force_delete_user/"+user_id);
        }  
    }

    function confirmHireMod(user_id, user_name)
    {
        let conf = confirm("Hire user " + user_name + " as moderator?");

        if(conf==true)
        {
            location.replace("/admin/hire_moderator/"+user_id);
        }  
    }
</script>