<div class="row mx-5 px-5" id="container">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row">
         <strong >Name</strong>   
        <div class="col-sm-5">
                <!-- <input type="text" name="f_name" class="form-control" value="{{$account->f_name??''}}" placeholder="first Name" required> -->
                {!! Form::text('name',$user-> name??'' , ['placeholder' => 'First Name' , 'class'=>'form-control']); !!}
        </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <!-- <input type="email" name="email" class="form-control" value="{{$account->email??''}}" placeholder="abc@xyz.com"  required> -->
            <div class="col-sm-5">
                {!!Form::text('email', $user->email??'', ['placeholder' => 'abc@gmail.com' , 'class'=>'form-control']); !!}
            </div>
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
        <!-- <button type="submit" class="btn btn-primary ml-3">Submit</button> -->
       
        {!!Form::submit('Submit' , ['class'=>'btn btn-primary ml-3']);!!}
    </div>
</div>
