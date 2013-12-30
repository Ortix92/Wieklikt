<?php $id = $friend["id"] ?>
<?php $name = $friend["name"] ?>
<?php $gender = $friend["gender"] ?>
<div class="col-xs-6 col-sm-4 col-md-2 fb-friend">
    <a href="/app/click/{{$id}}">
        <img    class="img-circle img-responsive" 
                src="https://graph.facebook.com/{{$id}}/picture?width=200&height=200" 
                title="{{$name}}" 
                alt="{{$name}}" 
                width="200px" />
        <p class="text-center">{{$name}}</p>
    </a>
</div>