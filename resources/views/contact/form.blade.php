<div class="row mx-5 px-5" id="container">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                         <strong >First Name</strong>   
                        <div class="col-sm-5">
                                <!-- <input type="text" name="f_name" class="form-control" value="{{$account->f_name??''}}" placeholder="first Name" required> -->
                                {!! Form::text('f_name',$contact-> f_name??'' , ['placeholder' => 'First Name' , 'class'=>'form-control']); !!}
                        </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Phone No.:</strong>
                            <!-- <input type="tel" name="phone" class="form-control" value="{{$account->phone??''}}" placeholder="9876543210"  required> -->
                            <div class="col-sm-5">
                                {!! Form::tel('phone', $contact->phone??'' , ['placeholder' => 'Phone Number' , 'class'=>'form-control']); !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <!-- <input type="email" name="email" class="form-control" value="{{$account->email??''}}" placeholder="abc@xyz.com"  required> -->
                            <div class="col-sm-5">
                                {!!Form::text('email', $contact->email??'', ['placeholder' => 'abc@gmail.com' , 'class'=>'form-control']); !!}
                            </div>
                        </div>
                    </div>
                    @php
                    $accounts = DB::table('accounts')->select('id', 'f_name')->get();
                @endphp

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Relation with: </label>
                    <div class="col-sm-5">
                        <select name="Account_id"> 
                            <option value="null">None</option>
                            @foreach ($accounts as $account )
                                <option value="{{$val=$account->id}}">{{$account->f_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
{{--                     
                    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                        <!-- <button type="submit" class="btn btn-primary ml-3">Submit</button> -->
                       
                        {!!Form::submit('Submit' , ['class'=>'btn btn-primary ml-3']);!!}
                    </div> --}}
</div>
