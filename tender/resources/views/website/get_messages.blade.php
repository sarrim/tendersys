@foreach($get_messages as $messages)
<div class="message-plunch">
    <div class="dash-msg-avatar">
        <img src="https://img.icons8.com/?size=512&id=0lg0kb05hrOz&format=png" alt="">
        <p style="margin-left:10px"> {{ $messages->from_user->username }} </p>
        <input type="hidden" name="to_user" value="{{ $user_id }}">
    </div>
    <div class="dash-msg-text"><p>{{ $messages->message_description }}</p></div>
</div>
@endforeach