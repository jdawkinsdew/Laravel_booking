@foreach($users as $key=>$user)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$user->name}}</td>
        <td>
            {{$user->username}}
        </td>
        <td>
            @if($user->role_id==1)
                Super Administrator
            @elseif($user->role_id==2)
                Administrator
            @elseif($user->role_id==3)
                Manager
            @elseif($user->role_id==4)
                Service Provider
            @elseif($user->role_id==5)
                Client
            @endif
        </td>
        <td>
            {{$user->email}}
        </td>
        <td>
            <a href="#" style="width:80px;height:80px;border-radius:50%;border:1px solid grey;display:inline-block;overflow:hidden;position:relative;padding:0px;">
                <img src="{{asset('uploads/avatar/'.$user->avatar)}}" style="max-width:80px;">
            </a>
        </td>
        <td>
            @if($user->email_verified_at!=null)
                <a href="javascript:void(0);" class="btn m-btn--square  btn-primary">Verified</a>
            @else
                <a href="javascript:void(0);" class="btn m-btn--square  btn-danger">Unverified</a>
            @endif
        </td>
        <td>
            @if($user->status == 'active')
                <a href="javascript:void(0);" class="btn m-btn--square  btn-success">Active</a>
            @else
                <button type="button" class="btn m-btn--square  btn-danger">{{ucfirst($user->status)}}</button>
            @endif
        </td>
        <td>{{$user->created_at->toDateString()}}</td>
        <td>{{$user->updated_at->toDateString()}}</td>
        <td>
            <a href="{{route('admin.settings.user_manage.edit',$user->username)}}" class="btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="Edit" ><i class="feather icon-edit-2"></i></a>
            <a href="#!" class="btn btn-icon btn-danger mr-1" data-toggle="tooltip" title="Delete" onclick="deleteItem({{ $user->id }})"><i class="feather icon-trash-2"></i></a>
        </td>
    </tr>
@endforeach
